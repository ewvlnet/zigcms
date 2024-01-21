@props(['model' => '', 'resource' => ''])
@if($resource == 'profile.posts')
    @can('posts_publish')
    <a href="{{route($resource.'.publish', $model)}}" title="{{($model->status=='P') ? 'Change to Draft': 'Publish'}}"
       class="btn btn-{{($model->status=='P') ? 'success': 'warning'}}"><i class="bx bx-{{($model->status=='P') ? 'check-double': 'block'}}"></i></a> &nbsp;
    @endcan
@endif
@if($resource == 'profile.users')
    <a href="{{route($resource.'.publish', $model)}}" title="{{($model->status=='A') ? 'Change to Blocked': 'Change to Activated'}} {{$model->name}}"
       class="btn btn-{{($model->status=='A') ? 'success': 'warning'}}"><i class="bx bx-{{($model->status=='A') ? 'check-double': 'block'}}"></i></a> &nbsp;
@endif
<a href="{{route($resource.'.edit', $model)}}" title="Edit {{$model->title}}" class="btn btn-success"><i
        class="bx bx-pencil"></i></a> &nbsp;
<button type="button" class="btn btn-danger" onclick="$('#formDelete-{{$model->id}}').toggle();"><i
        class="bx bx-trash"></i></button>
<form action="{{ route($resource.'.destroy', $model) }}" method="POST" id="formDelete-{{$model->id}}"
     class="mt-1" style="display: none;">
    @csrf @method('DELETE')
    <button type="submit" class="btn btn-danger">Confirm Delete</button>
</form>
