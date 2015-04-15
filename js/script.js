$(function() {
 	var $inscription = $(".inscription")
 	, $connexion = $(".connexion")
 	, $buttonco = $(".buttonco")
 	, $buttoninscri = $(".buttoninscri");

 	var setHandler = function() {
 		$inscription.on('click',function() {
 			$inscription.animate({left : "-15%"});
 			$connexion.animate({left : "85%"});
 			$connexion.css({'z-index': "0"});
 			$inscription.css({'z-index': "3"});
 			$buttonco.css({'visibility' : "visible"});
 			$buttoninscri.css({'visibility' : "hidden"});
 		});

 		$connexion.on('click',function() {
 			$connexion.animate({left : "15%"});
 			$inscription.animate({left : "-85%"});
 			$connexion.css({'z-index': "3"});
 			$inscription.css({'z-index': "0"});
 			$buttoninscri.css({'visibility' : "visible"});
 			$buttonco.css({'visibility' : "hidden"});
 		});
 	}

 	setHandler();
});