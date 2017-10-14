$(document).ready(function(){

	//read more in about
	$('.text-more-about').hide();
	$('.button-more-about-hide').hide();

	$('.button-more-about').click(function ( event ) {
		$(this).hide();
		$(this).siblings().toggle(700);
	});

	$('.button-more-about-hide').click(function ( event ) {
		$(this).hide();
		$(this).siblings().toggle(700);
	});
	// Gallery
	$(".fancybox").fancybox();

	// Reapply height for gallery items
	new Foundation.Equalizer($(".reflow-me-2")).applyHeight();

	// http://stackoverflow.com/a/25904582
	// Enable map zooming with mouse scroll when the user clicks the map
	$('.google-map').on('click', onMapClickHandler);

	// Owl carousel
	$("#about-diplomas").owlCarousel({
		itemsCustom: [[0, 3], [400, 3], [700, 5], [1000, 5], [1200, 6], [1600, 6]],
		autoPlay: true,
		lazyLoad: true,
		navigation : true,
		itemsScaleUp: true,
		navigationText: ["COFNIJ","DALEJ"],
		pagination: true
	});

	$(".owl-pagination").addClass("hide-for-small-only");

	// Attach scrollTo to nav links
	$('a[href^="index.php#"]').on('click',function (e) {
	    var target = this.hash;
	    var $target = $(target);
		$('html, body').animate({ 'scrollTop': $target.offset().top - 50 }, 800, 'swing');
			if(target){
				e.preventDefault();
		}
	});

	// Achieviements counter
	$(window).scroll(startCounter);

	// Open days in contact
	var day = new Date();
	var classOfday = new Array(7);
	classOfday[0] = $('.day-sun');
	classOfday[1] = $('.day-mon');
	classOfday[2] = $('.day-tue');
	classOfday[3] = $('.day-wen');
	classOfday[4] = $('.day-thu');
	classOfday[5] = $('.day-fri');
	classOfday[6] = $('.day-sat');
	var today = classOfday[day.getDay()];
	today.addClass("color-opacity-openday");

	// Plax in about (boss img)
	$('.about-boss').find('img').eq(1).plaxify({"xRange":5,"invert":true});
	$.plax.enable();

	// Mobile menu
	var menuButton = $('.dropdown-mobile-menu');
	var mobileNav = $('.mobile-nav');
	menuButton.on('click',function (e) {
			mobileNav.toggle(200);
	});

	// Mobile menu - hidden function
	var prev = 0;
	var $window = $(window);
	var nav = $('#navigation');

	$window.on('scroll', function(){
		var scrollTop = $window.scrollTop();
		if(scrollTop > prev){
				nav.addClass('hidden');
		} else {
			nav.removeClass('hidden');
		}
			prev = scrollTop;
	});

	if( navigator.userAgent.match(/Trident\/7\./) ) { // if IE
    	$('body').on("mousewheel", function () {
	        // remove default behavior
	        event.preventDefault();

	        //scroll without smoothing
	        var wheelDelta = event.wheelDelta;
	        var currentScrollPosition = window.pageYOffset;
	        window.scrollTo(0, currentScrollPosition - wheelDelta);
      });
    }

	// Contact form
	var form = $('#contactForm');
	var formMessages = $('.bg-res-form').find('p');
	var objectform =$('.bg-res-form');
	objectform.hide();

	$(function() {
		// Get the form.
		var form = $('#contactForm');
		var submitBlocker = $('#submit');
        submitBlocker.prop('disabled',false);
		// Set up an event listener for the contact form.
		$(form).submit(function(event) {
			// Stop the browser from submitting the form.
			event.preventDefault();
			submitBlocker.prop('disabled',true);
			// Serialize the form data.
			var formData = $(form).serialize();
				$.ajax({
	    			type: 'POST',
	    			url: $(form).attr('action'),
	    			data: formData
				})
				.done(function(data) {
				    // Make sure that the formMessages div has the 'success' class.
				    $(formMessages).removeClass('error');
				    $(formMessages).addClass('success');
						objectform.fadeIn("slow").delay(2000).fadeOut("slow");

						setTimeout(function(){
							submitBlocker.prop('disabled',false);
						}, 2000);

			    	// Set the message text.
						$(formMessages).text("response");

						// Clear the form.
						$('#name').val('');
						$('#email').val('');
						$('#message').val('');
				})
				.fail(function(data) {
				    // Make sure that the formMessages div has the 'error' class.
				    $(formMessages).removeClass('success');
				    $(formMessages).addClass('error');
						objectform.fadeIn(500).delay(2000).fadeOut("slow");

   					setTimeout(function(){
      					submitBlocker.prop('disabled',false);
   					}, 2000);

						// Set the message text.
						if (data.responseText !== '') {
					    $(formMessages).text(data.responseText);
						} else {
					    $(formMessages).text('Oops! An error occured and your message could not be sent.');
						}
				});
			});
		});

	// Achievements counter function
	function startCounter() {
		if ($(window).scrollTop() >500 ) {
		    	$(window).off("scroll", startCounter);
					$('.counterData').each(function () {
		    		var numbers = $(this);
		      	$({ Counter: 0 }).animate({ Counter: numbers.text(),},
						{
		      		duration: 4000,
		        	easing: 'linear',
		        	step: function () {
		        		numbers.text(Math.ceil(this.Counter));
		        	},
							complete: function (){
								startCounter.finish();
							}
		       	});
		      });
				}
		}

// end of $(document).ready()

});

// Init Foundation6
$(document).foundation();

// Reapply height when images in prices cards are fully loaded
// http://foundation.zurb.com/sites/docs/equalizer.html#applyheight
$("#card-img").load(function(){
	new Foundation.Equalizer($(".reflow-me")).applyHeight();
});

// http://stackoverflow.com/a/25904582
// Disable scroll zooming and bind back the click event
var onMapMouseleaveHandler = function (event) {
	var that = $(this);
	that.on('click', onMapClickHandler);
	that.off('mouseleave', onMapMouseleaveHandler);
	that.find('iframe').css("pointer-events", "none");
};

var onMapClickHandler = function (event) {
	var that = $(this);

	// Disable the click handler until the user leaves the map area
	that.off('click', onMapClickHandler);

	// Enable scrolling zoom
	that.find('iframe').css("pointer-events", "auto");

	// Handle the mouse leave event
	that.on('mouseleave', onMapMouseleaveHandler);
};
