@extends('layouts.default')
@section('contenu')
<div class="container-fluid">
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Categories</h1>
          </div>
 
    <!-- Content Row -->

          <div class="row">

           <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
			  <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">{{ $categorie->name }}t</h6>
                  
                </div>

		 <!-- Card Body -->
       <div class="card-body">
                 
				  <div class="col-md-4">
  
          
      
                <strong>slug : {{ $categorie->slug }}</strong>
            
            </div>
        <hr>
		<div class="col-md-4">
			<div class="control">

				<a  class = "btn btn-danger" href = " {{url('categories/index') }} " > Retour </a>
			</div>
		</div>
    </div>
		</div>
    </div>
		</div>
    </div>
@endsection