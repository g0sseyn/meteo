class Complementation {
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
	    xhr.open('GET', 'controller/ajaxTraitment.php?s='+ encodeURIComponent(keywords));
	
    	xhr.addEventListener('readystatechange', function() {
        	if (xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
	
	            that.displayResults(xhr.responseText);
	
        	}
	    });
	
	    xhr.send(null);
	
	    return xhr;
	
	}	
	displayResults(response) { // Affiche les résultats d'une requête
	
    	 // On cache le conteneur si on n'a pas de résultats
		var that=this;
	    if (response.length) { // On ne modifie les résultats que si on en a obtenu
	
	        response = response.split('|');
	        var responseLen = response.length-1;
	
	        this.results.html(''); // On vide les résultats
	
	        for (var i = 0; i < responseLen ; i++) {
            	this.results.append('<option id="'+response[i]+'"class="completion" value="'+response[i]+'">');
	
            	
	
	        }
	        $('.completion').on('click', function(e) {
	        		
                	that.chooseResult(e.target);
                	console.log(e);
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
var complement = new Complementation;
