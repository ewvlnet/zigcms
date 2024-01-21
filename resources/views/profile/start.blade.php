<x-profile-layout>
    <x-slot name="title">{{ __('Your Account') }}</x-slot>

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-8 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title text-primary">Welcome back {{$user->name}}! 🎉</h5>
                                <p class="mb-4">This is the <span class="fw-bold">Zig CMS</span> administrative panel, manage your information and content here.</p>
                                <a href="{{route('profile.posts.index')}}" class="btn btn-sm btn-outline-primary">View Posts</a>
                            </div>
                        </div>
                        <div class="col-sm-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img
                                    src="{{$user->user_image()}}"
                                    height="140"
                                    alt="{{$user->name}}"
                                    title="{{$user->name}}"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="css">{{--<style>CSS</style>--}}</x-slot>
    <x-slot name="js">{{--<script>JS</script>--}}</x-slot>
</x-profile-layout>
