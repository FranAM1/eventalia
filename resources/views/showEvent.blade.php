<x-app-layout>
    <div class="flex flex-col items-center gap-12 p-4 w-full">
        <div class="grid grid-cols-1 md:grid-cols-2 justify-around w-3/4 gap-8">
            <div class="flex flex-col gap-4">
                <div class="w-full h-max overflow-hidden rounded-xl">
                    <img class="object-cover object-center w-full" src="{{ '../images/events/' . $event->image }}" alt="{{ $event->name }}"
                    onerror="this.onerror=null; this.src='{{ asset('images/events/default.jpg') }}';" />
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <x-tags-cards>
                        <x-icon-user style="w-10 h-10" />
                        {{ $event->user->name }}
                    </x-tags-cards>
                    
                    <x-tags-cards>
                        <x-icon-tag style="w-10 h-10" />
                        {{ $event->category->category_name }}
                    </x-tags-cards>

                    <x-tags-cards>
                        <x-icon-province style="w-10 h-10" />
                        {{ $event->province->province_name }}
                    </x-tags-cards>
                    <x-tags-cards>
                        <x-icon-city style="w-10 h-10" />
                        {{ $event->city->city_name }}
                    </x-tags-cards>
                </div>
            </div>
            <div class="border-t-2 md:border-0 border-gray-700 dark:border-white pt-4 flex flex-col gap-8 md:gap-0 justify-between">
                <h1 class="text-4xl font-bold text-center text-blue-500 dark:text-yellow-500">{{ $event->name }}</h1>
                <p class="text-center">{{$event->description}}</p>
                <section class="flex gap-4 items-center justify-center">
                    <x-icon-location style="w-10 h-10" />
                    {{ $event->address}}
                </section>
                <section class="flex flex-wrap gap-4 items-center justify-center">
                    <div class="flex gap-4 items-center">
                        <x-icon-calendar style="w-10 h-10" />
                        {{ $event->start_date->format('d-m-Y H:i') }}
                    </div>
                    <p>-</p>
                    <div class="flex gap-4 items-center">
                        <x-icon-calendar style="w-10 h-10" />
                        {{ $event->end_date->format('d-m-Y H:i') }}
                    </div>
                </section>
                <section class="flex gap-4 items-center justify-center">
                    <div class="flex gap-2 items-center">
                        <x-icon-participants style="w-10 h-10" />
                        {{ $event->getNumberParticipants() }}
                        <p class="mx-4">-</p>
                        <x-icon-participants style="w-10 h-10" />
                        {{ $event->max_participants }}
                    </div>
                </section>
                <div class="flex justify-center items-center gap-4">
                    @if($event->isFinished())
                        <p class="bg-red-600 text-white font-bold py-2 px-4 rounded w-fit self-center transition-colors">
                            Finalizado
                        </p>
                    @elseif($event->isActive())
                        <p class="bg-orange-600 text-white font-bold py-2 px-4 rounded w-fit self-center transition-colors">
                            En transcurso
                        </p>
                    @elseif(false)
                        <a href="" class="bg-blue-600 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded w-fit self-center transition-colors">
                            Editar
                        </a>
                    @elseif(auth()->user()->isRegisteredToEvent($event))
                        <a href="{{ route('event.unsubscribe', $event) }}" class="bg-red-600 hover:bg-red-800 text-white font-bold py-2 px-4 rounded w-fit self-center transition-colors">
                            Desapuntarse
                        </a>
                    @elseif($event->isFull())
                        <p class="bg-gray-600 text-white font-bold py-2 px-4 rounded w-fit self-center transition-colors">
                            Completo
                        </p>
                    @else
                        <a href="{{ route('event.subscribe', $event) }}" class="bg-green-600 hover:bg-green-800 text-white font-bold py-2 px-4 rounded w-fit self-center transition-colors">
                            Apuntarse
                        </a>
                    @endif
                    @if(auth()->user()->isOwnerOfEvent($event) || auth()->user()->isAdmin())
                        <a href="{{ route('event.edit', $event) }}" class="bg-blue-600 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded w-fit self-center transition-colors">
                            Editar
                        </a>
                        <form action="{{ route('event.destroy', $event) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 hover:bg-red-800 text-white font-bold py-2 px-4 rounded w-fit self-center transition-colors">
                                Eliminar
                            </button>
                        </form>
                    @endif
                </div>
                    
            </div>
        </div>
        <div class="w-3/4 border-t-2 border-gray-700 dark:border-white">
            <x-form-comment :event="$event"></x-form-comment>
            <div class="flex flex-col gap-4 items-center w-full">
                @foreach ($comments as $comment)
                <div
                class="grid grid-cols-3 grid-rows-3 gap-4 items-start bg-white border-gray-600 p-4 border-2 rounded-xl dark:bg-gray-800 dark:border-white w-full">
                    <x-comment-card :comment="$comment"></x-comment-card>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>