class Complementation {
	constructor(){
		this.searchElement = $('#search');
		this.results  = $('#results');
		this.previousRequest;
		this.previousValue = $('#search').value;
		this.searchElement.on('keyup',this.touch.bind(this));
	}  
	touch(e) {
    	if (this.searchElement[0].value != this.previousValue) { // Si le contenu du champ de recherche a changé
	        this.previousValue = this.searchElement[0].value;
	       
	        if (this.previousRequest && this.previousRequest.readyState < XMLHttpRequest.DONE) {
	            this.previousRequest.abort(); // Si on a toujours une requête en cours, on l'arrête
        	}	
	        this.previousRequest = this.getResults(this.previousValue); // On stocke la nouvelle requête   
	   	}	
	}  
	getResults(keywords) { // Effectue une requête et récupère les résultats
		var that=this;

	    var req = $.get("controller/ajaxTraitment.php?s="+ encodeURIComponent(keywords),function(data){
	    	that.displayResults(req.responseText);	    	
	    })
	    return req;
	
	}	
	displayResults(response) {
		var that=this;
	    if (response.length) {	
	        response = response.split('|');
	        var responseLen = response.length-1;	
	        this.results.html('');	
	        for (var i = 0; i < responseLen ; i++) {
            	this.results.append('<option id="'+response[i]+'"class="completion" value="'+response[i]+'">');
	        }	
	    }	
	}		
};
var complement = new Complementation;
