@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
<div>

    <div class="card">
        <div class="card-header">

            <h3 class="text-center">All Arts</h3>

            <a href="{{route('admin.art.create')}}" class="btn btn-primary float-right">Add Art </a>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php $i = 1; ?>
            @include('partial.alerts')
            @if (count($arts) > 0)
                <table class="table table-striped text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Video</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($arts as $art)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>
                                    <a target="_blank" href="{{$art->link}}">{{$art->title}}</a>
                                </td>
                                <td>
                                    <a href="{{route('admin.art.edit', $art->id)}}" class="btn btn-info"> <i class="fas fa-edit"></i> edit</a>
                                    <a href="{{route('admin.art.destroy', $art->id)}}" style="margin-left: 5px" class="btn btn-danger"> <i class="fas fa-trash-alt"></i> delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
            <div class="alert alert-danger" role="alert">
                <h4 class="text-center">Sorry, There is no arts!</h4>
            </div>
            @endif
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->


</div>
@endsection
