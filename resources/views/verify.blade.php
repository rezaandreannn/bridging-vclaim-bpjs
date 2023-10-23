<x-guest-layout>
    <div class="alert alert-warning" role="alert">
        <i class="fas fa-exclamation-triangle"></i>
        Pastikan No Rekam Medis Terdaftar Hari Ini
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
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('verify') }}" id="login-form">
            @csrf

            <!-- No Kartu -->
            {{-- <div class="section-title">Masukan No Mr.</div> --}}
            <div class="form-group">
                <label for="no_kartu">Masukan No Rekam Medis<code>*</code></label>
                <div class="input-group mb-3">
                    <input type="number" id="no_kartu" class="form-control" name="no_mr" value="{{ old('no_mr')}}">
                    {{-- <x-input id="password" class="" type="hidden" name="password" value="password" required /> --}}
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </div>
                </div>
            </div>
        </form>
    </x-auth-card>
    @push('js-guest')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const pinInput = document.getElementById('password'); // Ganti dengan ID yang sesuai
            const pinError = document.getElementById('pin-error'); // ID pesan kesalahan

            pinInput.addEventListener('input', function() {
                const pinValue = this.value;
                const correctPin = 'rsumm2023'; // Ganti dengan PIN yang benar

                let isPartialMatch = false;

                if (pinValue.length == correctPin.length) {
                    if (pinValue == correctPin) {
                        // Jika PIN benar, otomatis submit form dan sembunyikan pesan kesalahan
                        pinError.style.display = 'none';
                        document.getElementById('login-form').submit();
                    } else {
                        // Jika PIN salah, tampilkan pesan kesalahan
                        pinError.style.display = 'block';
                    }
                } else {
                    // Reset pesan kesalahan ketika pengguna masih melakukan pencocokan sebagian
                    pinError.style.display = 'none';
                }
            });
        });

    </script>

    @endpush
</x-guest-layout>
