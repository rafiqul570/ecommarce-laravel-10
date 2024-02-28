<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>BNJM</title>

    <!-- vendor css -->
    <link href="{{asset('backend/lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('backend/lib/Ionicons/css/ionicons.css')}}" rel="stylesheet">
    <link href="{{asset('backend/lib/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet">
    <link href="{{asset('backend/lib/rickshaw/rickshaw.min.css')}}" rel="stylesheet">
    <link href="{{asset('backend/lib/highlightjs/github.css')}}" rel="stylesheet">
    <link href="{{asset('backend/lib/datatables/jquery.dataTables.css')}}" rel="stylesheet">
    <link href="{{asset('backend/lib/select2/css/select2.min.css')}}" rel="stylesheet">
    <!-- Starlight CSS -->
    <link rel="stylesheet" href="{{asset('backend/css/starlight.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/header.css')}}">

  </head>

  <body>

  <!-- ########## START: LEFT PANEL ########## -->

    <div class="sl-logo pl-5"><a href="#"><span class="logged-name text-light mr-3">{{ Auth::user()->name }}</span></a></div>
    <div class="sl-sideleft">
      <div class="input-group input-group-search">
        <input type="search" name="search" class="form-control" placeholder="Search">
        <span class="input-group-btn">
          <button class="btn"><i class="fa fa-search"></i></button>
        </span><!-- input-group-btn -->
      </div><!-- input-group -->

      <label class="sidebar-label"></label>
      <div class="sl-sideleft-menu">
        <a href="../admin/index.php" class="sl-menu-link active">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Dashboard</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
         <a href="../index.php" target="_blank" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Visite Site</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <?php
        $role = Auth::user()->role;
        if($role == '1'){
        ?>

        <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <span class="menu-item-label">Subscriber</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div>
        </a>
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="../bn_subscriber/add-subscriber.php" class="nav-link">Add Subscriber</a></li>
          <li class="nav-item"><a href="../bn_subscriber/all-subscriber.php" class="nav-link">All Subscriber</a></li>
        </ul>

          <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <span class="menu-item-label">Chada</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div>
        </a>
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="../bn_chada/add-chada.php" class="nav-link">Add chada</a></li>
          <li class="nav-item"><a href="../bn_chada/all-chada.php" class="nav-link">All chada</a></li>
        </ul>

        <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <span class="menu-item-label">Cash</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div>
        </a>
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="../bn_cash/add-cash.php" class="nav-link">Add cash</a></li>
          <li class="nav-item"><a href="../bn_cash/all-cash.php" class="nav-link">All cash</a></li>
        </ul>

       <?php }else{ ?>

          <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <span class="menu-item-label">Chada</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div>
        </a>
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="../bn_chada/view-chada.php" class="nav-link">View chada</a></li>
        </ul>

        <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <span class="menu-item-label">Cash</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div>
        </a>
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="../bn_cash/view-cash.php" class="nav-link">View cash</a></li>
        </ul>

      <?php } ?>

      </div><!-- sl-sideleft-menu -->
      <br>
    </div><!-- sl-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
    <div class="sl-header">
      <div class="sl-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
      </div><!-- sl-header-left -->

      <div class="sl-header-right" style="margin-right: 40px;">
        <nav class="nav">
         <!-- Authentication -->
         <form method="POST" action="{{ route('logout') }}">
            @csrf

            <x-dropdown-link :href="route('logout')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();">
                {{ __('Log out') }}
            </x-dropdown-link>
        </form>
        </nav>
      </div><!-- sl-header-right -->
    </div><!-- sl-header -->
  <!-- ########## END: HEAD PANEL ########## -->

