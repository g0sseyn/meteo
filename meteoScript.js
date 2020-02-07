var lat;
var lon;
var geo_options = {
  enableHighAccuracy: true, 
  maximumAge        : 30000, 
  timeout           : 27000
};
function errorHandler(err) {
            if(err.code == 1) {
               alert("Error: Access is denied!");
            } else if( err.code == 2) {
               alert("Error: Position is unavailable!");
            }
         }
if ("geolocation" in navigator) {
  navigator.geolocation.getCurrentPosition(function(position) {
  lat=position.coords.latitude;
  lon=position.coords.longitude;
  apiCall = new ApiCall;
},errorHandler,geo_options);
} else {
  console.log('PAS OK');
}
class ApiCall {
	constructor(){
		$.get('http://api.openweathermap.org/data/2.5/weather?q=rennes&lang=fr&APPID=94aeaac607f35f0321198d06698d24a6',data=>{
			this.responseNow = data;
			/*meteo = new MeteoComplete ;*/
		})
		$.get('http://api.openweathermap.org/data/2.5/forecast?q=verdun&lang=fr&APPID=94aeaac607f35f0321198d06698d24a6',data=>{
			this.responseFiveDays = data;
			/*meteo = new MeteoCompleteFiveDays ;*/
		})
		$.get('http://api.openweathermap.org/data/2.5/forecast?lat='+lat+'&lon='+lon+'&lang=fr&APPID=94aeaac607f35f0321198d06698d24a6',data=>{
			this.responseFiveDays = data;
			meteo = new MeteoCompleteFiveDays ;
		})
	}
}

