function call(town){
	if (town) {
		if (town=='geolocalisation') {
			geoCall();
		}else {
			apiCall = new ApiCall;
			apiCall.town=town;
			apiCall.byTown();
		}
	}
	else geoCall();
}
function geoCall(){
	function errorHandler(err) {
            if(err.code == 1) {
                console.log("Erreur: l'accès à la géolocalisation est refusé!");
            }else if( err.code == 2) {
                console.log("Erreur: la position n'est pas disponible!");
            }
        }
    var lat;
	var lon;
	var geo_options = {
		    enableHighAccuracy: true, 
	        maximumAge        : 30000, 
	  	    timeout           : 10000
		};
	if ("geolocation" in navigator) {
	  navigator.geolocation.getCurrentPosition(function(position) {  
		    apiCall = new ApiCall;
		    apiCall.lat=position.coords.latitude;
		    apiCall.lon=position.coords.longitude;
		    apiCall.byLocation();
		},errorHandler,geo_options);
	}else {
	  console.log('erreur géolocalisation');
	}
}

