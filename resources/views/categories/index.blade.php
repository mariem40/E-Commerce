@extends('layouts.default')

  @section('contenu')
<div class="container-fluid">

 <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Categories</h1>
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
                  <h6 class="m-0 font-weight-bold text-primary">Liste des categories</h6>
                  
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="row">
				  
                    
					<div class="col-md-4">
						<a class="btn btn-success" href="{{ url('categories/create') }}">Ajouter une categorie</a>
		            </div>
					<div class="col-md-4">
		<form action="/search" method="get">
		 <div class="input-group">
		  <input type="search" name="search" class="form-control">
		   <span class="input-group-prepend">
		 
		    <button type="submit" class="btn btn-primary">Search</button>
		   </span>
		   
		  </div>
		</form>
		</div>
					</div>
		<hr>
		<div class="row">
		<div class="col-md-12">
	  <div class="table-responsive">
 <table class="table table-bordered">
                    <thead>
                        <tr>
                           
                            <th>nom</th>
                            <th>slug</th>
                            <th width="280px">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $categorie)
                            <tr @if($categorie->deleted_at) class="has-background-grey-lighter" @endif>
                                
                                <td><strong>{{ $categorie->name }}</strong></td>
								<td>{{ $categorie->slug }}</td>
                                
								<td>
								@if($categorie->deleted_at)
								<form action="{{ url('categories/restore', $categorie) }}" method="post">
							            @csrf
                                        @method('put')
										<button class="btn btn-primary" type="submit">Restaurer</button>
                                </form>
                                @else
								<a class="btn btn-info" href="{{ url('categories/show', $categorie->id) }}">Voir</a>
                                @endif
								@if($categorie->deleted_at)
@else
								<a class="btn btn-primary" href="{{ url('categories/edit', $categorie) }}">Modifier</a>
                                @endif
								<form action="{{ url($categorie->deleted_at? 'categories/force' : 'categories/delete', $categorie->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
						@if(count($categories) < 1)
              <tr>
               <td colspan="10" class="text-center" ><I >Il n'ya pas categorie!</I></td>
              </td>
            </tr>
            @endif
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