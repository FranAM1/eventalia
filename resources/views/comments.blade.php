<x-app-layout>
    <form action="{{ route('comment.store') }}" method="POST"
        class="flex flex-col gap-4 my-8 justify-center items-center w-1/2">
        @csrf
        <div class="flex flex-col items-start font-bold w-full">
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

    <div class="flex flex-col gap-4 items-center w-1/2">
        @foreach ($comments as $comment)
        <div
        class="grid grid-cols-3 grid-rows-3 gap-4 items-start bg-white border-gray-600 p-4 border-2 rounded-xl dark:bg-gray-800 dark:border-white w-full">
            <x-comment-card :comment="$comment"></x-comment-card>
        </div>
        @endforeach
    </div>
</x-app-layout>