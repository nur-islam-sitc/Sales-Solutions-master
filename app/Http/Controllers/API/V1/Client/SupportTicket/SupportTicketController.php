<?php

namespace App\Http\Controllers\API\V1\Client\SupportTicket;

use App\Http\Controllers\Controller;
use App\Models\Attachment;
use App\Models\SupportTicket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SupportTicketController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'merchant_id' => 'required'
        ]);
        $tickets = SupportTicket::query()->with('attachment', 'comments', 'comments.user', 'comments.attachment')->findOrFail($request->input('merchant_id'));
        return response()->json($tickets);
    }
    public function store(Request $request)
    {
        $request->validate([
            'merchant_id' => 'required',
            'subject' => 'required|min:6',
            'content' => 'required|min:10'
        ]);

        $attachment = null;

        if($request->hasFile('attachment')) {
            $fileExt = $request->file('attachment')->getClientOriginalExtension();
            $size = $request->file('attachment')->getSize();
            $type = $request->file('attachment')->getMimeType();

            $path = '/upload/support-ticket';
            $name = Carbon::now()->format('YmdHis') . '-' . uniqid() .'.'.$fileExt;
            $image = $request->file('attachment')->storeAs($path, $name, 'local');

            $attachment = Attachment::query()->create([
                'name' => $name,
                'type' => $type,
                'size' => $size,
                'path' => $image,
            ]);
        }

        $ticket = SupportTicket::query()->create([
            'user_id' => $request->input('merchant_id'),
            'ticket_id' => mt_rand(11111, 99999),
            'subject' => $request->input('subject'),
            'content' => $request->input('content'),
            'attachment_id' => $attachment->id ?: null,
        ]);

        $ticket->load('attachment');
        return response()->json($ticket);
    }

    public function show($merchant, $id)
    {
        $ticket = SupportTicket::query()->with('attachment')->where('user_id', $merchant)->where('id', $id)->first();
        return response()->json($ticket);
    }

    public function reply(Request $request, $id)
    {
        $request->validate([
            'merchant_id' => 'required',
            'content' => 'required|min:10',
        ]);
        $ticket = SupportTicket::query()->where('user_id', $request->input('merchant_id'))->where('id', $id)->first();

        if(!$ticket) {
            return response()->json(['message' => 'No Ticket Found, Please Select Valid Ticket Id']);
        }
        $attachment = null;
        if($request->hasFile('attachment')) {

            $fileExt = $request->file('attachment')->getClientOriginalExtension();
            $size = $request->file('attachment')->getSize();
            $type = $request->file('attachment')->getMimeType();

            $path = '/upload/support-ticket';
            $name = Carbon::now()->format('YmdHis') . '-' . uniqid() .'.'.$fileExt;
            $image = $request->file('attachment')->storeAs($path, $name, 'local');

            $attachment = Attachment::query()->create([
                'name' => $name,
                'type' => $type,
                'size' => $size,
                'path' => $image,
            ]);
        }
        $ticket->comments()->create([
            'id' => Str::orderedUuid()->toString(),
            'user_id' => $request->input('merchant_id'),
            'content' => $request->input('content'),
            'attachment_id' => $attachment->id ?: null,
        ]);
        $ticket->load(['attachment', 'comments', 'comments.attachment', 'comments.user']);

        return response()->json($ticket);
    }
}
