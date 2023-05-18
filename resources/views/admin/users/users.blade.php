@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
<div>

    <div class="card">
        <div class="card-header">

            <h3 class="text-center">All Users</h3>

            <a href="{{route('admin.user.create')}}" class="btn btn-primary float-right"> Add user </a>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php $i = 1; ?>
            @include('partial.alerts')
            @if (count($users) > 0)
                <table class="table  table-striped text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>PhoneNo</th>
                            <th>Disease</th>
                            {{-- <th>Sentiments</th> --}}
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>

                                <td>{{$i++}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->age}}</td>
                                <td>{{$user->gender}}</td>
                                <td>{{$user->phone_no}}</td>
                                <td>
                                @isset($user->disease_id)
                                    {{$user->diseases->name}}
                                @else
                                    not defined yet
                                @endisset
                                </td>
                                {{-- <td > <a href="{{route('admin.user.sentiment', ['id' => $user->id])}}" class="btn btn-info btn-light">Sentiments <i class=""></i></a></td> --}}
                                <td>
                                    <a href="{{route('admin.user.edit', ['id' => $user->id])}}" class="btn btn-info"> <i class="fas fa-edit"></i> edit</a>
                                    <a href="{{route('admin.user.destroy', ['id' => $user->id])}}" style="margin-left: 5px" class="btn btn-danger"> <i class="fas fa-trash-alt"></i> delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
            <div class="alert alert-danger" role="alert">
                <h4 class="text-center">Sorry, There is no users!</h4>
            </div>
            @endif
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->


</div>
@endsection
