@extends('frontend.layout.template')
@section('body-content')


		<div role="main" class="main shop py-4">
            <div class="container">

					<div class="row">
						<div class="col">

							<div class="featured-boxes">
								<div class="row">
									<div class="col">
										<div class="featured-box featured-box-primary text-left mt-2">
											<div class="box-content order-history">

                                                {{-- Order History page content area start --}}
                                                <div class="row">
                                                    <!-- Order page left menu bar -->

                                                        <div class="col-2">
                                                          <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                            <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Order History</a>
                                                         </div>
                                                        </div>

                                                    <!-- Order content -->

                                                        <div class="col-10">
                                                          <div class="tab-content" id="v-pills-tabContent">
                                                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                                            {{-- Table start --}}
                                                            <table class="table">
                                                                <thead class="thead-dark">
                                                                    <tr>
                                                                      <th scope="col">SL.</th>
                                                                      <th scope="col">Order ID</th>
                                                                      <th scope="col">Order Date</th>
                                                                      <th scope="col">Items</th>
                                                                      <th scope="col">Total Amount</th>
                                                                      <th scope="col">Status</th>

                                                                    </tr>
                                                                  </thead>

                                                                  <tbody>
                                                                    <tr>
                                                                        <th scope="row">1</th>
                                                                        <td>#id 5678</td>
                                                                        <td>20 Jan, 2022</td>
                                                                        <td>
                                                                           <span class="badge badge-primary">Products</span>
                                                                        </td>
                                                                        <td>$600</td>
                                                                        <td>
                                                                            <span class="badge badge-info">Completed</span>
                                                                            <span class="badge badge-primary">In Progress</span>
                                                                            <span class="badge badge-warning">Hold</span>
                                                                            <span class="badge badge-success">Cancled</span>
                                                                            <span class="badge badge-dark">Returned</span>
                                                                        </td>
                                                                    </tr>
                                                                  </tbody>
                                                                </table>
                                                            {{-- Table End --}}

                                                            </div>
                                                        </div>
                                                      </div>
                                                    </div>

                                                {{-- Order History page content area start --}}



										</div>
									</div>
								</div>
							</div>


                        </div>
					</div>

				</div>

			</div>
@endsection
