<form action="{{ route('comment.store') }}" method="POST"
        class="flex flex-col gap-4 my-8 justify-center items-center w-full">
        @csrf
        <div class="flex flex-col items-start font-bold w-full">
            <input type="hidden" name="event_id" value="{{ $event->id }}">
            <label for="content">Deja tu comentario: </label>
            <textarea name="content" id="content" cols="30" rows="2"
                class="text-black rounded-sm w-full border-2"></textarea>
            @error('content')
            <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <x-primary-button>
            Enviar
        </x-primary-button>
</form>
