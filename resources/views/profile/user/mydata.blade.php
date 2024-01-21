<x-profile-layout>
    <x-slot name="title">{{ __('Edit User') }}</x-slot>

    <div class="container-xxl flex-grow-1 container-p-y">
        <header class="col-md-6 px-0"><h4 class="fw-bold py-3"><span
                    class="text-muted fw-light">My Data /</span> {{ Str::limit($user->name, 100) }}</h4>
        </header>
        <x-shared.flash-msg/>

        <div class="row">
            <div class="col-lg-8 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="card-body">

                            <div class="row">
                                <p class="px-4">Your Profile is:.
                                    <strong>{{$user->profiles->pluck('name')->implode(', ')}}</strong> <br>
                                    <small class="text-danger">*If you want to change your password, fill in the
                                        password field</small>
                                </p>
                                <hr class="mb-4">
                            </div>

                            <form action="{{ route('profile.mydata.update', $user) }}" class="form" id="formData"
                                  method="POST">
                                @csrf @method('PUT')
                                <div class="row px-3">

                                    <div class="mb-3 col-md-6">
                                        <x-shared.form.input label="{{__('Name')}}" name="name"
                                                             value="{{ old('name', $user->name ?? '') }}"
                                                             placeholder="{{__('Name user')}}" required="on"/>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <x-shared.form.input label="{{__('Email')}}" name="email" type="email"
                                                             value="{{ old('email', $user->email ?? '') }}"
                                                             placeholder="{{__('Email user')}}" required="on"/>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <x-shared.form.input label="{{__('Password')}}" name="password" type="password"
                                                             placeholder="{{__('Password user')}}"/>
                                    </div>
                                </div>
                                <div class="row px-3 mt-3">
                                    <div class="d-grid gap-2 col-md-6">
                                        <button type="submit"
                                                class="w-100 btn btn-primary btn-lg">{{__('Save')}}</button>
                                    </div>
                                </div>
                            </form>

                            <x-shared.dropzone-uploader mtype="user" ftype="image" :model="$user" title="User Photo"
                                                        qty="1" colmd="12"/>
                            {{--end cardbody--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css">
        <style>
            .dropzone {
                background: #FFFFCC;
                border-radius: 5px;
                border: 1px dashed rgb(0, 135, 247);
                width: calc(100% - 40px);
                margin: 0 auto;
            }
        </style>
    </x-slot>
    <x-slot name="js">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
        <script>
            (function (window, document, $) {
                'use strict';

                Dropzone.autoDiscover = false;
                var myDropzone = new Dropzone('.dropzone', {
                    'url': '/account/files/{{$user->id}}/model/user/type/image',
                    'paramName': 'file',
                    'acceptedFiles': 'image/png',
                    'maxFilesize': 8,
                    'maxFiles': 1,
                    'headers': {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    dictDefaultMessage: '{{__('Drag and drop your Photo here...')}}'
                });
                myDropzone.on('error', function (file, res) {
                    let msg = res.errors.file[0];
                    $('.dz-error-message:last > span').text(msg);
                });
                $('.error-validation').on('blur', function () {
                    $(this).removeClass("error-validation");
                });

            })(window, document, jQuery);
        </script>
    </x-slot>
</x-profile-layout>
