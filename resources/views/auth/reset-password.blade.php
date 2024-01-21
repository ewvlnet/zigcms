<x-guest-layout>

    <h4 class="mb-2">Reset Password? 🔒</h4>
    <p class="mb-4">{{ __('Reset Password Your Password.') }}</p>

    <form id="formAuthentication" class="mb-3" method="POST" action="{{ route('password.store') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div class="mb-3">
            <x-shared.form.input label="{{__('Email')}}" name="email" type="email"
                                 value="{{ old('email') }}"
                                 placeholder="{{__('Enter your email')}}" required="on" autofocus="on"/>
        </div>

        <div class="mb-3 form-password-toggle">
            <div class="d-flex justify-content-between">
                <label class="form-label" for="password">{{__('Password')}}</label>
            </div>
            <div class="input-group input-group-merge">
                <input
                    type="password"
                    id="password"
                    class="form-control"
                    name="password"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    required autocomplete="current-password"
                    aria-describedby="password"
                />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                @if($errors->has('password'))
                    @foreach ($errors->get('password') as $errormessage)
                        <div class="invalid-feedback">{{ $errormessage }}</div>
                    @endforeach
                @endif
            </div>
        </div>

        <div class="mb-3 form-password-toggle">
            <div class="d-flex justify-content-between">
                <label class="form-label" for="password_confirmation">{{__('Confirm Password')}}</label>
            </div>
            <div class="input-group input-group-merge">
                <input
                    type="password"
                    id="password_confirmation"
                    class="form-control"
                    name="password_confirmation"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    required
                    aria-describedby="password_confirmation"
                />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
            </div>
            @if($errors->has('password_confirmation'))
                @foreach ($errors->get('password_confirmation') as $errormessage)
                    <small class="text-danger">{{ $errormessage }}</small>
                @endforeach
            @endif
        </div>

        <div class="mb-3">
            <button class="btn btn-primary d-grid w-100" type="submit">{{ __('Reset Password') }}</button>
        </div>

    </form>
</x-guest-layout>
