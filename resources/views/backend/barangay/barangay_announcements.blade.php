@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">

<nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Releases</li>
            <li class="breadcrumb-item active" aria-current="page">Announcements</li>
        </ol>
    </nav>

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{ route('create.announcement') }}" class="btn btn-inverse-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Create barangay announcement">Create</a> &nbsp;&nbsp;&nbsp;&nbsp; 
      <a href="" class="btn btn-inverse-light btn-icon-text align-float-left" data-bs-toggle="tooltip" data-bs-placement="top" title="Import"><i class="btn-icon-prepend" data-feather="download"></i>Import</a> &nbsp;&nbsp;
            <a href="" class="btn btn-inverse-info btn-icon-text align-float-left" data-bs-toggle="tooltip" data-bs-placement="top" title="Export"><i class="btn-icon-prepend" data-feather="upload"></i>Export</a>
        </ol>
    </nav>

				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">Announcements</h6>
                <p class="text-muted mb-3">Barangay Imbatug <a href="#"> announcements</a>.</p>
                <div class="table-responsive">
                  <table id="dataTableExample" class="table border-secondary border-top table-bordered table-hover">
                    <thead>
                      <tr>
                        <th style="text-align: center;">ID</th>
                        <th style="text-align: center;">Announcement Name</th>
                        <th style="text-align: center;">Photo</th>
                        <th style="text-align: center;">Announcement Details</th>
                        <th style="text-align: center;">Event Date</th>
                        <th style="text-align: center;">Announcement Created</th>
                        <th style="text-align: center;">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                     @foreach($announcements as $key => $announcements)
                      <tr>
                        <td style="text-align: center;">{{ $key+1 }}</td>
                        <td style="text-align: center;">{{ $announcements->announcement_name }}</td>
                        <td style="text-align: center;"><img class="rounded-circle official-image" src="{{ asset($announcements->announcement_photo) }}" alt="photo"></td>
                        <td style="text-align: center;">{{ $announcements->announcement_details }}</td>
                        <td style="text-align: center;">{{ date('Y-m-d H:i', strtotime($announcements->announcement_date_time)) }}</td>
                        <td style="text-align: center;">{{ date('Y-m-d H:i', strtotime($announcements->announcement_date_time_created)) }}</td>
                        <td>
                        <div style="text-align: center;">
                        <a href="#">
                        <button type="button" class="btn btn-inverse-info btn-icon btn-xs" data-bs-toggle="tooltip" data-bs-placement="top" title="View more">
                          <i data-feather="eye"></i>
                        </button>
                        </a>
                        <a href="#">
                        <button type="button" class="btn btn-inverse-warning btn-icon btn-xs" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                          <i data-feather="edit"></i>
                        </button>
                        </a>
                        <a href="#">
                        <button type="button" class="btn btn-inverse-danger btn-icon btn-xs" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
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
