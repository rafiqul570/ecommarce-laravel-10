@extends('frontend.layouts.template')
@section('content')

<!-- Main contant Section-->

<div class="container">
    <h2 class="pb-5">{{$allCategory->category_name}} - ({{$allCategory->product_count}})</h2>
   <div class="row">
           @foreach ($allProduct as $data)
           <div class="col-md-3">
               <div class="card card1">
               <a href="{{route('frontend.singlePage', [$data->id, $data->slug])}}"><img class="mig1" src="{{asset('/uploads/image/'.$data->product_img)}}"></a>
               <h5>{{$data->product_name}}</h5>
               <h6>${{$data->product_price}}</h6>
           </div>
       </div>
           @endforeach  
       </div>
   </div>
</div>

@endsection