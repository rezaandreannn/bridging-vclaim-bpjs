    {{-- <div class="col-12"> --}}
    <div class="card">
        <nav class="navbar bg-primary justify-content-center">
            <marquee class="py-2">
                <h5 class="navbar-brand">ANJUNGAN CETAK SEP MANDIRI RSU MUHAMMADIYAH METRO</h5>
            </marquee>
        </nav>
    </div>
    {{-- </div> --}}

    <x-guest-layout>



        <div class="row justify-content-center">
            <div class="card shadow-sm bg-white rounded">
                <h6 class="card-header justify-content-center">Rujukan Baru</h6>

                <div class="card-body">
                    <p class="card-text"><small>Rujukan baru yaitu pasien dengan </small></p>
                    <center>
                        <div class="pt-2 pr-2">
                            <a href="{{ route('pasien.rujukan.sep')}}" class="btn btn-info btn-lg">Rujukan baru</a>
                        </div>
                    </center>

                </div>
            </div>
            <div class="card shadow-sm bg-white rounded ml-2">
                <h6 class="card-header justify-content-center">Pasien Kontrol</h6>

                <div class="card-body">
                    <p class="card-text"><small>Pasien Kontrol yaitu pasien dengan</small></p>
                    <center>
                        <div class="pt-2 pr-2">
                            <a href="" class="btn btn-danger btn-lg">Pasien Kontrol</a>
                        </div>
                    </center>

                </div>
            </div>

        </div>
        <!-- <div class="alert alert-warning" role="alert">
        <div>

            <p><small>* Pasien dengan tujuan kontrol pilih tombol warna merah <br>
                    * Pasien dengan rujukan baru pilih tombol warna biru</small></p>
        </div>
    </div>
    <x-auth-card>
        <div class="row justify-content-center">
            <div class="pt-2 pr-2">
                <a href="{{ route('pasien.rujukan.sep')}}" class="btn btn-info btn-lg">Rujukan baru</a>
            </div>
            <div class="pt-2 pr-2">
                <a href="" class="btn btn-danger btn-lg">Pasien Kontrol</a>
            </div>
        </div>



    </x-auth-card>
    <a href="{{ route('pasien.forget')}}" class="btn btn-info btn-lg">Kembali</a> -->
        @push('js-guest')
        @include('sweetalert::alert')
        @endpush
    </x-guest-layout>
