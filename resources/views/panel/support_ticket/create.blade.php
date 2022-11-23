@extends('layouts.app')

@section('title', 'Create Support Tickets')

@section('content')
    <section>
        <div class="container custom_width">
            <div class="row">
                <form action="{{ route('admin.staffs.store') }}" method="POST">
                    <div class="col-lg-8 mx-auto settings_tabs_content">
                        <div class="custome_input">
                            <label for="" class="@error('subject') validation-error-label @enderror">Subject</label>
                            <input type="text" name="subject" class="@error('subject') validation-error @enderror">
                            @error('subject')
                            <span>{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="custome_input">
                            <label for="" class="@error('content') validation-error-label @enderror">Subject</label>
                            <textarea type="text" name="content" rows="5" class="@error('subject') validation-error @enderror" style="border: 1px solid var(--border_color);"></textarea>
                            @error('content')
                            <span>{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="custome_input">
                            <label for="">Attachment</label>
                            <input type="file" class="">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
