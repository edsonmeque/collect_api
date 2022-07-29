@extends('admin.index')
@section('content')
<form action="{{route('admin.districts.store')}}" method="post">
    @csrf
	<div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">Formulario de Bairro</h5>
		</div>
								              
        <div class="card-body">
        <div class="card">
           @if(count($datas) >0)					
            <div class="card-header">
				<h5 class="card-title mb-0">Selecione um Distrito</h5>
			</div>
            
			<div class="card-body">
				<select class="form-select mb-3" id="province_id" name="province_id" >
               
                <option placeholder=" select">Selecione</option>
                     @foreach($datas as $province)
                    <option value="{{$province->id}}">{{$province->country->name}}:{{$province->name}}</option>
                    @endforeach
                </select>
            @endif
                <input type="text" class="form-control" placeholder="Distrito "  id="name" name="name" /> 
        
				</div>
            </div> 
            <hr>
            <div>
            <button type="submit" class="btn btn-success"> Quardar</button> 
            <a href="{{route('admin.districts.index')}}" class="btn btn-warning btn-lg" data-toggle="tooltip">Voltar</a>
            </div>                
        </div>          
	</div>
    
</form>
@endsection