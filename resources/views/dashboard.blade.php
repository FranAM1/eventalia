<x-app-layout>
    <div class="py-12 text-black dark:text-white flex flex-col  lg:flex-row items-center justify-center gap-8">
        <div class="max-w-7xl sm:px-6 lg:px-8">
            <h1 class="text-6xl md:text-7xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r
                from-blue-600 via-blue-400 to-blue-600
                dark:from-yellow-600 dark:via-orange-400 dark:to-yellow-600
                text-center lg:text-start
             ">EVENTALIA</h1>
            <h1 class="text-4xl lg:text-5xl font-bold text-center lg:text-start">EVENTOS DE TODO TIPO</h1>
        </div>
        <img src="./images/eventoInicio.png" class="p-4">
    </div>
    <div class="flex flex-col items-center gap-8 justify-center py-12 bg-gray-300 dark:bg-gray-800 p-4 w-full">
        <h1 class="text-blue-600 dark:text-yellow-500 text-4xl font-bold text-center">¿Buscas un planazo en tu ciudad?</h1>
        <div class="flex flex-col md:flex-row items-center justify-around w-full">
                <ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-2 w-full p-8">
                    @foreach($provinces as $province)
                    <li class="flex flex-col items-center">
                        <h3 class="text-4xl font-bold">{{ $province->province_name }}</h3>
                        @foreach($province->cities->take(3) as $city)
                            <a href="{{ route('event.index', ['province' => $province->id, 'city' => $city->id]) }}"
                            class="text-blue-600 dark:text-yellow-500 hover:underline cursor-pointer font-bold">
                            - {{ $city->city_name }}
                        </a>
                        @endforeach
                    </li>
                    @endforeach
                </ul>
        </div>
        <x-link-button :href="route('event.index')">
            Ver todos los eventos
        </x-link-button>
    </div>
    <div class="p-12 text-center flex justify-center flex-col gap-4 items-center">
        <h1 class="text-blue-600 dark:text-yellow-500 text-4xl font-bold">¿Quieres crear y publicar tu propio evento?</h1>
        <p class="dark:text-white"><strong>Eventalia</strong> puede ayudarte a difundir cualquier tipo de evento, ya sea un concierto, taller, curso, congreso o cualquier otra actividad.</p>
        <x-link-button :href="route('event.create')">
            Crear evento
        </x-link-button>
    </div>
</x-app-layout>