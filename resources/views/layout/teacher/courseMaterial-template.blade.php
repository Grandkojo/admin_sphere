<style>
    .card {

        background-color: #ffffffd1;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border: none;
    }
</style>
<div class="container-fluid">
    <div class="add-buttons">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#upload-course-material">
            <i class="fa fa-plus me-2" aria-hidden="true"></i>Upload Material
        </button>
        {{-- <a href="{{ route('admin.students.new')}}" class="btn btn-primary text-end"><i class="fa fa-plus me-2" aria-hidden="true"></i>New</a> --}}
    </div>
    <div class="card p-4">
        <div class="row mb-3">
            <div class="col-md-4">
                <label for="search" class="form-label">Search Material</label>
                <input type="text" id="search" name="search" class="form-control"
                    placeholder="Search material here" value="{{ request('search') }}" autocomplete="on">
            </div>
            <div id="loader"
                style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(255, 255, 255, 0.8); z-index: 9999; text-align: center; justify-content: center; align-items: center;">
                <div>
                    <p>Loading...</p>
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <label for="program" class="form-label">Programs</label>
                <form method="GET" action="{{ route('admin.students') }}">
                    <select id="program" name="program" class="form-select" onchange="this.form.submit()">
                        {{-- <option value="ALL" {{ $selected_program == 'ALL' ? 'selected' : '' }}>ALL</option>
                        @foreach ($programs as $program)
                            <option value="{{ $program->id }}"
                                {{ $selected_program == $program->id ? 'selected' : '' }}>
                                {{ $program->program_name }}
                            </option>
                        @endforeach --}}
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
            </div>
            <div class="col-md-2 d-flex align-items-end">
                <button class="btn btn-success w-100 me-2" onclick="filterResults()">Search</button>
                <a href="{{ route('admin.courses') }}" class="btn btn-primary w-100">Reset</a>
            </div>
        </div>


        <div class="table-responsive" style="min-height: 210px;">
            <table class="table table-bordered ">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Course</th>
                        <th>Instruction</th>
                        <th>Material</th>
                        {{-- <th>Status</th> --}}
                        {{-- <th>Stream</th> --}}
                        {{-- <th>Status</th> --}}
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @if ($course_materials->isNotEmpty())
                        @foreach ($course_materials as $course_material)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $course_material->course_code }}</td>
                                <td>{{ $course_material->material_description }}</td>
                                <td>{{ $course_material->file_name }}
                                    <i onclick="downloadFile()" class="ms-2 fa  fa-download" aria-hidden="true"
                                        aria-label="view" title="Download"></i>
                                    <i onclick="viewFile()" class="ms-2 fa  fa-external-link" aria-hidden="true"
                                        aria-label="view" title="View"></i>

                                </td>
                                {{-- <td>{{ $course_material->status }}</td> --}}
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-primary dropdown-toggle m-0"
                                            data-bs-toggle="dropdown">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu">
                                            {{-- <li><a id="course_materialDetails" class="dropdown-item"
                                                    href="{{ route('admin.students.details', $course_material->id) }}">Details</a>
                                            </li> --}}
                                            <li><a class="dropdown-item"
                                                    href="{{ route('teacher.course-material.edit', $course_material->id) }}">Edit</a>
                                            </li>
                                            <li><a id="deletecourse_material" onclick="deleteMaterial(event)"
                                                    class="dropdown-item"
                                                    href="{{ route('teacher.course-material.destroy', $course_material->id) }}">Delete</a>
                                            </li>
                                        </ul>

                                        <form id="delete-form-{{ $course_material->id }}"
                                            action="{{ route('teacher.course-material.destroy', $course_material->id) }}"
                                            method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        <script>
                            function downloadFile() {

                                var link = document.createElement('a');

                                link.href = "{{ $course_material->file_url }}";

                                link.target = "_blank";

                                link.download = '';


                                document.body.appendChild(link);

                                link.click();

                                document.body.removeChild(link);
                            }


                            function viewFile() {
                                window.open("{{ $course_material->file_url }}", "_blank");
                            }
                        </script>
                    @else
                        <tr>
                            <td colspan="5" class="text-center">No materials found.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
            {{-- {{ $course_materials->onEachSide(1)->links() }} --}}
            {{-- {{ $users->appends(['program' => $selected_program])->onEachSide(1)->links() }} --}}
        </div>

    </div>

    @include('layout.data-navigation')
