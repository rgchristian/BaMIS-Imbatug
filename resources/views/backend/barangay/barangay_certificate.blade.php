@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">

<div class="row">
					<div class="col-md-12 stretch-card">
						<div class="card">
							<div class="card-body">
								<h6 class="card-title">Barangay Certificate</h6>
									<form>
                                    @csrf
										<div class="row">
											<div class="col-sm-6">
												<div class="mb-3">
													<label class="form-label">Name</label>
													<input type="text" class="form-control" placeholder="Enter first name">
												</div>
											</div><!-- Col -->
											<div class="col-sm-6">
												<div class="mb-3">
													<label class="form-label">Address</label>
													<input type="text" class="form-control" placeholder="Enter address">
												</div>
											</div><!-- Col -->
										</div><!-- Row -->
										<div class="row">
											<div class="col-sm-4">
												<div class="mb-3">
													<label class="form-label">Age</label>
													<input type="text" class="form-control" placeholder="Enter age">
												</div>
											</div><!-- Col -->
											<div class="col-sm-4">
												<div class="mb-3">
													<label class="form-label">Amount</label>
													<select name="h_ownership_status" class="form-select mb-3 form-control">
                                                    <option value="" selected disabled>Select amount</option>
                                                    <option value="Owned">₱50</option>
                                                    <option value="Mortgaged">₱100</option>
                                                    <option value="Mortgaged">₱150</option>
                                                </select> 
												</div>
											</div><!-- Col -->
											<div class="col-sm-4">
												<div class="mb-3">
													<label class="form-label">Date</label>
													<div class="input-group">
                                                    <input type="datetime" id="birthdate" name="birthdate" class="form-control flatpickr-input active" placeholder="Select date" readonly="readonly">
                                                    <span class="input-group-text input-group-addon" data-toggle="">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar">
                                                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                                            <line x1="16" y1="2" x2="16" y2="6"></line>
                                                            <line x1="8" y1="2" x2="8" y2="6"></line>
                                                            <line x1="3" y1="10" x2="21" y2="10"></line>
                                                        </svg>
                                                    </span>
                                                </div> 
												</div>
											</div><!-- Col -->
										</div><!-- Row -->
										<div class="row">
											<div class="col-sm-6">
                                            <div class="mb-3">
										<label for="exampleFormControlTextarea1" class="form-label">Purpose</label>
										<textarea class="form-control" id="exampleFormControlTextarea1" rows="5" placeholder="Enter purpose"></textarea>
									</div>
											</div><!-- Col -->
											<div class="col-sm-6">
												
											</div><!-- Col -->
										</div><!-- Row -->
									</form>
									<button type="button" class="btn btn-primary submit">Generate Certificate</button>
							</div>
						</div>
					</div>
				</div>

</div>

@endsection