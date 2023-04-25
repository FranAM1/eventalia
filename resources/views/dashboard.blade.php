<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Inicio') }}
        </h2>
    </x-slot>

    <div class="py-12 text-black dark:text-white flex flex-col  lg:flex-row items-center justify-center">
        <div class="max-w-7xl sm:px-6 lg:px-8">
            <h1 class="text-7xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r
             from-blue-600 via-blue-400 to-blue-600
                dark:from-yellow-600 dark:via-orange-400 dark:to-yellow-600
                text-center lg:text-start
             ">EVENTALIA</h1>
            <h1 class="text-4xl lg:text-5xl font-bold text-center lg:text-start">EVENTOS DE TODO TIPO</h1>
        </div>
        <img src="./images/eventosInicio.png" alt="" class="lg:w-1/2">
    </div>
    <div class="flex justify-center py-12 bg-gray-300 dark:bg-gray-800">
        <h1 class="text-blue-600 dark:text-yellow-600 text-4xl font-bold">¿Buscas un planazo en tu ciudad?</h1>
    </div>
    <div class="py-12 flex justify-center flex-col gap-4 items-center">
        <h1 class="text-blue-600 dark:text-yellow-600 text-4xl font-bold">¿Quieres crear anunciar tu propio evento?</h1>
        <p class="dark:text-white"><strong>Eventalia</strong> puede ayudarte a difundir cualquier tipo de evento, ya sea un concierto, taller, curso, congreso o cualquier otra actividad.</p>
    </div>
</x-app-layout>
