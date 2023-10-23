<x-guest-layout>
    <x-auth-card>

        <x-slot name="logo">
            <div class="d-flex justify-content-center align-items-center mb-2">
                {{-- <x-application-logo src="{{ asset('img/logo_rsumm.png')}}" class="mr-4" /> --}}
                <h5 class="text-center mt-3">Virtual Claim</h5>

                {{-- <x-application-logo src="{{ asset('img/paripurna.png')}}" class="ml-4" /> --}}
            </div>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}" id="login-form">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />
                <x-input id="email" class="" type="email" name="email" :value="old('email')" />
            </div>

            <!-- Password -->
            <div class="mt-3">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="" type="password" name="password" required autocomplete="current-password" placeholder="********" />
                <div class="mt-2 text-danger text-small" id="pin-error" style="display: none;">PIN salah, coba lagi.</div>
            </div>

            <!-- Remember Me -->
            <div class="mt-3 form-check">
                <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                <label for="remember_me" class="form-check-label text-sm">
                    {{ __('Remember me') }}
                </label>
            </div>

            <div class="d-flex justify-content-end mt-4">
                @if (Route::has('password.request'))
                <a class="text-muted" href="{{ route('password.request') }}" style="margin-right: 15px; margin-top: 15px;">
                    {{ __('Forgot your password?') }}
                </a>
                @endif

                <x-button class="ml-3">
                    {{ __('Masuk') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
    @push('js-guest')
    {{-- <script>
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

    </script> --}}

    @endpush
</x-guest-layout>
