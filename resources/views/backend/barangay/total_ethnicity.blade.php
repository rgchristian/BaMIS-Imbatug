@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Community</li>
            <li class="breadcrumb-item active" aria-current="page">Ethnicity</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Barangay Imbatug Ethnicity</h6>
                    <div class="accordion" id="FaqAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Talaandig
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#FaqAccordion">
                                <div class="accordion-body">
                                    <ul class="list-group">
                                        <li class="list-group-item text-muted">
                                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                                <a style="text-decoration: none; color: inherit;">Barangay Imbatug Talaandig Residents
                                                </a>
                                                <span>
                                                    <a href="{{ route('talaandig.residents') }}" style="text-decoration: none; color: inherit;" data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                        <i data-feather="external-link"></i>
                                                    </a>
                                                </span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Higaonon
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#FaqAccordion">
                                <div class="accordion-body">
                                    <ul class="list-group">
                                        <li class="list-group-item text-muted">
                                        <div style="display: flex; justify-content: space-between; align-items: center;">
                                                <a style="text-decoration: none; color: inherit;">Barangay Imbatug Higaonon Residents
                                                </a>
                                                <span>
                                                    <a href="{{ route('higaonon.residents') }}" style="text-decoration: none; color: inherit;" data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                        <i data-feather="external-link"></i>
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
                                    Bukidnon
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#FaqAccordion">
                                <div class="accordion-body">
                                    <ul class="list-group">
                                        <li class="list-group-item text-muted">
                                        <div style="display: flex; justify-content: space-between; align-items: center;">
                                                <a style="text-decoration: none; color: inherit;">Barangay Imbatug Bukidnon Residents
                                                </a>
                                                <span>
                                                    <a href="{{ route('bukidnon.residents') }}" style="text-decoration: none; color: inherit;" data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                        <i data-feather="external-link"></i>
                                                    </a>
                                                </span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    Umayamnon
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                data-bs-parent="#FaqAccordion">
                                <div class="accordion-body">
                                    <ul class="list-group">
                                        <li class="list-group-item text-muted">
                                        <div style="display: flex; justify-content: space-between; align-items: center;">
                                                <a style="text-decoration: none; color: inherit;">Barangay Imbatug Umayamnon Residents
                                                </a>
                                                <span>
                                                    <a href="{{ route('umayamnon.residents') }}" style="text-decoration: none; color: inherit;" data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                        <i data-feather="external-link"></i>
                                                    </a>
                                                </span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    Matigsalug
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                                data-bs-parent="#FaqAccordion">
                                <div class="accordion-body">
                                    <ul class="list-group">
                                        <li class="list-group-item text-muted">
                                        <div style="display: flex; justify-content: space-between; align-items: center;">
                                                <a style="text-decoration: none; color: inherit;">Barangay Imbatug Matigsalug Residents
                                                </a>
                                                <span>
                                                    <a href="{{ route('matigsalug.residents') }}" style="text-decoration: none; color: inherit;" data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                        <i data-feather="external-link"></i>
                                                    </a>
                                                </span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingSix">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                    Manobo
                                </button>
                            </h2>
                            <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                                data-bs-parent="#FaqAccordion">
                                <div class="accordion-body">
                                    <ul class="list-group">
                                        <li class="list-group-item text-muted">
                                        <div style="display: flex; justify-content: space-between; align-items: center;">
                                                <a style="text-decoration: none; color: inherit;">Barangay Imbatug Manobo Residents
                                                </a>
                                                <span>
                                                    <a href="{{ route('manobo.residents') }}" style="text-decoration: none; color: inherit;" data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                        <i data-feather="external-link"></i>
                                                    </a>
                                                </span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingSeven">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                    Tigwahanon
                                </button>
                            </h2>
                            <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven"
                                data-bs-parent="#FaqAccordion">
                                <div class="accordion-body">
                                    <ul class="list-group">
                                        <li class="list-group-item text-muted">
                                        <div style="display: flex; justify-content: space-between; align-items: center;">
                                                <a style="text-decoration: none; color: inherit;">Barangay Imbatug Tigwahanon Residents
                                                </a>
                                                <span>
                                                    <a href="{{ route('tigwahanon.residents') }}" style="text-decoration: none; color: inherit;" data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                        <i data-feather="external-link"></i>
                                                    </a>
                                                </span>
                                            </div>
                                        </li>
                                    </ul>
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
