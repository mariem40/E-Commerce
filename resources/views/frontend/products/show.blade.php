
	@extends('frontend.layout.default')
@section('contenu')
	<!-- Preloader -->
	<div class="preloader">
		<div class="preloader-inner">
			<div class="preloader-icon">
				<span></span>
				<span></span>
			</div>
		</div>
	</div>
	<!-- End Preloader -->
		
	
		
		<!-- Breadcrumbs -->
		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="bread-inner">
							<ul class="bread-list">
								<li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
								<li class="active"><a href="blog-single.html">Blog Single Sidebar</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->
			
		<!-- Start Blog Single -->
		<section class="blog-single section">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-12">
						<div class="blog-single-main">
							<div class="row">
								<div class="col-12">
									<div class="image">
										<img src="{{ asset($product->image) }}" height="90px" width="auto">
									</div>
									<div class="blog-detail">
										<h2 class="blog-title">{{ $product->name }}</h2>
										</div>
										<div class="price-box">
        									<span>{{ $product->price }}dt</span>
        								</div>
										<div class="quantity">
											<!-- Input Order -->
											<div class="input-group">
												<div class="button minus">
													<button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
														<i class="ti-minus"></i>
													</button>
												</div>
												<input type="text" name="quant[1]" class="input-number"  data-min="1" data-max="1000" value="1">
												<div class="button plus">
													<button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
														<i class="ti-plus"></i>
													</button>
												</div>
											</div>
											
											<!--/ End Input Order -->
										</div>
										
										<hr>
										<div class="content">
											<p>{{ $product->detail }}</p>
										</div>
										<form action="{{route('cart.store') }} " method="POST">
											@csrf
											<input type="hidden" name="product_id" value="{{ $product->id }}">
											<!--<input type="hidden" name="name" value="{{ $product->name }}">
											<input type="hidden" name="price" value="{{ $product->price }}">-->
											
											
												<div class="addtocart__actions">
													<button class="btn btn-dark" type="submit" title="ajouter au panier">ajouter au panier</button>
													
												</div>
											</form>
										
									
									<div class="share-social">
										<div class="row">
											<div class="col-12">
												<div class="content-tags">
													<h4>Tags:</h4>
													<ul class="tag-inner">
														<li><a href="#">Glass</a></li>
														<li><a href="#">Pant</a></li>
														<li><a href="#">t-shirt</a></li>
														<li><a href="#">swater</a></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
</div>							
								
					
				</div>
			</div>
		</section>
		<!--/ End Blog Single -->
		@endsection	
		