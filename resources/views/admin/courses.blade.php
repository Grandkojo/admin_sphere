@extends('layout.adminLayout')


@section('content')
   

    <div class="admin-container">
        <div class="container-fluid mt-4">
            @include('layout.back-button')
            <h2><b>COURSES</b></h2>
        </div>

        <div class="row-students row">

            @include('layout.alerts')
            @include('layout.courses-table', ['departments' => $departments])
            {{-- Hello Students --}}
        </div>
    </div>
    
@endsection
