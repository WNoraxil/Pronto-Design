// JQuery Slider

$('#right-arrow').click(function() {
  var currentSlide = $('.slide.active');
  var nextSlide = currentSlide.next();

  currentSlide.fadeOut(900).removeClass('active');
  nextSlide.fadeIn(900).addClass('active');

  if (nextSlide.length == 0) {
    $('.slide').first().fadeIn(900).addClass('active')
  }
});

$('#left-arrow').click(function(){
  var currentSlide = $('.slide.active');
  var prevSlide = currentSlide.prev();

  currentSlide.fadeOut(900).removeClass('active');
  prevSlide.fadeIn(900).addClass('active');

  if (prevSlide.length == 0) {
    $('.slide').last().fadeIn(900).addClass('active');
  }
});

$(function() {
  $( "#btn" ).click(function() {
    $( "#btn" ).addClass( "onclic", 250, validate);
  });

  function validate() {
    setTimeout(function() {
      $( "#btn" ).removeClass( "onclic" );
      $( "#btn" ).addClass( "validate", 450, callback );
    }, 2250 );
  }
    function callback() {
      setTimeout(function() {
        $( "#btn" ).removeClass( "validate" );
      }, 1250 );
    }
  });