class MeteoCompleteFiveDays {
	constructor(){		
		this.response=apiCall.responseFiveDays;
		$('.today').on('click',this.show.bind(this));
		$('#day0').on('click',this.show.bind(this));
		this.calcHour();
		$('#day1').on('click',this.showDay1.bind(this));
		$('#day2').on('click',this.showDay2.bind(this));
		$('#day3').on('click',this.showDay3.bind(this));
		$('#day4').on('click',this.showDay4.bind(this));		
		$('#tempGraph').on('click',this.showTempGraph.bind(this));
		$('#rainGraph').on('click',this.showRainGraph.bind(this));	
		$('#windGraph').on('click',this.showWindGraph.bind(this));			
		this.showTempGraph();
		this.show();
	}
	showDay1(){		
		meteo = new MeteoComplete;
		meteo.response= [this.response.list[8-this.decalage-4],this.response.list[8-this.decalage-3],this.response.list[8-this.decalage-2],this.response.list[8-this.decalage-1],this.response.list[8-this.decalage],this.response.list[8-this.decalage+1],this.response.list[8-this.decalage+2],this.response.list[8-this.decalage+3]];		
		meteo.show();	
		$('#chart_div').css({'transform' : 'translateX(-'+this.translate+'px)'});	
	}
	showDay2(){		
		meteo = new MeteoComplete;
		meteo.response= [this.response.list[16-this.decalage-4],this.response.list[16-this.decalage-3],this.response.list[16-this.decalage-2],this.response.list[16-this.decalage-1],this.response.list[16-this.decalage],this.response.list[16-this.decalage+1],this.response.list[16-this.decalage+2],this.response.list[16-this.decalage+3]];
		meteo.show();	
		$('#chart_div').css({'transform' : 'translateX(-'+(this.translate+562)+'px)'});	
	}
	showDay3(){		
		meteo = new MeteoComplete;
		meteo.response= [this.response.list[24-this.decalage-4],this.response.list[24-this.decalage-3],this.response.list[24-this.decalage-2],this.response.list[24-this.decalage-1],this.response.list[24-this.decalage],this.response.list[24-this.decalage+1],this.response.list[24-this.decalage+2],this.response.list[24-this.decalage+3]];
		meteo.show();
		$('#chart_div').css({'transform' : 'translateX(-'+(this.translate+1124)+'px)'});			
	}
	showDay4(){		
		meteo = new MeteoComplete;
		meteo.response= [this.response.list[32-this.decalage-4],this.response.list[32-this.decalage-3],this.response.list[32-this.decalage-2],this.response.list[32-this.decalage-1],this.response.list[32-this.decalage],this.response.list[32-this.decalage+1],this.response.list[32-this.decalage+2],this.response.list[32-this.decalage+3]];
		meteo.show();	
		$('#chart_div').css({'transform' : 'translateX(-'+(this.translate+1686)+'px)'});		
	}
	calcHour(){
		var date = new Date(this.response.list[0].dt*1000);
		var hour = date.getHours();
		switch (hour){
			case 13 :
			this.decalage=0;
			this.translate=281;
			break;
			case 16 :
			this.decalage=1;
			this.translate=210.75;
			break;
			case 19 :
			this.decalage=2;
			this.translate=140.5;
			break;
			case 22 :
			this.decalage=3;
			this.translate=70.25;
			break;
			case 1 :
			this.decalage=-4;
			this.translate=562;
			break;
			case 4 :
			this.decalage=-3;
			this.translate=491.75;
			break;
			case 7 :
			this.decalage=-2;
			this.translate=421.5;
			break;
			case 10 :
			this.decalage=-1;
			this.translate=351.25;
			break;
		}
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
		if (this.response.list[0].hasOwnProperty("rain")) {
			if (this.response.list[0].rain.hasOwnProperty("1h")) {
				$('#rain').html(this.response.list[0].rain["1h"]);
			}else $('#rain').html(this.response.list[0].rain["3h"]);
		}else $('#rain').html('0');		
		$('#humidity').html(this.response.list[0].main.humidity);
		$('#wind').html(Math.round(this.response.list[0].wind.speed*3600/1000));
	}
	showNextMeteoIcon(){
		$('#day0').attr('src','http://openweathermap.org/img/wn/'+this.response.list[0].weather[0].icon+'@2x.png');	
		$('#day1').attr('src','http://openweathermap.org/img/wn/'+this.response.list[8-this.decalage].weather[0].icon+'@2x.png');	
		$('#day2').attr('src','http://openweathermap.org/img/wn/'+this.response.list[16-this.decalage].weather[0].icon+'@2x.png');
		$('#day3').attr('src','http://openweathermap.org/img/wn/'+this.response.list[24-this.decalage].weather[0].icon+'@2x.png');
		$('#day4').attr('src','http://openweathermap.org/img/wn/'+this.response.list[32-this.decalage].weather[0].icon+'@2x.png');
	}
	showNextTemp(){
		$('#weekTemp0').html(Math.round(this.response.list[0].main.temp_max-273.15)+' ° ');
		$('#weekTempMin0').html(Math.round(this.response.list[0].main.temp_min-273.15)+' °');
		$('#weekTemp1').html(Math.round(this.response.list[8-this.decalage].main.temp_max-273.15)+' ° ');
		$('#weekTempMin1').html(Math.round(this.response.list[8-this.decalage].main.temp_min-273.15)+' °');
		$('#weekTemp2').html(Math.round(this.response.list[16-this.decalage].main.temp_max-273.15)+' ° ');
		$('#weekTempMin2').html(Math.round(this.response.list[16-this.decalage].main.temp_min-273.15)+' °');
		$('#weekTemp3').html(Math.round(this.response.list[24-this.decalage].main.temp_max-273.15)+' ° ');
		$('#weekTempMin3').html(Math.round(this.response.list[24-this.decalage].main.temp_min-273.15)+' °');
		$('#weekTemp4').html(Math.round(this.response.list[32-this.decalage].main.temp_max-273.15)+' ° ');
		$('#weekTempMin4').html(Math.round(this.response.list[32-this.decalage].main.temp_min-273.15)+' °');		
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
		$('#chart_div').css({'transform' : 'translateX(-0px)'});
		this.showloc();
		this.showIcon();
		this.showDay();
		this.showWeatherDescription();
		this.showTemperature();
		this.showBlocInfo();
		this.showNextMeteoIcon();	
		this.showWeekDay();
		this.showNextTemp();
	}
	showWindGraph(){
		$('#rainGraph').removeClass('active');
		$('#tempGraph').removeClass('active');
		$('#windGraph').addClass('active');
		google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        var that=this;
        function drawChart() {
	        var data = new google.visualization.DataTable();
	        data.addColumn('string', 'Heure');        
			data.addColumn('number', 'Temperature');
			data.addColumn({type:'number', role:'annotation'});
			var formatter = new google.visualization.DateFormat({pattern: "HH:mm"});
			for (var i =0; i < 40; i++) {
				data.addRows([[formatter.formatValue(new Date(that.response.list[i].dt*1000)),100,Math.round(that.response.list[i].wind.speed*3600/1000)]]);
			}

        var options = {
        	axisTitlesPosition:'none',
        	chartArea:{width:'97%'},
        	colors:['none'],
        	vAxis:{gridlines:{count:0},textPosition:'none',baselineColor:'transparent'},
        	hAxis:{gridlines:{count:0},textStyle:{fontSize:10}},
        	legend:{maxLines:8},
        	tooltip:{trigger:'none'},
        	showRowNumber: true,
        	enableInteractivity:false,
        	annotations:{
        		textStyle: {
        			color: 'grey',
        			fontSize: 15,
    		 	},
    		 	alwaysOutside: true,
    		 	stemColor : 'none',
     			focusTarget:'category'
    		},     		
       	};
           
        var chart = new google.visualization.AreaChart($('#chart_div')[0]); 

        google.visualization.events.addListener(chart, 'ready', function () {
   			var layout = chart.getChartLayoutInterface();
   			var xPos = 20;
    		for (var i = 0; i < data.getNumberOfRows(); i++) {  			
       			var arrow = $('#chart_div')[0].appendChild(document.createElement('img'));
        		arrow.src = '/smallarrow.png';
       			arrow.className = 'arrow';
       			arrow.id = 'arrow'+i;
				arrow.style.top = (50) + 'px';
				arrow.style.left = (xPos) + 'px';
				$('#arrow'+i).css({'transform' : 'rotate('+(that.response.list[i].wind.deg+90)+'deg)'});
				xPos+=70.4;
      			
    		}
 		});      

        chart.draw(data, options);
      }
	}
	showTempGraph(){
		$('#rainGraph').removeClass('active');
		$('#tempGraph').addClass('active');
		$('#windGraph').removeClass('active');
		google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        var that=this;
        function drawChart() {
	        var data = new google.visualization.DataTable();
	        data.addColumn('string', 'Heure');        
			data.addColumn('number', 'Temperature');
			data.addColumn({type:'number', role:'annotation'});
			var formatter = new google.visualization.DateFormat({pattern: "HH:mm"});
			for (var i =0; i < 40; i++) {
				data.addRows([[formatter.formatValue(new Date(that.response.list[i].dt*1000)),(Math.round((that.response.list[i].main.temp)*10)/10),(Math.round((that.response.list[i].main.temp-273.15)*10)/10)]]);
			}
        var options = {
        	axisTitlesPosition:'none',
        	chartArea:{width:'97%'},
        	colors:['orange'],
        	vAxis:{gridlines:{count:0},textPosition:'none',baselineColor:'transparent',viewWindowMode:'maximized'},
        	hAxis:{gridlines:{count:0},textStyle:{fontSize:10}},
        	legend:{maxLines:8},
        	tooltip:{trigger:'none'},
        	showRowNumber: true,
        	enableInteractivity:false,
        	annotations:{
        		textStyle: {
        			color: 'grey',
        			fontSize: 15,
    		 	},
    		 	alwaysOutside: true,
    		 	stemColor : 'none',
     			focusTarget:'category'
    		},     		
       	};
           
        var chart = new google.visualization.AreaChart($('#chart_div')[0]);        
        chart.draw(data, options);
      }
	}
	showRainGraph(){
		$('#rainGraph').addClass('active');
		$('#tempGraph').removeClass('active');
		$('#windGraph').removeClass('active');
		google.charts.load("current", {packages:["corechart"]});
    	google.charts.setOnLoadCallback(drawChart);
    	var that=this;
    	function drawChart() {
    		var data = new google.visualization.DataTable();
      		data.addColumn('string', 'Heure');        
			data.addColumn('number', 'Précipitations');
			data.addColumn({type:'number', role:'annotation'});
			var formatter = new google.visualization.DateFormat({pattern: "HH:mm"});
			for (var i =0; i < 40; i++) {
				if (that.response.list[i].hasOwnProperty("rain")) {
					if (that.response.list[i].rain.hasOwnProperty('3h')) {
						data.addRows([[formatter.formatValue(new Date(that.response.list[i].dt*1000)),that.response.list[i].rain['3h'],that.response.list[i].rain['3h']]]);
					}else{
						data.addRows([[formatter.formatValue(new Date(that.response.list[i].dt*1000)),that.response.list[i].rain['1h'],that.response.list[i].rain['1h']]]);
					}
				}else {
					data.addRows([[formatter.formatValue(new Date(that.response.list[i].dt*1000)),0,0]]);
				}
			}
			var options = {
				axisTitlesPosition:'none',
        		chartArea:{width:'97%'},
        		enableInteractivity:false,
				orientation:'horizontal',
				vAxis:{gridlines:{count:0},textPosition:'none',baselineColor:'transparent',viewWindowMode:'maximized'},
        		hAxis:{gridlines:{count:0},textStyle:{fontSize:10}},				
				annotations:{
	        		textStyle: {
	        			color: 'blue',
	        			fontSize: 15,
	        		},	        		
					alwaysOutside: true,
					stemColor : 'none',
    		 	},
			}
			var chart = new google.visualization.BarChart($('#chart_div')[0]);        
        	chart.draw(data, options);

		}
	}
}

