@extends('layout.adminLayout')


@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="admin-container">
        <div class="container-fluid mt-4">
            @include('layout.back-button')
            <h2><b>PROGRAMS</b></h2>
        </div>

        <div class="row-students row">

            @include('layout.programs-table', ['departments' => $departments])
            {{-- Hello Students --}}
        </div>
    </div>
    
@endsection