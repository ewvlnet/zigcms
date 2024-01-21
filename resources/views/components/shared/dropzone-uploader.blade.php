@props(['model' => '', 'mtype' => '', 'ftype' => '', 'qty' => '', 'colmd' => '8', 'title' => __('Post images'), 'inEditAdm' => ''])

@php
    $publishedFilesQty = $model->files->count();
    $totalAllowed = ($qty != '') ? $qty : 1;
    $allowedQty = $totalAllowed - $publishedFilesQty;
@endphp
<div class="container-fluid" style="background-color: #FFF;">

    @if($allowedQty > 0)
        <label for="uploadFile" class="form-label text-3 m-0">Upload File | <a style="font-size: 0.70rem;" href="javascript:;" onclick="window.location.reload();">Refresh</a></label>
        <div class="upload-file-wrap text-center rounded px-4 mb-3" >
            <small id="fileName" class="text-3">PNG, Max 8mb.</small>
            <div class="dropzone dropzone-area dz-clickable"></div>
        </div>
    @else
    @endif

    @forelse($model->files as $file)
        <div class="d-flex flex-column p-2" style="background: #FFFFCC;">
            <div class="align-self-center">
                @if($file->type == 'image')
                    <img class="nft-item-img img-fluid d-flex rounded-3"
                         src="{{ ($file->post_id) ? url('/storage/uploads/thumbs/'.$file->url) : url('/storage/uploads/'.$file->url) }}" alt="">
                @else
                    <a href="{{ url('/storage/'.$file->url) }}" target="_blank"><img src="/images/package.png" alt="File"></a>
                @endif
            </div>
            <div class="align-self-center">
                {{--@if($mtype == 'post')--}}
                    <form method="POST" action="{{ route('profile.files.destroy', $file) }}" class="text-center">
                        @csrf @method('DELETE')
                        <button class="btn btn-lg btn-danger text-nowrap text-bold mt-2">{{__('Delete')}}</button>
                    </form>
               {{--@endif--}}
            </div>
        </div>
    @empty
        {{--<small>{{__('No files')}}</small>--}}
    @endforelse

</div>
