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
						<th></th>
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
                            <input type="number" class="form-control" value="{{$item ->quantity}}" data-id="{{ $item->id }}" min="1" max="10" step="1" data-decimals="0" required>
                        </div>
                    </td>
           
                    <td class="total-col">${{ number_format($item['product_price'] * $item['quantity'], 2) }}</td>
					<td class="remove-col"><button class="btn btn-remove"><i class="icon-close"></i></button></td>
				</tr>
                @endforeach
			</tbody>
			</table><!-- End .table table-wishlist -->

			<div class="cart-bottom">
    			<div class="cart-discount">
    				<form action="#">
    					<div class="input-group">
    						<input type="text" class="form-control" required placeholder="coupon code">
    						<div class="input-group-append">
								<button class="btn btn-outline-primary-2" type="submit"><i class="icon-long-arrow-right"></i></button>
							</div><!-- .End .input-group-append -->
						</div><!-- End .input-group -->
    				</form>
    			</div><!-- End .cart-discount -->

    			<a href="#" class="btn btn-outline-dark-2"><span>UPDATE CART</span><i class="icon-refresh"></i></a>
			</div><!-- End .cart-bottom -->
		</div><!-- End .col-lg-9 -->
		<aside class="col-lg-3">
			<div class="summary summary-cart">
				<h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->

				<table class="table table-summary">
					<tbody>
						<tr class="summary-subtotal">
							<td>Subtotal:</td>
							<td>${{ number_format($total, 2) }}</td>
						</tr><!-- End .summary-subtotal -->
						<tr class="summary-shipping">
							<td>Shipping:</td>
							<td>&nbsp;</td>
						</tr>

						<tr class="summary-shipping-row">
							<td>
								<div class="custom-control custom-radio">
									<input type="radio" id="free-shipping" name="shipping" class="custom-control-input">
									<label class="custom-control-label" for="free-shipping">Free Shipping</label>
								</div><!-- End .custom-control -->
							</td>
							<td>$0.00</td>
						</tr><!-- End .summary-shipping-row -->

						<tr class="summary-shipping-row">
							<td>
								<div class="custom-control custom-radio">
									<input type="radio" id="standart-shipping" name="shipping" class="custom-control-input">
									<label class="custom-control-label" for="standart-shipping">Standart:</label>
								</div><!-- End .custom-control -->
							</td>
							<td>$10.00</td>
						</tr><!-- End .summary-shipping-row -->

						<tr class="summary-shipping-row">
							<td>
								<div class="custom-control custom-radio">
									<input type="radio" id="express-shipping" name="shipping" class="custom-control-input">
									<label class="custom-control-label" for="express-shipping">Express:</label>
								</div><!-- End .custom-control -->
							</td>
							<td>$20.00</td>
						</tr><!-- End .summary-shipping-row -->

						<tr class="summary-shipping-estimate">
							<td>Estimate for Your Country<br> <a href="dashboard.html">Change address</a></td>
							<td>&nbsp;</td>
						</tr><!-- End .summary-shipping-estimate -->

						<tr class="summary-total">
							<td>Total:</td>
							<td>${{ number_format($total, 2) }}</td>
						</tr><!-- End .summary-total -->
					</tbody>
				</table><!-- End .table table-summary -->

				<a href="checkout.html" class="btn btn-outline-primary-2 btn-order btn-block">PROCEED TO CHECKOUT</a>
			</div><!-- End .summary -->

			<a href="category.html" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE SHOPPING</span><i class="icon-refresh"></i></a>
		</aside><!-- End .col-lg-3 -->
	</div><!-- End .row -->
</div><!-- End .container -->
</div><!-- End .cart -->
</div><!-- End .page-content -->
</main><!-- End .main -->

@include('front.inc.mollaFooter')




<!-- <div class="quantity-input">
	<input type="text" name="product-quatity" value="{{$item->qty}}" data-max="120" pattern="[0-9]*" >									
	<a class="btn btn-increase" href="#" wire:click.prevent="increaseQuantity('{{$item->rowId}}')"></a>
	<a class="btn btn-reduce" href="#" wire:click.prevent="decreaseQuantity('{{$item->rowId}}')"></a>                                
</div> -->