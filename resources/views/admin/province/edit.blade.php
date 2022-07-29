@extends('admin.index')
@section('content')
<form action="{{route('admin.provinces.update',$data->id)}}" method="post">
    @csrf
	@method('put')
	<div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">Formulario de Provincia</h5>
		</div>
								              
        <div class="card-body">
        <div class="card">
								
            <div class="card-header">
				<h5 class="card-title mb-0">Selecione um Páis</h5>
			</div>
			<div class="card-body">
				<select class="form-select mb-3" id="country_id" name="country_id">
               
                <option>Selecione</option>
                     @foreach($datas as $country)
                        <option value="{{$country->id}}">{{$country->name}}</option>
                     @endforeach
                </select>
                <input type="text" class="form-control"  name="name" value="{{$data->name}}" /> 
        
				</div>
               
			</div>
                
            <div class="form-group text-left">
		         <button type="submit" class="btn btn-primary"> update</button>  
	          	<a href= "{{route('admin.provinces.index')}}" class="btn btn-warning"> <i class="align-middle" data-feather="arrow-right-circle"></i></a>  
		</div>                 
        </div>          
	</div>
    
</form>

@endsection