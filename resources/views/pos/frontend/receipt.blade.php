@include('pos.frontend.header')

    <div class="container">
    	<div class="">
    		<div class="row">
    			<div class="col-md-6 col-md-offset-3 receipt-card">
		            <h3>THE FOOD RESTAURANT</h3>
			            <div class="row heading">
			        		<div class="col-md-6">
			        			ITEM
			        		</div>
			        		<div class="col-md-3">
			        			PRICE
			        		</div>
			        		<div class="col-md-3">
			        			VAT
			        		</div>
			        	</div>
		            @foreach($products as $product)
		            	<div class="row item">
		            		<div class="col-md-6">
		            			{{$product->name}}
		            		</div>
		            		<div class="col-md-3">
		            			₱ {{$product->price}}
		            		</div>
		            		<div class="col-md-3">
		            			₱ {{$product->vat}}
		            		</div>
		            	</div>
		            @endforeach
		            	<div class="row discount">
			        		<div class="col-md-6">
			        			DISCOUNT CODE
			        		</div>
			        		@if($percent)
				        		<div class="col-md-3">
				        			{{$order->code_used}}
				        		</div>
				        		<div class="col-md-3">
				        			{{$percent->percentage}} %
			        			</div>
		        			@else
		        				<div class="col-md-6">
		        					NONE
		        				</div>
		        			@endif
			        	</div>
			        	<div class="row total">
			        		<div class="col-md-6">
			        			Total
			        		</div>
			        		<div class="col-md-6">
			        			₱ {{$order->total}}
			        		</div>
			        	</div>
			        	<div class="row vat">
			        		<div class="col-md-6">
			        			Total VAT
			        		</div>
			        		<div class="col-md-6">
			        			₱ {{$order->tax}}
			        		</div>
			        	</div>
			        	<div class="row change">
			        		<div class="col-md-6">
			        			Change
			        		</div>
			        		<div class="col-md-6">
			        			₱ {{$change}}
			        		</div>
			        	</div>
		        </div>
    		</div>
	        <div class="row">
	        	<div class="col-md-6 col-md-offset-3">
	        		<a href="/pos">Go Back To POS</a>
	        	</div>
	        </div>
        </div>
    </div>
    

@include('pos.frontend.footer')