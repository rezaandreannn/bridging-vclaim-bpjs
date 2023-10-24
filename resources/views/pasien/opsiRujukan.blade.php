<x-guest-layout>

<div class="alert alert-warning" role="alert">
    <div>

    <p><small>* Pasien dengan tujuan kontrol pilih tombol warna merah <br>
            * Pasien dengan rujukan baru pilih tombol warna biru</small></p>
    </div>


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

        <form method="POST" action="{{ route('verify') }}" id="login-form">
            @csrf

            <!-- No Kartu -->
            {{-- <div class="section-title">Masukan No Mr.</div> --}}
            <div class="form-group">
                
         
            
                <div class="row justify-content-center">
                    <div class="pt-2 pr-2">
                        <a href="" class="btn btn-info btn-lg">Rujukan baru</a>
                    </div>
                    <div class="pt-2 pr-2">
                        <a href="" class="btn btn-danger btn-lg">Pasien Kontrol</a>
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
