@extends('layouts.default')
@section('contenu')

        <div class="container-fluid">

          

        

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Produits</h1>
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
                  <h6 class="m-0 font-weight-bold text-primary">Ajouter produits</h6>
                  
                </div>
                
                <!-- Card Body -->
                <div class="card-body">
                  <div class="row">
				  <div class="col-md-12">
				    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="col-md-4">
<label class="label">Catégorie</label>
        <div class="select is-multiple">
    <select name="cats[]" class="form-control" multiple>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" {{"in-array($category->id, old('cats')?:[])?'selected';"}}>{{ $category->name }}</option>
        @endforeach
    </select>
</div>

        </div>
		
		  <div class="col-md-4">
			<label class="label">marque</label>
			<div class="select is-multiple">
    <select name="marque_id" class="form-control" >
        @foreach($marques as $marque)
            <option value="{{ $marque->id }}">{{ $marque->name }}</option>
        @endforeach
    </select>
</div>

        </div>
        <hr>
             <div class="col-md-4">
                <div class="form-group">
                  <label class="label">Code:</label>
                   <input class="input @error('code') is-danger @enderror type="text" name="code" value="{{ old('code') }}" class="form-control">
                </div>
              @error('code')
             <p class="help is-danger">{{ $message }}</p>
             @enderror
             </div>
          <div class="col-md-4">
			   <div class="form-group">     
                <label class="label">nom:  </label>
                <input class="input @error('name') is-danger @enderror" type="text" name="name" value="{{ old('name') }}" placeholder="Nom du produit">
               </div>
              @error('name')
              <p class="help is-danger">{{ $message }}</p>
              @enderror
              </div>
			  <div class="col-md-4">
			<div class="form-group">
                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image"  value="{{ old('image') }}">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
</div>					
			<div class="col-md-4">
			   <div class="form-group">      
            
                <label class="label">prix</label>
           
                <input class="input @error('price') is-danger @enderror" type="number" name="price" step="0.01" placeholder="prix du produit">
              </div>
              @error('price')
              <p class="help is-danger">{{ $message }}</p>
              @enderror
             </div>
 <div class="col-md-4">
			   <div class="form-group">      
            
            <label class="label">stock</label>
            
<input class="input @error('stock') is-danger @enderror" type="number" name="stock" value="" placeholder="quantité du produit">
</div>
@error('stock')
<p class="help is-danger">{{ $message }}</p>
@enderror
</div>
           <div class="col-md-4">
                <div class="form-group">
                    <label class="label">Description:</label>
                    <textarea class="form-control" style="height:150px" name="detail" ></textarea>
                </div>
               @error('detail')
               <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>
			
	


<div class="col-md-4">
<div class="control">
<button class="btn btn-danger" type="submit">Ajouter</button>
<a  class = "btn btn-danger" href = " {{route ('products.index') }} " > Retour </a>
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


 


