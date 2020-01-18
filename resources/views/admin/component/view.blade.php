@php 
    $header = $header ?? '';
    $class = $class ?? 'col-md-6';
    $datas = $data ?? [];
    $head = $head ?? [];
@endphp

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-block">
                <div class="row" style="display: flex; margin-bottom: 50px; align-items: center;">
                    <div class="col-md-6">
                        @if(isset($profile))
                            <img src="{{ asset($profile) }}" style="width: 100px; height: 100px; border-radius: 50%;">
                        @else
                            <h2> {{ $header }}</h2>
                        @endif
                    </div>
                    @isset ($route)
                        <div class="col-md-6" style="text-align: right;">
                            <a class="btn btn-info" href="{{ route($route) }}">Back</a>
                        </div>
                    @endisset
                </div>
                <div class="row">
                    @foreach($datas as $data)
                        @foreach($head as $key => $value)
                            <div class="{{ $class }}">
                                <h5>{{   $value }}</h5>
                                <p>{!! $data->$key !!}</p>
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>