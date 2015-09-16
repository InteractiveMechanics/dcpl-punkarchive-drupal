$( document ).ready(function() {

	/* GRID / ISOTOPE */

	$('.grid').isotope({
	  // options
	  itemSelector: '.grid-item',
	  layoutMode: 'masonry'
	});


	$('.filter-button-group').on( 'click', 'button', function() {
	  var filterValue = $(this).attr('data-filter');
	  $grid.isotope({ filter: filterValue });
	});

	/* DOT NAV */

$(window).bind('scroll',function(e){

	var main_container_offset = $("#mainContainer").offset().top - 5;
	var scroll_ = $(window).scrollTop();

	if ( !$('#dotNav').is(':visible') ) {
		if(scroll_ >= main_container_offset) { 
			$('#dotNav').show();
		}
	}

	if ( $('#dotNav').is(':visible') ) {
		if(scroll_ < main_container_offset) { 
			$('#dotNav').hide();
		}
	}
 // redrawDotNav();
});

function redrawDotNav(){
  
  	var topNavHeight = 50;
  	var numDivs = $('section').length;

  	$('#dotNav li a').removeClass('active').parent('li').removeClass('active');  	
  	$('section').each(function(i,item){
      var ele = $(item), nextTop;
      
      console.log(ele.next().html());
      
      if (typeof ele.next().offset() != "undefined") {
        nextTop = ele.next().offset().top;
      }
      else {
        nextTop = $(window).height();
      }
      
      if (ele.offset() !== null) {
        thisTop = ele.offset().top - ((nextTop - ele.offset().top) / numDivs);
      }
      else {
        thisTop = 0;
      }
      
      var docTop = $(window).scrollTop()+topNavHeight;
      
      if(docTop >= thisTop && (docTop < nextTop)){
        $('#dotNav li').eq(i).addClass('active');
      }
	});   
}

/* get clicks working */
$('#dotNav li').click(function(){

	$('#dotNav li').removeClass('active');
	$(this).addClass('active');
  
	var id = $(this).find('a').attr("href"),
      posi,
      ele,
      padding = $('.navbar-fixed-top').height();
  
	ele = $(id);
	posi = ($(ele).offset()||0).top - padding;
  
	$('html, body').animate({scrollTop:posi}, 'slow');
  
	return false;
});


/* POPOVER */ 

//$(function () {
  $('[data-toggle="popover"]').popover()
//})

/* MAP can be found in map.js */

/* MAP MODAL */

var map = L.map('overlayMap').setView([38.9, -77.015], 13);

L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
    maxZoom: 18,
    id: 'cahdeemer.n4p0ijc0',
    accessToken: 'pk.eyJ1IjoiY2FoZGVlbWVyIiwiYSI6ImIwYzM3OGYyZTBmYmZlMWJmMzQ5OTNmZWRjMTA3NjNmIn0.4lMKKySybu846ym7-BNbYA'
}).addTo(map);


$('#myModal').on('shown.bs.modal', function(){
  setTimeout(function() {
    map.invalidateSize();
    //alert("Hey, your function is working!");
  }, 10);
 });


});
