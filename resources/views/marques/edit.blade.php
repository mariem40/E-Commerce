@extends('layouts.default')
@section('contenu')

        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Marques</h1>
          </div>
  @if ($errors->any()))
	   <div class="row">
            <div class="col-xl-12 col-lg-12">
				<div class="alert alert-danger">
            <strong>Whoops!</strong> Il existe des problémes.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
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
                  <h6 class="m-0 font-weight-bold text-primary">Modifier marque</h6>
                  
                </div>
	         <!-- Card Body -->
                <div class="card-body">
                  <div class="row">
				  <div class="col-md-12">
       
                <form action="{{ route('marques.update', $marque->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="col-md-4">
                        <strong>Nom:</strong>
                        <div class="control">
                          <input class="input @error('name') is-danger @enderror" type="text" name="name" value="{{ old('name', $marque->name) }}" placeholder="Nom du marque">
                        </div>
                        @error('name')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                   <hr>
                    
                   <div class="col-md-4">
                        <div class="control">
                          <button type="submit" class="btn btn-success">Modifier</button>
						  <a  class = "btn btn-danger" href = " {{route ('marques.index') }} " > Retour </a>
                        </div>
                    </div>
                </form>
				
            </div>
        </div>
    </div>
	</div>
	</div>
	</div>
	</div>
	
@endsection