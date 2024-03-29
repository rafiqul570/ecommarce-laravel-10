@extends('admin.layouts.template')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
    
  </head>
<body>
    <div class="row">
     <div class="col-md-12">
       <div class="card pd-20 pd-sm-40 form-layout form-layout-5 text-light bg-info">
       <div class="d-flex justify-content-between">
          <h3 class="text-dark pb-3">Add New Product</h3>
          <h5><a  href="{{route('ecom_product.index')}}" class="btn btn-light text-dark">All Product</a></h5>
          </div>
          <form action="{{route('ecom_product.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
            <label class="col-sm-2 form-control-label"><span class="tx-danger">*</span> Product name :</label>
              <div class="col-sm-10 mg-t-10 mg-sm-t-0">
                <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
              </div>
              <h6 class="col-sm-12 d-flex justify-content-center">
              <x-input-error :messages="$errors->get('product_name')" class="mt-2 " />
              </h6>
            </div>

            <div class="row">
                <label class="col-sm-2 form-control-label"><span class="tx-danger">*</span> Product price :</label>
                  <div class="col-sm-10 mg-t-10 mg-sm-t-0">
                    <input type="text" name="product_price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                  </div>
                  <h6 class="col-sm-12 d-flex justify-content-center">
                  <x-input-error :messages="$errors->get('product_price')" class="mt-2 " />
                  </h6>
                </div>

                <div class="row">
                    <label class="col-sm-2 form-control-label"><span class="tx-danger">*</span> Product quentity :</label>
                      <div class="col-sm-10 mg-t-10 mg-sm-t-0">
                        <input type="text" name="product_quantity" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                      </div>
                      <h6 class="col-sm-12 d-flex justify-content-center">
                        <x-input-error :messages="$errors->get('product_quantity')" class="mt-2 " />
                      </h6>
                    </div>

                    
                    <div class="row">
                      <label class="col-sm-2 form-control-label"><span class="tx-danger">*</span> Short Description :</label>
                         <div class="col-sm-10 mg-t-10 mg-sm-t-0">
                          <textarea class="col-sm-12" name="short_description" id="summernote"></textarea>
                          </div>
                          <h6 class="col-sm-12 d-flex justify-content-center">
                        <x-input-error :messages="$errors->get('short_description')" class="mt-2 " />
                        </h6>
                      </div>

                      <div class="row">
                        <label class="col-sm-2 form-control-label"><span class="tx-danger">*</span> Long Description :</label>
                         <div class="col-sm-10 mg-t-10 mg-sm-t-0">
                          <textarea class="col-sm-12" name="long_description" id="summernote2" ></textarea>
                         </div>
                          <h6 class="col-sm-12 d-flex justify-content-center">
                          <x-input-error :messages="$errors->get('long_description')" class="mt-2 " />
                          </h6>
                        </div>

                      <div class="row row-xs">
                          <label class="col-sm-2 form-control-label"><span class="tx-danger">*</span> Category :</label>
                          <div class="col-sm-10 mg-t-10 mg-sm-t-0">
                              <select class="form-control select2" name="category_id" data-placeholder="Choose one"
                              data-parsley-class-handler="#slWrapper"
                              data-parsley-errors-container="#slErrorContainer" required>
                              <option selected="" disabled="">Select Category</option>
                              @foreach ($allCategory as $data)
                              <option value="{{$data->id}}">{{$data->category_name}}</option>
                              @endforeach
                              </select>
                          </div>
                          <h6 class="col-sm-12 d-flex justify-content-center">
                            <x-input-error :messages="$errors->get('category_id')" class="mt-2 " />
                            </h6>
                      </div><!-- row -->

                      <div class="row row-xs">
                        <label class="col-sm-2 form-control-label"><span class="tx-danger">*</span> Subcategory :</label>
                        <div class="col-sm-10 mg-t-10 mg-sm-t-0">
                            <select class="form-control mt-2" name="subcategory_id" id="subcat_id">
                            <option value="">Select Subcategory</option>
                            </select>
                        </div>
                        <h6 class="col-sm-12 d-flex justify-content-center">
                          <x-input-error :messages="$errors->get('subcategory_id')" class="mt-2 " />
                          </h6>
                      </div><!-- row -->

                      <div class="row">
                        <label class="col-sm-2 form-control-label"><span class="tx-danger">*</span> Product name :</label>
                          <div class="col-sm-10 mg-t-10 mg-sm-t-0">
                            <input type="file" name="product_img" class="form-control mt-2" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                          </div>
                          <h6 class="col-sm-12 d-flex justify-content-center">
                          <x-input-error :messages="$errors->get('product_img')" class="mt-2 " />
                          </h6>
                        </div>
            

                      <div class="row row-xs mg-t-30">
                          <div class="col-sm-12 d-flex justify-content-end">
                          <div class="form-layout-footer">
                              <button class="btn btn-light mg-r-5">Add Product</button>
                          </div><!-- form-layout-footer -->
                          </div><!-- col-8 -->
                      </div>
                  </form>
                  </div><!-- card -->
                  </div>
              </div>

              <script src="https://code.jquery.com/jquery-3.7.1.js" ></script>
              <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

              <script>
                  @if(Session::has('success'))
                      toastr.success("{{Session::get('success')}}");
                  @endif
              </script>

              <script>
                $(function(){
                  'use strict';

                  // Inline editor
                  var editor = new MediumEditor('.editable');

                  // Summernote editor
                  $('#summernote').summernote({
                    height: 100,
                    tooltip: false
                  })
                });
              </script>

              <script>
                $(function(){
                  'use strict';

                  // Inline editor
                  var editor = new MediumEditor('.editable');

                  // Summernote editor
                  $('#summernote2').summernote({
                    height: 100,
                    tooltip: false
                  })
                });
              </script>
              <script>
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
              </script>

              <!-- Ajax code -->

              <script>
                $(document).ready(function () {
                    $('select[name="category_id"]').on('change', function(){
                      var category_id = $(this).val();
                      if(category_id){
                        $.ajax({
                          url:"{{url('/get/subcat/')}}/"+category_id,
                          type:"GET",
                          dataType:"json",
                          success:function(data){
                            $("#subcat_id").empty();
                            $.each(data,function(key,value){
                              $("#subcat_id").append('<option value="'+value.id+'">'+value.subcategory_name+'</option>');
                            });
                          },
                        });
                      }else{
                        alert(danger);
                      }
              
                    });
                   });
                        
              </script>
              
            </body>
          </html>

      @endsection
