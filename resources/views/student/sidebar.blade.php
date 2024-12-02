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
                    <a href="{{ route('student.dashboard') }}"
                        class="nav-link {{ request()->routeIs('student.dashboard') ? 'active' : '' }} text-dark">
                        <i class="fa fa-tachometer me-2" aria-hidden="true"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('student.course-materials') }}"
                        class="nav-link {{ request()->routeIs('student.course-materials') ? 'active' : '' }} text-dark">
                        <i class="fa fa-book me-2" aria-hidden="true"></i>
                        Course Materials
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('student.submit-assignment') }}"
                        class="nav-link {{ request()->routeIs('student.submit-assignment') ? 'active' : '' }} text-dark">
                        <i class="fa fa-upload me-2" aria-hidden="true"></i>
                        Submit Assignment
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('student.access-grades') }}"
                        class="nav-link {{ request()->routeIs('student.access-grades') ? 'active' : '' }} text-dark">
                        <i class="fa fa-file-word-o me-2" aria-hidden="true"></i>
                        Access Grades
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('student.financial-status') }}"
                        class="nav-link {{ request()->routeIs('student.financial-status') ? 'active' : '' }} text-dark">
                        <i class="fa fa-credit-card-alt me-2" aria-hidden="true"></i>
                        Financial Status
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('student.settings') }}"
                        class="nav-link {{ request()->routeIs('student.settings') ? 'active' : '' }} text-dark">
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
