<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col gap-10">
            {{-- create filter section --}}
            <form action="" method="GET" class="w-full flex gap-4 items-center">
                <label for="category">Categoría</label>
                <select name="category" id="category" class="w-1/4 text-black">
                    <option value="">Todas</option>
                    @foreach ($categories as $category)
                        <option class="text-black"
                        value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->category_name }}
                        </option>
                    @endforeach
                </select>   

                <label for="province">Provincia</label>
                <select name="province" id="province" class="w-1/4 text-black">
                    <option value="">Todas las provincias</option>
                    @foreach ($provinces as $province)
                        <option class="text-black"
                        value="{{ $province->id }}" {{ request('province') == $province->id ? 'selected' : '' }}>
                            {{ $province->province_name }}
                        </option>
                    @endforeach
                </select>

                <label for="city">Ciudad</label>
                <select name="city" id="city" class="w-1/4 text-black">
                    <option value="">Todas</option>
                    {{-- cities of selected province --}}
                    @if(request('province'))
                        @foreach($provinces->find(request('province'))->cities as $city)
                            <option class="text-black"
                            value="{{ $city->id }}" {{ request('city') == $city->id ? 'selected' : '' }}>
                                {{ $city->city_name }}
                            </option>
                        @endforeach
                    @endif
                </select>

                
                </select>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-fit self-center transition-colors">
                    Filtrar
                </button>
            </form>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 justify-center">
                @foreach ($events as $event)
                    <x-event-card :event="$event" />
                @endforeach
            </div>

        </div>
    </div>
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
                },
                dataType: 'json',
                success: function(result) {
                    $('#city').html('<option value="">Todas</option>');
                    $.each(result.cities, function(key, value) {
                        $("#city").append('<option value="' + value.id + '">' + value.city_name +
                            '</option>');
                    });
                }
            });
        });
    });
</script>