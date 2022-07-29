@extends('admin.backend.layouts.app')
@section('content')
<form action="{{route('zonas.update',$data->id)}}" method="post">
    @csrf
	@method('put')
	<div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">Formulario de Edicao da Zona</h5>
		</div>
								              
        <div class="card-body">
        <div class="card">
								
            <div class="card-header">
				<h5 class="card-title mb-0">Selecione um Bairro</h5>
			</div>
			<div class="card-body">
				<select class="form-select mb-3" id="bairro" name="bairro">
               
                <option>Open this select menu</option>
                     @foreach($datas as $bairro)
                        <option value="{{$bairro->id}}">{{$bairro->name}}</option>
                     @endforeach
                </select>
                <input type="text" class="form-control"  name="name" value="{{$data->name}}" /> 
        
				</div>
               
			</div>
                
            <div class="form-group text-left">
		         <button type="submit" class="btn btn-primary"> update</button>  
	          	<a href= "{{route('zonas.index')}}" class="btn btn-warning"> <i class="align-middle" data-feather="arrow-right-circle"></i></a>  
		</div>                 
        </div>          
	</div>

    @endsection