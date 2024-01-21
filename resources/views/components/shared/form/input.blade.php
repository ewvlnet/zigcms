@props(['label' => 'Label', 'name' => 'input', 'type' => 'text', 'value' => '', 'placeholder' => '', 'clas' => '', 'required' => '', 'autofocus' => ''])
<label for="{{$name}}" class="form-label">{{$label}}</label>
<input type="{{$type}}" name="{{$name}}" id="{{$name}}" placeholder="{{$placeholder}}" value="{{$value}}"
       {{($required=='on') ? 'required' : '' }} {{($autofocus=='on') ? 'autofocus' : '' }} class="form-control {{$clas}}  {{($errors->has($name)) ? 'is-invalid' : ''}}">
@if($errors->has($name))
    @foreach ($errors->get($name) as $errormessage)
        <div class="invalid-feedback">{{ $errormessage }}</div>
    @endforeach
@endif
