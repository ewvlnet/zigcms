<x-profile-layout>
    <x-slot name="title">{{ __('Create Page') }}</x-slot>

    <div class="container-xxl flex-grow-1 container-p-y">
        <header class="col-md-6 px-0"><h4 class="fw-bold py-3"><span
                    class="text-muted fw-light">Create /</span> Post</h4>
        </header>
        <x-shared.flash-msg/>

        <div class="row">
            <div class="col-lg-8 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="card-body">

                            <div class="row">
                                <p class="px-4">Fill in the fields below<br>
                                    <small class="text-danger">*Enter the title</small>
                                </p>
                                <hr class="mb-4">
                            </div>

                            <form action="{{ route('profile.pages.store') }}" class="form" id="formData" method="POST">
                                @csrf
                                <div class="row px-3">
                                    <div class="mb-3 col-md-6">
                                        <x-shared.form.input label="{{__('Title')}}" name="title"
                                                             value="{{ old('title') }}"
                                                             placeholder="{{__('Title page')}}" required="on"/>
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <x-shared.form.textarea label="{{__('Page Content')}}" name="body"
                                                                value="{{ old('body') }}"
                                                                rows="5" placeholder="{{__('Body page')}}"/>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <x-shared.form.select label="{{__('Category')}}" name="category_id">
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </x-shared.form.select>
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

    <x-slot name="css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"/>
        <link rel="stylesheet" href="/vendor/select2-bootstrap4/select2-bootstrap4.min.css"/>
        <style>
            .ck-editor__editable_inline {
                min-height: 150px;
            }

            .select2-selection__choice {
                background-color: #007bff;
                color: white !important;
                border: 2px solid #ffc107 !important;
            }

            .select2-selection__choice__remove {
                color: #ffc107 !important;
            }
        </style>
    </x-slot>
    <x-slot name="js">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/15.0.0/classic/ckeditor.js"></script>
        <script>
            ClassicEditor
                .create(document.querySelector('#body'))
                .catch(error => {
                    console.error(error);
                });

            $('.select2bs4').select2({
                theme: 'bootstrap4'
            });
        </script>
    </x-slot>
</x-profile-layout>
