@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
<div>

    <div class="card">
        <div class="card-header">

            <h3 class="text-center">All questions</h3>

            <a href="{{route('question.create')}}" class="btn btn-primary float-right"> Add Question </a>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php $i = 1; ?>
            @include('partial.alerts')
            @if (count($questions) > 0)
                <table class="table table-striped text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Survey</th>
                            <th class="col-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($surveys as $survey)

                        @endforeach
                        @foreach ($questions as $question)
                            <tr>

                                <td>{{$i++}}</td>
                                <td>{{$question->question}}</td>
                                <td>{{$question->surveys->name}}</td>
                                <td>
                                    <a href="{{route('question.edit', ['id' => $question->id])}}" class="btn btn-info"> <i class="fas fa-edit"></i> edit</a>
                                    <a href="{{route('question.destroy', ['id' => $question->id])}}" style="margin-left: 5px" class="btn btn-danger"> <i class="fas fa-trash-alt"></i> delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
            <div class="alert alert-danger" role="alert">
                <h4 class="text-center">Sorry, There is no Questions!</h4>
            </div>
            @endif
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->


</div>
@endsection
