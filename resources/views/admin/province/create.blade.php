@extends('admin.index')
@section('content')
<form action="{{route('admin.provinces.store')}}" method="post">
    @csrf
	<div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">Formulario de Provincia</h5>
		</div>
								              
        <div class="card-body">
        <div class="card">
								
            <div class="card-header">
				<h5 class="card-title mb-0">Selecione um Páis</h5>
			</div>
            @if(count($datas) >0)
			<div class="card-body">
				<select class="form-select mb-3" id="country_id" name="country_id">
               
                <option selected desebleted="false">Open this select menu</option>
                     @foreach($datas as $country)
                    <option value="{{$country->id}}">{{$country->name}}</option>
                    @endforeach
                </select>
                @endif
                <input type="text" class="form-control" placeholder="provincia "  name="name" /> 
        
				</div>
               <button type="submit" class="btn btn-success">Guarder</button>  
			</div>
		                         
        </div>          
	</div>
    
</form>

@endsection