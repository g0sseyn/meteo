class TitleDay {
	constructor(){
		this.showDay();
		this.showDate();
		this.showMonth();
		$('#titleDay').html('Prévisions météo du '+this.day+' '+this.date+' '+this.month);
	}
	showDay(){
		var date = new Date();
		var day=date.getDay();
		var dayName=new Array('dimanche','lundi','mardi','mercredi','jeudi','vendredi','samedi');
		this.day=dayName[day];
	}
	showDate(){
		var date=new Date();
		this.date=date.getDate();		
	}
	showMonth(){
		var date=new Date();
		var month=date.getMonth();
		var monthName=new Array('Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Aout','Septembre','Octobre','Novembre','Décembre');
		this.month=monthName[month];
	}
}
var title = new TitleDay;