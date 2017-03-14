  <footer id="footer">
            <div class="container">
                <div class="col-md-4 col-sm-6">
                    <h4>About Bigdata Center</h4>

                    <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>

                    <hr>

                    <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>

                    <!--<form>
                        <div class="input-group">

                            <input type="text" class="form-control">

                            <span class="input-group-btn">

                        <button class="btn btn-default" type="button"><i class="fa fa-send"></i></button>

                    </span>

                        </div>
                    </form>-->

                    <hr class="hidden-md hidden-lg hidden-sm">

                </div>
                <!-- /.col-md-3 -->

                <div class="col-md-4 col-sm-6">

                    <h4>Recent Tweets</h4>

                    <div class="blog-entries">
                        <div class="item same-height-row clearfix">
                            <div class="image same-height-always">
                                <a href="#">
                                    <i class="fa fa-twitter" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="name same-height-always">
                                <p><span style="color:#fff;"> @Ravindra</span> Pellentesque habitant morbi tristique senectus et netus.</p>
                            </div>
                        </div>

                        <div class="item same-height-row clearfix">
                            <div class="image same-height-always">
                                <a href="#">
                                    <i class="fa fa-twitter" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="name same-height-always">
                                <p><span style="color:#fff;"> @Ravindra</span> Pellentesque habitant morbi tristique senectus et netus.</p>
                            </div>
                        </div>

                        <div class="item same-height-row clearfix">
                            <div class="image same-height-always">
                                <a href="#">
                                    <i class="fa fa-twitter" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="name same-height-always">
                                <p><span style="color:#fff;"> @Ravindra</span> Pellentesque habitant morbi tristique senectus et netus.</p>
                            </div>
                        </div>
                    </div>

                    <hr class="hidden-md hidden-lg">

                </div>
                <!-- /.col-md-3 -->

                <div class="col-md-4 col-sm-6">

                    <h4>Contact</h4>

                    <p><strong>Bigdata Ltd.</strong>
                        <br>13/25 New Avenue
                        <br><i class="fa fa-link" aria-hidden="true"></i> www.bigdatacenter.com
                        <br><i class="fa fa-envelope-o" aria-hidden="true"></i> info@bigdatacenter.com
                        <br><i class="fa fa-phone" aria-hidden="true"></i> 123 456 789
                        <br><i class="fa fa-map-marker" aria-hidden="true"></i> Hyderabad
                    </p>
                    <hr class="hidden-md hidden-lg hidden-sm">

                </div>
                <!-- /.col-md-3 -->
            </div>
            <!-- /.container -->
        </footer>
        <!-- /#footer -->

        <!-- *** FOOTER END *** -->

        <!-- *** COPYRIGHT ***
_________________________________________________________ -->

        
        <!-- /#copyright -->

        <!-- *** COPYRIGHT END *** -->



    </div>
	<div id="copyright">
            <div class="container">
                <div class="col-md-12 footer-content">
                    <div class="col-md-8 col-xs-8" style="text-align:left;"><p>&copy; 2017. Bigdata Center&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a>Privacy Policy</a><a>&nbsp;&nbsp;&nbsp;&nbsp;Terms & Conditions</a></div>
                    </p>
                    <p class="" style=" text-align:center;"><a href="contact.html" class="btn btn-small btn-template-main pull-right footer-live">Live Chat</a></p>
                    <p class="pull-right footer-social">
                      <i class="fa fa-facebook" style="padding-left:15px;" aria-hidden="true"></i> 
                      <i class="fa fa-twitter" style="padding-left:15px;" aria-hidden="true"></i> 
                      <i class="fa fa-linkedin" style="padding-left:15px;" aria-hidden="true"></i> 
                      <i class="fa fa-google-plus"  style="padding-left:15px; margin-right:100px;" aria-hidden="true"></i>
                    </p>

                </div>
            </div>
        </div>
    <!-- /#all -->

    <!-- #### JAVASCRIPT FILES ### -->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="js/jquery-1.11.0.min.js"><\/script>')
    </script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

    <script src="js/jquery.cookie.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/jquery.parallax-1.1.3.js"></script>
    <script src="js/front.js"></script>

    

    <!-- owl carousel -->
    <script src="js/owl.carousel.min.js"></script>
    <script>

        $('#myCarousel').carousel();
        var winWidth = $(window).innerWidth();
        $(window).resize(function () {

            if ($(window).innerWidth() < winWidth) {
                $('.carousel-inner>.item>img').css({
                    'min-width': winWidth, 'width': winWidth
                });
            }
            else {
                winWidth = $(window).innerWidth();
                $('.carousel-inner>.item>img').css({
                    'min-width': '', 'width': ''
                });
            }
        });
    </script>
    <script>
	
       /** Document Ready Functions **/
