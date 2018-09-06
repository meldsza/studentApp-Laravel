@extends('home')
@section('dashboard')
@if(is_null($user->student))
<div class="card">
    <div class="card-header">Dashboard</div>
        <div class="card-body">
            No student information available yet
    </div>
</div>
@else
<div class="card">
    {{--<div class="card-header">Dashboard</div>--}}

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                 </div>
            @endif
            <div class="d-flex">CGPA : {{$user->student->cgpa}}<div class="ml-auto">Credits : {{$user->student->credits}}</div></div>
    </div>
</div>
<br>

@foreach ($user->student->semisters as $sem)
    <div class="card">
        <div class="card-header">{{$sem->sem_name}}</div>
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