@props(['reply'])

<p class="col-span-1 col-start-1 font-bold">Respuesta de {{ $reply->user->name }}</p>
<p class="col-start-3 row-start-1 justify-self-end font-bold">{{ $reply->created_at->format('d/m/Y') }}</p>
<p class="row-start-2 col-span-3 break-words">{{ $reply->content }}</p>


<div class="row-start-3 col-start-3 flex gap-4 flex-wrap self-end justify-self-end">
    @if (auth()->user()->id == $reply->user_id)
    <form action="{{ route('reply.destroy', $reply) }}" method="POST" class="">
        @csrf
        @method('DELETE')
        <x-danger-button>
            Eliminar
        </x-danger-button>
    </form>
    @endif
</div>