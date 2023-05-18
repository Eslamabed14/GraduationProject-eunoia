@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
<div>

    <div class="card">
        <div class="card-header">

            <h3 class="text-center">All Lifestyles</h3>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php $i = 1; ?>
            @include('partial.alerts')
            @if (count($lifestyles) > 0)
                <table class="table table-striped text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>User</th>
                            <th>Temprature</th>
                            <th>Water</th>
                            <th>Sleep</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lifestyles as $lifestyle)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$lifestyle->users->name}}</td>
                                <td>{{$lifestyle->temp}}</td>
                                <td>{{$lifestyle->water}}</td>
                                <td>{{$lifestyle->sleep}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
            <div class="alert alert-danger" role="alert">
                <h4 class="text-center">Sorry, There is no lifestyles!</h4>
            </div>
            @endif
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->


</div>
@endsection
