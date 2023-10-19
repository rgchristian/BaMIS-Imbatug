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
                      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        About the Project
                      </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#FaqAccordion">
                      <div class="accordion-body text-muted">
                        Title: <strong>A Web-based Barangay Management Information System with SMS Notification for Barangay Imbatug</strong>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        About the Developers
                      </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#FaqAccordion">
                      <div class="accordion-body">
                      <ul class="list-group">
                      <li class="list-group-item text-muted">
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <a style="text-decoration: none; color: inherit;">
                                    Cagampang, RG Christian D.
                                </a>
                                <span>
                                    <a href="https://www.facebook.com/konogaki1/" style="text-decoration: none; color: inherit;" target="_blank">
                                        <i data-feather="facebook" style="margin-right: 10px;"></i>
                                    </a>
                                    <a href="https://github.com/rgchristian" style="text-decoration: none; color: inherit;" target="_blank">
                                        <i data-feather="github" style="margin-right: 10px;"></i>
                                    </a>
                                    <a href="mailto:rgchristiancagampang@gmail.com" style="text-decoration: none; color: inherit;" target="_blank">
                                        <i data-feather="mail"></i>
                                    </a>
                                </span>
                            </div>
                        </li>
                        <li class="list-group-item text-muted">
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <a style="text-decoration: none; color: inherit;">
                                    Justalero, Jesse James A.
                                </a>
                                <span>
                                    <a href="https://facebook.com/yourfacebookprofile" style="text-decoration: none; color: inherit;" target="_blank">
                                        <i data-feather="facebook" style="margin-right: 10px;"></i>
                                    </a>
                                    <a href="https://github.com/yourgithubprofile" style="text-decoration: none; color: inherit;" target="_blank">
                                        <i data-feather="github" style="margin-right: 10px;"></i>
                                    </a>
                                    <a href="mailto:your-email@example.com" style="text-decoration: none; color: inherit;" target="_blank">
                                        <i data-feather="mail"></i>
                                    </a>
                                </span>
                            </div>
                        </li>
                        <li class="list-group-item text-muted">
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <a style="text-decoration: none; color: inherit;">
                                    Mondejar, Honeylee M.
                                </a>
                                <span>
                                    <a href="https://facebook.com/yourfacebookprofile" style="text-decoration: none; color: inherit;" target="_blank">
                                        <i data-feather="facebook" style="margin-right: 10px;"></i>
                                    </a>
                                    <a href="https://github.com/yourgithubprofile" style="text-decoration: none; color: inherit;" target="_blank">
                                        <i data-feather="github" style="margin-right: 10px;"></i>
                                    </a>
                                    <a href="mailto:your-email@example.com" style="text-decoration: none; color: inherit;" target="_blank">
                                        <i data-feather="mail"></i>
                                    </a>
                                </span>
                            </div>
                        </li>
                        <li class="list-group-item text-muted">
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <a style="text-decoration: none; color: inherit;">
                                    Tachado, Andres F.
                                </a>
                                <span>
                                    <a href="https://facebook.com/yourfacebookprofile" style="text-decoration: none; color: inherit;" target="_blank">
                                        <i data-feather="facebook" style="margin-right: 10px;"></i>
                                    </a>
                                    <a href="https://github.com/yourgithubprofile" style="text-decoration: none; color: inherit;" target="_blank">
                                        <i data-feather="github" style="margin-right: 10px;"></i>
                                    </a>
                                    <a href="mailto:your-email@example.com" style="text-decoration: none; color: inherit;" target="_blank">
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
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Technology Used 
                      </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#FaqAccordion">
                      <div class="accordion-body">
                      <ul class="list-group">
                        <li class="list-group-item text-muted">PHP 8.2.4</li>
                        <li class="list-group-item text-muted">Laravel 10.15</li>
                      </ul>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFour">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        Version
                      </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#FaqAccordion">
                      <div class="accordion-body text-muted">
                        <strong>1.0</strong>
                      </div>
                    </div>
                  </div>
                  <!-- <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFive">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        How do airplanes stay up?
                      </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#FaqAccordion">
                      <div class="accordion-body">
                        Life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                      </div>
                    </div>
                  </div> -->
                  <!-- <div class="accordion-item">
                    <h2 class="accordion-header" id="headingSix">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                        How can go to star?
                      </button>
                    </h2>
                    <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#FaqAccordion">
                      <div class="accordion-body">
                        Richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                      </div> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
					</div>
				</div>
			</div>


@endsection