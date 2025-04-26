@include('front.inc.mollaHeader')

<main class="main">
<div class="">
<div class="container">
<h2 class="mb-4">Shopping Cart</h2>
</div>
</div>

<div class="page-content">
<div class="cart">
<div class="container">
	<div class="row">
		<div class="col-lg-9">
			<table class="table table-cart table-mobile">
				<thead>
					<tr>
					<th>Product</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Total</th>
					<th class="text-center">Remove</th>
					</tr>
				</thead>

				<tbody>

                    @foreach($cartItems as $item)

                    @php 
                    $productImage = App\Models\Product::where('id', $item -> product_id)->value('product_img'); 
                    @endphp
					<tr>
					<td class="product-col">
						<div class="product">
							<figure class="product-media">
				  
								<img src="{{asset('/uploads/image/'.$productImage)}}" width="40" />
					 
							</figure>

							<h3 class="product-title">
								{{$item -> product_name}}
							</h3><!-- End .product-title -->
						</div><!-- End .product -->
					</td>
					<td class="price-col">${{$item -> product_price}}</td>
					
					<td class="quantity-col">
	                       <div class="cart-product-quantity">
	                            <input type="number" class="update-qty" data-id="{{ $item->id }}" value="{{ $item->quantity }}" min="1">
	                        </div>
	                    </td>
	           
                    <td class="item-total-{{ $item->id }}">${{ number_format($item->product_price * $item->quantity, 2) }}</td>
				
				<td class="remove-col">
				 <a onclick="return confirm('Are you sure ?')" href="{{route('front.cart.delete', $item->id)}}"><span class="tx-danger"><i class="icon-close"></i></span></a>
				</td>
				
				</tr>
                @endforeach
			</tbody>
			</table><!-- End .table table-wishlist -->

			<div class="cart-bottom">
    			<div class="cart-discount">
    				<form action="#" method="POST">
    					<div class="input-group">
    						<input type="text" class="form-control" required placeholder="coupon code">
    						<div class="input-group-append">
								<button class="btn btn-outline-primary-2" type="submit"><i class="icon-long-arrow-right"></i></button>
							</div><!-- .End .input-group-append -->
						</div><!-- End .input-group -->
    				</form>
    			</div><!-- End .cart-discount -->
			</div><!-- End .cart-bottom -->
		</div><!-- End .col-lg-9 -->
		<aside class="col-lg-3">
			<div class="summary summary-cart">
				<h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->

				<table class="table table-summary">
					<tbody>
						<tr class="summary-subtotal">
							<td>Subtotal</td>
							<td id="cart-total">${{ number_format($total, 2) }}</td>
						</tr><!-- End .summary-subtotal -->

						<tr class="summary-shipping-row">
							<td>
							   <div class="">
								<input type="hidden" id="express-shipping" name="shipping" class="custom-control-input">
								<label class="custom-control-label" for="express-shipping">Shipping Fee</label>
							    </div><!-- End .custom-control -->
							</td>
							<td><strong id="cart-shipping">$20.00</strong></td> {{-- Default fixed value --}}
						</tr><!-- End .summary-shipping-row -->

						<tr class="summary-total">
							<td>Total</td>
							<td><strong id="cart-grandtotal">${{ number_format($total + 20, 2) }}</strong></td>
						</tr><!-- End .summary-total -->
					</tbody>
				</table><!-- End .table table-summary -->
				@if($total <= 0)
				<a href="" class="btn btn-outline-primary-2 btn-order btn-block disabled">PROCEED TO CHECKOUT</a>
				@else
				<a href="" class="btn btn-outline-primary-2 btn-order btn-block">PROCEED TO CHECKOUT</a>
				@endif
			</div><!-- End .summary -->

			<a href="category.html" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE SHOPPING</span><i class="icon-refresh"></i></a>
		</aside><!-- End .col-lg-3 -->
	</div><!-- End .row -->
</div><!-- End .container -->
</div><!-- End .cart -->
</div><!-- End .page-content -->
</main><!-- End .main -->

@include('front.inc.mollaFooter')
