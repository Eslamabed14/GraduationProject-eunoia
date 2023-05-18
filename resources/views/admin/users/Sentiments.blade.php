@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
<div>

    <div class="card">
        <div class="card-header">

            <h3 class="text-center">{{$user->name}} Sentiments</h3>



        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php $i = 1; ?>
            @include('partial.alerts')
            @if (count($Sentiments) > 0)
                <table class="table  table-striped text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>description</th>
                            <th>status</th>
                            <th>date</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->age}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
            <div class="alert alert-danger" role="alert">
                <h4 class="text-center">Sorry, There is no Sentiments!</h4>
            </div>
            @endif
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->


</div>
@endsection
