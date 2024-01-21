@props(['label' => 'Label', 'name' => 'textarea', 'rows' => '3', 'value' => '', 'placeholder' => '', 'clas' => '', 'required' => ''])
<label for="{{$name}}" class="form-label">{{$label}}</label>
<textarea name="{{$name}}" id="{{$name}}" rows="{{$rows}}" placeholder="{{$placeholder}}"
          {{($required=='on') ? 'required' : '' }} class="form-control {{$clas}}  {{($errors->has($name)) ? 'is-invalid' : ''}}">{{$value}}</textarea>
@if($errors->has($name))
    @foreach ($errors->get($name) as $errormessage)
        <div class="invalid-feedback">{{ $errormessage }}</div>
    @endforeach
@endif
