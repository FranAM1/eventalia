<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="flex flex-wrap justify-center">
                @foreach ($events as $event)
                    <a href="{{ route('event.show', $event) }}" class="max-w-sm  rounded overflow-hidden shadow-lg m-4 bg-gray-200 dark:bg-gray-800 transform transition duration-500 hover:scale-105">
                        <div class="w-full h-1/2 overflow-hidden ">
                            <img class="object-cover object-center w-full h-full" src="{{ './images/events/' . $event->image }}" alt="{{ $event->name }}">
                        </div>
                        <div class="flex flex-col p-4">
                            <div class="font-bold text-xl mb-2 text-blue-500 dark:text-yellow-500">{{ $event->name }}</div>
                            <p class=" text-base">
                                {{ $event->description }}
                            </p>
                            <p class=" text-base">
                                {{ $event->category->category_name }}
                            </p>
                            <p class=" text-base">
                                {{ $event->start_date }}
                            </p>
                            <p class=" text-base">
                                {{ $event->end_date }}
                            </p>
                            <p class=" text-base">
                                {{ $event->user->name }}
                            </p>
                            <p class=" text-base">
                                {{ $event->province->province_name }}
                            </p>
                            <p class=" text-base">
                                {{ $event->city->city_name }}
                            </p>
                        </div>
                    </a>
                @endforeach
            </div>

        </div>
    </div>
</x-app-layout>