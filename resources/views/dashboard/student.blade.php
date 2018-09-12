@extends('home')
@section('dashboard')
@if(is_null($student))
<div class="card">
    <div class="card-header">Dashboard</div>
        <div class="card-body">
            No student information available yet
    </div>
</div>
@else
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

@foreach ($student->semisters as $sem)
    <div class="card">
        <div class="card-header font-weight-bold">{{$sem->sem_name}}</div>
            <div class="card-body">
            <div class="d-flex">
            SGPA : {{$sem->sgpa}} <div class="ml-auto"><a href="/semister/{{$sem->id}}" class="btn btn-primary">View Marks</a></div>
            </div>
        </div>
    </div>
<br>
@endforeach
@endif
@endsection