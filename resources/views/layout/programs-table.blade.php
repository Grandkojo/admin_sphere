<div class="container-fluid">
    <div class="add-buttons">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-program">
            <i class="fa fa-plus me-2" aria-hidden="true"></i>New
        </button>
        {{-- <a href="{{ route('admin.students.new')}}" class="btn btn-primary text-end"><i class="fa fa-plus me-2" aria-hidden="true"></i>New</a> --}}
    </div>
    <div class="card p-4">
        <div class="row mb-3">
            <div class="col-md-4">
                <label for="search" class="form-label">Search Program</label>
                <input type="text" id="search" name="search" class="form-control" placeholder="Search program here"
                    value="{{ request('search') }}" autocomplete="on">
            </div>
            <div class="col-md-3">
                <label for="department" class="form-label">Departments</label>
                <form method="GET" action="{{ route('admin.programs') }}">
                    <select id="department" name="department" class="form-select" onchange="this.form.submit()">
                        <option value="ALL" {{ $selected_department == 'ALL' ? 'selected' : '' }}>ALL</option>
                        @foreach ($departments as $department)
                            <option value="{{ $department->id }}"
                                {{ $selected_department == $department->id ? 'selected' : '' }}>
                                {{ $department->department_name }}
                            </option>
                        @endforeach
                    </select>
                </form>
                <div id="loader"
                    style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(255, 255, 255, 0.8); z-index: 9999; text-align: center; justify-content: center; align-items: center;">
                    <div>
                        <p>Loading...</p>
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <label for="program_type" class="form-label">Type</label>
                <select id="program_type" name="program_type" class="form-select">
                    <option value="ALL" {{ request('program_type') == 'ALL' ? 'selected' : '' }}>ALL</option>
                    <option value="Stream1" {{ request('stream') == 'Stream1' ? 'selected' : '' }}>Stream 1</option>
                    <option value="Stream2" {{ request('stream') == 'Stream2' ? 'selected' : '' }}>Stream 2</option>
                </select>
            </div>
            <div class="col-md-2 d-flex align-items-end">
                <button class="btn btn-success w-100 me-2" onclick="filterResults()">Search</button>
                <a href="{{ route('admin.programs') }}" class="btn btn-primary w-100">Reset</a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered ">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Program Code</th>
                        <th>Name</th>
                        {{-- <th>Othernames</th> --}}
                        <th>Type</th>
                        <th>Duration</th>
                        {{-- <th>Stream</th> --}}
                        {{-- <th>Status</th> --}}
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($display_programs->isNotEmpty())
                        @foreach ($display_programs as $program)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $program->program_code }}</td>
                                <td>{{ $program->program_name }}</td>
                                <td>{{ $program->program_type }}</td>
                                <td>{{ $program->program_duration }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-primary dropdown-toggle m-0"
                                            data-bs-toggle="dropdown">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item"
                                                    href="{{ route('admin.programs.edit', $program->id) }}">Edit</a>
                                            </li>
                                            <li><a class="dropdown-item"
                                                    href="{{ route('admin.programs.destroy', $program->id) }}">Delete</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="text-center">No programs found.</td>
                        </tr>
                    @endif
                </tbody>



            </table>
            {{ $display_programs->appends(['department' => $selected_department])->onEachSide(1)->links() }}
        </div>

        @include('layout.data-navigation')
    </div>
</div>

{{-- Course modal --}}
<div class="modal fade" id="add-program">
    <div class="modal-dialog modal-dialog-centered  modal-xl">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add Program</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form class="add-student" action="{{ route('admin.programs.new') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="program_name">Name:</label>
                        <input type="text" name="program_name" id="modal-name" class="form-control"
                            value="{{ old('program_name') }}" required autocomplete="true" placeholder="a program">
                    </div>
                    <div class="form-group mb-3">
                        <label for="program_code">Program Code:</label>
                        <input type="text" name="program_code" id="modal-program_code" class="form-control"
                            value="{{ old('program_code') }}" required autocomplete="true"
                            placeholder="ex. CE or CSE (should be related to the name)">
                    </div>

                    <div class="form-group mb-3">
                        <label for="program_description">Description:</label>
                        <textarea name="program_description" id="modal-description" class="form-control" required autocomplete="true"
                            placeholder="Enter program description" rows="4">{{ old('description') }}</textarea>

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
                        <label for="program_type">Type:</label>
                        <select name="program_type" id="program_type" class="form-control" required>
                            <option value="">Select program type</option>
                            <option value="BSC" {{ old('program_type') == 'BSC' ? 'selected' : '' }}>Bachelors
                            </option>
                            <option value="MSC" {{ old('program_type') == 'MSC' ? 'selected' : '' }}>Masters
                            </option>
                            <option value="BA" {{ old('program_type') == 'BA' ? 'selected' : '' }}>Bachelors of
                                Arts</option>
                        </select>
                    </div>


                    <div class="form-group mb-3">
                        <label for="program_duration">Duration:</label>
                        <select name="program_duration" id="program_duration" class="form-control" required>
                            <option value="">Select Duration (years)</option>
                            <option value="1" {{ old('program_duration') == '1' ? 'selected' : '' }}>One
                            </option>
                            <option value="2" {{ old('program_duration') == '2' ? 'selected' : '' }}>Two
                            </option>
                            <option value="4" {{ old('program_duration') == '4' ? 'selected' : '' }}>Four
                            </option>
                            <option value="6" {{ old('program_duration') == 'M' ? 'selected' : '' }}>Six
                            </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <button type="submit" class=" form-control btn btn-primary mb-3 mt-3">Add</button>
                    </div>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
    <script>
        function filterResults() {
            let programname = document.getElementById('search').value;

            const url = `{{ route('admin.programs.filter') }}?search=${programname}`;
            document.getElementById('loader').style.display = 'flex';

            window.location.href = url;
        }
    </script>