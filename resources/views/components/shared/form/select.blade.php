@props(['label' => 'Label', 'name' => 'select', 'multiple' => '', 'clas' => ''])
<label for="{{$name}}" class="form-label">{{$label}}</label>
<select name="{{$name}}" id="{{$name}}" class="form-control select2bs4 {{$clas}} {{($errors->has($name)) ? 'is-invalid' : ''}}"
        style="width: 100%;" {{($multiple=='on') ? 'multiple="multiple"' : '' }}>
    {{$slot}}
</select>
@if($errors->has($name))
    @foreach ($errors->get($name) as $errormessage)
        <div class="invalid-feedback">{{ $errormessage }}</div>
    @endforeach
@endif
