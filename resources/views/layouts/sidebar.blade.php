<div class="sidebar" id="sidebar">
    <div class="logo">
        Logo
        <!-- Mobile Toggle Icon -->
        <i id="mobileToggleSidebar" class="fas fa-bars toggle-btn d-md-none"></i>
    </div>
    <ul id="sidebarMenu">
        <li class="nav-item">
            <a class="nav-link" href="{{route('dashboard')}}">
                <i class="fas fa-home"></i>
                <span>Home</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('tasks.index')}}">
                <i class="fas fa-tasks"></i>
                <span>Task</span>
            </a>
        </li>
        
    </ul>
</div>