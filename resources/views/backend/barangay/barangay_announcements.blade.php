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
            <a href="" class="btn btn-inverse-primary" data-bs-toggle="tooltip" data-bs-placement="right" title="Create barangay announcement">Create</a>
        </ol>
    </nav>

    

</div>

@endsection
