

<!-- Footer Section Begin -->
  <footer class="footer spad">
   <div class="container">
       <div class="row">
           <div class="col-lg-3 col-md-6 col-sm-6">
               <div class="footer__about">
                   <div class="footer__about__logo">
                       <a href="./index.html"><img src="img/logo.png" alt=""></a>
                   </div>
                   <ul>
                       <li>Address: 60-49 Road 11378 New York</li>
                       <li>Phone: +65 11.188.888</li>
                       <li>Email: hello@colorlib.com</li>
                   </ul>
               </div>
           </div>
           <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
               <div class="footer__widget">
                   <h6>Useful Links</h6>
                   <ul>
                       <li><a href="#">About Us</a></li>
                       <li><a href="#">About Our Shop</a></li>
                       <li><a href="#">Secure Shopping</a></li>
                       <li><a href="#">Delivery infomation</a></li>
                       <li><a href="#">Privacy Policy</a></li>
                       <li><a href="#">Our Sitemap</a></li>
                   </ul>
                   <ul>
                       <li><a href="#">Who We Are</a></li>
                       <li><a href="#">Our Services</a></li>
                       <li><a href="#">Projects</a></li>
                       <li><a href="#">Contact</a></li>
                       <li><a href="#">Innovation</a></li>
                       <li><a href="#">Testimonials</a></li>
                   </ul>
               </div>
           </div>
           <div class="col-lg-4 col-md-12">
               <div class="footer__widget">
                   <h6>Join Our Newsletter Now</h6>
                   <p>Get E-mail updates about our latest shop and special offers.</p>
                   <form action="#">
                       <input type="text" placeholder="Enter your mail">
                       <button type="submit" class="site-btn">Subscribe</button>
                   </form>
                   <div class="footer__widget__social">
                       <a href="#"><i class="fa fa-facebook"></i></a>
                       <a href="#"><i class="fa fa-instagram"></i></a>
                       <a href="#"><i class="fa fa-twitter"></i></a>
                       <a href="#"><i class="fa fa-pinterest"></i></a>
                   </div>
               </div>
           </div>
       </div>
   </div>
</footer>
<!-- Footer Section End -->

<!-- Js Plugins -->
<script src="{{asset('frontend/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.slicknav.js')}}"></script>
<script src="{{asset('frontend/js/mixitup.min.js')}}"></script>
<script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.exzoom.js')}}"></script>
<script src="{{asset('frontend/js/jquery.elevateZoom.min.js')}}"></script>
<script src="{{asset('frontend/js/main.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/elevatezoom/2.2.3/jquery.elevatezoom.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Add To Cart count -->

<script>
    function updateCartCount() {
        $.ajax({
            url: "{{ route('front.cart.count') }}",
            type: 'GET',
            success: function(data) {
                $('#cart-count').text(data.count);
            },
            error: function(err) {
                console.log('Error fetching cart count', err);
            }
        });
    }

    // Call once on page load
    updateCartCount();

    // Then update every 10 seconds (adjust interval as needed)
    setInterval(updateCartCount, 1000);
</script>
</body>
</html>
