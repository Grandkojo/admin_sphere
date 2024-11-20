<div class="container-fluid">
    <div class="add-buttons">
        <a href="#" class="btn btn-primary text-end"><i class="fa fa-plus me-2" aria-hidden="true"></i>New</a>
    </div>
    <div class="card p-4">
        <div class="row mb-3">
            <div class="col-md-4">
                <label for="name" class="form-label">Enter Name</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Search name here"
                    value="{{ request('name') }}">
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
