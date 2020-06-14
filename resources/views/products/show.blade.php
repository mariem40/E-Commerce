@extends('layouts.default')

@section('contenu')
<div class="container-fluid">
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Produits</h1>
          </div>
 
    <!-- Content Row -->

          <div class="row">

           <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
		
			  <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">{{ $product->name }}t</h6>
                  
                </div>

		 <!-- Card Body -->
                <div class="card-body">
                 
				  <div class="col-md-4">
		
                <strong>Code du produit : {{ $product->code }}</strong>
				</div>
                <hr>
				<div class="col-md-4">
                <p><strong>image du produit :</strong> <img src="{{ asset($product->image) }}" height="90px" width="auto"></p>
				</div>
                <hr>
				<div class="col-md-4">
                <strong>prix du produit : {{ $product->price }}</strong>
				</div>
                <hr>
				<div class="col-md-4">
				<strong>quantité du produit : {{ $product->stock }}</strong>
				</div>
                <hr>
				<div class="col-md-4">
				<strong>description du produit : {{ $product->detail }}</strong>
				</div>
                <hr>
				<div class="col-md-4">
				<strong>Catégorie :</strong> 
				<ul>
				@foreach($product->categories as $category)
				
				<li>{{$category->name}}</li>
				@endforeach
				</ul>
				</div>
				<hr>
			
       <div class="col-md-4">
<div class="control">

<a  class = "btn btn-danger" href = " {{route ('products.index') }} " > Retour </a>
</div>
</div>
		
    
	
	</div>
	
	
 </div>
	</div>
	</div>
</div>	
@endsection