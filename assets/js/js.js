M.AutoInit();
$(function(){
	 $(document).ready(function(){
    $('.slider').slider();
  });
	$('.carousel.carousel-slider').carousel({
	    fullWidth: true
	  });

		$('.dropdown-trigger').dropdown();
		$('.dropdown-trigger').dropdown('recalculateDimensions')

});
function next(){
	$('.carousel').carousel('next');
}
function prev(){
	$('.carousel').carousel('prev');
}
