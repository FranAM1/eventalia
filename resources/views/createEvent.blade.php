<x-app-layout>
    @if(auth()->user()->role_id != null)
    <form action="{{ route('event.store') }}" method="POST"
        class="flex flex-col gap-4 my-8 justify-center items-center w-full  p-4 md:w-1/2" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-2 gap-4 items-start font-bold w-full">
            <section>
                <label for="name">Nombre del evento: </label>
                <input type="text" name="name" id="name" value="{{ old('name') }}"
                    class="text-black border-gray-500 rounded-sm w-full border-2">
                @error('name')
                <p class="text-red-500">{{ $message }}</p>
                @enderror
            </section>
            <section>
                <label for="max_participants">Max. Participantes: </label>
                <input type="number" name="max_participants" id="max_participants" value="{{ old('max_participants') }}"
                    class="text-black border-gray-500 rounded-sm w-full border-2">
                @error('max_participants')
                <p class="text-red-500">{{ $message }}</p>
                @enderror
            </section>
        </div>
        <div class="flex flex-col items-start font-bold w-full">
            <label for="description">Descripción del evento: </label>
            <textarea name="description" id="description" cols="30" rows="2"
                class="text-black rounded-sm w-full border-2">{{ old('description') }}</textarea>
            @error('description')
            <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <section class="grid grid-cols-2 w-full gap-4">
            <div class="flex flex-col items-start font-bold w-full">
                <label for="address">Dirección del evento: </label>
                <input type="text" name="address" id="address" value="{{ old('address') }}"
                    class="text-black border-gray-500 rounded-sm w-full border-2">
                @error('address')
                <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex flex-col items-start font-bold w-full">
                <label for="category"> Categoría: </label>
                <select name="category" id="category" class="text-black rounded-sm w-full border-2">
                    <option value="" selected disabled>Selecciona una categoría</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
                @error('category')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
        </section>

        {{-- Provincia y ciudad --}}
        <section class="grid grid-cols-2 w-full gap-4">
            <div class="flex flex-col items-start font-bold w-full">
                <label for="province">Provincia: </label>
                <select name="province" id="province" class="text-black rounded-sm w-full border-2">
                    <option value="" selected disabled>Selecciona una provincia</option>
                    @foreach ($provinces as $province)
                        <option value="{{ $province->id }}">{{ $province->province_name }}</option>
                    @endforeach
                </select>
                @error('province')
                <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex flex-col items-start font-bold w-full">
                <label for="city">Ciudad: </label>
                <select name="city" id="city" class="text-black rounded-sm w-full border-2">
                    <option value="" selected disabled>Selecciona una ciudad</option>
                </select>
                @error('city')
                <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
        </section>

        {{-- FECHAS --}}
        <section class="grid grid-cols-2 w-full gap-4">
            <div class="flex flex-col items-start font-bold w-full">
                <label for="start_date">Inicio del evento: </label>
                <input type="datetime-local" name="start_date" id="start_date" value="{{ old('start_date') }}"
                    class="text-black rounded-sm w-full border-2">
                @error('start_date')
                <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex flex-col items-start font-bold w-full">
                <label for="end_date">Finalización del evento: </label>
                <input type="datetime-local" name="end_date" id="end_date" cols="30" rows="2"
                    value="{{ old('end_date') }}" class="text-black rounded-sm w-full border-2">
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
    @else
    <div class="flex flex-col items-center justify-center mt-8 p-4">
        <h1 class="text-4xl font-bold text-center">No tienes permisos para crear eventos</h1>
        <p class="text-xl text-blue-500 font-bold  dark:text-yellow-600">Tienes que estar suscrito para poder crear
            eventos</p>
        <x-link-button :href="route('subscribe')">
            Suscribirse
        </x-link-button>

    </div>
    @endif
</x-app-layout>
<script>
    $(document).ready(function() {
        $('#province').on('change', function() {
            var province_id = this.value;
            $("#city").html('');
            $.ajax({
                url: "{{ route('getcities') }}",
                type: "GET",
                data: {
                    province_id: province_id,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(result) {
                    $('#city').html('<option value="">Selecciona una ciudad</option>');
                    $.each(result.cities, function(key, value) {
                        $("#city").append('<option value="' + value.id + '">' + value.city_name +
                            '</option>');
                    });
                }
            });
        });
    });
</script>