<?php ob_start(); ?>
<nav class="navbar navbar-light bg-light">
  <a class="navbar-brand">Météo</a>
  <form class="form-inline">
    <input class="form-control mr-sm-2" type="search" placeholder="changer de ville" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">go!</button>
  </form>
</nav>
<div class="row sticky-top container col-sm-12">
	<div class="col-sm-offset-1 col-sm-2 today">
		<a class="btn btn-primary btn-block">aujourd'hui</a>
	</div>
	<div class="col-sm-2 tomorrow">
		<a class="btn btn-primary btn-block">demain</a>
	</div>
	<div class="col-sm-2">
		<a class="btn btn-primary btn-block">dans 2 jours</a>
	</div>
	<div class="col-sm-2">
		<a class="btn btn-primary btn-block">dans 3 jours</a>
	</div>
	<div class="col-sm-2">
		<a class="btn btn-primary btn-block">dans 4 jours</a>
	</div>
	<div class="col-sm-2">
		<a class="btn btn-primary btn-block">dans 5 jours</a>
	</div>
</div>
<div id="meteoDiv">
	<span>
		<div id="loc">56360 Sauzon</div>
		<div id="day">jeudi : 10h00</div>
		<div id="weatherDescription">Nuageux</div>
	</span>
	<div>
		<img id="icon" src="" ></i>
		<div id="temperatureHead">
			<div id="temperatureValue">
				
			</div>
			<div id="temperatureUnit" style="display: none">
				°C
			</div>
		</div>
		<div id="blocInfo" style="display: none">
			<div>Précipitations : <span id="rain"></span>mm</div>
			<div>Humidité : <span id="humidity"></span>%</div>
			<div>Vent : <span id="wind"></span> km/h</div>
			<div id="blocInfoBtn">
				<div class="btn btn-primary">température</div>
				<div class="btn btn-primary">Précipitations</div>
				<div class="btn btn-primary">Vent</div>
			</div>

		</div>		
	</div>
	<div id="chart_div" style="height: 120px"></div>	    


	<div id="meteoNextDays" class="container row">
		<div class="day day0">
			<p id="weekDay0">.</p>
			<img id="day0" src="" ></i>
			<p class="weekTemp" ><span id="weekTemp0" ></span><span id="weekTempMin0" class="weekTempMin"></span></p>
		</div>
		<div class="day day1">
			<p id="weekDay1">.</p>
			<img id="day1" src="" ></i>
			<p class="weekTemp"><span id="weekTemp1" ></span><span id="weekTempMin1" class="weekTempMin"></span></p>
		</div>
		<div class="day day2">
			<p id="weekDay2">.</p>
			<img id="day2" src="" ></i>
			<p class="weekTemp"><span id="weekTemp2" ></span><span id="weekTempMin2" class="weekTempMin"></span></p>
		</div>
		<div class="day day3">
			<p id="weekDay3">.</p>
			<img id="day3" src="" ></i>
			<p class="weekTemp"><span id="weekTemp3" ></span><span id="weekTempMin3" class="weekTempMin"></span></p>
		</div>
		<div class="day day4">
			<p id="weekDay4">.</p>
			<img id="day4" src="" ></i>
			<p class="weekTemp"><span id="weekTemp4" ></span><span id="weekTempMin4" class="weekTempMin"></span></p>
		</div>
		<div class="day day5">
			<p id="weekDay5">.</p>
			<img id="day5" src="" ></i>
			<p class="weekTemp"><span id="weekTemp5" ></span><span id="weekTempMin5" class="weekTempMin"></span></p>
		</div>
	</div>
</div>
<?php $meteoComplete = ob_get_clean(); ?>