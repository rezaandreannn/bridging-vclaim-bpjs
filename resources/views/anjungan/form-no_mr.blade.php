<x-guest-layout title="form mr">
    <div class="alert alert-warning" role="alert">
        <i class="fas fa-exclamation-triangle"></i>
        Pastikan No MR Terdaftar Hari Ini & Pasien MJKN
    </div>
    <x-auth-card>

        <x-slot name="logo">
            <div class="d-flex justify-content-center align-items-center mb-2">
            </div>
        </x-slot>
        <form method="POST" action="{{ route('form.store') }}" id="login-form">
            @csrf
            <!-- No Kartu -->
            <div class="form-group">
                <label for="no_mr">Masukan No Rekam Medis(MR) Peserta<code>*</code></label>
                <div class="input-group mb-3">
                    <input type="number" id="no_mr" class="form-control" name="no_mr" value="{{ old('no_mr')}}" required>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </div>
                </div>
            </div>
        </form>
    </x-auth-card>
    @push('js-guest')
    @include('sweetalert::alert')
    @endpush
</x-guest-layout>
