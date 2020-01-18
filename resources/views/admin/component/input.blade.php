@php
	$label = $label ?? '';
	$class = $class ?? '';
	$attribute = $attribute ?? []; 
    $error = $error ?? '';

@endphp

<div class="{{ $class }}">
	<div class="form-group">
    	<label>{{ ucfirst($label) }}</label>
        <input class="form-control form-control-line"
			@foreach ($attribute as $key => $value)
                @if(is_bool($key) && $value===true) 
                    {{$key}}
                @elseif(!is_bool($value)) 
                    {{$key}}="{{$value}}"
                @endif
            @endforeach
        >
        @if($errors->has($error))
            <span style="color:red; font-size: 12px">{{ $errors->first($error) }}</span>
        @endif
    </div>
</div>
