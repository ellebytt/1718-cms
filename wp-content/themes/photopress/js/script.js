 //Masonry

jQuery(document).ready(function($){

var $container = $('.masonry').imagesLoaded( function() {
//var $container = $('.masonry');
$container.imagesLoaded(function(){
$container.masonry({
  // options
  //columnWidth: '.grid-sizer',
  itemSelector: '.grid-item',
  percentPosition: true,
  //columnWidth: 200
});});});

//jQuery('ul.sf-menu').superfish();
$(".portfolio-gallery").masonry({
  itemSelector: ".album-item",
}); 

  $('#cssmenu').prepend('<div id="menu-button">Menu</div>');
  $('#cssmenu #menu-button').on('click', function(){
    var menu = $(this).next('ul');
    if (menu.hasClass('open')) {
      menu.removeClass('open');
    } else {
      menu.addClass('open');
    }
  });
});
