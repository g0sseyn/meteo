/* INSCRIPTION/CONNECTION */


$('.formInscriptionBtn').click(function(){
	$('#error').html('');
	var mail=$('#inputEmail').val();
	var pass=$('#inputPassword').val();	
	var hidden=$('#hidden').val();
	var response=$.post('controller/ajaxTraitment.php', { mail:mail,pass:pass,hidden:hidden},function(data) {
     if (response.responseText=='mail existant') {
     	$('#error').html('<small>mail existant,veuillez vous connectez sur la page principal  <a href="index.php?action=meteo">ici</a></small><p><small>ou recommencez avec un autre mail</small></p>');
     }else if (response.responseText=='error') {
     	$('#error').html('<small>erreur : rechargez la page et recommencez</small>');
     }else if (response.responseText=='Impossible de vous ajouter') {
     	$('#error').html('<small>impossible de vous ajouter</small>')
     }else if (response.responseText=='mail non valide'){
     	$('#error').html('<small>mail non valide</small>');
     }else if (response.responseText=='ok'){
     	$('#error').html('<p>Vous êtes bien inscris, vous allez être rediriger sur la page d\'accueil</p><p>veuillez vous connecter sur celle-ci</p>');
     	setTimeout(function(){
     		window.location.href = 'index.php?action=meteo';
     	},5000);
     }
   },'text');	
})
$('.formConnectionBtn').click(function(){
	$('#errorConnection').html('');
	var mail=$('#email').val();
	var pass=$('#password').val();	
	var response=$.post('controller/ajaxTraitment.php', { email:mail,password:pass},function(data) {
     if (response.responseText=='ok') {
     	window.location.href = 'index.php?action=meteo'
     }else {
     	$('#errorConnection').html('<small>Mauvais identifiant ou mot de passe !</small></br><small><a href="index.php?action=recup">mot de passe oublié ?</a></small>');
     }
   },'text');	
})


/*GESTION DES FAVORIS*/


function favoriteClick(){
	$('#fav').click(function(){
		var town=$('#loc').html();
		var response=$.get('controller/ajaxTraitment.php',{town:town},function(data){
			$('#fav').off('click');
			if (response.responseText=='ok') {
				$('#fav').html('ville bien ajouté aux favoris');
			}else if (response.responseText=='already') {
				$('#fav').html('ville deja dans vos favoris');
			}else {
				$('#fav').css('font-size','14px');
				$('#fav').html('erreur:impossible de rajouter cette ville');
			}
		},'text');
		favorite();
	})
}
function favorite(){
	var response=$.get('controller/ajaxTraitment.php?fav=1',function(data){
		var favorites = response.responseText.split('|');
		$('#favoriteTown').html('');
		if (favorites.length==1&&favorites[0]==['']) { return;}
		favorites.forEach(element=>$('#favoriteTown').append('<div class="container col-md-2"><a class="btn btn-info btn-block favBtn">'+element+'</a></div>'));
		$('.favBtn').click(function(e){
			apiCall = new ApiCall;
			apiCall.town=e.currentTarget.textContent;
			apiCall.byTown();
		})
	})
}
favorite();


/*PARAMETRE*/


