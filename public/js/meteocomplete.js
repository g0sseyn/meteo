class MeteoComplete {
	constructor(){		
		this.response;
	}
	showloc(){
		$('#loc').show().html(this.response.name);
	}
	showIcon(){
		$('#icon').html('<img  alt="icon" src="https://openweathermap.org/img/wn/'+this.response[4].weather[0].icon+'@2x.png">');
	}
	showDay(){
		var date = new Date(this.response[4].dt*1000);
		var hour = date.getHours();
		if (hour<10) {
			hour='0'+hour;
		}

		var day=date.getDay();
		var dayName=new Array('dimanche','lundi','mardi','mercredi','jeudi','vendredi','samedi');
		$('#day').html(dayName[day]+' : '+hour+'H00');
	}
	showWeatherDescription(){
		$('#weatherDescription').html(this.response[4].weather[0].description);
	}
	showTemperature(){
		if (this.tempUnity=='celsius') {
			$('#temperatureUnit').show();
			$('#temperatureValue').html(Math.round((this.response[4].main.temp-273.15)))
		}else {
			$('#temperatureUnit').show();
			$('#temperatureValue').html(Math.round(((this.response[4].main.temp-273.15)*9/5+32)))
		}
	}
	showBlocInfo(){
		$('#blocInfo').show();
		if (this.response[4].hasOwnProperty("rain")) {
			if (this.response[4].rain.hasOwnProperty("1h")) {
				$('#rain').html(this.response[4].rain["1h"]);
			}else $('#rain').html(this.response[4].rain["3h"]);
		}else $('#rain').html('0');		
		$('#humidity').html(this.response[4].main.humidity);
		$('#wind').html(Math.round(this.response[4].wind.speed*3600/1000));
	}	
	show(){
		this.showloc();
		this.showIcon();
		this.showDay();
		this.showWeatherDescription();
		this.showTemperature();
		this.showBlocInfo();		
	}
}