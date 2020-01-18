@php

$class = $class ?? '';
$name = $name ?? "Submit";
$id = $id ?? '';
$btn_class = $btn_class ?? '';
$type = $type ?? 'Submit';

@endphp

<div class="{{ $class }}">
	<div class="form-group">
		<button class="btn {{ $btn_class }}" id="{{ $id }}">{{ $name }}</button>
	</div>
</div>		