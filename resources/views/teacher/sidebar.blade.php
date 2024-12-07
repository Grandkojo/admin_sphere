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
                    <a href="{{ route('teacher.dashboard') }}"
                        class="nav-link {{ request()->routeIs('teacher.dashboard') ? 'active' : '' }} text-dark">
                        <i class="fa fa-tachometer me-2" aria-hidden="true"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('teacher.course-materials') }}"
                        class="nav-link {{ request()->routeIs('teacher.upload-course-materials') ? 'active' : '' }} text-dark">
                        <i class="fa fa-upload me-2" aria-hidden="true"></i>
                        Upload Materials
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('teacher.grade-assignments') }}"
                        class="nav-link {{ request()->routeIs('teacher.grade-assignments') ? 'active' : '' }} text-dark">
                        <i class="fa fa-file-word-o me-2" aria-hidden="true"></i>
                        Grade Assignments
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('teacher.submit-assignments') }}"
                        class="nav-link {{ request()->routeIs('teacher.submit-assignments') ? 'active' : '' }} text-dark">
                        <i class="fa fa-plus me-2" aria-hidden="true"></i>
                        Submit Assignments
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('teacher.settings') }}"
                        class="nav-link {{ request()->routeIs('teacher.settings') ? 'active' : '' }} text-dark">
                        <i class="fa fa-cog me-2" aria-hidden="true"></i>
                        Settings
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user.logout') }}" class="nav-link text-danger" data-tab="upload">
                        <i class="fa fa-sign-out me-2" aria-hidden="true"></i>
                        Log Out
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
