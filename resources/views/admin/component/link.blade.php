@php

$class = $class ?? '';
$name = $name ?? "Submit";
$id = $id ?? '';
$btn_class = $btn_class ?? '';
$link = $link ?? 'javascript:void(0)';

@endphp

<div class="{{ $class }}">
	<div class="form-group">
		<a class="btn text-white {{ $btn_class }}" href="{{ $link }}" id="{{ $id }}">{{ $name }}</a>
	</div>
</div>		