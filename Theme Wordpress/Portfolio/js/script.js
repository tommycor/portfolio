var timeOut;

$(window).load(function() {
	
	/*var ulHeightMiddleMain = $('.mainMenu ul').height()/2;
	var marginTopMain = ($('nav').height()/2) - ulHeightMiddleMain;					//calcdive le margin top de base
	$('.mainMenu ul').css('margin-top',marginTopMain);								//Cale le margin top de base
	*/

	replaceMenu();
	replaceSeparation();
	var size;
	var view = window.innerWidth;

	/*if( view < 1200) size = "small";
	else size = "big";*/
	

	
	var offset = $('nav').offset();											//calcdive l'offset de base


	intro();
	

	$('nav').mouseenter(function(e){
		clearTimeout(timeOut);
		$('nav .menu').show( "slide",1000);
		$('nav').animate({width: 340},1000);
	});
	$('nav').mouseleave(function(e){
		timeOut = setTimeout(hideMenu, 3000);
	});



	$('nav .menu div:not(.subMenu2) ul li').click(function(e) {
		var currentId = $(this).attr('id');
		$('nav .menu ul').find('li').removeClass('current');
		$(this).parents('ul').find('li').addClass('current');
		$('nav .menu .mainMenu').find('li').addClass('current');
		$('nav').find('li:not(.current)').hide( "slide",500);
		$('nav').find('li.'+currentId).addClass('current');
		$('nav').find('li.'+currentId).delay(500).show( "slide",500, function(){
			replaceMenuDicted();
		});
	});





	/*$('nav .menu div').mouseenter(function(e){
		var y = e.pageY - offset.top - $(this).find('ul').height()/2;								//Bim, ça te balance le margin à définir pour mouv le truc!
		var middle = ($('nav .menu').height()/2) - ($(this).find('ul').height()/2);					//Position de départ
		y = middle - ((middle - y)/2);																//moyenne chelou
		$(this).find('ul').animate({"margin-top": +y+ "px"},500);
	});
	$('nav .menu div').mouseleave(function(e){
		$(this).find('ul').animate({"margin-top": + ($('nav .menu').height()/2) - ($(this).find('ul').height()/2) + "px"},500);
	});*/




	$('nav a').click(function(e) {
		e.preventDefault();
		$('nav a').removeClass('on');
		$(this).addClass('on');
		var url = $(this).attr('href');

		$('article').hide( "slide", {direction: 'right'},function(){
			$(this).parent('.mainContent').append('<img src="http://tommycor.cluster014.ovh.net/wordpress/wp-content/themes/Portfolio/img/chargement.gif" class="loader">');
			$('article').load(url+" article>*",function() {
				$(this).parent('.mainContent').find('.loader').remove();
				$('article').show( "slide", {direction: 'right'}, function(){
					$(".flexslider").flexslider({
						animation: "slide",
						slideshowSpeed: 5000,
						controlNav: false,
						animationLoop: true,
						prevText: "",
						nextText: "",
						pauseOnHover: true
					});
				});
			});
		});
	});

	$(window).resize(function(){
		view = window.innerWidth;
		if( view < 1200) size = "small";
		else size = "big";

		console.log(size);
	});

	$('body').on('submit', '#contact', function() {
		var name = $('#name').val();
        var email = $('#email').val();
        var message = $('#message').val();
		var robot1 = $('#robot1').is(':checked');
		var robot2 = $('#robot2').is(':checked');
		var error = false;
		var $form = $(this);

		if(name == ""){
			error=true;
			$('#name').addClass("error");
		}else{
			$('#name').removeClass("error");
		}
		if(email == ""){
			error=true;
			$('#email').addClass("error");
		}else{
			$('#email').removeClass("error");
		}
		var reg = new RegExp('^[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*@[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*[\.]{1}[a-z]{2,6}$', 'i');
		if (!reg.test(email)){
			error=true;
			$('#email').addClass("error");
		}else{
			$('#email').removeClass("error");
		}
		if(message == ""){
			error=true;
			$('#message').addClass("error");
        }else{
			$('#message').removeClass("error");
		}
		if (error == false){
			$.ajax({
				url: $form.attr('action'),
				type: $form.attr('method'),
				data: { name:name, email:email, message:message, robot1:robot1, robot2:robot2},
				success: function(result) {
					if (result == "true") {
						$form.remove();
						inscriptionMsg = '<strong>Message envoyé</strong>';
						$('article').append(inscriptionMsg);
					} else {
						$form.find('#email').addClass('error');
					}
                }
            });
        }
        return false;
	});

	
});



function replaceMenu()
{
	$('nav div ul').each(function(){
		$(this).css('margin-top', ($(this).parents('.menu').height()/2) - $(this).height()/2);
	});
}
function replaceMenuDicted()
{
	//var liste = $(id).parents('ul');
	//liste.delay(500).css('marginTop', ((liste.parents('.menu').height()/2) - liste.height()/2)+"px");
	//liste.animate({marginTop: '50px'},400);
	$('nav div ul').each(function(){
		$(this).animate({marginTop: (($(this).parents('.menu').height()/2) - $(this).height()/2)+"px"}, 300);
	});
}
function replaceSeparation()
{
	$('nav .separation').each(function(){
		$(this).css('height', $('.mainMenu').find('ul').height());
		$(this).css('margin-top', ($('nav').find('.menu').height()/2) - $(this).height()/2);
	});
}
function intro(){
	$('nav .menu').hide( "slide",1000,function(e) {
		$(this).find("div:not(.mainMenu) ul li").hide();
	});
	$('nav').animate({width: 70},1000);
}
function hideMenu(){
	$('nav .menu').hide( "slide");
	$('nav').animate({width: 70},1000);
}



	