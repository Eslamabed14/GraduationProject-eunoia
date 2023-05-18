@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
<div>

    <div class="card">
        <div class="card-header">


            <h3 class="text-center">All Doctors</h3>

            <a href="{{route('admin.doctor.create')}}" class="btn btn-primary float-right"> Add Doctor </a>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php $i = 1; ?>
            @include('partial.alerts')
            @if (count($doctors) > 0)
                <table class="table table-striped text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>PhoneNo</th>
                            <th>Description</th>
                            <th>Address</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($doctors as $doctor)
                            <tr>

                                <td>{{$i++}}</td>
                                <td>{{$doctor->name}}</td>
                                <td>{{$doctor->email}}</td>
                                <td>{{$doctor->age}}</td>
                                <td>{{$doctor->gender}}</td>
                                <td>{{$doctor->phone_no}}</td>
                                <td>{{$doctor->description}}</td>
                                <td>{{$doctor->address}}</td>
                                <td>
                                    <a href="{{route('admin.doctor.edit', ['id' => $doctor->id])}}" class="btn btn-info"> <i class="fas fa-edit"></i> edit</a>
                                    <a href="{{route('admin.doctor.destroy', ['id' => $doctor->id])}}" style="margin-top: 5px" class="btn btn-danger"> <i class="fas fa-trash-alt"></i> delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="alert alert-danger" role="alert">
                    <h4 class="text-center">Sorry, There is no doctors!</h4>
                </div>
            @endif
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->


</div>
@endsection
