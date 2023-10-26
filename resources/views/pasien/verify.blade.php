<x-guest-layout>
    <div class="alert alert-warning" role="alert">
        <i class="fas fa-exclamation-triangle"></i>
        Pastikan No MR Terdaftar Hari Ini
    </div>
    <x-auth-card>

        <x-slot name="logo">
            <div class="d-flex justify-content-center align-items-center mb-2">
            </div>
        </x-slot>

        <!-- Session Status -->
        {{-- <x-auth-session-status class="mb-4" :status="session('status')" /> --}}

        <!-- Validation Errors -->
        {{-- <x-auth-validation-errors class="mb-4" :errors="$errors" /> --}}

        <form method="POST" action="{{ route('pasien.verify') }}" id="login-form">
            @csrf

            <!-- No Kartu -->
            {{-- <div class="section-title">Masukan No Mr.</div> --}}
            <div class="form-group">
                <label for="no_mr">Masukan No Rekam Medis(MR) Peserta<code>*</code></label>
                <div class="input-group mb-3">
                    <input type="number" id="no_mr" class="form-control" name="no_mr" value="{{ old('no_mr')}}">
                    {{-- <x-input id="password" class="" type="hidden" name="password" value="password" required /> --}}
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </div>
                </div>
                @if($errors->has('error'))
                <span class="text-danger"> {{ $errors->first('error') }}</span>
                @endif
            </div>
        </form>
    </x-auth-card>
    @push('js-guest')


    @endpush
</x-guest-layout>
