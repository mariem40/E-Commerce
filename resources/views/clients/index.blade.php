@extends('layouts.default')
@section('contenu')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Clients</h1>
          </div>
   @if ($message = Session::get('success'))
	   <div class="row">
            <div class="col-xl-12 col-lg-12">
				<div class="alert alert-success">
					<p>{{ $message }}</p>
				</div>
			</div>
		</div>
    @endif
<div class="row">

   
	 <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
			   <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-users"></i>Gestion des Clients</h6>
                  
                </div>
				<div class="card-body">
                  <div class="row">
				
	<div class="col-md-4">
        <a href="{{ route('clients.create') }}" type="submit" class="btn btn-success"> Ajouter Clients</a>
		</div>
    </div>
      <hr>
		<div class="row">
		<div class="col-md-12">
	  <div class="table-responsive">
	  
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

            <thead>
            <tr>
                    
                    <th>Nom</th>
                    <th>prénom</th>
                    <th>Téléphone</th>
                    <th>Email</th>
					
                   <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($clients as $client)
                <tr>
                
 
 
                    <td>{{ $client->user->name }}</td>
                    <td>{{ $client->user->prenom }}</td>
                    <td>{{ $client->user->tel }}</td>
                    <td>{{ $client->user->email }}</td>
                    
                    
                    <td>
                    <a class="btn btn-primary" href="{{ route('clients.edit', $client->id) }}">Modifier</a>
   <a class="btn btn-danger" href="{{ route('clients.destroy', $client->id) }}">supprimer</a>
                  

                   

                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
       
        
    </div>
   </div>
</div>   
   </div>
</div>
</div>
</div>
@endsection