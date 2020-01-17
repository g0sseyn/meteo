/*function ajaxGet(url, callback) {
	var req = new XMLHttpRequest();
	req.open("GET", url);
	req.addEventListener("load", function () {
		if (req.status >= 200 && req.status < 400) {         
			callback(req.responseText);
		} else {
			console.error(req.status + " " + req.statusText + " " + url);
		}
	});
	req.addEventListener("error", function () {
		console.error("Erreur réseau avec l'URL " + url);		
	});
	req.send(null);
};*/
/*ajaxGet("api.openweathermap.org/data/2.5/weather?q=London,uk&APPID=94aeaac607f35f0321198d06698d24a6", function (reponse) {
	var meteos = JSON.parse(reponse);		
	meteos.forEach(function(station) {
	$('#meteo').html(meteos);
		
	})	
});*/
/* $.get('http://api.openweathermap.org/data/2.5/box/city?bbox=12,32,15,37,10&APPID=94aeaac607f35f0321198d06698d24a6',function (reponse) {
	console.log(reponse);
	var stations = reponse;
	stations.list.forEach(	function(station){
	$('#meteo').append('<div class="name"> nom station : '+station.name+'</div>');
	$('#meteo').append('<div class="cloud"> couverture nuageuse : '+station.clouds.today+'%</div>');
	$('#meteo').append('<div class="temperature"> temperature moyenne : '+station.main.temp+'°C</div>');
	$('#meteo').append('<div class="humidity"> humidité : '+station.main.humidity+'%</div>');
		}	)
})
*/
class Meteo {
	constructor(){
		this.id=$('#meteo').attr('class');
		this.showMeteo(this.id);
		this.showSun(this.id);
	}
	showMeteo(id){
		$.get('http://api.openweathermap.org/data/2.5/weather?id='+id+'&APPID=94aeaac607f35f0321198d06698d24a6',function (reponse) {
			$('#meteo').append('<p> météo pour la ville de: '+reponse.name+'</p>');	
			$('#cloud').append('<p> couverture nuageuse: '+reponse.clouds.all+'</p>');	
			$('#temperature').append('<p> temperature moyenne: '+Math.round((reponse.main.temp-273.15)*10)/10+'°C</p><p> temperature minimum: '
				+Math.round((reponse.main.temp_min-273.15)*10)/10+'°C</p><p> temperature maximum: '
				+Math.round((reponse.main.temp_max-273.15)*10)/10+'°C</p><p> temperature ressenti: '
				+Math.round((reponse.main.feels_like-273.15)*10)/10+'°C</p>');
			$('#humidity').append("<p> taux d'humidité: "+reponse.main.humidity+"</p>");
			$('#pressure').append('<p> pression atmosphérique: '+reponse.main.pressure+'</p>');
			$('#cloudiness').append('<p> description général: '+reponse.weather[0].description+'</p>');
			$('#windspeed').append('<p> vitesse du vent: '+reponse.wind.speed+'</p>');
			$('#winddeg').append('<p> orientation du vent: '+reponse.wind.deg+'</p>');
			$('#coord').append('<p> latitude: '+reponse.coord.lat+'</p><p> longitude: '+reponse.coord.lon);
		});
	}
	showSun(id){
		$.get('http://api.openweathermap.org/data/2.5/weather?id='+id+'&APPID=94aeaac607f35f0321198d06698d24a6',function (reponse) {
			var sunrisehour = new Date(reponse.sys.sunrise*1000).getHours();
			var sunriseminute = new Date(reponse.sys.sunrise*1000).getMinutes();
			var sunsethour = new Date(reponse.sys.sunset*1000).getHours();
			var sunsetminute = new Date(reponse.sys.sunset*1000).getMinutes();
			if (sunriseminute<10) {
				$('#sunrise').append('<p> levé du soleil à: '+sunrisehour+'H0'+sunriseminute+'</p>');
			}else {
				$('#sunrise').append('<p> levé du soleil à: '+sunrisehour+'H'+sunriseminute+'</p>');
			}
			if (sunsetminute<10) {
				$('#sunset').append('<p> couché du soleil à: '+sunsethour+'H0'+sunsetminute+'</p>');
			}else {
				$('#sunset').append('<p> couché du soleil à: '+sunsethour+'H'+sunsetminute+'</p>');
			}
		});
	}	
}
var meteo = new Meteo;

class complementation {
	constructor(){
		this.chosenLoc;
		this.searchElement = $('#search');
		this.results  = $('#results');
		this.id = $('#id');
		this.selectedResult = -1;
		this.previousRequest;
		this.previousValue = $('#search').value;
		this.searchElement.on('keyup',this.touch.bind(this));
	}    
	getResults(keywords) { // Effectue une requête et récupère les résultats
		var that=this;
		
	    var xhr = new XMLHttpRequest();
	    xhr.open('GET', 'index.php?s='+ encodeURIComponent(keywords));
	
    	xhr.addEventListener('readystatechange', function() {
        	if (xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
	
	            that.displayResults(xhr.responseText);
	
        	}
	    });
	
	    xhr.send(null);
	
	    return xhr;
	
	}	
	displayResults(response) { // Affiche les résultats d'une requête
	
    	this.results[0].style.display = response.length ? 'block' : 'none'; // On cache le conteneur si on n'a pas de résultats
		var that=this;
	    if (response.length) { // On ne modifie les résultats que si on en a obtenu
	
	        response = response.split('|');
	        var responseLen = response.length-1;
	
	        this.results.html(''); // On vide les résultats
	
	        for (var i = 0; i < responseLen ; i=i+3) {
            	this.results.append('<div id="'+response[i+2]+'"class="completion">'+response[i]+'</div><span class="population"> population: '+response[i+1]+'</span>');
	
            	
	
	        }
	        $('.completion').on('click', function(e) {
	        		
                	that.chooseResult(e.target);
                	
                	that.id[0].value = e.target.id;
	            });
	
	    }
	
	}
	
	chooseResult(result) {
		this.chosenLoc=result.id;
	    this.searchElement[0].value = this.previousValue = result.innerHTML; // On change le contenu du champ de recherche et on enregistre en tant que précédente valeur
	    this.results[0].style.display = 'none'; // On cache les résultats
	    result.className = ''; // On supprime l'effet de focus
	    this.selectedResult = -1; // On remet la sélection à "zéro"
	    this.searchElement.focus(); // Si le résultat a été choisi par le biais d'un clique alors le focus est perdu, donc on le réattribue
	
	}
	
	
	
	 touch(e) {
	 	
    	var divs = this.results[0].getElementsByTagName('div');
	
	
    	if (this.searchElement[0].value != this.previousValue) { // Si le contenu du champ de recherche a changé
	
	        this.previousValue = this.searchElement[0].value;
	        if (this.previousRequest && this.previousRequest.readyState < XMLHttpRequest.DONE) {
	            this.previousRequest.abort(); // Si on a toujours une requête en cours, on l'arrête
        	}
	
	        this.previousRequest = this.getResults(this.previousValue); // On stocke la nouvelle requête
	
	        this.selectedResult = -1; // On remet la sélection à "zéro" à chaque caractère écrit
	
    	}
	
	};
	
};
var complement = new complementation;
