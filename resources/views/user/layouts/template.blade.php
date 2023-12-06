@include('header');
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html"></a>
        <span class="breadcrumb-item active">Dashboard</span>
      </nav>
    <div class="sl-pagebody">
      <div class="row row-sm">

        @yield('content')

      </div><!-- row -->
    </div><!-- sl-pagebody -->
  </div>
  @include('footer');
