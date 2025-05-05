
@include('front.inc.mollaHeader')
<main class="main">
<nav aria-label="breadcrumb" class="breadcrumb-nav">
<div class="container">
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
    <li class="breadcrumb-item"><a href="{{route('front.checkout.create')}}">Checkout</a></li>
    <li class="breadcrumb-item active" aria-current="page">Shipping & Billing</li>
</ol>
</div><!-- End .container -->
</nav><!-- End .breadcrumb-nav -->

<div class="page-content">
<div class="checkout">
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<div class="card shadow-sm mb-1 bg-light p-4">
			 <span style="font-size: 18px; color: #000; font-weight: 500;" class="mb-2">Select Payment Method</span>
			 <div>
			 	<span style="border:2px solid black; padding: 10px;p"><a href="">Bkash</a></span>
			 	<span style="border:2px solid black; padding: 10px"><a href="">Cash on delivery</a></span>
			 </div>
		  </div>
		</div>

		<div class="col-md-4"> 
			<div class="card shadow-sm mb-1 bg-light p-4">
				<h3 class="summary-title">Order Summary</h3><!-- End .summary-title -->

				<table class="table table-summary">
					<tbody>
						@php
						$totalQuantity = \App\Models\Order::where('user_id', Auth::id())->sum('product_quantity');
						@endphp
						<tr class="summary-subtotal">
							<td style="font-size:12px">Subtotal({{$totalQuantity}} items and shipping fee included)</td>
							<td id="cart-total">&#2547 {{ number_format($grand_total, 2) }}</td>
						</tr><!-- End .summary-subtotal -->
						 
						 <tr class="summary-total">
							<td>Total</td>
							<td id="cart-total">&#2547 {{ number_format($grand_total, 2) }}</td>
						</tr><!-- End .summary-total -->
					</tbody>
				</table><!-- End .table table-summary -->
				<form action="{{route('front.order.store')}}" method="POST"> 
				 @csrf
				 
				 <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">Proceed to pay</button>

				</form>
			</div>
		</div>
	</div>

</div><!-- End .container -->
</div><!-- End .checkout -->
</div><!-- End .page-content -->
</main><!-- End .main -->

@include('front.inc.mollaFooter')