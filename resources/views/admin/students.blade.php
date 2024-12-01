@extends('layout.adminLayout')


@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="ul">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    <div class="admin-container">
        <div class="container-fluid mt-4">
            @include('layout.back-button')
            <h2><b>STUDENTS</b></h2>
        </div>
        

        <div class="row-students row">

            @include('layout.students-template', ['departments' => $departments])
            {{-- Hello Students --}}
        </div>
    </div>

@endsection
