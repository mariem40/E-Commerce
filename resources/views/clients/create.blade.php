@extends('layouts.default')
@section('contenu')

         <div class="container-fluid">

        

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Clients</h1>
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
                  <h6 class="m-0 font-weight-bold text-primary">Ajouter clients</h6>
                  
                </div>
                
                <!-- Card Body -->
                <div class="card-body">
                  <div class="row">
				  <div class="col-md-12">
				    <form action="{{ route('clients.store') }}" method="POST" >
        @csrf
 
        
             
          <div class="col-md-4">
			   <div class="form-group">     
                <label class="label" for="name">nom: </label><br>
                <input class="input @error('name') is-danger @enderror" type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Nom du client">
               </div>
              @error('name')
              <p class="help is-danger">{{ $message }}</p>
              @enderror
              </div>
			  
			  <div class="col-md-4">
			   <div class="form-group">     
                <label class="label" for="name">prénom: </label><br>
                <input class="input @error('prenom') is-danger @enderror" type="text" id="prenom" name="prenom" value="{{ old('prenom') }}" placeholder="prenom du client">
               </div>
              @error('prenom')
              <p class="help is-danger">{{ $message }}</p>
              @enderror
              </div>
			  
			  <div class="col-md-4">
			   <div class="form-group">     
                <label class="label" for="name">téléphone: </label><br>
                <input class="input @error('tel') is-danger @enderror" type="text" id="tel" name="tel" value="" placeholder="tel du client">
               </div>
              @error('tel')
              <p class="help is-danger">{{ $message }}</p>
              @enderror
              </div>
			  
			  	  
			<div class="col-md-4">
			   <div class="form-group"> 
				<label class="label" for="email">Enter votre email:</label>
				<input class="input @error('email') is-danger @enderror" type="email" id="email" name="email" size="30"  required>
				</div>
	   @error('email')
              <p class="help is-danger">{{ $message }}</p>
              @enderror
              </div>
			  
			   <div class="col-md-4">
				<div class="form-group"> 
                <label for="password" class="label">Entrer mot de passe</label>
				<input   class="input @error('password') is-danger @enderror" type="password" name="password" id="password" required autocomplete="current-password">
				</div>
                                @error('password')
                                    <p class="help is-danger">{{ $message }}</p>
                                @enderror
				</div>


<div class="col-md-4">
<div class="control">
<button class="btn btn-danger" type="submit">Ajouter</button>
<a  class = "btn btn-danger" href = " {{route ('clients.index') }} " > Retour </a>
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