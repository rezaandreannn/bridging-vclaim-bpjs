<x-app-layout>
    <div class="form-group">
        <label for="exampleFormControlSelect1">Silahkan pilih dokter</label>
        {{-- <div class="btn-group" data-toggle="buttons"> --}}
        <div class="row">
            <div class="col-5">
                @foreach($dpjp['response']['list'] as $value)
                <label class="btn btn-primary btn-lg ml-1 d-block text-white">
                    <input type="radio" name="dokter" id="dokter{{$loop->iteration}}" autocomplete="off">
                    <span class="ml-0"> {{ $value['nama'] }}</span>
                </label>
                @endforeach
            </div>
            {{-- </div> --}}

        </div>
        @push('js-spesific')
        {{-- <script>
        window.print();

    </script> --}}
        @endpush
</x-app-layout>
