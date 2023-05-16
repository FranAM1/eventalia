<x-app-layout>
    <div class="py-12 text-black dark:text-white flex flex-col  lg:flex-row items-center justify-center gap-8">
        <div class="max-w-7xl sm:px-6 lg:px-8">
            <h1 class="text-7xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r
             from-blue-600 via-blue-400 to-blue-600
                dark:from-yellow-600 dark:via-orange-400 dark:to-yellow-600
                text-center lg:text-start
             ">EVENTALIA</h1>
            <h1 class="text-4xl lg:text-5xl font-bold text-center lg:text-start">EVENTOS DE TODO TIPO</h1>
        </div>
        <img src="./images/eventoInicio.png" class="p-4">
    </div>
    <div class="flex flex-col items-center gap-8 justify-center py-12 bg-gray-300 dark:bg-gray-800 p-4 w-full">
        <h1 class="text-blue-600 dark:text-yellow-500 text-4xl font-bold">¿Buscas un planazo en tu ciudad?</h1>
        <div class="flex justify-around w-full">
            <img src="https://upload.wikimedia.org/wikipedia/commons/9/90/Autonomous_communities_of_Spain.svg" alt="" 
            class="bg-gray-100 dark:bg-gray-600 rounded-xl border-black dark:border-white border-2 p-2 border-dashed">
            <div class="flex flex-col gap-4 h-full">
                <ul class="flex flex-col justify-between items-center">
                    <li class="dark:text-white">Conciertos</li>
                    <li class="dark:text-white">Talleres</li>
                    <li class="dark:text-white">Cursos</li>
                    <li class="dark:text-white">Congresos</li>
                </ul>
                <x-primary-button>
                    <a>Ver los eventos de tu ciudad</a>
                </x-button>
            </div>

        </div>
    </div>
    <div class="py-12 flex justify-center flex-col gap-4 items-center">
        <h1 class="text-blue-600 dark:text-yellow-500 text-4xl font-bold">¿Quieres crear y publicar tu propio evento?</h1>
        <p class="dark:text-white"><strong>Eventalia</strong> puede ayudarte a difundir cualquier tipo de evento, ya sea un concierto, taller, curso, congreso o cualquier otra actividad.</p>
        <x-primary-button>
            <a>Crear evento</a>
        </x-button>
    </div>
</x-app-layout>
