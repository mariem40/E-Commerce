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
                  <h6 class="m-0 font-weight-bold text-primary">modifier produit</h6>
                  
                </div>
				<!-- Content Row -->

          <div class="row">

           <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">

    <form action="{{ route('products.update',$product->id) }}" method="POST">
      @csrf
  @method('PUT')

        
		<div class="col-md-4">
<label class="label">Catégorie</label>
        <div class="select is-multiple" >
    <select name="cats[]" class="form-control" multiple>
        @foreach($categories as $category)
		
            <option value="{{ $category->id }}"@foreach($product->categories as $cat)@if($category->id==$cat->id)) selected @endif @endforeach>{{ $category->name }}</option>
        @endforeach
    </select>


  </div>
  </div>
		
		<div class="col-md-4">
<label class="label">marque</label>
        <div class="select is-multiple">
    <select name="marque_id" class="form-control">
        @foreach($marques as $marque)
            <option value="{{ $marque->id }}" @if($marque->id==$product->marque_id) selected @endif>{{ $marque->name }}</option>
        @endforeach
    </select>

</div>
</div>
		
		<div class="col-md-4">
                <div class="form-group">
                    <strong>Code:</strong>
                    <input class="input @error('code') is-danger @enderror" type="text" name="code" value="{{ $product->code }}" class="form-control">
                </div>
			@error('code')
              <p class="help is-danger">{{ $message }}</p>
              @enderror	
            </div>
			
		<div class="col-md-4">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input class="input @error('name') is-danger @enderror" type="text" name="name" value="{{ $product->name }}" class="form-control">
                </div>
           @error('name')
              <p class="help is-danger">{{ $message }}</p>
              @enderror
			</div>
			
			
			
			  
           
		<div class="col-md-4">
			<div class="form-group">
                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image"  onchange="readURL(this);">
						<img id="blah" src="{{ asset($product->image) }}" alt="your image" width='auto' height="200" />
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
					</div>
					
		<div class="col-md-4">
                <div class="form-group">
                    <strong>Price:</strong>
                    <input class="input @error('price') is-danger @enderror" type="number" name="price" step="0.01" value="{{ $product->price }}" class="form-control">
                </div>
            </div>
			
		<div class="col-md-4">
                <div class="form-group">
                    <strong>stock:</strong>
                    <input class="input @error('stock') is-danger @enderror" type="number" name="stock" value="{{ $product->stock }}" class="form-control">
                </div>
				 @error('stock')
              <p class="help is-danger">{{ $message }}</p>
              @enderror
            </div>

		<div class="col-md-4">
                <div class="form-group">
                    <strong>Detail:</strong>
                    <textarea class="form-control" style="height:150px" name="detail">{{ $product->detail }}</textarea>
                </div>
            </div>
			
		<div class="col-md-4">
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </div>
	

    </form>
	
	
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
	<script>
	function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width('auto')
                        .height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
	</script>
@endsection
