@extends('layouts.default')
@section('contenu')
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Marque</h1>
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
          
          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Liste des marques</h6>
                  
                </div>
				 <!-- Card Body -->
                <div class="card-body">
                  <div class="row">
    
    <div class="col-md-4">
			<a class="btn btn-success" href="{{ route('marques.create') }}">Créer une marque</a>
        </div>
		</div>
		<hr>
       <div class="row">
		<div class="col-md-12">
	  <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            
                            <th>name</th>
                           <th width="280px">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($marques as $marque)
                            <tr >
                                
                                <td><strong>{{ $marque->name }}</strong></td>
                                <td>
			
                                
                                    <form action="{{ route('marques.destroy', $marque->id) }}" method="post">
                                          @csrf

                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Supprimer</button>
                                    </form>
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
		

		
		<footer class="card-footer">
            {{ $marques->links() }}
        </footer>
    </div>
@endsection