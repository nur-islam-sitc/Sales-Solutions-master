
<script setup>
    defineProps({
        show:Boolean
    })
</script>


<template>
    <div v-if="show" class="modal-mask">
        <div class="modal-container">
            <header>
                <slot name="header">default header</slot>
            </header>
            <div>
            <slot>default body</slot>
            </div>

            <footer class="modal-custom-footer">
                <button @click="$emit('close')" class="close-button">Close</button>
                <slot name="footer">
                    <button class="submit-button">
                        Submit
                    </button>
                </slot>

            </footer>

        </div>
    </div>
</template>

<style>
.modal-mask {
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,0.6);
    display: grid;
    place-items: center;
}
.modal-container {
    background: white;
    padding: 1rem;
    width: 80vw;
    max-width: 500px;
    border-radius: 10px;
}
.modal-custom-footer {
    border-top: 1px solid #ddd;
    margin-top: 1rem;
    padding-top: 0.5rem;
    font-size: .8rem;
}
.modal-custom-footer .close-button, .submit-button {
    color: #333;
    background: #ddd;
    padding: .25rem .75rem;
    border-radius: 15px;
}
.modal-custom-footer .close-button:hover {
    background: #c8c8c8;
}

.modal-custom-footer .submit-button:hover {
    background: #6f42c1;
    color: #fff;
}
</style>
