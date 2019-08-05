@include('pos.frontend.header')

    <div class="container">
        <div class="main">
            <div class="heading">
                THE FOOD RESTAURANT
            </div>
            <div class="content">
                <div class="col-md-8">
                	<ul class="nav nav-tabs">
                		<li class="active"><a href="#all" data-toggle="tab">ALL</a></li>
                		@foreach($categories as $category)
	                		<li><a href="#{{$category->slug}}" data-toggle="tab">{{$category->name}}</a></li>
                		@endforeach
                	</ul>
                	<div class="tab-content">
                		<div id="all" class="tab-pane fade in active">
                			<ul class="product-lists-card">
                				@foreach($products as $product)
                					<li class="products-card" data-price="{{$product->price}}" data-vat="{{$product->vat}}" data-id="{{$product->id}}" data-name="{{$product->name}}">
                						<div class="product-price">
            								₱ {{$product->price}}
            							</div>
                						<div class="product-name">
                							{{$product->name}}
                						</div>
                					</li>
                				@endforeach
                			</ul>
                		</div>
                		@foreach($categories as $category)
	                		<div id="{{$category->slug}}" class="tab-pane fade in">
	                			<ul class="product-lists-card">
	                				@foreach($products as $product)
	                					@if($product->cat_id == $category->id)
                						<li class="products-card" data-price="{{$product->price}}" data-vat="{{$product->vat}}" data-id="{{$product->id}}" data-name="{{$product->name}}">
                							<div class="product-price">
                								₱ {{$product->price}}
                							</div>
                							<div class="product-name">
                								{{$product->name}}
            								</div>
                						</li>
	                					@endif
	                				@endforeach
	                			</ul>
	                		</div>
                		@endforeach
                	</div>
                </div>
                <div class="col-md-4">
                	<h3>SUB TOTAL</h3>
                	<div class="cart">
                		<ul class="cart-list">
                		</ul>
                	</div>
                	<div class="row">
                		<div class="col-md-6">TOTAL</div>
                		<div class="col-md-6 cart-total"></div>
                	</div>
                	<div class="row">
                		<form id="cart" method="post" action="{{route('pos.store')}}">
                			@csrf
					    	
                            <div class="form-group">
					    	  <input type="text" name="payment" placeholder="Ammount Paid" class="form-control">
                            </div>
                            <div class="form-group">
    					    	<input type="text" name="code_used" class="code form-control" placeholder="Promo Code">
                                <a href="#" class="calculate">Calculate Discount</a>
                            </div>
                            <input type="hidden" name="items" class="items">
					    	<input type="hidden" name="total" class="total">
					    	<input type="hidden" name="tax" class="vat">
					    	<input type="hidden" name="user_id" class="userID" value="{{$userID}}">
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-primary" value="Finish Order">
                            </div>
					    </form>
                        
                	</div>
                </div>
            </div>
            <div class="row">
                <a href="/dashboard">RETURN TO DASHBOARD</a>
            </div>
            
        </div>
    </div>
    

@include('pos.frontend.footer')