<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/header.css">

    <title>BNJM</title>

  </head>
  <body>
     <!--  Navbar -->
     <div class="container-fluid">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand text-uppercase" href="#">Ecommerce</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse py-3" id="navbarSupportedContent">
            <ul class="navbar-nav m-auto">
              <li class="nav-item">
                <a class="nav-link" href="http://www.quran.gov.bd/" target="_">আল-কুরআন</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="https://www.hadithbd.com/quran/" target="_">তাফসির</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="https://www.hadithbd.com/hadith/" target="_">আল-হাদিস</a>
              </li>
            </ul>
            <div class="mr-4">
              <a href="{{ route('login') }}" style="text-decoration: none;">Login</a>
            </div>

            <div class="mr-4">
                <a href="{{ route('register') }}" style="text-decoration: none;">Register</a>
              </div>
          </div>
        </nav>
        </div>

       <div class="container">
         <h4>
          <marquee onmouseover="this.stop()" onmouseout="this.start()">
             <div class="text-success"> আজ
              <?php
                date_default_timezone_set("Asia/Dhaka");
                $currentDate = date("l, j F Y ");
                $engDATE = array('1','2','3','4','5','6','7','8','9','0','January','February','March','April','May','June','July','August','September','October','November','December',
                    'Saturday','Sunday','Monday','Tuesday','Wednesday','Thursday','Friday');

                $bangDATE = array('১','২','৩','৪','৫','৬','৭','৮','৯','০',
                    'জানুয়ারী','ফেব্রুয়ারী','মার্চ','এপ্রিল','মে','জুন','জুলাই','আগস্ট',
                    'সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর',

                    'শনিবার','রবিবার','সোমবার','মঙ্গলবার','বুধবার','বৃহস্পতিবার','শুক্রবার');
                $convertedDATE = str_replace($engDATE, $bangDATE, $currentDate);
                echo "$convertedDATE";
                ?> -
               ইমাম সাহেবকে খাবার দিবেন -
               <span class="text-danger">
                <?php
                $x = date('j');
                if($x == 1){
                  echo "শিকদার কামরুল ইসলাম";
                }elseif($x == 2){
                 echo "শিকদার কামরুল ইসলাম";
                }elseif($x == 3){
                  echo "মোঃ আল-আমিন (ডালিম)";
                }elseif($x == 4){
                  echo "মোঃ আল-আমিন (ডালিম)";
                }elseif($x == 5){
                  echo "ডাঃ কামরুজ্জামান মুকুল";
                }elseif($x == 6){
                  echo "ডাঃ কামরুজ্জামান মুকুল";
                }elseif($x == 7){
                  echo "জুঁই আক্তার";
                }elseif($x == 8){
                  echo "জুঁই আক্তার";
                }elseif($x == 9){
                  echo "মোঃ জাহিদুল ইসলাম";
                }elseif($x == 10){
                  echo "মোঃ জাহিদুল ইসলাম";
                }elseif($x == 11){
                  echo "মোঃ মাসুমুর রহমান";
                }elseif($x == 12){
                  echo "তুহিন খাঁন";
                }elseif($x == 13){
                  echo "তুহিন খাঁন";
                }elseif($x == 14){
                  echo "এমদাদ খাঁন";
                }elseif($x == 15){
                  echo "এমদাদ খাঁন";
                }elseif($x == 16){
                  echo "মোঃ ছাব্বির হোসেন";
                }elseif($x == 17){
                  echo "মোঃ ছাব্বির হোসেন";
                }elseif($x == 18){
                  echo "মোঃ মোশাররফ হোসেন";
                }elseif($x == 19){
                  echo "মোঃ মোশাররফ হোসেন";
                }elseif($x == 20){
                  echo "মোঃ গোলাম ছরোয়ার (পল্লি বিদ্যুৎ)";
                }elseif($x == 21){
                  echo "মোঃ গোলাম ছরোয়ার (পল্লি বিদ্যুৎ)";
                }elseif($x == 22){
                  echo "নাজমা আক্তার";
                }elseif($x == 23){
                  echo "নাজমা আক্তার";
                }elseif($x == 24){
                  echo "রফিকুল ইসলাম";
                }elseif($x == 25){
                  echo "রফিকুল ইসলাম";
                }elseif($x == 26){
                  echo "মোঃ রাসেল";
                }elseif($x == 27){
                  echo "মোঃ রাসেল";
                }elseif($x == 28){
                  echo "শিকদার ইদ্রিস আলী ";
                }elseif($x == 29){
                  echo "শিকদার ইদ্রিস আলী";
                }elseif($x == 30){
                  echo "শিকদার রুস্তম আলী";
                }elseif($x == 31){
                  echo "শিকদার রুস্তম আলী";
                }

                ?>
                </span>
              </div>
          </marquee>
       </h4>
     </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>




