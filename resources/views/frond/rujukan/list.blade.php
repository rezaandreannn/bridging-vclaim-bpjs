<x-app-layout>
    {{-- <x-card-rujukan :noKartu="$noKartu"> --}}
    @foreach($filteredRujukan as $value)
    <div class="row">
        <div class="col-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>No Rujukan. <code>{{ $value['noKunjungan']}}</code></h4>
                    <div class="card-header-action">
                        <a data-collapse="#mycard-collapse{{$loop->iteration}}" class="btn btn-icon btn-info" href="#"><i class="fas fa-{{ $loop->iteration == 1 ? 'minus' : 'plus'}}"></i></a>
                    </div>
                </div>
                <div class="collapse {{ $loop->iteration == 1 ? 'show' : 'hide'}}" id="mycard-collapse{{$loop->iteration}}">
                    <div class="card-body">
                        <x-rujukan-biodata-content key="Tgl. Rujukan" :value="$value['tglKunjungan']" />
                        <x-rujukan-biodata-content key="Nama" :value="$value['peserta']['nama']" />
                        <x-rujukan-biodata-content key="PPK. Perujuk" :value="$value['provPerujuk']['nama']" />
                        <x-rujukan-biodata-content key="Spesialis" :value="$value['poliRujukan']['nama']" />
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-primary">
                            Buat SEP
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    {{-- </x-card-rujukan> --}}
    @push('css-spesific')
    <style>
        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            /* Customize the shadow here */
        }

    </style>
    @endpush

    @push('js-spesific')
    <script src="assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
    <script src="assets/modules/jquery-ui/jquery-ui.min.js"></script>
    @endpush
</x-app-layout>
