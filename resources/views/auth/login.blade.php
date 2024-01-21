<x-guest-layout>

    <h4 class="mb-2">Welcome👋!</h4>
    <p class="mb-4">Please sign-in to your account</p>

    <x-auth-session-status class="mb-4" :status="session('status')"/>

    <form id="formAuthentication" class="mb-3" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
            <x-shared.form.input label="{{__('Email')}}" name="email" type="email"
                                 value="{{ old('email') }}"
                                 placeholder="{{__('Enter your email')}}" required="on" autofocus="on"/>
        </div>

        <div class="mb-3 form-password-toggle">
            <div class="d-flex justify-content-between">
                <label class="form-label" for="password">{{__('Password')}}</label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}"><small>{{__('Forgot Password?')}}</small></a>
                @endif
            </div>
            <div class="input-group input-group-merge">
                <input
                    type="password"
                    id="password"
                    class="form-control"
                    name="password"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    required
                    aria-describedby="password"
                />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
            </div>
            @if($errors->has('password'))
                @foreach ($errors->get('password') as $errormessage)
                    <small class="text-danger">{{ $errormessage }}</small>
                @endforeach
            @endif
        </div>

        <div class="mb-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="remember-me">
                <label class="form-check-label" for="remember-me">{{ __('Remember me') }}</label>
            </div>
        </div>
        <div class="mb-3">
            <button class="btn btn-primary d-grid w-100" type="submit">{{ __('Sign in') }}</button>
        </div>
    </form>

    <p class="text-center">
        <span>New on our platform?</span>
        <a href="{{route('register')}}">
            <span>Create an account</span>
        </a>
    </p>

</x-guest-layout>
