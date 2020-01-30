class ApiCall {
	constructor(){
		$.get('http://api.openweathermap.org/data/2.5/weather?q=rennes&lang=fr&APPID=94aeaac607f35f0321198d06698d24a6',data=>{
			this.responseNow = data;
			/*meteo = new MeteoComplete ;*/
		})
		$.get('http://api.openweathermap.org/data/2.5/forecast?q=gap&lang=fr&APPID=94aeaac607f35f0321198d06698d24a6',data=>{
			this.responseFiveDays = data;
			console.log(this.responseFiveDays);
			meteo = new MeteoCompleteFiveDays ;
		})
	}
}
apiCall = new ApiCall;
class MeteoCompleteFiveDays {
	constructor(){		
		this.loc = $('#meteoDiv');
		this.response=apiCall.responseFiveDays;
		$('.today').on('click',this.show.bind(this));
	}
	resetMeteo(){
		$('#meteoDiv').html('');
	}
	showloc(){
		$('#loc').show().html(this.response.city.name);
	}
	showIcon(){
		$('#icon').attr('src','http://openweathermap.org/img/wn/'+this.response.list[0].weather[0].icon+'@2x.png');
	}
	showDay(){
		var date = new Date();
		var hour = date.getHours();
		if (hour<10) {
			hour='0'+hour;
		}
		var day=date.getDay();
		var dayName=new Array('dimanche','lundi','mardi','mercredi','jeudi','vendredi','samedi');
		$('#day').html(dayName[day]+' : '+hour+'H00');
	}
	showWeatherDescription(){
		$('#weatherDescription').html(this.response.list[0].weather[0].description);
	}
	showTemperature(){
		$('#temperatureUnit').show();
		$('#temperatureValue').html(Math.round((this.response.list[0].main.temp-273.15)*10)/10)
	}
	showBlocInfo(){
		$('#blocInfo').show();
		$('#rain').html('0');		
		$('#humidity').html(this.response.list[0].main.humidity);
		$('#wind').html(Math.round(this.response.list[0].wind.speed*3600/1000));
	}
	showNextMeteo(){
		$('#day0').attr('src','http://openweathermap.org/img/wn/'+this.response.list[0].weather[0].icon+'@2x.png');	
		$('#day1').attr('src','http://openweathermap.org/img/wn/'+this.response.list[8].weather[0].icon+'@2x.png');	
		$('#day2').attr('src','http://openweathermap.org/img/wn/'+this.response.list[16].weather[0].icon+'@2x.png');
		$('#day3').attr('src','http://openweathermap.org/img/wn/'+this.response.list[24].weather[0].icon+'@2x.png');
		$('#day4').attr('src','http://openweathermap.org/img/wn/'+this.response.list[32].weather[0].icon+'@2x.png');
		$('#day5').attr('src','http://openweathermap.org/img/wn/'+this.response.list[39].weather[0].icon+'@2x.png');
	}
	showWeekDay(){
		var date = new Date();
		var day=date.getDay();
		var dayName=new Array('dim.','lun.','mar.','mer.','jeu.','ven.','sam.');
		for (var i = 0; i <=5; i++) {
			$('#weekDay'+i).html(dayName[(day+i)%7]);
		}
	}
	show(){
		this.showloc();
		this.showIcon();
		this.showDay();
		this.showWeatherDescription();
		this.showTemperature();
		this.showBlocInfo();
		this.showNextMeteo();	
		this.showWeekDay();
	}
}
class MeteoComplete {
	constructor(){		
		this.loc = $('#meteoDiv');
		this.response=apiCall.responseNow;
		$('.today').on('click',this.show.bind(this));
	}
	resetMeteo(){
		$('#meteoDiv').html('');
	}
	showloc(){
		$('#loc').show().html(this.response.name);
	}
	showIcon(){
		$('#icon').attr('src','http://openweathermap.org/img/wn/'+this.response.weather[0].icon+'@2x.png');
	}
	showDay(){
		var date = new Date();
		var hour = date.getHours();
		if (hour<10) {
			hour='0'+hour;
		}
		var day=date.getDay();
		var dayName=new Array('dimanche','lundi','mardi','mercredi','jeudi','vendredi','samedi');
		$('#day').html(dayName[day]+' : '+hour+'H00');
	}
	showWeatherDescription(){
		$('#weatherDescription').html(this.response.weather[0].description);
	}
	showTemperature(){
		$('#temperatureUnit').show();
		$('#temperatureValue').html(Math.round((this.response.main.temp-273.15)*10)/10)
	}
	showBlocInfo(){
		$('#blocInfo').show();
		if (!this.response.rain) {
			$('#rain').html('0');
		}else {
		$('#rain').html(this.response.rain);
		}
		$('#humidity').html(this.response.main.humidity);
		$('#wind').html(Math.round(this.response.wind.speed*3600/1000));
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