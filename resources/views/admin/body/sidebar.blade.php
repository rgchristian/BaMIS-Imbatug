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
          <li class="nav-item nav-category">Forms</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false" aria-controls="emails">
              <i class="link-icon" data-feather="file-text"></i>
              <span class="link-title">Certificates</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="emails">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{ route('barangay.certificates') }}" class="nav-link">All Certificates</a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('barangay.certificate') }}" class="nav-link">Barangay Certificate</a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">Certiicate 1</a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">Certiicate 2</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#tables" role="button" aria-expanded="false" aria-controls="tables">
              <i class="link-icon" data-feather="file-text"></i>
              <span class="link-title">Clearances</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="tables">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{ route('barangay.clearances') }}" class="nav-link">All Clearances</a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('barangay.clearance') }}" class="nav-link">Barangay Clearance</a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">Clearance 1</a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">Clearance 2</a>
                </li>
              </ul>
            </div>
          </li>
          
          <li class="nav-item nav-category">Records</li>
          <li class="nav-item">
          <a href="{{ route('barangay.attendance.records') }}" class="nav-link">
              <i class="link-icon" data-feather="book"></i>
              <span class="link-title">Attendance</span>
            </a>
            <div class="collapse" id="general-pages">
              <ul class="nav sub-menu">
              </ul>
            </div>
          </li>
          <li class="nav-item">
          <a href="{{ route('barangay.blotter.records') }}" class="nav-link">
              <i class="link-icon" data-feather="book"></i>
              <span class="link-title">Blotter</span>
            </a>
          </li>
          <li class="nav-item nav-category">Earnings</li>
          <li class="nav-item">
            <a href="{{ route('barangay.revenues') }}" class="nav-link">
              <i class="link-icon" data-feather="dollar-sign"></i>
              <span class="link-title">Revenues</span>
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
        <h5 class="text-muted mb-2"><strong>Theme:</strong></h6>
        <!-- <div class="mb-3 pb-3 border-bottom">
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
        </div> -->
        <div class="theme-wrapper">
        <h6 class="text-muted mb-2">Dark</h6>
          <a class="theme-item active" href="">
            <img src="{{ asset('backend/assets/images/screenshots/dark.jpg') }}" alt="dark theme">
          </a>
          <h6 class="text-muted mb-2">Light</h6>
          <a class="theme-item" href="">
            <img src="{{ asset('backend/assets/images/screenshots/light.jpg') }}" alt="light theme">
          </a>
          
        </div>
      </div>
    </nav>
    

    