@extends('layouts.default')

@section('contenu')
 <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Categories</h1>
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
                  <h6 class="m-0 font-weight-bold text-primary">Ajouter categorie</h6>
                  
                </div>
				 <!-- Card Body -->
                <div class="card-body">
                  <div class="row">
				  <div class="col-md-12">
    
		
        
                <form action="{{ url('categories/store') }}" method="POST" >
                    @csrf
                    <div class="col-md-4">
                        <strong>nom</strong>
                        <div class="control">
                          <input class="input @error('name') is-danger @enderror" type="text" name="name" value="{{ old('name') }}" placeholder="nom du categorie">
                        </div>
                        @error('name')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                     <div class="col-md-4">
                        <strong>slug</strong>
                        <div class="control">
                          <input class="input @error('slug') is-danger @enderror" type="text" name="slug" value="{{ old('slug') }}" placeholder="slug du categorie">
                        </div>
                        @error('slug')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
					<hr>
                    <div class="col-md-4">
<div class="control">
<button class="btn btn-danger" type="submit">Ajouter</button>
<a  class = "btn btn-danger" href = " {{url ('categories/index') }} " > Retour </a>
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