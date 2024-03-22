@extends('frontend.layouts.template')
@section('content')

        <div class="row">
            <div class="col-lg-4">
                <div class="hero__categories">
                    <h3 class="deparment">Category & Subcategory</h3> 
                    <ul class="dropdown-menu1">
                    @foreach ($allCategory as $data)
                    <li class="dropdown"><a href="#">{{$data->category_name}}<span>&rsaquo;</span></a>
                        <?php $subcats = \DB::table('subcategories')->where('category_id', $data->id)->get(); ?>
                        <ul class="dropdown-menu2">
                        @if($subcats)
                        @foreach ($subcats as $data)
                            <li class="dropdown li1"><a href="{{route('frontend.subcategoryPage', [$data->id, $data->slug])}}">{{$data->subcategory_name}}</a>
                            </li>
                            @endforeach
                            @endif
                        </ul>
                        </li>  
                    @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-8">
            <div class="card hero__categories">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                    @foreach ($allProduct as $key => $data)
                        <div class="carousel-img carousel-item {{$key == 0 ? 'active':''}}">
                        @if ($data->product_img)
                        <h3 class="text-center">{{$data->product_name}}</h3>
                        <h6 class="text-center"><span class="text-danger">Price</span> : ${{$data->product_price}}</h6>
                        <a href="{{route('frontend.singlePage', [$data->id, $data->slug])}}"><img class="d-block w-100 img1" src="{{asset('uploads/image/'.$data->product_img)}}">
                        </a>
                        @endif
                        </div>
                    @endforeach
                    </div>
                </div>
                </div> 
            </div>
            </div>
            </div>
        </div>
    </div>
</section>
  <!-- Hero Section End -->

  
 <!-- Main contant Section-->

<div class="container">
    <div class="py-5"><h4>Categoris</h4></div>
    <div class="row">
            @foreach ($allProduct as $data)
            <div class="col-md-3">
                <div class="card card1">
                <a href="{{route('frontend.singlePage', [$data->id, $data->slug])}}"><img class="mig1" src="{{asset('/uploads/image/'.$data->product_img)}}"></a>
                <h5>{{$data->product_name}}</h5>
                <h6>{{$data->product_price}}</h6>
            </div>
        </div>
            @endforeach   
        </div>
    </div>
</div>

@endsection