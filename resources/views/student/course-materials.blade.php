@extends('layout.studentLayout')


@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div>
        <div class="container-fluid mt-5">
            <div class="container-fluid mt-4" style="padding-left: 30px;">
                <h2><b>COURSE MATERIALS</b></h2>
            </div>
            @if (is_string($message))
                <div class="container p-5">
                    <i class="fa fa-3x fa-exclamation-triangle mt-5" aria-hidden="true"></i>
                    <h3>{{ $message }}</h3>
                    <p>Kindly contact your respective lecturer</p>

                </div>
            @else
                <div class="table-responsive table-responsive-sm m-5">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="table-primary" style="font-weight: bolder;">
                                <th>Material Description</th>
                                <th>Course Material</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($course_materials as $material)
                                <tr>
                                    <td>{{ $material->description }}</td>
                                    <td>{{ $material->course_material }}
                                        <span>
                                            <a href="{{}}">
                                                <i class="fa fa-download ms-2" aria-hidden="true"></i>
                                            </a>
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>

@endsection
