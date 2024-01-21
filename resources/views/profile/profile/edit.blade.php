<x-profile-layout>
    <x-slot name="title">{{ __('Edit Profile') }}</x-slot>

    <div class="container-xxl flex-grow-1 container-p-y">
        <header class="col-md-6 px-0"><h4 class="fw-bold py-3"><span
                    class="text-muted fw-light">Edit /</span> {{ Str::limit($profile->name, 100) }}</h4>
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

                            <form action="{{ route('profile.profiles.update', $profile) }}" class="form" id="formData"
                                  method="POST">
                                @csrf @method('PUT')

                                <div class="row px-3">
                                    <div class="mb-3 col-md-6">
                                        <x-shared.form.input label="{{__('Name')}}" name="name"
                                                             value="{{ old('name', $profile->name ?? '') }}"
                                                             placeholder="{{__('Name profile')}}" required="on"/>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <x-shared.form.textarea label="{{__('Profile description')}}" name="description"
                                                                value="{{ old('description', $profile->description ?? '') }}"
                                                                rows="5"
                                                                placeholder="{{__('Profile short description')}}"/>
                                    </div>

                                    <div class="mb-3 col-md-12">
                                        <p class="text-light fw-semibold d-block">Permissions</p>

                                        <div class="d-flex justify-content-around flex-wrap border-primary">
                                            @forelse($permissions as $permission)
                                                <div class="form-check form-check-inline mt-3"
                                                     style="flex-basis: calc(33% - 20px)">
                                                    <input class="form-check-input" type="checkbox"
                                                           name="permissions[]"
                                                           value="{{$permission->id}}"
                                                           id="inCheck{{$permission->id}}"
                                                        {{ collect($profile->permissions->pluck('id'))->contains($permission->id) ? 'checked' : '' }}>
                                                    <label class="form-check-label"
                                                           for="inCheck{{$permission->id}}">{{$permission->name}}</label>
                                                </div>
                                            @empty
                                                <div class="col-3">
                                                    {{__('No permissions')}}
                                                </div>
                                            @endforelse
                                        </div>
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
