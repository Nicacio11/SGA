M.AutoInit();
$(function(){

	$('.carousel.carousel-slider').carousel({
	    fullWidth: true,
			indicators: true

	  });

		$('.dropdown-trigger').dropdown();
		$('.dropdown-trigger').dropdown('recalculateDimensions')

		setInterval("next()", 7000);

});
function next(){
	$('.carousel').carousel('next');
}
function prev(){
	$('.carousel').carousel('prev');
}