/********************************************************************/

$( document ).ready(function() {
$("#copyright").fadeOut();
/*var lastScrollTop = 0;
$(window).scroll(function(event){
   var st = $(this).scrollTop();
   if (st > lastScrollTop){
       alert("scroll up")
   } else {
   $("#copyright").css("display",block);
      alert("scroll down")
   }
   lastScrollTop = st;
});*/

   $(window).scroll(function() {

    if ($(this).scrollTop()>0)
     {
       $("#copyright").fadeIn(); 
     }
    else
     {
	 $("#copyright").fadeOut();
      
     }
 });

    // Resive video
    scaleVideoContainer();

    initBannerVideoSize('.video-container .poster img');
    initBannerVideoSize('.video-container .filter');
    initBannerVideoSize('.video-container video');
        
    $(window).on('resize', function() {
        scaleVideoContainer();
        scaleBannerVideoSize('.video-container .poster img');
        scaleBannerVideoSize('.video-container .filter');
        scaleBannerVideoSize('.video-container video');
    });

});

/** Reusable Functions **/
/********************************************************************/

function scaleVideoContainer() {

    var height = $(window).height();
    var unitHeight = parseInt(height) + 'px';
    $('.homepage-hero-module').css('height:auto;',unitHeight);

}

function initBannerVideoSize(element){
    
    $(element).each(function(){
        $(this).data('height', $(this).height());
        $(this).data('width', $(this).width());
    });

    scaleBannerVideoSize(element);

}

function scaleBannerVideoSize(element){

    var windowWidth = $(window).width(),
        windowHeight = $(window).height(),
        videoWidth,
        videoHeight;
    
    console.log(windowHeight);

    $(element).each(function(){
        var videoAspectRatio = $(this).data('height')/$(this).data('width'),
            windowAspectRatio = windowHeight/windowWidth;

        if (videoAspectRatio > windowAspectRatio) {
            videoWidth = windowWidth;
            videoHeight = videoWidth * videoAspectRatio;
            $(this).css({'top' : -(videoHeight - windowHeight) / 2 + 'px', 'margin-left' : 0});
        } else {
            videoHeight = windowHeight;
            videoWidth = videoHeight / videoAspectRatio;
            $(this).css({'margin-top' : 0, 'margin-left' : -(videoWidth - windowWidth) / 2 + 'px'});
        }

        $(this).width(videoWidth).height(videoHeight);

        $('.homepage-hero-module .video-container video').addClass('fadeIn animated');
        

    });
}
    </script>
	
	<script>
	   ( function( window ) {

'use strict';

// class helper functions from bonzo https://github.com/ded/bonzo

function classReg( className ) {
  return new RegExp("(^|\\s+)" + className + "(\\s+|$)");
}

// classList support for class management
// altho to be fair, the api sucks because it won't accept multiple classes at once
var hasClass, addClass, removeClass;

if ( 'classList' in document.documentElement ) {
  hasClass = function( elem, c ) {
    return elem.classList.contains( c );
  };
  addClass = function( elem, c ) {
    elem.classList.add( c );
  };
  removeClass = function( elem, c ) {
    elem.classList.remove( c );
  };
}
else {
  hasClass = function( elem, c ) {
    return classReg( c ).test( elem.className );
  };
  addClass = function( elem, c ) {
    if ( !hasClass( elem, c ) ) {
      elem.className = elem.className + ' ' + c;
    }
  };
  removeClass = function( elem, c ) {
    elem.className = elem.className.replace( classReg( c ), ' ' );
  };
}

function toggleClass( elem, c ) {
  var fn = hasClass( elem, c ) ? removeClass : addClass;
  fn( elem, c );
}

var classie = {
  // full names
  hasClass: hasClass,
  addClass: addClass,
  removeClass: removeClass,
  toggleClass: toggleClass,
  // short names
  has: hasClass,
  add: addClass,
  remove: removeClass,
  toggle: toggleClass
};

// transport
if ( typeof define === 'function' && define.amd ) {
  // AMD
  define( classie );
} else {
  // browser global
  window.classie = classie;
}

})( window );
	</script>


</body>

</html>