<x-app-layout>
    <div class="d-flex justify-content-center align-items-center">
        <a href="{{ route('rujukan.baru', $nomorKartu)}}" class="btn btn-lg btn-primary">Rujukan Baru</a>
        <a href="{{ route('surat.kontrol', $nomorKartu)}}" class="btn btn-lg btn-success ml-2">Surat Kontrol</a>
    </div>
</x-app-layout>
