@props(['model' => '', 'id' => '', 'resource' => '', 'currentPage' => 1])

@if($resource == 'profile.posts.replies')
    @can('replies_publish')
        <a href="{{route($resource.'.publish', [$model, $id, $currentPage])}}" title="{{($model->status=='A') ? 'Change to Blocked': 'Change to Approved'}}"
           class="btn btn-{{($model->status=='A') ? 'success': 'warning'}}"><i class="bx bx-{{($model->status=='A') ? 'check-double': 'block'}}"></i></a> &nbsp;
    @endcan
@endif
@if($resource == 'profile.replies')
    @can('replies_publish')
        <a href="{{route($resource.'.publish', [$model])}}" title="{{($model->status=='A') ? 'Change to Blocked': 'Change to Approved'}}"
           class="btn btn-{{($model->status=='A') ? 'success': 'warning'}}"><i class="bx bx-{{($model->status=='A') ? 'check-double': 'block'}}"></i></a> &nbsp;
    @endcan
@endif

<button type="button" class="btn btn-danger" onclick="$('#formDelete-{{$model->id}}').toggle();"><i
        class="bx bx-trash"></i></button>
<form action="{{ route($resource.'.destroy', [$model, $id]) }}" method="POST" id="formDelete-{{$model->id}}"
      style="display: none;">
    @csrf @method('DELETE')
    <button type="submit" class="btn btn-danger">Confirm Delete</button>
</form>
