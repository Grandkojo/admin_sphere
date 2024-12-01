@extends('layout.adminLayout')


@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="admin-container">
        <div class="container-fluid mt-4">
            {{-- @include('layout.back-button') --}}
            <h2><b>DASHBOARD</b></h2>
        </div>

        <div class="row-t row">
            <div class="col-md-12 col-lg-4 col-sm-12 col-12">
                <a class="container-a" href="{{ route('admin.programs') }}">
                    <div class="container-fluid container-card" id="container-card1">
                        <div class="row">
                            <div class="col-7">
                                <ul>
                                    <li>
                                        <h4><b>Programs</b></h4>
                                    </li>
                                    <li>
                                        <h5>Registered: 5</h5>
                                        <h5>Active : 4</h5>
                                    </li>
                                </ul>

                            </div>
                            <div class="col-5 text-end mb-2">

                                <div class="c-item">
                                    <img src="{{ asset('images/admin/program.png') }}" alt="programs">
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-12 col-lg-4 col-sm-12 col-12">
                <a class="container-a" href="{{ route('admin.courses') }}">
                    <div class="container-fluid container-card" id="container-card1">
                        <div class="row">
                            <div class="col-7">
                                <ul>
                                    <li>
                                        <h4><b>Courses</b></h4>
                                    </li>
                                    <li>
                                        <h5>Registered: 5</h5>
                                        <h5>Active : 4</h5>
                                    </li>
                                </ul>

                            </div>
                            <div class="col-5 text-end mb-2">

                                <div class="c-item">
                                    <img src="{{ asset('images/library.png') }}" alt="material">
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-12 col-lg-4 col-sm-12 col-12">
                <a class="container-a" href="{{ route('admin.students') }}">
                    <div class="container-fluid container-card" id="container-card2">
                        <div class="row">
                            <div class="col-7">
                                <ul>
                                    <li>
                                        <h4><b>Students</b></h4>
                                    </li>
                                    <li>
                                        <h5>Enrolled: 5</h5>
                                        <h5>Deffered: 2</h5>
                                    </li>
                                </ul>

                            </div>
                            <div class="col-5 text-end mb-2">

                                <div class="c-item">
                                    <img src="{{ asset('images/admin/graduation.png') }}" alt="material">
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-12 col-lg-4 col-sm-12 col-12">
                <a class="container-a" href="{{ route('admin.teachers') }}">
                    <div class="container-fluid container-card" id="container-card3">
                        <div class="row">
                            <div class="col-7">
                                <ul>
                                    <li>
                                        <h4><b>Teachers</b></h4>
                                    </li>
                                    <li>
                                        <h5>Registered: 15</h5>
                                        <h5>Pending: 10</h5>
                                    </li>
                                </ul>

                            </div>
                            <div class="col-5 text-end">

                                <div class="c-item mt-2">
                                    <img src="{{ asset('images/admin/teacher.png') }}" alt="material">
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-12 col-lg-4 col-sm-12 col-12">
                <a class="container-a" href="{{ route('student.financial-status') }}">
                    <div class="container-fluid
                    container-card" id="container-card4">
                        <div class="row">
                            <div class="col-7">
                                <ul>
                                    <li>
                                        <h4><b>Analytics</b></h4>
                                    </li>
                                    <li>
                                        <h5>Revenue: GHC 2000</h5>
                                        <h5>Expenses: GHC 1000</h5>
                                    </li>
                                </ul>

                            </div>
                            <div class="col-5 text-end">

                                <div class="c-item mt-2">
                                    <img src="{{asset('images/admin/data-analytics.png')}}" alt="material">
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>



        </div>
    @endsection
