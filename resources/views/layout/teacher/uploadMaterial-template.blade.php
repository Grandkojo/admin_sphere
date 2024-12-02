<div class="container-fluid">
    <div class="add-buttons">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#upload-course-material">
            <i class="fa fa-plus me-2" aria-hidden="true"></i>New
        </button>
        {{-- <a href="{{ route('admin.students.new')}}" class="btn btn-primary text-end"><i class="fa fa-plus me-2" aria-hidden="true"></i>New</a> --}}
    </div>
    <div class="card p-4">
        <div class="row mb-3">
            <div class="col-md-4">
                <label for="search" class="form-label">Search course materia</label>
                <input type="text" id="search" name="search" class="form-control" placeholder="Search material here"
                    value="{{ request('search') }}" autocomplete="on">
            </div>
            {{-- <div class="col-md-3">
                <label for="program" class="form-label">Programs</label>
                <form method="GET" action="{{ route('admin.students') }}">
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

            </div>
            <div class="col-md-3">
                <label for="stream" class="form-label">Stream</label>
                <select id="stream" name="stream" class="form-select">
                    <option value="ALL" {{ request('stream') == 'ALL' ? 'selected' : '' }}>ALL</option>
                    <option value="Stream1" {{ request('stream') == 'Stream1' ? 'selected' : '' }}>Stream 1</option>
                    <option value="Stream2" {{ request('stream') == 'Stream2' ? 'selected' : '' }}>Stream 2</option>
                </select>
            </div> --}}
            <div class="col-md-2 d-flex align-items-end">
                <button class="btn btn-success w-100 me-2" onclick="filterResults()">Search</button>
                <a href="{{ route('admin.courses') }}" class="btn btn-primary w-100">Reset</a>
            </div>
        </div>

        <div class="table-responsive mb-3">
            <table class="table table-bordered ">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Student ID</th>
                        <th>Last Name</th>
                        <th>Othernames</th>
                        <th>Type</th>
                        {{-- <th>Stream</th> --}}
                        {{-- <th>Status</th> --}}
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <div id="loader"
                        style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(255, 255, 255, 0.8); z-index: 9999; text-align: center; justify-content: center; align-items: center;">
                        <div>
                            <p>Loading...</p>
                            <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    </div>
                    @if ($users->isNotEmpty())
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->user_id }}</td>
                                <td>{{ $user->last_name }}</td>
                                <td>{{ $user->other_names }}</td>
                                <td>{{ $user->type }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-primary dropdown-toggle m-0"
                                            data-bs-toggle="dropdown">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu">
                                            {{-- <li><a id="userDetails" class="dropdown-item"
                                                    href="{{ route('admin.students.details', $user->id) }}">Details</a>
                                            </li> --}}
                                            <li><a class="dropdown-item"
                                                    href="{{ route('admin.students.edit', $user->id) }}">Edit</a></li>
                                            <li><a id="deleteUser" onclick="deleteStudent(event)" class="dropdown-item"
                                                    href="{{ route('admin.students.destroy', $user->id) }}">Delete</a>
                                            </li>
                                        </ul>

                                        <form id="delete-form-{{ $user->id }}"
                                            action="{{ route('admin.students.destroy', $user->id) }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="text-center">No students found.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
            {{ $users->appends(['program' => $selected_program])->onEachSide(1)->links() }}
            {{-- {{ $users->appends(['program' => $selected_program])->onEachSide(1)->links() }} --}}
        </div>

        @include('layout.data-navigation')
    </div>
</div>

{{-- Student modal --}}
{{-- <div class="modal fade" id="add-student">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
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
                        <label for="last_name">Last Name:</label>
                        <input type="text" name="last_name" id="last_name" class="form-control"
                            value="{{ old('last-name') }}" required autocomplete="true" placeholder="Doe">
                    </div>
                    <div class="form-group mb-3">
                        <label for="other_names">Other Names:</label>
                        <input type="text" name="other_names" id="other_names" class="form-control"
                            value="{{ old('other_names') }}" required autocomplete="true"
                            placeholder="John Griffin">
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
                        <label for="program_id">Program:</label>
                        <select name="program_id" id="program_id" class="form-control" required>
                            <option value="">Select Program</option>
                            @foreach ($programs as $program)
                                <option value="{{ $program->id }}"
                                    {{ old('program_id') == $program->id ? 'selected' : '' }}>
                                    {{ $program->program_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="type">Student Type:</label>
                        <select name="type" id="type" class="form-control" required>
                            <option value="">Select Type</option>
                            <option value="regular" {{ old('type') == 'M' ? 'selected' : '' }}>Regular</option>
                            <option value="distance" {{ old('type') == 'M' ? 'selected' : '' }}>Distance</option>
                            <option value="fee_paying" {{ old('type') == 'F' ? 'selected' : '' }}>Fee-Paying</option>
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

    <script>
        function filterResults() {

            let studentname = document.getElementById('search').value;

            const url = `{{ route('admin.students.filter') }}?search=${studentname}`;
            // alert(url); return;
            document.getElementById('loader').style.display = 'flex';
            // return;

            window.location.href = url;
        }

        function deleteStudent(e, userId) {
            e.preventDefault();

            // Show SweetAlert confirmation dialog
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, keep it'
            }).then((result) => {
                if (result.isConfirmed) {
                    // If user confirmed, submit the form
                    var formId = 'delete-form-' + e.target.getAttribute('href').split('/')
                .pop(); // Get the user ID from the link's href
                    document.getElementById(formId).submit(); // Submit the hidden form
                    Swal.fire(
                        'Deleted!',
                        'The user has been deleted.',
                        'success'
                    );
                } else {
                    // If user canceled, show a cancel confirmation message (optional)
                    Swal.fire(
                        'Cancelled',
                        'The user was not deleted.',
                        'error'
                    );
                }
            });
        }
    </script> --}}


<div class="modal fade" id="upload-course-material">
<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">
                <h3><i class="fa fa-plus" aria-hidden="true"></i>
                    Add Course Material</h3>
            </h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <form action="../action/teacher/uploadMaterialAction.php" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="instruction"><b>Instruction</b></label>
                    <textarea class="form-control mt-3" placeholder="Enter instruction for assignment..." name="course_material_description"
                        id="course_material_description" required></textarea>
                </div>
                <div class="form-group">
                    <label for="file_upload"><b>Course Material</b></label>
                    <p class="text-danger m-2"> File type should be .pdf, .pptx or .docx</p>
                    <input type="file" class="form-control mt-3" id="file_upload" name="file_upload" required>
                    <!-- <div class="d-flex justify-content-end align-items-end mt-2">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                    </div> -->
                </div>
                <div class="form-group">
                    <label for="department"><b>Department:</b></label>
                    <select name="department" id="department" required>
                        <option value="<?= strtolower($department['department_id']) ?>">
                            <?= ucfirst(strtolower($department['department_name'])) ?></option>

                    </select>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Upload</button>
            </form>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>

    </div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
// Attach event listeners for all delete buttons
document.querySelectorAll('[id^="deleteButton"]').forEach(function(deleteButton) {
    deleteButton.addEventListener('click', function(event) {
        event.preventDefault();

        // Get the URL from the parent anchor tag
        var targetUrl = deleteButton.parentElement.href;

        Swal.fire({
            title: "Are you sure?",
            text: "Are you sure you want to delete this file? This action cannot be undone.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes',
            cancelButtonText: 'No'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "Deleted!",
                    text: "The course material has been deleted.",
                    icon: "success",
                    confirmButtonText: "Ok"
                }).then(() => {
                    // Redirect to the target URL
                    window.location.href = targetUrl;
                });
            }
        });
    });
});
</script>