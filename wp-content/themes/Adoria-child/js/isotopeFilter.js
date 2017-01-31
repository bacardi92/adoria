jQuery(document).ready(function($){
	var $grid = $('.latest-works').isotope({
	  itemSelector: '.succes-story'
	});
	var filters = {};
	$('.filters').on( 'click', '.filter-button', function(e) {
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

	$(function(){
	    $('.carousel').carousel({
	      interval: 5000
	    });
	});
});
