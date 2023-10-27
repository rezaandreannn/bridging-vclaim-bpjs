<x-guest-layout>

    <div class="alert alert-warning" role="alert">
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
    <a href="{{ route('pasien.forget')}}" class="btn btn-info btn-lg">Kembali</a>
    @push('js-guest')
    @include('sweetalert::alert')
    @endpush
</x-guest-layout>
