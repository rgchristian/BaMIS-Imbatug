@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">


<nav class="page-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Community</li>
						<li class="breadcrumb-item active" aria-current="page">Officials</li>
					</ol>
				</nav>

  <nav class="page-breadcrumb">
    <ol class="breadcrumb">
      <a href="{{ route('add.official') }}" class="btn btn-inverse-primary" data-bs-toggle="tooltip" data-bs-placement="right" title="Add barangay official">Add</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="" class="btn btn-outline-light btn-icon-text" data-bs-toggle="tooltip" data-bs-placement="top" title="Import"><i class="btn-icon-prepend" data-feather="download"></i>Import</a>&nbsp;&nbsp;
            <a href="" class="btn btn-info btn-icon-text" data-bs-toggle="tooltip" data-bs-placement="top" title="Export"><i class="btn-icon-prepend" data-feather="upload"></i>Export</a>
    </ol>
  </nav>
  

  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      
      <div class="card">
        <div class="card-body">
          <h6 class="card-title">Barangay officials</h6>
          <p class="text-muted mb-3">Barangay Imbatug<a href="#"> officials</a>.</p>
          <div class="table-responsive">
            <table id="dataTableExample" class="table border-secondary border-top table-bordered table-hover table-striped">
              <thead>
                <tr>
                  <th style="text-align: center;">Id</th>
                  <th style="text-align: center;">Name</th>
                  <th style="text-align: center;">Position</th>
                  <th style="text-align: center;">Status</th>
                  <th style="text-align: center;">Term start</th>
                  <th style="text-align: center;">Term end</th>
                  <th style="text-align: center;">Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($officials_staffs as $key => $barangay_officials)
                <tr>
                  <td style="text-align: center;">{{ $key+1 }}</td>
                  <td style="text-align: center;">{{ $barangay_officials->name }}</td>
                  <td style="text-align: center;">{{ $barangay_officials->position }}</td>
                  <td style="text-align: center;">
                    @if($barangay_officials->status === 'Active')
                      <span class="status-badge badge badge-success">Active</span>
                    @else
                      <span class="status-badge badge badge-danger">Inactive</span>
                    @endif
                  </td>
                  @php
                    $termStart = \Carbon\Carbon::parse($barangay_officials->term_start)->toDateString();
                    $termEnd = \Carbon\Carbon::parse($barangay_officials->term_end)->toDateString();
                  @endphp
                  <td style="text-align: center;">{{ $termStart }}</td>
                  <td style="text-align: center;">{{ $termEnd }}</td>
                  <td>
                    <div style="text-align: center;">
                      <a href="{{ route('edit.official', $barangay_officials->id) }}">
                        <button type="button" class="btn btn-inverse-warning btn-icon btn-xs" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                          <i data-feather="edit"></i>
                        </button>
                      </a>
                      <a href="{{ route('delete.official', $barangay_officials->id) }}" id="delete">
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
