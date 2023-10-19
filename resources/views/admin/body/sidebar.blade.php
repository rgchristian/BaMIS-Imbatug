<nav class="sidebar">
      <div class="sidebar-header">
        <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">
          Brgy.<span>Imbatug</span>
        </a>
        <div class="sidebar-toggler not-active">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
      <div class="sidebar-body">
        <ul class="nav">
          <li class="nav-item nav-category">Main</li>
          <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link">
              <i class="link-icon" data-feather="trello"></i>
              <span class="link-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item nav-category">Community</li>
          <li class="nav-item">
          <a href="{{ route('barangay.officials') }}" class="nav-link">
              <i class="link-icon" data-feather="users"></i>
              <span class="link-title">Officials</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('barangay.residents') }}" class="nav-link">
              <i class="link-icon" data-feather="users"></i>
              <span class="link-title">Residents</span>
            </a>
          </li>
          <li class="nav-item nav-category">Services</li>
          <li class="nav-item">
          <a href="{{ route('barangay.certificates') }}" class="nav-link">
              <i class="link-icon" data-feather="file-text"></i>
              <span class="link-title">Certificates</span>
            </a>
          <li class="nav-item">
          <a href="{{ route('barangay.clearances') }}" class="nav-link">
              <i class="link-icon" data-feather="file-text"></i>
              <span class="link-title">Clearances</span>
            </a>
          <li class="nav-item nav-category">Records</li>
          <li class="nav-item">
          <a href="{{ route('barangay.attendance.records') }}" class="nav-link">
              <i class="link-icon" data-feather="archive"></i>
              <span class="link-title">Attendance</span>
            </a>
            <div class="collapse" id="general-pages">
              <ul class="nav sub-menu">
              </ul>
            </div>
          </li>
          <li class="nav-item">
          <a href="{{ route('barangay.blotter.records') }}" class="nav-link">
              <i class="link-icon" data-feather="archive"></i>
              <span class="link-title">Blotter</span>
            </a>
          </li>
          <li class="nav-item nav-category">Earnings</li>
          <li class="nav-item">
            <a href="{{ route('barangay.revenues') }}" class="nav-link">
              <i class="link-icon" data-feather="dollar-sign"></i>
              <span class="link-title">Revenue</span>
            </a>
          </li>
          <li class="nav-item nav-category">Releases</li>
          <li class="nav-item">
            <a href="{{ route('barangay.announcements') }}" class="nav-link">
              <i class="link-icon" data-feather="send"></i>
              <span class="link-title">Announcements</span>
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <nav class="settings-sidebar">
      <div class="sidebar-body">
        <a href="#" class="settings-sidebar-toggler">
          <i data-feather="settings"></i>
        </a>
        <h6 class="text-muted mb-2">Sidebar:</h6>
        <div class="mb-3 pb-3 border-bottom">
          <div class="form-check form-check-inline">
            <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarLight" value="sidebar-light">
            <label class="form-check-label" for="sidebarLight">
              Light
            </label>
          </div>
          <div class="form-check form-check-inline">
            <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarDark" value="sidebar-dark" checked>
            <label class="form-check-label" for="sidebarDark">
              Dark
            </label>
          </div>
        </div>
        <div class="theme-wrapper">
          <h6 class="text-muted mb-2">Light Theme:</h6>
          <a class="theme-item active" href="">
            <img src="{{ asset('backend/assets/images/screenshots/light.jpg') }}" alt="light theme">
          </a>
          <h6 class="text-muted mb-2">Dark Theme:</h6>
          <a class="theme-item" href="">
            <img src="{{ asset('backend/assets/images/screenshots/dark.jpg') }}" alt="light theme">
          </a>
        </div>
      </div>
    </nav>