<x-app-layout>
    <div
        class="grid grid-cols-3 grid-rows-3 gap-4 items-start bg-white border-gray-600 p-4 border-2 rounded-xl dark:bg-gray-800 dark:border-white w-1/2 mt-8">
        <p class="col-span-1 col-start-1 font-bold">Comentario de {{ $comment->user->name }}</p>
        <p class="col-start-3 row-start-1 justify-self-end font-bold">{{ $comment->created_at->format('d/m/Y') }}</p>
        <p class="row-start-2 col-span-3 break-words">{{ $comment->content }}</p>
        <div class="col-start-1 row-start-3 flex gap-1">
            <x-comment-icon></x-comment-icon> <p>{{ $comment->replies->count() }}</p>
        </div>
    </div>
    <form action="{{ route('reply.store') }}" method="POST"
        class="flex flex-col gap-4 my-8 justify-center items-center w-1/2">
        @csrf
        <div class="flex flex-col items-start font-bold w-11/12 self-end">
            <textarea name="content" id="content" cols="30" rows="2"
                class="text-black rounded-sm w-full border-2" placeholder="Escribe tu respuesta"></textarea>
            @error('content')
            <p class="text-red-500">{{ $message }}</p>
            @enderror

            <input type="hidden" name="comment_id" value="{{ $comment->id }}">
        </div>
        <x-primary-button>
            Enviar
        </x-primary-button>
    </form>

    <div class="flex flex-col gap-4 items-end w-1/2">
        @foreach ($replies as $reply)
        <div
            class="grid grid-cols-3 grid-rows-3 items-start bg-white border-gray-600 p-4 border-2 rounded-xl dark:bg-gray-800 dark:border-white w-11/12 mb-8">
            <x-reply-card :reply="$reply"></x-reply-card>
        </div>
        @endforeach
    </div>


</x-app-layout>