
@extends('front.layouts.template')
@include('front.inc.header')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Single Product Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
</head>
<body>
    <div class="container my-5">
        <div class="row">

            <div class="col-md-6">
                <div id="single_card" class="card shadow-sm">
               <img class="" src="{{asset('/uploads/image/'.$product->product_img)}}">
             </div>
            </div>
            
            <!-- Product Details -->
            <div id="product-details" class="col-md-6">
                <h5>{{$product->product_name}}</h5>
                <h6><span class="text-danger">Price : </span> ${{$product->product_price}}</h6>
                <h6>Category : {{$product->category_name}}</h6>
                <h6>Available Quantity : {{$product->product_quantity}}</h6>
                

                <form action="{{route('front.pages.addProductToCard')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                    <label for="quantity" class="form-label">How Many pieces :</label>
                    <input type="number" name="quantity" id="quantity" class="form-control w-50" min="1" value="1">
                   </div>
                    <input type="hidden" name="product_id" value="{{$product->id}}">
                    <input type="hidden" name="product_name" value="{{$product->product_name}}">
                    <input type="hidden" name="product_price" value="{{$product->product_price}}">
                    <input class="btn btn-warning" type="submit" value="Add to Cart">
                </form>

            </div>
        </div>

        <div class="card shadow-sm mt-5">
        <div class="row">  
            <!-- Product Decription -->
            <div class="col-md-12">
                <h3 class="p-3"> Product Decription </h3>
                <p class="text-justify px-5">{{$product->long_description}}</p>
            </div>
          </div>
        </div>
        
        <!-- Reviews -->
        <div class="mt-5">
            <h3>Customer Reviews</h3>
            <p>⭐⭐⭐⭐⭐ (5/5)</p>
            <p>"Great product! Highly recommend."</p>
        </div>
        
        <!-- Related Products -->
        <div class="mt-5">
            <h3 class="p-3">Related Products</h3>
            <div class="row">
            @foreach ($related_product as $data)
            <div id="home" class="col-md-3">
                <div class="card shadow-sm">
                <a href="{{route('front.pages.singlePage', [$data->id, $data->slug])}}"><img src="{{asset('/uploads/image/'.$data->product_img)}}"></a>
                <p class="text-center">{{Str::limit($data->product_name, 15)}}</p><br>
                <h6 class="text-center py-3"><span class="text-danger">price</span> ${{$data->product_price}}</h6>
                <div class="d-flex justify-content-between">
                <button class="btn btn-dark"><a class="text-light" href="{{route('front.pages.singlePage', [$data->id, $data->slug])}}">Buy Now</a></button>
                <button class="btn btn-warning"><a class="text-dark" href="{{route('front.pages.singlePage', [$data->id, $data->slug])}}">See More</a></button>
                </div>
            </div>
           </div>
         @endforeach
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>


@endsection