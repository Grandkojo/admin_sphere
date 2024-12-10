@extends('layout.studentLayout')

@section('content')
    
<div class="student-container">
    <div class="container-fluid mt-4">
        @include('layout.back-button')
        <h2><b>MATERIALS</b></h2>
    </div>


    <div class="row-materials row">

        @include('layout.alerts')
        @include('layout.student.courseMaterial-template')

    </div>
</div>

@endsection