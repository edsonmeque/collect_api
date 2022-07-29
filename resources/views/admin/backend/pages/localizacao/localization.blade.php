@extends('admin.backend.layouts.app')

@section('content')

						
							<div class="card flex-fill">
								<div class="card-header">
                                        <x-maps-leaflet>
                                           :centerPoint = ['lat'=>'6666', 'lng'=>'255'];
                                          :zoomLevel ="1"
           
                                         </x-maps-leaflet>
                                </div>

                               <div class="card-body justify-center">
                  
							<div class="card col-12 col-lg-6 line-block">
								<div class="card-header">
									<h5 class="card-title mb-0">Input</h5>
								</div>
							
									<input type="text" class="form-control" placeholder="Input">
								
                                <div class="card-header">
									<h5 class="card-title mb-0">Input</h5>
								</div>
							
									<input type="text" class="form-control" placeholder="Input">
								</div>
							</div>



                            <div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0">Marca os Contentores  para Enserir nas Coordenadas </h5>
								</div>
								<div class="card-body">
									<div>
									<label class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" value="option1">
                                          <span class="form-check-label">
                                           1
                                         </span>
                                      </label>
									<label class="form-check form-check-inline">
                                      <input class="form-check-input" type="checkbox" value="option2">
                                          <span class="form-check-label">
                                           2
                                         </span>
                                     </label>
									<label class="form-check form-check-inline">
                                      <input class="form-check-input" type="checkbox" value="option3" disabled>
                                          <span class="form-check-label">
                                           3
                                     </span>
                                   </label>
								</div>
							</div>

                            <button type="submit" class="btn btn-primary">enviar</button>
						</div>

					</div>
					
@endsection
