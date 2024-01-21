<x-profile-layout>
    <x-slot name="title">{{ __('Edit Post') }}</x-slot>

    <div class="container-xxl flex-grow-1 container-p-y">
        <header class="col-md-6 px-0"><h4 class="fw-bold py-3"><span
                    class="text-muted fw-light">Edit /</span> {{ Str::limit($post->title, 100) }}</h4>
        </header>
        <x-shared.flash-msg/>

        <div class="row">
            <div class="col-lg-8 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="card-body">

                            <div class="row">
                                <p class="px-4">Fill in the fields below<br>
                                    <small class="text-danger">*The excerpt field is optional</small>
                                </p>
                                <hr class="mb-4">
                            </div>

                            <form action="{{ route('profile.posts.update', $post) }}" class="form" id="formData"
                                  method="POST">
                                @csrf @method('PUT')

                                <div class="row px-3">
                                    <div class="mb-3 col-md-6">
                                        <x-shared.form.input label="{{__('Title')}}" name="title"
                                                             value="{{ old('title', $post->title ?? '') }}"
                                                             placeholder="{{__('Title post')}}" required="on"/>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <x-shared.form.input label="{{__('Excerpt')}}" name="excerpt"
                                                             value="{{ old('excerpt', $post->excerpt ?? '') }}"
                                                             placeholder="{{__('Post summary')}}"/>
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <x-shared.form.textarea label="{{__('Post Content')}}" name="body"
                                                                value="{!! old('body', $post->body ?? '') !!}"
                                                                rows="5" placeholder="{{__('Body post')}}"/>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <x-shared.form.select label="{{__('Category')}}" name="category_id">
                                            @foreach($categories as $category)
                                                <option
                                                    value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }} >
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </x-shared.form.select>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <x-shared.form.select label="{{__('Tags')}}" name="tags[]" multiple="on">
                                            @foreach ($tags as $tag)
                                                <option
                                                    value="{{$tag->id}}" {{ collect(old('tags', $post->tags->pluck('id')))->contains($tag->id)  ? 'selected' : '' }} >
                                                    {{$tag->name}}
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

                            <x-shared.dropzone-uploader mtype="post" ftype="image" :model="$post" title="Post Image"
                                                        qty="1" colmd="12"/>

                            <iframe src="{{url('account/posts/comments/'.$post->id)}}" width="100%" height="720"
                                    id="ifcomments"
                                    style="overflow:hidden;"></iframe>
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css">
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/15.0.0/classic/ckeditor.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
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
        <script>
            (function (window, document, $) {
                'use strict';

                Dropzone.autoDiscover = false;
                var myDropzone = new Dropzone('.dropzone', {
                    'url': '/account/files/{{$post->id}}/model/post/type/image',
                    'paramName': 'file',
                    'acceptedFiles': 'image/png',
                    'maxFilesize': 8,
                    'maxFiles': 1,
                    'headers': {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    dictDefaultMessage: '{{__('Drag and drop the file here...')}}'
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
