<x-profile-layout>
    <x-slot name="title">{{ __('Edit Permission') }}</x-slot>

    <div class="container-xxl flex-grow-1 container-p-y">
        <header class="col-md-6 px-0"><h4 class="fw-bold py-3"><span
                    class="text-muted fw-light">Edit /</span> {{ Str::limit($permission->name, 100) }}</h4>
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

                            <form action="{{ route('profile.permissions.update', $permission) }}" class="form"
                                  id="formData" method="POST">
                                @csrf @method('PUT')
                                <div class="row px-3">
                                    <div class="mb-3 col-md-6">
                                        <x-shared.form.input label="{{__('Name')}}" name="name"
                                                             value="{{ old('name', $permission->name ?? '') }}"
                                                             placeholder="{{__('Name permission')}}" required="on"/>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <x-shared.form.textarea label="{{__('Permission description')}}"
                                                                name="description"
                                                                value="{{ old('description', $permission->description ?? '') }}"
                                                                rows="5"
                                                                placeholder="{{__('Permission short description')}}"/>
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

    <x-slot name="css">{{--<style>CSS</style>--}}</x-slot>
    <x-slot name="js">{{--<script>JS</script>--}}</x-slot>

</x-profile-layout>
