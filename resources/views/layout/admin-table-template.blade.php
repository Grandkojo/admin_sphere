<div class="container-fluid">
    <div class="add-buttons">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-student">
            <i class="fa fa-plus me-2" aria-hidden="true"></i>New
        </button>
        {{-- <a href="{{ route('admin.students.new')}}" class="btn btn-primary text-end"><i class="fa fa-plus me-2" aria-hidden="true"></i>New</a> --}}
    </div>
    <div class="card p-4">
        <div class="row mb-3">
            <div class="col-md-4">
                <label for="name" class="form-label">Enter Name</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Search name here"
                    value="{{ request('name') }}" autocomplete="on">
            </div>
            <div class="col-md-3">
                <label for="program" class="form-label">Courses</label>
                <select id="program" name="program" class="form-select">
                    <option value="ALL" {{ request('program') == 'ALL' ? 'selected' : '' }}>ALL</option>
                    <option value="Program1" {{ request('program') == 'Program1' ? 'selected' : '' }}>Program 1</option>
                    <option value="Program2" {{ request('program') == 'Program2' ? 'selected' : '' }}>Program 2</option>
                </select>
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
                <a href="{{ route('admin.students') }}" class="btn btn-primary w-100">Reset</a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered ">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Index No</th>
                        <th>Lastname</th>
                        <th>Othernames</th>
                        <th>Course</th>
                        <th>Stream</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                {{-- <tbody>
                @forelse ($students as $student)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $student->index_no }}</td>
                    <td>{{ $student->lastname }}</td>
                    <td>{{ $student->othernames }}</td>
                    <td>{{ $student->course }}</td>
                    <td>{{ $student->stream }}</td>
                    <td>{{ $student->status }}</td>
                    <td>
                        <a href="{{ route('admin.students.edit', $student->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <a href="{{ route('admin.students.destroy', $student->id) }}" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center">No data available in table</td>
                </tr>
                @endforelse
            </tbody> --}}
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>1234</td>
                        <td>John Doe</td>
                        <td>john.doe@example.com</td>
                        <td>Computer Science</td>
                        <td>Science</td>
                        <td>Active</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-warning">Edit</a>
                            <a href="#" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>1235</td>
                        <td>Jane Smith</td>
                        <td>jane.smith@example.com</td>
                        <td>Mathematics</td>
                        <td>Arts</td>
                        <td>Inactive</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-warning">Edit</a>
                            <a href="#" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center">
            {{-- {{ $students->links() }} --}}
            <nav>
                <ul class="pagination">
                    <li class="page-item disabled"><a class="page-link" href="#">«</a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">»</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>

<script>
    function filterResults() {
        const name = document.getElementById('name').value;
        const program = document.getElementById('program').value;
        const stream = document.getElementById('stream').value;
        window.location.href = `?name=${name}&program=${program}&stream=${stream}`;
    }
</script>


{{-- Add student modal --}}

<div class="modal fade" id="add-student">
    <<div class="modal-dialog modal-dialog-centered  modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add Student</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form class="add-student" action="{{ route('admin.students.new') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" class="form-control"
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

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <h6 class="text-danger"><small>Note: this would be a temporary password</small></h6>
                        <input type="password" name="password" id="password" class="form-control" required placeholder="enter password">
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
</div>
