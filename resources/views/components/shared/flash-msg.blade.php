@if($errors->any() || session()->has('success'))
    <div id="alertContainer">
        @if($errors->any())
            <div class="alert alert-danger alert-dismissible">
                <div style="width: 100%;">
                    @foreach($errors->all() as $error)
                        @if($error != 'Mandatory fields of responsibility')
                            <p class="opacity-6 mb-0"><strong>{{$error}}</strong>.</p>
                        @endif
                    @endforeach
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible">
                <div style="width: 100%;">
                    <p class="opacity-6 mb-0"><strong>{!! session('success') !!}</strong>.</p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
<script> function hide() {document.querySelector('#alertContainer').style.display = 'none';} setTimeout("hide();", 5000);</script>
@endif