class MeteoComplete {
	constructor(){		
		this.response;
	}
	/*showRainGraph(){
		google.charts.load("current", {packages:["corechart"]});
    	google.charts.setOnLoadCallback(drawChart);
    	var that=this;
    	function drawChart() {
    		var data = new google.visualization.DataTable();
      		data.addColumn('string', 'Heure');        
			data.addColumn('number', 'Précipitations');
			data.addColumn({type:'number', role:'annotation'});
			var formatter = new google.visualization.DateFormat({pattern: "HH:mm"});
			for (var i =0; i < 8; i++) {
				if (that.response[i].hasOwnProperty("rain")) {
					data.addRows([[formatter.formatValue(new Date(that.response[i].dt*1000)),that.response[i].rain['3h'],that.response[i].rain['3h']]]);
				}else {
					data.addRows([[formatter.formatValue(new Date(that.response[i].dt*1000)),0,0]]);
				}
			}
			var options = {
				axisTitlesPosition:'none',
        		chartArea:{width:'95%'},
				orientation:'horizontal',
				vAxis:{gridlines:{count:0},textPosition:'none'},
        		hAxis:{gridlines:{count:0}},				
				annotations:{
	        		textStyle: {
	        			color: 'blue',
	        			fontSize: 15,
	        		},	        		
					alwaysOutside: true,
					stemColor : 'none',
    		 	},
			}
			var chart = new google.visualization.BarChart($('#chart_div')[0]);        
        	chart.draw(data, options);

		}
	}
	showTempGraph(){
		google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        var that=this;
      function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Heure');        
		data.addColumn('number', 'Temperature');
		data.addColumn({type:'number', role:'annotation'});
		var formatter = new google.visualization.DateFormat({pattern: "HH:mm"});
		for (var i =0; i < 8; i++) {
			data.addRows([[formatter.formatValue(new Date(that.response[i].dt*1000)),Math.round((that.response[i].main.temp)*10)/10,Math.round((that.response[i].main.temp-273.15)*10)/10]]);
		}

        var options = {
        	axisTitlesPosition:'none',
        	chartArea:{width:'95%'},
        	colors:['orange'],
        	vAxis:{gridlines:{count:0},textPosition:'none'},
        	hAxis:{gridlines:{count:0}},
        	legend:{maxLines:8},
        	tooltip:{trigger:'none'},
        	showRowNumber: true,
        	annotations:{
        		textStyle: {
        		color: 'grey',
        		fontSize: 15,
    		 },    		 
     		alwaysOutside: true,
     		stemColor : 'none',
     		focusTarget:'category'}
       		 };
           
        var chart = new google.visualization.AreaChart($('#chart_div')[0]);        
        chart.draw(data, options);
      }
  	}*/
	resetMeteo(){
		$('#meteoDiv').html('');
	}
	showloc(){
		$('#loc').show().html(this.response.name);
	}
	showIcon(){
		$('#icon').attr('src','http://openweathermap.org/img/wn/'+this.response[4].weather[0].icon+'@2x.png');
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
		$('#temperatureUnit').show();
		$('#temperatureValue').html(Math.round((this.response[4].main.temp-273.15)*10)/10)
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