function parametreFavorite(){
	var response=$.get('controller/ajaxTraitment.php?fav=1',function(data){
		var favorites= response.responseText.split('|');
		if (favorites.length==1&&favorites[0]==['']) { return;}
		favorites.forEach(element=>$('#choiceFavoriteTown').append('<div class="btn btn-info"><input type="radio" id="'+element+'Defaut" name="defautTown" value="'+element+'"><label for="'+element+'Defaut">'+element+'</label></div>'));
	})
}
parametreFavorite();
$('#defautTownBtn').click(function(){
	$('#messageDefautTown').hide().html()
	var defautTown=$('input:checked').val();
	var response=$.get('controller/ajaxTraitment.php',{defautTown:defautTown},function(data){
		if (response.responseText==='ok') {
			$('#messageDefautTown').css('display','inline-block').html('votre nouvelle ville Météo par defaut est : '+defautTown)
		}else $('#messageDefautTown').show().html('erreur: nous n\'avons pas pus changer votre ville par defaut');
	})
})
$('#newPassBtn').click(function(){
	$('#newPassMsg').html('');
	var mail=$('#inputEmail').val();
	var actualPass=$('#actualPassword').val();
	var newPassOne=$('#newPassword1').val();
	var newPassTwo=$('#newPassword2').val();
	if (mail==''||actualPass==''||newPassOne==''||newPassTwo=='') {
		$('#newPassMsg').html('tout les champs doivent être rempli');
		return;
	}
	if (newPassOne!==newPassTwo) {
		$('#newPassMsg').html('Vos deux mots de passe doivent être identique');
		return;
	}
	var response=$.post('controller/ajaxTraitment.php',{email:mail,password:actualPass,newPass:newPassOne},function(data){
		if (response.responseText=='ok') {
			var resp=$.post('controller/ajaxTraitment.php',{identifiant:mail,password:newPassOne},function(data){
				if (resp.responseText=='ok') {
					$('#newPassMsg').html('Mot de passe bien mis a jour');
				}else {
					$('#newPassMsg').html('Votre mot de passe n\'a pas pus être mis a jour');
				}
			})
		}else $('#newPassMsg').html('votre mot de passe actuel n\'est pas bon');
	})

})
$('#pseudoBtn').click(function(){
	var pseudo=$('#pseudo').val();
	$('#pseudoMsg').html();
	if (pseudo=='') {
		$('#pseudoMsg').html('erreur : veuillez rentrer un pseudo').css('color','red');
		return;
	}else {
		var response=$.get('controller/ajaxTraitment.php',{pseudo:pseudo},function(){
			if (response.responseText=='ok') {
				$('#pseudoMsg').html('parfait : votre pseudo a bien été mis a jour').css('color','green');;
			}else {
				$('#pseudoMsg').html('erreur : veuillez recommencez plus tard !').css('color','red');;
			}			
		})
	}

})

/* ADMIN*/


$(document).ready(function(){
	$('#resumeContent').keyup(function(){
		var nombreCaractere = $(this).val().length;
		if ((255-nombreCaractere)<0) {
			$('#caracLeft').html('Trop de caractère !');
			$('#addNewsBtn').attr('disabled',true).removeClass('btn-primary').addClass('btn-danger');
		}else {
			$('#caracLeft').html((255-nombreCaractere)+' restants');
			$('#addNewsBtn').attr('disabled',false).removeClass('btn-danger').addClass('btn-primary');
		}
	})
})
$(document).ready(function(){
	$('#titleContent').keyup(function(){
		var nombreCaractere = $(this).val().length;
		if ((150-nombreCaractere)<0) {
			$('#caracTitleLeft').html('Trop de caractère !');	
			$('#addNewsBtn').attr('disabled',true).removeClass('btn-primary').addClass('btn-danger');		
		}else {
			$('#caracTitleLeft').html((150-nombreCaractere)+' restants');
			$('#addNewsBtn').attr('disabled',false).removeClass('btn-danger').addClass('btn-primary');
		}
	})
})

/* CHANGEMENT DE VILLE */

$('#changeBtn').click(function(){
	apiCall = new ApiCall;
	apiCall.town=$('#search')[0].value;
	apiCall.byTown();
});
/* RECUPERATION DE MDP */
$('.recupBtn').click(function(){
	$('#error').html('');
	var recupMail=$('#recupEmail').val();
	var response=$.get('controller/ajaxTraitment.php',{recupMail:recupMail},function(data){
		if (response.responseText=='oui') {
			$('#error').html('mail envoyé à : '+recupMail);
		}else {
			$('#error').html('email non trouvé dans notre base de donnée');
		}
	});
})