<!-- Sidebar Layout -->
<div>
    <div class="offcanvas offcanvas-start sidebar" tabindex="-1" id="offcanvasSidebar">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasLabel">AdminSphere</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="nav nav-pills flex-column mb-auto" id="sidebarTabs">
                <li class="nav-item">
                    <a href="{{ route('teacher.dashboard')}}">
                        <i class="fa fa-tachometer me-2" aria-hidden="true"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('teacher.upload-course-materials')}}">
                        <i class="fa fa-upload me-2" aria-hidden="true"></i>
                        Upload Material
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('teacher.grade-asignments')}}">
                        <i class="fa fa-file-word-o me-2" aria-hidden="true"></i>
                        Grade Assignments
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('teacher.submit-assignment')}}">
                        <i class="fa fa-plus me-2" aria-hidden="true"></i>
                        Submit Assignment
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('teacher.settings')}}">
                        <i class="fa fa-cog me-2" aria-hidden="true"></i>
                        Settings
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('user.logout')}}" class="nav-link text-danger" data-tab="upload">
                        <i class="fa fa-cog me-2" aria-hidden="true"></i>
                        Log Out
                    </a>
                </li>
            </ul>
        </div>
    </div>
