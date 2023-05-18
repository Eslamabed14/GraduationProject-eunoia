@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
<div>

    <div class="card">
        <div class="card-header">

            <h3 class="text-center">All Survey</h3>

            <a href="{{route('survey.create')}}" class="btn btn-primary float-right"> Add Survey</a>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php $i = 1; ?>
            @include('partial.alerts')
            @if (count($surveys) > 0)
                <table class="table  table-striped text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Survey Type</th>
                            <th>Disease</th>
                            <th>Questions</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($surveys as $survey)
                            <tr>

                                <td>{{$i++}}</td>
                                <td>{{$survey->name}}</td>
                                <td >{{$survey->survey_type}}</td>
                                <td >{{$survey->diseases->name}}</td>
                                <td > <a href="{{route('survey.questions', ['id' => $survey->id])}}" class="btn btn-info btn-light">Questions <i class="fas fa-question"></i></a></td>
                                <td>
                                    <a href="{{route('survey.edit', ['id' => $survey->id])}}" class="btn btn-success"> <i class="fas fa-edit"></i> edit</a>
                                    <a href="{{route('survey.destroy', ['id' => $survey->id])}}" style="margin-left: 5px" class="btn btn-danger"> <i class="fas fa-trash-alt"></i> delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
            <div class="alert alert-danger" role="alert">
                <h4 class="text-center">Sorry, There is no Surveys!</h4>
            </div>
            @endif
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->


</div>
@endsection
