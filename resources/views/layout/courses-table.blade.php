<div class="container-fluid">
    <div class="add-buttons">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-course">
            <i class="fa fa-plus me-2" aria-hidden="true"></i>New
        </button>
        {{-- <a href="{{ route('admin.students.new')}}" class="btn btn-primary text-end"><i class="fa fa-plus me-2" aria-hidden="true"></i>New</a> --}}
    </div>
    <div class="card p-4">
        <div class="row mb-3">
            <div class="col-md-4">
                <label for="name" class="form-label">Search Course</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Search course here"
                    value="{{ request('name') }}" autocomplete="on">
            </div>
            <div class="col-md-3">
                <label for="program" class="form-label">Programs</label>
                <form method="GET" action="{{ route('admin.courses') }}">
                    <select id="program" name="program" class="form-select" onchange="this.form.submit()">
                        <option value="ALL" {{ $selected_program == 'ALL' ? 'selected' : '' }}>ALL</option>
                        @foreach ($programs as $program)
                            <option value="{{ $program->id }}"
                                {{ $selected_program == $program->id ? 'selected' : '' }}>
                                {{ $program->program_name }}
                            </option>
                        @endforeach
                    </select>
                </form>
                <div id="loader" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(255, 255, 255, 0.8); z-index: 9999; text-align: center; justify-content: center; align-items: center;">
                    <div>
                        <p>Loading...</p>
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <label for="stream" class="form-label">Stream</label>
                <select id="stream" name="stream" class="form-select">
                    <option value="ALL" {{ request('stream') == 'ALL' ? 'selected' : '' }}>ALL</option>
                    <option value="Stream1" {{ request('stream') == 'Stream1' ? 'selected' : '' }}>Stream 1</option>
                    <option value="Stream2" {{ request('stream') == 'Stream2' ? 'selected' : '' }}>Stream 2</option>
                </select>
            </div>
            <div class="col-md-2 d-flex align-items-end">
                <button class="btn btn-success w-100 me-2" onclick="filterResults()">Search</button>
                <a href="{{ route('admin.courses') }}" class="btn btn-primary w-100">Reset</a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered ">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Course Code</th>
                        <th>Name</th>
                        {{-- <th>Othernames</th> --}}
                        <th>Credit Hours</th>
                        {{-- <th>Stream</th> --}}
                        {{-- <th>Status</th> --}}
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($display_courses->isNotEmpty())
                        @foreach ($display_courses as $course)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $course->course_code }}</td>
                                <td>{{ $course->course_name }}</td>
                                <td>{{ $course->course_credit }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-primary dropdown-toggle m-0"
                                            data-bs-toggle="dropdown">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item"
                                                    href="{{ route('admin.courses.edit', $course->id) }}">Edit</a></li>
                                            <li><a class="dropdown-item"
                                                    href="{{ route('admin.courses.destroy', $course->id) }}">Delete</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="text-center">No courses found.</td>
                        </tr>
                    @endif
                </tbody>



            </table>
            {{ $display_courses->appends(['program' => $selected_program])->onEachSide(1)->links() }}
        </div>

        @include('layout.data-navigation')
    </div>
</div>

{{-- Course modal --}}
<div class="modal fade" id="add-course">
    <<div class="modal-dialog modal-dialog-centered  modal-xl">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add Course</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form class="add-student" action="{{ route('admin.students.new') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="modal-name" class="form-control"
                            value="{{ old('name') }}" required autocomplete="true" placeholder="John Doe">
                    </div>

                    <div class="form-group mb-3">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" class="form-control"
                            value="{{ old('email') }}" required placeholder="example@gmail.com">
                    </div>

                    <div class="form-group mb-3">
                        <label for="gender">Gender:</label>
                        <select name="gender" id="gender" class="form-control" required>
                            <option value="">Select Gender</option>
                            <option value="M" {{ old('gender') == 'M' ? 'selected' : '' }}>Male</option>
                            <option value="F" {{ old('gender') == 'F' ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="department_id">Department:</label>
                        <select name="department_id" id="department_id" class="form-control" required>
                            <option value="">Select Department</option>

                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}"
                                    {{ old('department_id') == $department->id ? 'selected' : '' }}>
                                    {{ $department->department_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="modal-program">Program:</label>
                        <select name="program" id="modal-program" class="form-control" required>
                            <option value="">Select Program</option>
                            @foreach ($programs as $program)
                                <option value="{{ $program->id }}"
                                    {{ old('program_id') == $program->id ? 'selected' : '' }}>
                                    {{ $program->program_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <h6 class="text-danger"><small>Note: this would be a temporary password</small></h6>
                        <input type="password" name="password" id="password" class="form-control" required
                            placeholder="enter password">
                    </div>

                    <div class="form-group">
                        <button type="submit" class=" form-control btn btn-primary mb-3 mt-3">Create</button>
                    </div>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>

        </div>
</div>