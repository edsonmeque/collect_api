@extends('admin.index')
@section('content')
<form action="{{route('admin.municipios.store')}}" method="post">
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
			<div class="card-body">

            <div class="form-group formatters   form-controls   form-control-lg formatters">
                       <div class="col-sm-offset-2 col-sm-12">
                       <select class="form-select mb-3" id="district_id" name="district_id" width="100px">
               
                <option selected desebleted="false">Open this select menu</option>
                     @foreach($datas as $district)
                    <option value="{{$district->id}}">{{$district->province->name}}=>[{{$district->name}}]</option>
                    @endforeach
                </select>
                       </div>
                </div>
				
                <div class="form-group formatters   form-controls   form-control-lg formatters">
                    <div class="col-sm-offset-md-4">
                          <input type="text" class="form-control" placeholder="nome do municipio "  name="name" /> 
                    </div>
                 
                </div>
                
                <div class="form-group formatters   form-controls   form-control-lg formatters">
                       <div class="col-sm-offset-2 col-sm-12">
                       <input type="text" class="form-control" placeholder="abreviatura " name="slug" id="slug" placeholder>
                       </div>
                </div>
            
                       
                    <textarea name="description" id="description" cols="125" rows="8" width="100%"></textarea>
                
                <div class="form-group formatters   form-controls   form-control-lg formatters">
                       <div class="col-sm-offset-2 col-sm-12">
                            <input type="file" name="image" id="image" placeholder="Image" required>
                       </div>
                </div>
               
				</div>

                
               <button type="submit" class="btn btn-success">Guarder</button>  
			</div>
		                         
        </div>          
	</div>
    
</form>

@endsection