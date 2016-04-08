$( document ).ready(function() {

	/* GRID / ISOTOPE */
	$('.filter-button-group').on( 'click', 'button', function() {
	  var filterValue = $(this).attr('data-filter');
	  $grid.isotope({ filter: filterValue });
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
$('[data-toggle="popover"]').popover()

/* MAP can be found in map.js */

