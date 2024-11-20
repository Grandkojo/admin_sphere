@extends('layout.adminLayout')


@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="admin-container">
        <div class="container-fluid mt-4">
            <h2><b>STUDENTS</b></h2>
        </div>

        <div class="row-students row">

            @include('layout.admin-table-template')
            {{-- Hello Students --}}
        </div>
    </div>
