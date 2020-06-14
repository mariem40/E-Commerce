@extends('layouts.default')
@section('contenu')
<div class="row">
    
	 <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
			   <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-users"></i>Gestion d'administrateurs</h6>
                  
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
				<div class="card-body">
                  <div class="row">
				
	<div class="col-md-4">
        <a href="{{ route('admins.create') }}" type="submit" class="btn btn-success"> Ajouter Admins</a>
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
					
					<th>Age</th>
                   <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($admins as $admin)
                <tr>
                
 
 
                    <td>{{ $admin->user->name }}</td>
                    <td>{{ $admin->user->prenom }}</td>
                    <td>{{ $admin->user->tel }}</td>
                    <td>{{ $admin->user->email}}</td>
                     
					<td>{{ $admin->age }}</td>
                    <td>
                    <a class="btn btn-primary" href="{{ route('admins.edit', $admin->id) }}">Modifier</a>
					<a class="btn btn-primary" href="{{ route('admins.destroy', $admin->id) }}">supprimer</a>
                  

                   

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