<x-guest-layout>

    <h4 class="mb-2">Confirm Password 📝</h4>
    <p class="mb-4">{{ __('This is a secure area of the application. Please confirm your password before continuing.') }}</p>

    <form id="formAuthentication" class="mb-3" method="POST" action="{{ route('password.confirm') }}">
        @csrf

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
            </div>
            @if($errors->has('password'))
                @foreach ($errors->get('password') as $errormessage)
                    <small class="text-danger">{{ $errormessage }}</small>
                @endforeach
            @endif
        </div>

        <div class="mb-3">
            <button class="btn btn-primary d-grid w-100" type="submit">{{ __('Confirm') }}</button>
        </div>
    </form>
</x-guest-layout>
