@extends('admin.index')
@section('content')
<form action="{{route('admin.districts.update',$data->id)}}" method="post">
@csrf
@method('put')
	<div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">Formulario de Edicao  Provincia</h5>
		</div>
								              
        <div class="card-body">
        <div class="card">					
			<div class="card-body">
				<label for="province_id">Provincias</label>
				<select class="form-select mb-3" id="province_id" name="province_id" >
               
                <option placeholder=" select">Selecione</option>
                     @foreach($datas as $province)
                    <option value="{{$province->id}}">{{$province->name}}</option>
                    @endforeach
                </select>
				<label for="name">Distrito</label>
                <input type="text" class="form-control" placeholder="Distrito "  id="name" name="name"  value="{{$data->name}}" /> 
        
				</div>
            </div> 
            <hr>
            <div>
            <button type="submit" class="btn btn-primary">Actualizar</button> 
            <a href="{{route('admin.districts.index')}}" class="btn btn-warning btn-lg" data-toggle="tooltip">Voltar</a>
            </div>                
        </div>          
	</div>
    
</form>
@endsection