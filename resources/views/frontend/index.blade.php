@extends('frontend.layout.default')
@section('contenu')
	
	<!-- Slider Area -->
	
	<section class="hero-slider">
		<!-- Single Slider -->
		<div class="single-slider">
			<div class="container">
				<div class="row no-gutters">
					<div class="col-lg-9 offset-lg-3 col-12">
						<div class="text-inner">
							<div class="row">
								<div class="col-lg-7 col-12">
									<div class="hero-text">
										<h1><span>UP TO 50% OFF </span>Shirt For Man</h1>
										<p>Maboriosam in a nesciung eget magnae <br> dapibus disting tloctio in the find it pereri <br> odiy maboriosm.</p>
										<div class="button">
											<a href="#" class="btn">Shop Now!</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/ End Single Slider -->
	</section>
	<!--/ End Slider Area -->
	

	
	<!-- Start Product Area -->
    <div class="product-area section">
            <div class="container">
				<div class="row">
					<div class="col-12">
						<div class="section-title">
							<h2>Trending Item</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="product-info">
							<div class="nav-main">
								<!-- Tab Nav -->
								
								<ul class="nav nav-tabs" id="myTab" role="tablist">
									@foreach($categories as $categorie)
									<li class="nav-item"><a class="nav-link"  href="{{ route('frontend.products.index', $categorie->id) }}" role="tab">{{$categorie->name}}</a></li>
								@endforeach
								</ul>
								<!--/ End Tab Nav -->
							</div>
							<div class="tab-content" id="myTabContent">
								<!-- Start Single Tab -->
								<div class="tab-pane fade show active" id="man" role="tabpanel">
									<div class="tab-single">
										<div class="row">
										@foreach($products as $product)
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a class="first__img" href="{{ url('frontend/products/show', $product->id) }}"><img src="{{ asset($product->image)}}" height="550px" width="auto"></a>
														
														<div class="button-head">
															
															<div class="product-action-2">
																<a title="Ajouter au panier" href="">Ajouter au panier</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="product-details.html">{{$product->name}}</a></h3>
														<div class="product-price">
															<span>{{$product->price}}dt</span>
														</div>
													</div>
												</div>
											</div>
											@endforeach
												
													
													
												</div>
											</div>
										</div>
									</div>
								</div>
								<!--/ End Single Tab -->
							
							</div>
		
	<!-- End Product Area -->
	
</div>
 
	@endsection