<x-app-layout>
    <form action="{{ route('event.store') }}" method="POST" class="flex flex-col gap-4 my-8 justify-center items-center w-1/2" enctype="multipart/form-data">
        @csrf
        <div class="flex flex-col items-start font-bold w-full">
            <label for="name">Nombre del evento: </label>
            <input type="text" name="name" id="name" cols="30" rows="2" value="{{ old('name') }}"
                class="text-black border-gray-500 rounded-sm w-full border-2">
            @error('name')
            <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex flex-col items-start font-bold w-full">
            <label for="description">Descripción del evento: </label>
            <textarea name="description" id="description" cols="30" rows="2" value="{{ old('description') }}"
                class="text-black rounded-sm w-full border-2"></textarea>
            @error('description')
            <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <section class="grid grid-cols-2 w-full gap-4">
            <div class="flex flex-col items-start font-bold w-full">
                <label for="start_date">Inicio del evento: </label>
                <input type="datetime-local" name="start_date" id="start_date" cols="30" rows="2" value="{{ old('start_date') }}"
                    class="text-black rounded-sm w-full border-2">
                @error('start_date')
                <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex flex-col items-start font-bold w-full">
                <label for="end_date">Finalización del evento: </label>
                <input type="datetime-local" name="end_date" id="end_date" cols="30" rows="2" value="{{ old('end_date') }}"
                    class="text-black rounded-sm w-full border-2">
                @error('end_date')
                <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
        </section>
        <div class="flex flex-col items-start font-bold w-full">
            <label for="image">Imagen del evento: </label>
            <input type="file" name="image" id="image" class="rounded-sm w-full" accept="image/*">
            @error('image')
            <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <x-primary-button class="mt-4">
            {{ __('Crear evento') }}
        </x-primary-button>
    </form>
</x-app-layout>