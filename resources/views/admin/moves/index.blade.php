@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
<div>

    <div class="card">
        <div class="card-header">

            <h3 class="text-center">All Moves</h3>

            <a href="{{route('admin.move.create')}}" class="btn btn-primary float-right">Add Move </a>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php $i = 1; ?>
            @include('partial.alerts')
            @if (count($moves) > 0)
                <table class="table table-striped text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Video</th>
                            <th>Description</th>
                            <th class="col-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($moves as $move)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>
                                    <a target="_blank" href="{{$move->link}}">{{$move->title}}</a>
                                </td>
                                <td>{{$move->description}}</td>
                                <td>
                                    <a href="{{route('admin.move.edit', $move->id)}}" class="btn btn-info"> <i class="fas fa-edit"></i> edit</a>
                                    <a href="{{route('admin.move.destroy', $move->id)}}" style="margin-left: 5px" class="btn btn-danger"> <i class="fas fa-trash-alt"></i> delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
            <div class="alert alert-danger" role="alert">
                <h4 class="text-center">Sorry, There is no moves!</h4>
            </div>
            @endif
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->


</div>
@endsection
