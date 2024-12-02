@extends('layout.adminLayout')


@section('content')


    <div class="admin-container">
        <div class="container-fluid mt-4">
            @include('layout.back-button')
            <h2><b>TEACHERS</b></h2>
        </div>


        <div class="row-teachers row">

            @include('layout.alerts')
            @include('layout.teachers-template', ['departments' => $departments])
            {{-- Hello Students --}}
        </div>
    </div>

@endsection
