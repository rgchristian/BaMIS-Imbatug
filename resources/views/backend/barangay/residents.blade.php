@extends('admin.admin_dashboard')
@section('admin')

<style>
  .table-red {
    background-color: #FF7276; /* Change this to the color you want for rows with a case */
    color: #FF7276; /* Change this to the text color for rows with a case */
}
.table-yellow {
    background-color: #F1EB9C; /* Change this to the color you want for rows with a case */
    color: #F1EB9C; /* Change this to the text color for rows with a case */
}
.table-orange {
    background-color: #FCD299; /* Change this to the color you want for rows with a case */
    color: #FCD299; /* Change this to the text color for rows with a case */
}

</style>

<div class="page-content">

<nav class="page-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Community</li>
						<li class="breadcrumb-item active" aria-current="page">Residents</li>
					</ol>
				</nav>


<nav class="page-breadcrumb">
					<ol class="breadcrumb">
            <a href="{{ route('add.resident') }}" class="btn btn-inverse-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Add barangay resident">Add</a> &nbsp;&nbsp;&nbsp;&nbsp;
            <a href="#" class="btn btn-inverse-light btn-icon-text" data-bs-toggle="modal" data-bs-target="#importModal" data-bs-placement="top" title="Import">
                <i class="btn-icon-prepend" data-feather="download"></i>Import
            </a> &nbsp;&nbsp;
            <a href="{{ route('export.residents.phone') }}" class="btn btn-inverse-info btn-icon-text" data-bs-toggle="tooltip" data-bs-placement="top" title="Export"><i class="btn-icon-prepend" data-feather="upload"></i>Export</a> &nbsp;&nbsp;
            <a href="{{ route('archive.residents') }}" class="btn btn-inverse-danger btn-icon-text" data-bs-toggle="tooltip" data-bs-placement="top" title="Archive"><i class="btn-icon-prepend" data-feather="archive"></i>Archive</a>
					</ol>
				</nav>

        <!-- Modal -->
        <div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="importModalLabel">Import Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="tooltip" data-bs-placement="top" title="Close"></button>
              </div>
              <div class="modal-body">
                <!-- Add your import form or content here -->
                <form action="{{ route('import.residents.phone') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <!-- Add your form fields here, e.g., file input -->
                  <input type="file" name="import_residents_phone_numbers" class="form-control" required>
                  <br>
                  <button type="submit" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Import">Import</button>
                </form>
              </div>
            </div>
          </div>
        </div>

				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">Barangay Residents</h6>
                <!-- <p class="text-muted mb-3">Barangay Imbatug<a href="#"> residents</a>.</p> -->
                <p class="text-muted mb-3">Barangay Imbatug<a href="#"> residents</a>.</p>
                <div class="d-flex align-items-baseline position-absolute top-0 end-0 m-3">
                            <i class="link-icon" data-feather="help-circle" data-bs-toggle="tooltip" data-bs-placement="left" title="The color coding system is used to denote different resident statuses: White signifies a well-behaved resident, Yellow represents an inactive resident, Red indicates a resident with unresolved case(s), and Orange signifies an inactive resident with unsettled case(s)."></i>
                            </div>
                <div class="table-responsive">
                  <table id="dataTableExample" class="table border-secondary border-top table-bordered table-hover">
                    <thead>
                      <tr>
                        <th style="text-align: center;">Id</th>
                        <th style="text-align: center;">QR Code</th>
                        <th style="text-align: center;">Name</th>
                        <th style="text-align: center;">Photo</th>
                        <th style="text-align: center;">Birthdate</th>
                        <th style="text-align: center;">Age</th>
                        <th style="text-align: center;">Sex</th>
                        <th style="text-align: center;">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($residents as $key => $barangay_residents)
                   
    @php
        $hasCase = $barangay_residents->moral === 'Has Unsettled Case';
        $inactive = $barangay_residents->active_participation === 'Inactive';
        $rowClass = '';

        if ($hasCase) {
            $rowClass .= ' table-red';
        }

        if ($inactive) {
            if ($rowClass) {
                $rowClass .= ' ';
            }
            $rowClass .= ' table-yellow';
        }

        if ($hasCase && $inactive) {
            if ($rowClass) {
                $rowClass .= ' ';
            }
            $rowClass .= ' table-orange';
        }
    @endphp
  
  <tr class="{{ $rowClass }}">
    <td style="text-align: center;">{{ $key+1 }}</td>
    <td style="text-align: center;">
    @if ($barangay_residents->household_representative == 'Yes')
        {!! DNS2D::getBarcodeSVG($barangay_residents->qr_code, 'QRCODE', 1.7, 1.7, 'white') !!}
    @else
        
    @endif
</td>
    <td style="text-align: center;">{{ $barangay_residents->name }}</td>
    <td style="text-align: center;">
      <img class="rounded-circle resident-image" 
          src="{{ (!empty($barangay_residents->photo)) ? asset($barangay_residents->photo) : url('upload/no_image.png') }}" 
          alt="{{ (!empty($barangay_residents->photo)) ? '' : 'default_profile' }}">
    </td>
    <td style="text-align: center;">
      @if(!empty($barangay_residents->birthdate))
          {{ date('Y-m-d', strtotime($barangay_residents->birthdate)) }}
      @endif
    </td>
    <td style="text-align: center;">
    @if(!empty($barangay_residents->age))
        {{ $barangay_residents->age }}
    @endif
    </td>
    <td style="text-align: center;">{{ $barangay_residents->sex }}</td>
    <td>
      <div style="text-align: center;">
      <a href="{{ route('download.qr', $barangay_residents->id) }}">
          <button type="button" class="btn btn-inverse-secondary btn-icon btn-xs" data-bs-toggle="tooltip" data-bs-placement="top" title="Download QR Code">
            <i data-feather="download"></i>
          </button>
        </a>
        <a href="{{ route('view.resident', $barangay_residents->id) }}">
          <button type="button" class="btn btn-inverse-info btn-icon btn-xs" data-bs-toggle="tooltip" data-bs-placement="top" title="View">
            <i data-feather="eye"></i>
          </button>
        </a>
        <a href="{{ route('edit.resident', $barangay_residents->id) }}">
          <button type="button" class="btn btn-inverse-warning btn-icon btn-xs" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
            <i data-feather="edit"></i>
          </button>
        </a>
        <a href="{{ route('delete.resident', $barangay_residents->id) }}" id="archive">
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