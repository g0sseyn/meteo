class ApiCall {
	byTown(){
		$.get('https://api.openweathermap.org/data/2.5/forecast?q='+this.town+'&lang=fr&APPID=94aeaac607f35f0321198d06698d24a6',data=>{
			$('#errorTown').html('');
			this.responseFiveDays = data;
			var meteo = new MeteoCompleteFiveDays ;
		}).fail(function(){
			$('#errorTown').html('Ville inconnu, veuillez recommencer ');
		})
	}
	byLocation(){	
		$.get('https://api.openweathermap.org/data/2.5/forecast?lat='+this.lat+'&lon='+this.lon+'&lang=fr&APPID=94aeaac607f35f0321198d06698d24a6',data=>{
			this.responseFiveDays = data;
			var meteo = new MeteoCompleteFiveDays ;
		})
	}
}