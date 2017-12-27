//------------------------------------------
    //slider
//------------------------------------------
jQuery(document).ready(function() {
 
  jQuery("#ferry-slider").owlCarousel({
      navigation : true, // Show next and prev buttons
      slideSpeed : 200,
      pagination : true,
      paginationSpeed : 400,
      singleItem:true,
      video:true,
      autoPlay : true,
      transitionStyle : "fade",
      navigationText: [
      "<i class='fa fa-angle-left'></i>",
      "<i class='fa fa-angle-right'></i>"
      ]
    });
});


//------------------------------------------
    //scroll-top
//------------------------------------------
  jQuery(".ferry_scroll").hide();   
    jQuery(function () {
        jQuery(window).scroll(function () {
            if (jQuery(this).scrollTop() > 500) {
                jQuery('.ferry_scroll').fadeIn();
            } else {
                jQuery('.ferry_scroll').fadeOut();
            }
        });     
        jQuery('a.ferry_scroll').click(function () {
            jQuery('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });
    });   