<x-guest-layout>
    <div class="alert alert-warning" role="alert">
        <i class="fas fa-exclamation-triangle"></i>
        Pastikan No MR Terdaftar Hari Ini
        {{-- <div class="row"> --}}
        {{-- <div class="col-1">
            </div>
            <div class="col-10">
            </div> --}}
        {{-- </div> --}}
    </div>
    <x-auth-card>

        <x-slot name="logo">
            <div class="d-flex justify-content-center align-items-center mb-2">
                {{-- <x-application-logo src="{{ asset('img/logo_rsumm.png')}}" class="mr-4" />
                <h2 class="text-center mt-3">Virtual <br> Claim</h2>

                <x-application-logo src="{{ asset('img/paripurna.png')}}" class="ml-4" /> --}}
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
                <label for="no_kartu">Masukan No Rekam Medis(MR)<code>*</code></label>
                <div class="input-group mb-3">
                    <input type="number" id="no_kartu" class="form-control" name="no_mr" value="{{ old('no_mr')}}">
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
