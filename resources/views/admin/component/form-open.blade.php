@php
    $header = $header ?? '';
    $class = $class ?? '';
    $attribute = $attribute ?? [];
@endphp

<div class="row">
    <!-- Column -->
    <div class="col-lg-12 col-xlg-12 col-md-12">
        <div class="card">
            <div class="card-block">
                <h3 style="margin-bottom: 35px"> {{ ucfirst($header) }} </h3>
                    <form class="form-horizontal form-material {{ $class }}" @if(isset($route)) action = "{{ route($route) }}" @endif  
                        @foreach ($attribute as $key => $value)
                            @if(is_bool($key) && $value===true) 
                                {{$key}}
                            @elseif(!is_bool($value)) 
                                {{$key}}="{{$value}}"
                            @endif
                        @endforeach
                    >
                    @csrf

                    <div class="row">
                        

{{-- The Remaining end is written in form close blade --}}