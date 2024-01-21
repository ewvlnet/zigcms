<x-guest-layout>

    <h4 class="mb-2">Forgot Password? 🔒</h4>
    <p class="mb-4">{{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}</p>

    <x-auth-session-status class="mb-4" :status="session('status')"/>

    <form id="formAuthentication" class="mb-3" method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="mb-3">
            <x-shared.form.input label="{{__('Email')}}" name="email" type="email"
                                 value="{{ old('email') }}"
                                 placeholder="{{__('Enter your email')}}" required="on" autofocus="on"/>
        </div>

        <div class="mb-3">
            <button class="btn btn-primary d-grid w-100" type="submit">{{ __('Email Password Reset Link') }}</button>
        </div>
    </form>

    <div class="text-center">
        <a href="{{route('login')}}" class="d-flex align-items-center justify-content-center">
            <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>{{ __('Back to login') }}
        </a>
    </div>
</x-guest-layout>
