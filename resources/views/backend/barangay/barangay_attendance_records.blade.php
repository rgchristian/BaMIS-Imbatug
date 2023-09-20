@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">

<nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Records</li>
            <li class="breadcrumb-item active" aria-current="page">Attendance</li>
        </ol>
    </nav>

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{ route('create.attendance.record') }}" class="btn btn-inverse-primary" data-bs-toggle="tooltip" data-bs-placement="right" title="Create barangay attendance record">Create</a>
        </ol>
    </nav>

				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">Attendance Records</h6>
                <p class="text-muted mb-3">Barangay Imbatug <a href="#"> attendance records</a>.</p>
                <div class="table-responsive">
                <table id="dataTableExample" class="table border-secondary border-top table-bordered table-hover table-striped">
                    <thead>
                      <tr>
                        <th style="text-align: center;">ID</th>
                        <th style="text-align: center;">Event Name</th>
                        <th style="text-align: center;">Event Location</th>
                        <th style="text-align: center;">Event Date</th>
                        <th style="text-align: center;">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($attendance as $key => $attendance)
                      <tr>
                        <td style="text-align: center;">{{ $key+1 }}</td>
                        <td style="text-align: center;">{{ $attendance->event_name }}</td>
                        <td style="text-align: center;">{{ $attendance->event_location }}</td>
                        <td style="text-align: center;">{{ $attendance->event_date_time }}</td>
                        <td>
                        <div style="text-align: center;">
                        <a href="{{ route('view.attendance.record', $attendance->id) }}">
                        <button type="button" class="btn btn-inverse-light btn-icon btn-xs" data-bs-toggle="tooltip" data-bs-placement="top" title="View more">
                          <i data-feather="eye"></i>
                        </button>
                        </a>
                        <a href="{{ route('edit.attendance.record', $attendance->id) }}">
                        <button type="button" class="btn btn-inverse-light btn-icon btn-xs" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                          <i data-feather="edit"></i>
                        </button>
                        </a>
                        <a href="{{ route('delete.attendance.record', $attendance->id) }}" id="delete">
                        <button type="button" class="btn btn-inverse-light btn-icon btn-xs" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                          <i data-feather="trash"></i>
                        </button>
                        </a>
                        </div>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
					</div>
				</div>

			</div>

@endsection