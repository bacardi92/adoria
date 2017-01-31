jQuery(document).ready(function($){
	$(document).on('click', '.catIsotopeLink', function(e){
		e.preventDefault();
		var filterPara = $(this).attr('href');
		$('html,body').animate({
       scrollTop: $("#filterBar").offset().top -120
    }, 600, function(){
    	$(filterPara).click();
    });

	})
	var $grid = $('.blog_posts_container').isotope({
	  itemSelector: '.blogPost',
	  layoutMode: 'fitRows'
	});
	var filters = {};
	$('.filters_s').on( 'click', '.filter-button', function(e) {
	  e.preventDefault();
	  var $this = $(this);
	  var $buttonGroup = $this.parents('.filter-group');
	  var filterGroup = $buttonGroup.attr('data-filter-group');
	  filters[ filterGroup ] = $this.attr('data-filter');
	  var filterValue = concatValues( filters );
	  $grid.isotope({ filter: filterValue });
	});
	$('.filter-group').each( function( i, buttonGroup ) {
	  var $buttonGroup = $( buttonGroup );
	  $buttonGroup.on( 'click', '.filter-button', function(e) {
	  	e.preventDefault();
	    $( this ).parents().eq(1).find('.is-checked').removeClass('is-checked');
	    $( this ).addClass('is-checked');
	  });
	});
	function concatValues( obj ) {
	  var value = '';
	  for ( var prop in obj ) {
	    value += obj[ prop ];
	  }
	  return value;
	}

	var button = $("#loadMore");
	var loading = false;
	var scrollHandling = {
    allow: true,
	    reallow: function() {
        scrollHandling.allow = true;
	    },
	    delay: 0 //(milliseconds) adjust to the highest acceptable value
		};
		var page = $("#loadMore").data('paged');
		var category = $("#loadMore").data('category');
		var max = $("#loadMore").data('max');
	$(window).scroll(function(){		
		
		if( ! loading && scrollHandling.allow ) {
				scrollHandling.allow = false;
				setTimeout(scrollHandling.reallow, scrollHandling.delay);
				var offset = $(button).offset().top - $(window).scrollTop();			 
				if( 500 > offset ) {
					loading = true;
					var data = {
						action: "load_more_posts",
						category: category,
						paged: page
					}
					if(page <= max){
						$.ajax({

							type:"POST",
							url:objectAjax.ajaxurl,
							data: data,
							success:function(html){
								$("#loadMore").parent().before(html);
								page = page+1;
								loading = false;
								$('.blogPost.appended-post').hide();
								
							}

						}).then(function(){
							$('.blogPost.appended-post').fadeIn();
							$grid.isotope('appended', $('.blogPost.appended-post'));
							$('.blogPost.appended-post').removeClass('appended-post');
							$(".filter-button.is-checked").click();
						});
					}else{
						$("#loadMore").hide();
						loading = true;
					}
				}
			}
	})

});
