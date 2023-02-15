  <!-- Vendor JS -->
  <script src="{{asset('assetsUser/js/vendor/jquery-3.5.1.min.js')}}"></script>
  <script src="{{asset('assetsUser/js/vendor/popper.min.js')}}"></script>
  <script src="{{asset('assetsUser/js/vendor/bootstrap.min.js')}}"></script>
  <script src="{{asset('assetsUser/js/vendor/jquery-migrate-3.3.0.min.js')}}"></script>
  <script src="{{asset('assetsUser/js/vendor/modernizr-3.11.2.min.js')}}"></script>

  <!--Plugins JS-->
  <script src="{{asset('assetsUser/js/plugins/swiper-bundle.min.js')}}"></script>

  <script src="{{asset('assetsUser/js/plugins/nouislider.js')}}"></script>

  <script src="{{asset('assetsUser/js/plugins/countdownTimer.min.js')}}"></script>
  <script src="{{asset('assetsUser/js/plugins/scrollup.js')}}"></script>
  <script src="{{asset('assetsUser/js/plugins/jquery.zoom.min.js')}}"></script>
  <script src="{{asset('assetsUser/js/plugins/slick.min.js')}}"></script>
  <script src="{{asset('assetsUser/js/plugins/infiniteslidev2.js')}}"></script>
  <script src="{{asset('assetsUser/js/vendor/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{asset('assetsUser/js/plugins/jquery.sticky-sidebar.js')}}"></script>



  <!-- Google translate Js -->
  <script src="{{asset('assetsUser/js/vendor/google-translate.js')}}"></script>
  <script>
      function googleTranslateElementInit() {
          new google.translate.TranslateElement({ pageLanguage: 'en' }, 'google_translate_element');
      }
  </script>
  <!-- Main Js -->
  <script src="{{asset('assetsUser/js/main.js')}}"></script>
  <script src="{{asset('assetsUser/js/vendor/index.js')}}"></script>




<script>

  $(document).on('click','.quickview',function(e){
    categoryUser_id=$(this).attr("href");
    $.ajax({
      type:"GET",
      url:'/categoryUser/'+categoryUser_id,
      success:function(data){
    console.log(data);


    jQuery('.img-responsive').attr('src', "../images/"+data.image+"");
    $('.nameP').html(data.name);
    if(data.offer==null){
        $('.price-modal').html(data.price);
        $('.old-price-modal').html('');

    }else{
        $('.old-price-modal').html(data.offer.oldPrice);
        $('.new-price-modal').html(data.offer.newPrice);


    }
    $('.sortD').html(data.sortDescription);
    console.log(data.color)

    data.color.forEach(function (color) {


        $('.color-modal').append('<li class="colorMM" ><span class="colorMM" style="background-color:'+color+';"></span></li>')

     })






      }
    });
    });
    $("#ec_quickview_modal").on('hide.bs.modal', function(){
        $('.colorMM').remove()
    });
</script>
