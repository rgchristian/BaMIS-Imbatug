@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
<nav class="page-breadcrumb">
					<ol class="breadcrumb">
            <a href="{{ route('add.resident') }}" class="btn btn-inverse-primary" title="Add barangay resident">Add</a>
					</ol>
				</nav>

				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">Barangay Residents</h6>
                <p class="text-muted mb-3">Barangay Imbatug<a href="#"> residents</a>.</p>
                <div class="table-responsive">
                  <table id="dataTableExample" class="table">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th style="text-align: center;">Photo</th>
                        <th style="text-align: center;">First Name</th>
                        <th style="text-align: center;">Middle Name</th>
                        <th style="text-align: center;">Last Name</th>
                        <th style="text-align: center;">Birthdate</th>
                        <th style="text-align: center;">Birthplace</th>
                        <th style="text-align: center;">Age</th>
                        <th style="text-align: center;">Gender</th>
                        <th style="text-align: center;">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($types as $key => $residents)
                      <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $residents->name }}</td>
                        <td style="text-align: center;">
                                <img class="rounded-circle resident-image" src="{{ asset($residents->photo) }}" alt="profile">
                        </td>
                        <td style="text-align: center;">{{ $residents->first_name }}</td>
                        <td style="text-align: center;">{{ $residents->middle_name }}</td>
                        <td style="text-align: center;">{{ $residents->last_name }}</td>
                        <td style="text-align: center;">{{ $residents->birthdate }}</td>
                        <td style="text-align: center;">{{ $residents->birthplace }}</td>
                        <td style="text-align: center;">{{ $residents->age }}</td>
                        <td style="text-align: center;">{{ $residents->gender }}</td>
                        <td>
                        <div style="text-align: center;">
                        <a href="{{ route('view.resident', $residents->id) }}">
                        <button type="button" class="btn btn-primary btn-icon btn-xs" title="View more">
                          <i data-feather="eye"></i>
                        </button>
                        </a>
                        <a href="{{ route('edit.resident', $residents->id) }}">
                        <button type="button" class="btn btn-primary btn-icon btn-xs" title="Edit">
                          <i data-feather="edit"></i>
                        </button>
                        </a>
                        <a href="{{ route('delete.resident', $residents->id) }}" id="delete">
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