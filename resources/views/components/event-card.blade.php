@props(['event'])

<a href="{{ route('event.show', $event) }}" class="max-w-sm  rounded overflow-hidden shadow-lg m-4 bg-gray-200 dark:bg-gray-800 transform transition duration-500 hover:scale-105">
    <div class="w-full h-max overflow-hidden">
        <img class="object-cover object-center w-full h-72" src="{{ './images/events/' . $event->image }}" alt="{{ $event->name }}"
            onerror="this.onerror=null; this.src='{{ asset('images/events/default.jpg') }}';" 
        />
        
    </div>
    <div class="flex flex-col p-4 gap-4">
        <div class="font-bold text-3xl text-center text-blue-600 dark:text-yellow-500">{{ $event->name }}</div>
        <p class="text-base">
            {{ $event->description }}
        </p>
        <div class="flex gap-4 items-center justify-center">
            @if($event->isFinished())
                <div class="text-center font-bold">🔴</div>
            @elseif($event->isActive())
                <div class="text-center font-bold">🟠</div>
            @elseif($event->isFull())
                <div class="text-center font-bold">⚫</div>
            @else
                <div class="text-center font-bold">🟢</div>
            @endif
            <div class="text-center font-bold">{{ $event->getNumberParticipants() }} / {{ $event->max_participants }}</div>
            @auth
                @if($event->isUserRegistered(auth()->user()))
                    <div class="text-center font-bold">✔</div>
                @endif
            @endauth
        </div>
        <hr class="border-1 border-gray-500 opacity-50" />
        <div class="flex gap-4 self-center">
            <x-tags-cards>{{ $event->category->category_name }}</x-tags-cards>
            <x-tags-cards>{{ $event->province->province_name }}</x-tags-cards>
            <x-tags-cards>{{ $event->city->city_name }}</x-tags-cards>
        </div>
    </div>
</a>