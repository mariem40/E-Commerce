@extends('layouts.default')
@section('contenu')
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Produits</h1>
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
			<a class="btn btn-success" href="{{ route('gammes.create') }}">Créer une gamme</a>
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
                        @foreach($gammes as $gamme)
                            <tr @if($gamme->deleted_at) class="has-background-grey-lighter" @endif>
                                
                                <td><strong>{{ $gamme->name }}</strong></td>
                                <td>
								@if($gamme->deleted_at)
                                
                                    <form action="{{ route('gammes.restore', $gamme->id) }}" method="post">
                                          @csrf
                        @method('PUT')
                        <button class="btn btn-info" type="submit">Restaurer</button>
                    </form>
					@else
										 <a class="btn btn-info" href="{{ route('gammes.show', $gamme->id) }}">Voir</a>
									 @endif
									  @if($gamme->deleted_at)
                @else
                                <a class="btn btn-primary" href="{{ route('gammes.edit', $gamme->id) }}">Modifier</a>
							@endif
							<form action="{{ route($gamme->deleted_at? 'gammes.force.destroy' : 'gammes.destroy', $gamme->id) }}" method="post">
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
            {{ $gammes->links() }}
        </footer>
    </div>
@endsection