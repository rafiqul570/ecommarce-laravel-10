@include('front.inc.udHeader')
    <!-- Content Area -->
    <div class="content">
      <div class="card p-4">
        <div class="row">
          <table class="table">
            <thead>
              <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Delivery Fee</th>
                <th>Payment Status</th>
                <th>Delivery Status</th>
              </tr>
            </thead>
            @foreach($pendingOrders as $item)
              @php 
              $productImage = App\Models\Product::where('id', $item -> product_id)->value('product_img'); 
              @endphp
            <tbody>
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
                <td>&#2547 {{$item -> product_price}}</td>
                <td>{{$item -> product_quantity}}</td>
                <td>{{$item -> total_price}}</td>
                <td>{{$item -> shippingCost}}</td>
                <td class="text-success">{{$item -> payment_status}}</td>
                <td class="text-danger">{{$item -> delivery_status}}</td>
              </tr>
            </tbody>
             @endforeach
          </table>
        </div>
      </div>
    </div> 
  </div>
@include('front.inc.udFooter')