</div>
</div>



<div class="modal fade" id="upload-course-material">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
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
                <form action="{{ route('teacher.upload-course-material') }}" method="post" id="upload-form"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="course_material_description"><b>Instruction*</b></label>
                        <textarea class="form-control mt-3" placeholder="Enter instruction for assignment..." name="course_material_description"
                            id="course_material_description" required></textarea>
                        <p id="desc-error-message" style="display: none"></p>
                    </div>
                    <div class="form-group">
                        <label for="file_upload"><b>Course Material*</b></label>
                        <p class="m-2 text-secondary" style="display: flex">File type should be .pdf, .pptx or .docx |
                            Max size: 5mb</p>
                        <input type="file" class="form-control mt-3" id="file_upload" name="file_upload"
                            required>
                        <p class="m-2" id="file-error-message" style="display: none"></p>
                        <!-- <div class="d-flex justify-content-end align-items-end mt-2">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                    </div> -->
                    </div>
                    <div class="form-group mb-3">
                        <label for="course_code">Course:</label>
                        <select name="course_code" id="course_code" class="form-control" required>
                            <option value="">Select Course</option>

                            @foreach ($courses as $course)
                                <option value="{{ $course->course_code }}" id="course_code"
                                    {{ old('course_code') == $course->course_code ? 'selected' : '' }}>
                                    {{ $course->course_name }}
                                </option>
                            @endforeach
                        </select>
                        <p id="dept-error-message" style="display: none"></p>
                    </div>

                    <div class="form-group">
                        <button type="submit" id="#upload-button" class="form-control btn btn-primary mb-3 mt-3"
                            onclick="checkOrSubmit(event)">Upload</button>
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

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
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
<script>
    function deleteMaterial(e, courseId) {
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
                    'The material has been deleted.',
                    'success'
                );
            } else {
                // If user canceled, show a cancel confirmation message (optional)
                Swal.fire(
                    'Cancelled',
                    'The material was not deleted.',
                    'error'
                );
            }
        });
    }
</script>
<script>
    function validateFileType(fileInput, error_msg_element) {
        const file = fileInput.files[0]; // Get the selected file

        const allowedExtensions = ['pdf', 'pptx', 'docx']; // Allowed file extensions
        const fileName = file ? file.name.toLowerCase() : ''; // Get the file name

        // Check if the file exists and has an allowed extension
        const fileExtension = fileName.split('.').pop();

        if (file && allowedExtensions.includes(fileExtension)) {

            return true;
        } else {

            return false;
        }
    }

    function checkOrSubmit(e) {
        e.preventDefault();

        // Get the file input element and the error message element
        const fileInput = document.getElementById('file_upload');
        const descInput = document.getElementById('course_material_description');
        const courseInput = document.getElementById('course_code');

        const desc_error_message = document.getElementById('desc-error-message');
        const file_error_message = document.getElementById('file-error-message');
        const dept_error_message = document.getElementById('dept-error-message');

        let formValid = true;

        // Reset error messages
        desc_error_message.style.display = 'none';
        file_error_message.style.display = 'none';
        dept_error_message.style.display = 'none';

        // Check if inputs are available
        if (!descInput || !courseInput || !fileInput) {
            alert('Missing required form elements');
            return;
        }

        // Validate file input
        if (!validateFileType(fileInput, file_error_message)) {
            file_error_message.style.display = 'block';
            file_error_message.style.color = 'red';
            file_error_message.innerText = 'Select a valid file';
            formValid = false;
        }

        // Validate description input
        if (!descInput.value.trim()) {
            desc_error_message.style.display = 'block';
            desc_error_message.style.color = 'red';
            desc_error_message.innerText = 'Instruction required';
            formValid = false;
        }

        // Validate department input
        if (!courseInput.value) {
            dept_error_message.style.display = 'block';
            dept_error_message.style.color = 'red';
            dept_error_message.innerText = 'Department to assign required';
            formValid = false;
        }

        // If form is valid, submit the form
        if (formValid) {
            // alert('All good, form is valid!');
            document.getElementById('upload-form').submit();

            // Optionally, submit the form programmatically
        }
    }


    // document.addEventListener('load', function(){

    // });
</script>
