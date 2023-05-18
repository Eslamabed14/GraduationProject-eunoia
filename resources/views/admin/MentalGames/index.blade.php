@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
<div>

    <div class="card">
        <div class="card-header">

            <h3 class="text-center">All Mental Games</h3>

            <a href="{{route('admin.game.create')}}" class="btn btn-primary float-right"> Add Game </a>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php $i = 1; ?>
            @include('partial.alerts')
            @if (count($games) > 0)
            <div class="table-responsive">
                <table class="table table-striped text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Answer</th>
                            <th>Image</th>
                            {{-- <th>Link</th> --}}
                            <th class="col-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($games as $game)
                            <tr>

                                <td>{{$i++}}</td>
                                <td>{{$game->title}}</td>
                                <td>{{$game->description}}</td>
                                <td>{{$game->answer}}</td>
                                <td>{{$game->image}}</td>
                                {{-- <td>{{$game->link}}</td> --}}
                                <td>
                                    <a href="{{route('admin.game.edit', $game->id)}}" class="btn btn-info"> <i class="fas fa-edit"></i> edit</a>
                                    <a href="{{route('admin.game.destroy', $game->id)}}" style="margin-left: 5px" class="btn btn-danger"> <i class="fas fa-trash-alt"></i> delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="alert alert-danger" role="alert">
                <h4 class="text-center">Sorry, There is no games yet!</h4>
            </div>
            @endif
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->


</div>
@endsection
