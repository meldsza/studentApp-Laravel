@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div>
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @include('studentinfo')
            </div>
        </div>
        <br>
        <div class="card">
                <div class="card-body">
                    <a type="button" class="btn btn-primary btn-sm" href="{!! route('semister', ['semister' => $sem->id]) !!}/download">Download Marks</a>
            </div>
        </div>
        <br>
            <div class="card">
                <div class="card-header font-weight-bold">{{$sem->sem_name}}</div>
                    <div class="card-body table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                            <th scope="col">Subject Name</th>
                            <th scope="col">Subject Code</th>
                            <th scope="col">Task 1</th>
                            <th scope="col">MSE 1</th>
                            <th scope="col">Task 2</th>
                            <th scope="col">MSE 2</th>
                            <th scope="col">Task 3</th>
                            <th scope="col">CEE</th>
                            <th scope="col">SEE</th>
                            <th scope="col">Grade</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($sem->marks as $marks)
                            <tr>
                            <td>{{$marks->subject->name}}</td>
                            <td>{{$marks->subject->code}}</td>
                            <td>{{$marks->task_1}}</td>
                            <td>{{$marks->mse_1}}</td>
                            <td>{{$marks->task_2}}</td>
                            <td>{{$marks->mse_2}}</td>
                            <td>{{$marks->task_3}}</td>
                            <td>{{$marks->toArray()["cee"]}}</td>
                            <td>{{$marks->see}}</td>
                            <td>{{$marks->toArray()["grade"]}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
