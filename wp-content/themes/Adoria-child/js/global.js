jQuery(document).ready(function($){
	$(window).scroll(function() {
		if ($(this).scrollTop() > 1){  
	    $('header').addClass("sticky-header");
	    $("#backToTop").fadeIn(400);
	  }
	  else{
	    $('header').removeClass("sticky-header");
	    $("#backToTop").fadeOut(400);
		}
	});
	$("#backToTop").on('click', function(e){
		e.preventDefault();
		 	$('html,body').animate({
         scrollTop: $("body").offset().top
      }, 600);
	})
	$('.loadingImg').load(function(){
		$(this).removeClass('loadingImg');
		$(this).addClass('loadedImg');
		$(this).removeAttr('data-src');
	})
	$('.loadingImg').on('error', function(){
		$(this).removeAttr('data-src');
		$(this).removeAttr('src');
	})
})

var lazy_parent_id='adoriaBodyContent';

function lazy_load_proc() {
    var doc = document.documentElement;
    var body = document.body;

    if (typeof(window.innerWidth) == 'number') {
        my_width = window.innerWidth;
        my_height = window.innerHeight;
    }
    else if (doc && (doc.clientWidth || doc.clientHeight)) {
        my_width = doc.clientWidth;
        my_height = doc.clientHeight;
    }
    else if (body && (body.clientWidth || body.clientHeight)) {
        my_width = body.clientWidth;
        my_height = body.clientHeight;
    }

    if (doc.scrollTop) { dy=doc.scrollTop; } else { dy=body.scrollTop; }

    var container=document.getElementById(lazy_parent_id);
    if (container) {
        var im=container.getElementsByTagName('img');
        for (var i=0; i<im.length; i++) {
            var el=im[i];
            var ds=el.getAttribute('data-src'); 
            if (ds) {
                var coord=lazy_get_position(el);
                if (coord.y>(dy-my_height-700) && coord.y<(dy+my_height+700)) {
                    el.setAttribute('src',ds);
                    el.lazy='';
                }
            }
        }
    }
}

function lazy_get_position(element) {
    var offsetLeft=0;
    var offsetTop=0;
    do {
        offsetLeft+=element.offsetLeft;
        offsetTop+=element.offsetTop;
    }
    while (element=element.offsetParent);
    return {x:offsetLeft, y:offsetTop};
}

window.onscroll = lazy_load_proc;
window.onresize = lazy_load_proc;
lazy_load_proc(); 