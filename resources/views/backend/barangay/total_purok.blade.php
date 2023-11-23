@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Community</li>
            <li class="breadcrumb-item active" aria-current="page">Purok</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Barangay Imbatug Purok</h6>
                    <div class="accordion" id="FaqAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Purok 1
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#FaqAccordion">
                                <div class="accordion-body">
                                    <ul class="list-group">
                                        <li class="list-group-item text-muted">
                                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                                <a style="text-decoration: none; color: inherit;">Barangay Imbatug Purok 1 Residents
                                                </a>
                                                <span>
                                                    <a href="{{ route('purok.one.residents') }}" style="text-decoration: none; color: inherit;" data-bs-toggle="tooltip" data-bs-placement="top" title="View">
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
                                    Purok 2
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#FaqAccordion">
                                <div class="accordion-body">
                                    <ul class="list-group">
                                        <li class="list-group-item text-muted">
                                        <div style="display: flex; justify-content: space-between; align-items: center;">
                                                <a style="text-decoration: none; color: inherit;">Barangay Imbatug Purok 2 Residents
                                                </a>
                                                <span>
                                                    <a href="{{ route('purok.two.residents') }}" style="text-decoration: none; color: inherit;" data-bs-toggle="tooltip" data-bs-placement="top" title="View">
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
                                    Purok 3
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#FaqAccordion">
                                <div class="accordion-body">
                                    <ul class="list-group">
                                        <li class="list-group-item text-muted">
                                        <div style="display: flex; justify-content: space-between; align-items: center;">
                                                <a style="text-decoration: none; color: inherit;">Barangay Imbatug Purok 3 Residents
                                                </a>
                                                <span>
                                                    <a href="{{ route('purok.three.residents') }}" style="text-decoration: none; color: inherit;" data-bs-toggle="tooltip" data-bs-placement="top" title="View">
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
                                    Purok 4
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                data-bs-parent="#FaqAccordion">
                                <div class="accordion-body">
                                    <ul class="list-group">
                                        <li class="list-group-item text-muted">
                                        <div style="display: flex; justify-content: space-between; align-items: center;">
                                                <a style="text-decoration: none; color: inherit;">Barangay Imbatug Purok 4 Residents
                                                </a>
                                                <span>
                                                    <a href="{{ route('purok.four.residents') }}" style="text-decoration: none; color: inherit;" data-bs-toggle="tooltip" data-bs-placement="top" title="View">
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
                                    Purok 5
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                                data-bs-parent="#FaqAccordion">
                                <div class="accordion-body">
                                    <ul class="list-group">
                                        <li class="list-group-item text-muted">
                                        <div style="display: flex; justify-content: space-between; align-items: center;">
                                                <a style="text-decoration: none; color: inherit;">Barangay Imbatug Purok 5 Residents
                                                </a>
                                                <span>
                                                    <a href="{{ route('purok.five.residents') }}" style="text-decoration: none; color: inherit;" data-bs-toggle="tooltip" data-bs-placement="top" title="View">
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
                                    Purok 6
                                </button>
                            </h2>
                            <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                                data-bs-parent="#FaqAccordion">
                                <div class="accordion-body">
                                    <ul class="list-group">
                                        <li class="list-group-item text-muted">
                                        <div style="display: flex; justify-content: space-between; align-items: center;">
                                                <a style="text-decoration: none; color: inherit;">Barangay Imbatug Purok 6 Residents
                                                </a>
                                                <span>
                                                    <a href="{{ route('purok.six.residents') }}" style="text-decoration: none; color: inherit;" data-bs-toggle="tooltip" data-bs-placement="top" title="View">
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
                                    Purok 7
                                </button>
                            </h2>
                            <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven"
                                data-bs-parent="#FaqAccordion">
                                <div class="accordion-body">
                                    <ul class="list-group">
                                        <li class="list-group-item text-muted">
                                        <div style="display: flex; justify-content: space-between; align-items: center;">
                                                <a style="text-decoration: none; color: inherit;">Barangay Imbatug Purok 7 Residents
                                                </a>
                                                <span>
                                                    <a href="{{ route('purok.seven.residents') }}" style="text-decoration: none; color: inherit;" data-bs-toggle="tooltip" data-bs-placement="top" title="View">
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
                            <h2 class="accordion-header" id="headingEight">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                    Purok 8
                                </button>
                            </h2>
                            <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight"
                                data-bs-parent="#FaqAccordion">
                                <div class="accordion-body">
                                    <ul class="list-group">
                                        <li class="list-group-item text-muted">
                                        <div style="display: flex; justify-content: space-between; align-items: center;">
                                                <a style="text-decoration: none; color: inherit;">Barangay Imbatug Purok 8 Residents
                                                </a>
                                                <span>
                                                    <a href="{{ route('purok.eight.residents') }}" style="text-decoration: none; color: inherit;" data-bs-toggle="tooltip" data-bs-placement="top" title="View">
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
                            <h2 class="accordion-header" id="headingNine">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                    Purok 9
                                </button>
                            </h2>
                            <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingNine"
                                data-bs-parent="#FaqAccordion">
                                <div class="accordion-body">
                                    <ul class="list-group">
                                        <li class="list-group-item text-muted">
                                        <div style="display: flex; justify-content: space-between; align-items: center;">
                                                <a style="text-decoration: none; color: inherit;">Barangay Imbatug Purok 9 Residents
                                                </a>
                                                <span>
                                                    <a href="{{ route('purok.nine.residents') }}" style="text-decoration: none; color: inherit;" data-bs-toggle="tooltip" data-bs-placement="top" title="View">
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
