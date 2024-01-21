<x-profile-layout>
    <x-slot name="title">{{ __('Create Tag') }}</x-slot>

    <div class="container-xxl flex-grow-1 container-p-y">
        <header class="col-md-6 px-0"><h4 class="fw-bold py-3"><span
                    class="text-muted fw-light">Create /</span> Tag</h4>
        </header>
        <x-shared.flash-msg/>

        <div class="row">
            <div class="col-lg-8 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="card-body">

                            <div class="row">
                                <p class="px-4">Fill in the fields below<br>
                                    <small class="text-danger">*Enter the name</small>
                                </p>
                                <hr class="mb-4">
                            </div>

                            <form action="{{ route('profile.tags.store') }}" class="form" id="formData" method="POST">
                                @csrf
                                <div class="row px-3">
                                    <div class="mb-3 col-md-6">
                                        <x-shared.form.input label="{{__('Name')}}" name="name"
                                                             value="{{ old('name') }}"
                                                             placeholder="{{__('Name tag')}}" required="on"/>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <x-shared.form.textarea label="{{__('Tag description')}}" name="description"
                                                                value="{{ old('description') }}"
                                                                rows="5" placeholder="{{__('Tag short description')}}"/>
                                    </div>
                                </div>

                                <div class="row px-3 mt-3">
                                    <div class="d-grid gap-2 col-md-6">
                                        <button type="submit"
                                                class="w-100 btn btn-primary btn-lg">{{__('Save')}}</button>
                                    </div>
                                </div>
                            </form>

                            {{--end cardbody--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--    <section class="start row mb-2">
            <header class="col-md-6 px-0"><h2 class="display-4 fst-italic">Create Tag</h2></header>
        </section>

        <form action="{{ route('profile.tags.store') }}" class="form" id="formData" method="POST">
            @csrf

            <div class="row">

                <div class="col-md-7 col-lg-8">
                    <h4 class="mb-3">Billing address</h4>
                    <div class="row g-3">

                        <div class="col-sm-6">
                            <x-shared.form.input label="{{__('Name')}}" name="name" value="{{ old('name') }}"
                                                 placeholder="{{__('Name tag')}}" required="on"/>
                        </div>
                        <div class="col-sm-12">
                            <x-shared.form.textarea label="{{__('Tag description')}}" name="description" value="{{ old('description') }}"
                                                    rows="5" placeholder="{{__('Tag short description')}}"/>
                        </div>

                    </div>
                </div>

                <div class="col-md-5 col-lg-4 order-md-last">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-primary">XXXXX</span>
                        <span class="badge bg-primary rounded-pill">3</span>
                    </h4>

                    <button type="submit" class="w-100 btn btn-primary btn-lg">{{__('Save')}}</button>
                </div>

            </div>
        </form>--}}

    <x-slot name="css">{{--<style>CSS</style>--}}</x-slot>
    <x-slot name="js">{{--<script>JS</script>--}}</x-slot>
</x-profile-layout>
