@extends('admin.layouts.template')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
</head>
<body>
    <div class="row">
     <div class="col-md-12">
       <div class="card pd-20 pd-sm-40 form-layout form-layout-5 text-light bg-info">
       <div class="d-flex justify-content-between">
          <h3 class="text-dark pb-3">Add New Sub Category</h3>
          <h5><a  href="{{route('ecom_subcategory.index')}}" class="btn btn-light text-dark">All Subcategory</a></h5>
          </div>
          <form action="{{route('ecom_subcategory.store')}}" method="POST">
            @csrf
            <div class="row">
            <label class="col-sm-2 form-control-label"><span class="tx-danger">*</span> Subcategory name:</label>
              <div class="col-sm-10 mg-t-10 mg-sm-t-0">
                <input type="text" name="subcategory_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
              </div>
              <h6 class="col-sm-12 d-flex justify-content-center">
              <x-input-error :messages="$errors->get('subcategory_name')" class="mt-2 " />
              </h6>
            </div>

            <div class="row row-xs">
                <label class="col-sm-2 form-control-label"><span class="tx-danger">*</span> Name:</label>
                <div class="col-sm-10 mg-t-10 mg-sm-t-0">
                    <select class="form-control select2" name="category_id" data-placeholder="Choose one"
                    data-parsley-class-handler="#slWrapper"
                    data-parsley-errors-container="#slErrorContainer" required>
                    <option selected>Choose Category</option>
                    @foreach ($allCategory as $data)
                    <option value="{{$data->id}}">{{$data->category_name}}</option>
                    @endforeach
                    </select>
                </div>
            </div><!-- row -->

            <div class="row row-xs mg-t-30">
                <div class="col-sm-12 d-flex justify-content-end">
                  <div class="form-layout-footer">
                    <button class="btn btn-light mg-r-5">Add Subcategory</button>
                  </div><!-- form-layout-footer -->
                </div><!-- col-8 -->
              </div>
           </form>
          </div><!-- card -->
        </div>
       </div>

       <script src="https://code.jquery.com/jquery-3.7.1.js" ></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>

       <script>
        @if (Session::has('success'))
            toastr.success("{{Session::get('success')}}");
        @endif
       </script>

    </body>
  </html>

@endsection
