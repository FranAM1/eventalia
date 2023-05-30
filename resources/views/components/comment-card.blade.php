@props(['comment'])

<p class="col-span-1 col-start-1 font-bold">Comentario de {{ $comment->user->name }}</p>
<p class="col-start-3 row-start-1 justify-self-end font-bold">{{ $comment->created_at->format('d/m/Y') }}</p>
<p class="row-start-2 col-span-3 break-words">{{ $comment->content }}</p>
<div class="col-start-1 row-start-3 flex gap-1">
    <x-comment-icon></x-comment-icon>
    <p>{{ $comment->replies->count() }}</p>
</div>


<div class="row-start-3 col-start-3 flex gap-4 flex-wrap self-end justify-self-end">
    @auth
    <x-link-button :href="route('comment.show', $comment)">
        Responder
    </x-link-button>
    @endauth

    @if (auth()->user()->id == $comment->user_id || auth()->user()->isAdmin())
    <form action="{{ route('comment.destroy', $comment) }}" method="POST" class="">
        @csrf
        @method('DELETE')
        <x-danger-button>
            Eliminar
        </x-danger-button>
    </form>
    @endif
</div>