@php
    $title = $title ?? '';
    $head = $head ?? [];
    $data = $data ?? [];
    $add_route = $add_route ?? false;
    $edit_route = $edit_route ?? false;
    $show_route = $show_route ?? false;
    $delete_route = $delete_route ?? false;

@endphp

<div class="card">
    <div class="card-block">
        <h4 class="card-title" style="display: inline-block;">{{ ucfirst($title)  }}</h4>
        @if($add_route)
            <a class='btn btn-success align-self-end' href="{{ route($add_route) }}" style="float: right; margin-bottom: 10px;">Add</a>
        @endif
        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="{{ lcfirst($title).'-table' }}">
                <thead>
                    <tr>
                        <th>#</th>
                        @foreach ($head as $field => $label)
                            <th>{{  $label }}</th>
                        @endforeach
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $dt)
                        <tr>
                            <td>{{  $loop->iteration }}</td>
                            @foreach ($head as $field => $label)
                                <td>{{  $dt->$field }}</td>
                            @endforeach
                            <td>
                                @if($show_route)
                                    <a href="{{ route($show_route, $dt->id) }}"><i class="fa fa-check-square"></i></a>
                                @endif
                                @if($edit_route)
                                    <a href="{{ route($edit_route, $dt->id) }}"><i class="fa fa-pencil-square"></i></a>
                                @endif
                                @if($delete_route)
                                    <a href="{{ route($delete_route, $dt->id) }}"><i class="fa fa-trash-o"></i></a>
                                @endif
                            </td>    
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>