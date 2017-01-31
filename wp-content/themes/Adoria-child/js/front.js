$(document).ready(function(){
    var el = $('#employees'), el2 = $('#s_circle'), el3 = $('#locations'), inited = false;
    el.appear({ force_process: true });
    el2.appear({ force_process: true });
    el3.appear({ force_process: true });

    var sampleData1 = [["Europe", Adoria.adoria_clients_europe/100],
    				   ["Australia", Adoria.adoria_clients_australia/100],
    				   ["USA", Adoria.adoria_clients_usa/100]];
    el.one('appear', function() {
        if (!inited) {
            el.circleProgress({
                startAngle: -Math.PI / 4 * 8,
                value: Adoria.adoria_employees_phd/100,
                size: 150,
                fill: { color: "#56c4e3"}
            }).on('circle-animation-progress', function(event, progress) {
                $(this).find('strong').html(parseInt(Adoria.adoria_employees_phd * progress) + '<i>%</i>');
            });
        }
    });

    el2.one('appear', function() {
        if (!inited) {
            el2.circleProgress({
                startAngle: -Math.PI / 4 * 8,
                value: Adoria.adoria_employees_fluent_english/100,
                size: 150,
                fill: { color: "#50c788"}
            }).on('circle-animation-progress', function(event, progress) {
                $(this).find('strong').html(parseInt(Adoria.adoria_employees_fluent_english * progress) + '<i>%</i>');
            });
        }
    });

    el3.one('appear', function() {
        if (!inited) {
            el3.drawCSSBipolarChart({
              simpleBar: true,
              bothSides: false,
              bipolar: false,
              data: sampleData1,
              colors: {  right: '#90caf9'}
            });
        }
    });


    $('.slider-testimonial').slick({
	  slidesToShow: 1,
	  slidesToScroll: 1,
	  arrows: false,
	  fade: true,
      speed: 300,
      autoplay: true,
	  asNavFor: '.slider-testimonial-nav',
      responsive: [
        {
          breakpoint: 600,
          settings: {
            autoplay: true,
          }
        },
        {
          breakpoint: 480,
          settings: {
            autoplay: true,
          }
        },
        {
          breakpoint: 380,
          settings: {
            autoplay: true,
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
	});

	$('.slider-testimonial-nav').slick({
	  slidesToShow: 6,
	  slidesToScroll: 1,
	  asNavFor: '.slider-testimonial',
	  dots: false,
	  centerMode: true,
      autoplay: true,
	  focusOnSelect: true,
      responsive: [
        {
          breakpoint: 600,
          settings: {
            autoplay: false,
            slidesToShow: 3,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 480,
          settings: {
            autoplay: false,
            slidesToShow: 3,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 380,
          settings: {
            autoplay: false,
            slidesToShow: 2,
            slidesToScroll: 1
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
	});

    $(".scrollToIndustry").on('click', function(e){
        e.preventDefault();
        $('html,body').animate({
           scrollTop: $("#industrySection").offset().top -40
        }, 600);
    });
});

