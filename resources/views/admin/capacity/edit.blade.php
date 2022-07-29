@extends('admin.index')
@section('content')
<form action="{{route('admin.capacities.update',$data->id)}}" method="post">
    @csrf
	@method('put')
	<div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">Formulario de Edição Capacidade de Contentor</h5>
		</div>
								
                                
        <div class="card-body">
		    <input type="text" class="form-control" placeholder="capacidade"  name="amout" id="amout" value="{{$data->amout}}" />
                                    
        </div>

		<div class="card-body">
		    <input type="text" class="form-control" placeholder="capital"  name="unit" id="unit" value="{{$data->unit}}" />
                                    
        </div>
          
         
	    <div class="form-group">
		<button type="submit" class="btn btn-primary"> update</button>  
		<a href= "{{route('admin.capacities.index')}}" class="btn btn-warning"> <i class="align-middle" data-feather="arrow-right-circle"></i></a>  
		</div>    
	</div>

    
</form>

@endsection