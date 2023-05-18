@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
<div>

    <div class="card">
        <div class="card-header">

            <h3 class="text-center">All Activities</h3>

            <a href="{{route('admin.activity.create')}}" class="btn btn-primary float-right"> Add Activity </a>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php $i = 1; ?>
            @include('partial.alerts')
            @if (count($activities) > 0)
                <table class="table table-striped text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Score</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($activities as $activity)
                            <tr>

                                <td>{{$i++}}</td>
                                <td>{{$activity->name}}</td>
                                <td>{{$activity->description}}</td>
                                <td>{{$activity->score}}</td>
                                <td>
                                    <a href="{{route('admin.activity.edit', $activity->id)}}" class="btn btn-info"> <i class="fas fa-edit"></i> edit</a>
                                    <a href="{{route('admin.activity.destroy', $activity->id)}}" style="margin-left: 5px" class="btn btn-danger"> <i class="fas fa-trash-alt"></i> delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
            <div class="alert alert-danger" role="alert">
                <h4 class="text-center">Sorry, There is no activities!</h4>
            </div>
            @endif
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->


</div>
@endsection
