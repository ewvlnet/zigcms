<x-guest-layout>

    <h4 class="mb-2">Verify Email 📧</h4>
    <p class="mb-4">{{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}</p>

    @if (session('status') == 'verification-link-sent')
        <p class="mb-4">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </p>
    @endif

    <form id="formAuthentication" class="mb-3" method="POST" action="{{ route('verification.send') }}">
        @csrf
        <div class="mb-3">
            <button class="btn btn-primary d-grid w-100" type="submit">{{ __('Resend Verification Email') }}</button>
        </div>
    </form>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <div class="mb-3">
            <button class="btn btn-primary d-grid w-100" type="submit">{{ __('Log Out') }}</button>
        </div>
    </form>

</x-guest-layout>
