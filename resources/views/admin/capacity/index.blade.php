@extends('admin.index')

@section('content')
	
<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0"><a href="{{route('admin.capacities.create')}}" class="btn btn-info">
                                   + <i class="align-middle" data-feather="shuffle"></i>Capacidade
                                    </a></h5>
								</div>
								<table class="table table-hover my-0">
									<thead>
										<tr>
                                            <th class="d-none d-xl-table-cell">Id</th>
											<th>Nº de Hábitates</th>
                                            <th>Capacidade Volumétrica</th>
                                            <th>Capitação</th>
                                            <th>Capacidade de Armazenamento</th>
                                            <th>Capacidade/Dia</th>
                                            <th>Dias</th>
                                            <th>Coeficiente de Segurança</th>
											
                                            <th class="d-none d-xl-table-cell text-center">Action</th>
										</tr>
									</thead>
									<tbody>
                                        @foreach($datas as $capacity)
										<tr>
											<td>{{$capacity->id}}</td>
                                            <td>{{$capacity->peoples_number}}:habitates</td>
                                            <td>{{$capacity->capacity_storege}} m³</td>
                                            <td>{{$capacity->generated_capitetion}}:2 kg / hab / dia</td>
                                            <td>{{$capacity->peso}} kg</td>
                                            <td>{{$capacity->capacityToday}} kg/dia</td>
                                            <td>{{$capacity->dias}} dia</td>
                                            <td>{{$capacity->capacity_max}}%</td>
                                            
                                            <div class=" text-center">

                                            <form action="{{route('admin.capacities.destroy',$capacity->id)}}" method="post">
                                            @csrf
                                            @method('delete')

                                            <td>
                                                    <a href="{{route('admin.capacities.edit',$capacity->id)}}" class="btn btn-primary"><i class="align-middle" data-feather="edit"></i></a></td>
                                                <td>
                                                    <button type="submit" class="btn btn-danger"><i class="align-middle" data-feather="trash-2"></i></td></button>
                                            </form>
                                                
                                                    
                                            </div>
										</tr>
                                        @endforeach
									</tbody>
								</table>
							</div>			
@endsection