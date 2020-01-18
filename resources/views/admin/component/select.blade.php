@php 
	$label = $label ?? '';
	$class = $class ?? '';
	$datas = $data ?? [];
	$select = $select ?? []; 
	$id = $id ?? 'id';
	$name = $name ?? 'name';
	$attribute = $attribute ?? [];

	$error = $error ?? '';
@endphp

<div class="{{ $class }}">
	<div class="form-group">
		<label>{{ ucfirst($label) }}</label>
		<select class="form-control form-control-line" 
		@foreach ($attribute as $key => $value)
			@if(is_bool($key) && $value===true) 
				{{$key}}
	        @elseif(!is_bool($value)) 
	        	{{$key}}="{{$value}}"
	        @endif
		@endforeach >
	        @foreach($datas as $data)
	        	<option value="{{ $data[$id] }}" @if(in_array($data[$id], $select)) selected @endif >{{ $data[$name] }}</option>
			@endforeach
		</select>

		@if($errors->has($error))
            <span style="color:red; font-size: 12px">{{ $errors->first($error) }}</span>
        @endif
	</div>
</div>