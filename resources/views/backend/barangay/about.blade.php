@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Project</li>
            <li class="breadcrumb-item active" aria-current="page">About</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">About</h6>
                    <div class="accordion" id="FaqAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    About the Project
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#FaqAccordion">
                                <div class="accordion-body text-muted">
                                    Title: <strong>A Web-based Barangay Management Information System with SMS
                                        Notification for Barangay Imbatug</strong>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    About the Developers
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#FaqAccordion">
                                <div class="accordion-body">
                                    <ul class="list-group">
                                        <li class="list-group-item text-muted">
                                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                                <a style="text-decoration: none; color: inherit;">Cagampang, RG Christian D.
                                                </a>
                                                <span>
                                                    <a href="https://www.facebook.com/konogaki1/" style="text-decoration: none; color: inherit;"
                                                        target="_blank">
                                                        <i data-feather="facebook" style="margin-right: 10px;"></i>
                                                    </a>
                                                    <a href="https://github.com/rgchristian" style="text-decoration: none; color: inherit;"
                                                        target="_blank">
                                                        <i data-feather="github" style="margin-right: 10px;"></i>
                                                    </a>
                                                    <a href="mailto:rgchristiancagampang@gmail.com" style="text-decoration: none; color: inherit;"
                                                        target="_blank">
                                                        <i data-feather="mail"></i>
                                                    </a>
                                                </span>
                                            </div>
                                        </li>
                                        <li class="list-group-item text-muted">
                                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                                <a style="text-decoration: none; color: inherit;">Justalero, Jesse James A.
                                                </a>
                                                <span>
                                                    <a href="" style="text-decoration: none; color: inherit;"
                                                        target="_blank">
                                                        <i data-feather="facebook" style="margin-right: 10px;"></i>
                                                    </a>
                                                    <a href="" style="text-decoration: none; color: inherit;"
                                                        target="_blank">
                                                        <i data-feather="github" style="margin-right: 10px;"></i>
                                                    </a>
                                                    <a href="" style="text-decoration: none; color: inherit;"
                                                        target="_blank">
                                                        <i data-feather="mail"></i>
                                                    </a>
                                                </span>
                                            </div>
                                        </li><li class="list-group-item text-muted">
                                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                                <a style="text-decoration: none; color: inherit;">Mondejar, Honeylee M.
                                                </a>
                                                <span>
                                                    <a href="" style="text-decoration: none; color: inherit;"
                                                        target="_blank">
                                                        <i data-feather="facebook" style="margin-right: 10px;"></i>
                                                    </a>
                                                    <a href="" style="text-decoration: none; color: inherit;"
                                                        target="_blank">
                                                        <i data-feather="github" style="margin-right: 10px;"></i>
                                                    </a>
                                                    <a href="" style="text-decoration: none; color: inherit;"
                                                        target="_blank">
                                                        <i data-feather="mail"></i>
                                                    </a>
                                                </span>
                                            </div>
                                        </li><li class="list-group-item text-muted">
                                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                                <a style="text-decoration: none; color: inherit;">Tachado, Andres F.
                                                </a>
                                                <span>
                                                    <a href="" style="text-decoration: none; color: inherit;"
                                                        target="_blank">
                                                        <i data-feather="facebook" style="margin-right: 10px;"></i>
                                                    </a>
                                                    <a href="" style="text-decoration: none; color: inherit;"
                                                        target="_blank">
                                                        <i data-feather="github" style="margin-right: 10px;"></i>
                                                    </a>
                                                    <a href="" style="text-decoration: none; color: inherit;"
                                                        target="_blank">
                                                        <i data-feather="mail"></i>
                                                    </a>
                                                </span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Technology Used
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#FaqAccordion">
                                <div class="accordion-body">
                                    <ul class="list-group">
                                        <li class="list-group-item text-muted">PHP 8.2.4</li>
                                        <li class="list-group-item text-muted">Laravel 10.15</li>
                                        <!-- (Add more technologies here) -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    Version
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                data-bs-parent="#FaqAccordion">
                                <div class="accordion-body text-muted">
                                    <strong>1.0</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
