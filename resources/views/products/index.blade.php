
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
                  <h6 class="m-0 font-weight-bold text-primary">Liste des produits</h6>
                  
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="row">
				  <div class="col-md-4">
            <select onchange="window.location.href = this.value"  class="form-control">
                <option value="{{ route('products.index') }}" @unless($slug) selected @endunless>Toutes catégories</option>
                @foreach($categories as $category)
                    <option value="{{ route('products.category', $category->slug) }}" {{ $slug == $category->slug ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
		
        </div>
		<div class="col-md-4">
					<a class="btn btn-success" href="{{ route('products.create') }}">Ajouter Produit</a>
		</div>
		<div class="col-md-4">
		<form action="/searchp" method="get">
		 <div class="input-group">
		  <input type="search" name="search" class="form-control" >
		   <span class="input-group-prepend">
		    <button type="submit" class="btn btn-primary" >Search</button>
		   </span>
		  </div>
		</form>
		</div>
		</div>
		<hr>
		<div class="row">
		<div class="col-md-12">
	  <div class="table-responsive">
	  
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                
                    <thead>
                        <tr>
                            
							<th>code</th>
                            <th>name</th>
							<th>images</th>
                            <th>Price</th>
							 <th>stock</th>
               <th>categories</th>
							 <th>marque</th>
                            <th>Description</th>
							<th width="280px">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
<tr @if($product->deleted_at) class="has-background-grey-lighter" @endif>

<td>{{ $product->code }}</td>
<td><strong>{{ $product->name }}</strong></td>
<td><img src="{{ asset($product->image)}}" height="20px" width="auto">@foreach($product->images as $image)<img src="{{ asset($image->url)}}" height="20px" width="auto">@endforeach<a href="#">Ajouter image</a></td>
<td>{{ $product->price }} dt</td>
<td>{{ $product->stock}}</td>
<td>@if(count($product->categories)>0)@foreach($product->categories as $categorie)<a href="{{ url('categories/show', $categorie->id) }}">{{ $categorie->name}}</a>, @endforeach  @else aucune categorie @endif</td>
<td>{{ !empty($product->marque)? $product->marque->name:'aucune marque' }}</td>
<td>{{\Illuminate\Support\Str::limit( $product->detail,50) }}</td>

<td>
@if($product->deleted_at)
<form action="{{ route('products.restore', $product->id) }}" method="post">
@csrf
@method('PUT')
<button class="btn btn-primary" type="submit">Restaurer</button>
</form>
@else
<a class="btn btn-info" href="{{ route('products.show', $product->id) }}">Voir</a>
@endif

@if($product->deleted_at)
@else
<a class="btn btn-primary" href="{{ route('products.edit', $product->id) }}">Modifier</a>
@endif

<form  action="{{ route($product->deleted_at?'products.force.destroy':'products.destroy', $product->id) }}" method="post" >
@csrf
@method('DELETE')
<button class="btn btn-danger" type="submit">Supprimer</button>
</form>
</td>
</tr>
@endforeach
@if(count($products) < 1)
              <tr>
               <td colspan="10" class="text-center" ><I >Il n'ya pas produit pour le moment!</I></td>
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
  
	<footer class="card-footer is-centered">
{{ $products->links() }}
</footer>
        </div>

  
 @endsection


  


