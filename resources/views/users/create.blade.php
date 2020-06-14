@extends('categories.layout')
@section('content')
<div class="card">
<header class="card-header">
<p class="card-header-title">Création d'un produit</p>
</header>

    <!--@if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif-->
<div class="card-content">

<div class="content">
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
       <div class="field">
<label class="label">Catégorie</label>
        <div class="select is-multiple">
    <select name="category_id">
        @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
</div>

        </div>
		
		 <div class="field">
<label class="label">gamme</label>
        <div class="select is-multiple">
    <select name="gamme_id">
        @foreach($gammes as $gamme)
            <option value="{{ $gamme->id }}">{{ $gamme->name }}</option>
        @endforeach
    </select>
</div>

        </div>
        
             <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                  <label class="label">Code:</label>
                   <input class="input @error('code') is-danger @enderror type="text" name="code" value="{{ old('code') }}" class="form-control">
                </div>
              @error('code')
             <p class="help is-danger">{{ $message }}</p>
             @enderror
             </div>
           <div class="col-xs-12 col-sm-12 col-md-12">
			   <div class="form-group">     
                <label class="label">nom</label>
                <input class="input @error('name') is-danger @enderror" type="text" name="name" value="{{ old('name') }}" placeholder="Nom du produit">
               </div>
              @error('name')
              <p class="help is-danger">{{ $message }}</p>
              @enderror
              </div>
			<div class="form-group">
                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image"  value="{{ old('image') }}">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>	
			<div class="col-xs-12 col-sm-12 col-md-12">
			   <div class="form-group">      
            
                <label class="label">prix</label>
           
                <input class="input @error('price') is-danger @enderror" type="number" name="price" step="0.01" placeholder="prix du produit">
              </div>
              @error('price')
              <p class="help is-danger">{{ $message }}</p>
              @enderror
             </div>
 <div class="col-xs-12 col-sm-12 col-md-12">
			   <div class="form-group">      
            
            <label class="label">stock</label>
            
<input class="input @error('stock') is-danger @enderror" type="text" name="stock" value="{{ old('stock') }}" placeholder="quantité du produit">
</div>
@error('stock')
<p class="help is-danger">{{ $message }}</p>
@enderror
</div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label class="label">Description:</label>
                    <textarea class="form-control" style="height:150px" name="detail" ></textarea>
                </div>
               @error('detail')
               <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>


<div class="field">
<div class="control">
<button class="button is-link">Envoyer</button>
</div>
</div>
</form>
</div>

</div>

@endsection