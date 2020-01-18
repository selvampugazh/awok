@php 
$label = $label ?? '';
$class = $class ?? '';
$text = $text ?? '';
@endphp

<div class="{{ $class }}">
	<div class="form-group">
		<label>{{ ucfirst($label) }}</label>
		<textarea class="form-control form-control-line"  
		@foreach ($attribute as $key => $value)
            {{ $key }} = {{ $value }}
        @endforeach>
{{ $text }}
        </textarea>

        @if($errors->has($error))
            <span style="color:red; font-size: 12px">{{ $errors->first($error) }}</span>
        @endif
	</div>
</div>	