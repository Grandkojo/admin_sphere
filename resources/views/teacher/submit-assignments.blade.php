@extends('layout.teacherLayout')

@section('content')
    
<div class="teacher-container">
    <div class="container-fluid mt-4">
        @include('layout.back-button')
        <h2><b>ASSIGNMENTS</b></h2>
    </div>


    <div class="row-materials row">

        @include('layout.alerts')
        @include('layout.teacher.submitAssignments-template')

    </div>
</div>

@endsection