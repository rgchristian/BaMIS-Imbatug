@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">

				<nav class="page-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
						<li class="breadcrumb-item active" aria-current="page">Records</li>
                        <li class="breadcrumb-item active" aria-current="page">Blotter</li>
					</ol>
				</nav>

                <nav class="page-breadcrumb">
    <ol class="breadcrumb">
      <a href="{{ route('create.blotter.record') }}" class="btn btn-inverse-primary" data-bs-toggle="tooltip" data-bs-placement="right" title="Create blotter record">Create</a> &nbsp;&nbsp;&nbsp;&nbsp; 
      <a href="" class="btn btn-inverse-light btn-icon-text align-float-left" data-bs-toggle="tooltip" data-bs-placement="top" title="Import"><i class="btn-icon-prepend" data-feather="download"></i>Import</a> &nbsp;&nbsp;
            <a href="" class="btn btn-inverse-info btn-icon-text align-float-left" data-bs-toggle="tooltip" data-bs-placement="top" title="Export"><i class="btn-icon-prepend" data-feather="upload"></i>Export</a>
    </ol>
  </nav>

				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">Blotter Records</h6>
                <p class="text-muted mb-3">Barangay Imbatug <a href="#"> blotter records</a>.</p>
                

                <div class="table-responsive">
                  <table id="dataTableExample" class="table border-secondary border-top table-bordered table-hover table-striped">
                    <thead>
                      <tr>
                        <th style="text-align: center;">ID</th>
                        <th style="text-align: center;">Incident Type</th>
                        <th style="text-align: center;">Blotter Status</th>
                        <th style="text-align: center;">Incident Date</th>
                        <th style="text-align: center;">Date Recorded</th>
                        <th style="text-align: center;">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($blotter_records as $key => $blotter_rec)
                      <tr>
                        <td style="text-align: center;">{{ $key+1 }}</td>
                        <td style="text-align: center;">{{ $blotter_rec->incident_type }}</td>
                        <td style="text-align: center;">
                      @php
                        $statusClass = '';
                        switch($blotter_rec->incident_status) {
                        case 'New':
                            $statusClass = 'status-new';
                            break;
                        case 'Pending':
                            $statusClass = 'status-pending';
                            break;
                        case 'Ongoing':
                            $statusClass = 'status-ongoing';
                            break;
                        case 'Finished':
                            $statusClass = 'status-finished';
                            break;
                        }
                      @endphp
    <span class="status-badge {{ $statusClass }}">{{ $blotter_rec->incident_status }}</span>
</td>

                        <td style="text-align: center;">{{ date('Y-m-d H:i', strtotime($blotter_rec->incident_date)) }}</td>
                        <td style="text-align: center;">{{ date('Y-m-d H:i', strtotime($blotter_rec->incident_date_recorded)) }}</td>
                        <td>
                        <div style="text-align: center;">
                        
                        

        <a href="{{ route('mark.blotter.record.as.done', $blotter_rec->id) }}" onclick="event.preventDefault(); document.getElementById('mark-as-done-form-{{ $blotter_rec->id }}').submit();">
        <button type="button" class="btn btn-inverse-success btn-icon btn-xs" data-bs-toggle="tooltip" data-bs-placement="top" title="Mark as done">
                          <i data-feather="check"></i>
                        </button><form id="mark-as-done-form-{{ $blotter_rec->id }}" action="{{ route('mark.blotter.record.as.done', $blotter_rec->id) }}" method="POST" style="display: none;">
            @csrf
        </form>

                        <a href="{{ route('view.blotter.record', $blotter_rec->id) }}">
                        <button type="button" class="btn btn-inverse-info btn-icon btn-xs" data-bs-toggle="tooltip" data-bs-placement="top" title="View more">
                          <i data-feather="eye"></i>
                        </button>
                        </a>
                        <a href="{{ route('edit.blotter.record', $blotter_rec->id) }}">
                        <button type="button" class="btn btn-inverse-warning btn-icon btn-xs" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                          <i data-feather="edit"></i>
                        </button>
                        </a>
                        <a href="{{ route('delete.blotter.record', $blotter_rec->id) }}" id="delete">
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