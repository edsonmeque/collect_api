@extends('admin.backend.layouts.app')
@section('content')
<form action="{{route('zonas.store')}}" method="post">
    @csrf
	<div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">Formulario de Provincia</h5>
		</div>
								              
        <div class="card-body">
        <div class="card">
           @if(count($datas) >0)					
            <div class="card-header">
				<h5 class="card-title mb-0">Selecione um Provincia</h5>
			</div>
            
			<div class="card-body">
				<select class="form-select mb-3" id="bairro" name="bairro">
               
                <option placeholder=" select">Open this select menu</option>
                     @foreach($datas as $bairro)
                    <option value="{{$bairro->id}}">{{$bairro->name}}</option>
                    @endforeach
                </select>
            @endif
                <input type="text" class="form-control" placeholder="zona "  name="name" /> 
        
				</div>
               <button type="submit" class="btn btn-success"> submit</button>  
			
            </div>                 
        </div>          
	</div>
    
</form>

@endsection