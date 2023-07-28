@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
  <nav class="page-breadcrumb">
    <ol class="breadcrumb">
      <a href="{{ route('add.official') }}" class="btn btn-inverse-primary" title="Add barangay official">Add</a>
    </ol>
  </nav>

  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      
      <div class="card">
        <div class="card-body">
          <h6 class="card-title">Barangay officials</h6>
          <p class="text-muted mb-3">Barangay Imbatug<a href="#"> officials</a>.</p>
          <div class="table-responsive">
            <table id="dataTableExample" class="table">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th style="text-align: center;">Position</th>
                  <th style="text-align: center;">Status</th>
                  <th style="text-align: center;">Term start</th>
                  <th style="text-align: center;">Term end</th>
                  <th style="text-align: center;">Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($types as $key => $officials)
                <tr>
                  <td>{{ $key+1 }}</td>
                  <td>{{ $officials->name }}</td>
                  <td style="text-align: center;">{{ $officials->position }}</td>
                  <td style="text-align: center;">
                    @if($officials->status === 'Active')
                      <span class="status-badge badge badge-success">Active</span>
                    @else
                      <span class="status-badge badge badge-danger">Inactive</span>
                    @endif
                  </td>
                  @php
                    $termStart = \Carbon\Carbon::parse($officials->term_start)->toDateString();
                    $termEnd = \Carbon\Carbon::parse($officials->term_end)->toDateString();
                  @endphp
                  <td style="text-align: center;">{{ $termStart }}</td>
                  <td style="text-align: center;">{{ $termEnd }}</td>
                  <td>
                    <div style="text-align: center;">
                      <a href="{{ route('edit.official', $officials->id) }}">
                        <button type="button" class="btn btn-primary btn-icon btn-xs" title="Edit">
                          <i data-feather="edit"></i>
                        </button>
                      </a>
                      <a href="{{ route('delete.official', $officials->id) }}" id="delete">
                        <button type="button" class="btn btn-primary btn-icon btn-xs" title="Delete">
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
