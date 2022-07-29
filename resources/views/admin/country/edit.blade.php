@extends('admin.index')
@section('content')
<form action="{{route('admin.countries.update',$data->id)}}" method="post">
    @csrf
	@method('put')
	<div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">Formulario de Edição</h5>
		</div>
								
                                
        <div class="card-body">
		    <input type="text" class="form-control" placeholder="name"  name="name"  value="{{$data->name}}" />
                                    
        </div>

		<div class="card-body">
		    <input type="text" class="form-control" placeholder="capital"  name="capital"  value="{{$data->capital}}" />
                                    
        </div>
          
         
	    <div class="form-group">
		<button type="submit" class="btn btn-primary"> update</button>  
		<a href= "{{route('admin.countries.index')}}" class="btn btn-warning"> <i class="align-middle" data-feather="arrow-right-circle"></i></a>  
		</div>    
	</div>

    
</form>

@endsection