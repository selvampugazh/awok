@php
$label = $label ?? '';
$class = $class ?? '';
$datas = $data ?? [];
$select = $select ?? [];
$id = $id ?? 'id';
$name = $name ?? 'name';

@endphp

<div class="{{ $class }}">
	<div class="form-group">
	<label class="w-100 mb-2">{{ ucfirst($label) }}</label>
	<div class="form-check-inline">
		@foreach($datas as $data)
			<label class="form-check-label mr-2">
				<input type="checkbox" class="form-check-input mr-2" value="{{ $data[$id] }}" @if(in_array($data[$id], $select)) checked @endif>{{ $data[$name] }}
			</label>
		@endforeach
	</div>
	</div>
</div>