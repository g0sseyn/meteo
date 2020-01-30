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
	<div class="col-sm-2">
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
	<div id="meteoNextDays" class="container row">
		<div class="day">
			<p id="weekDay0">.</p>
			<img id="day0" src="" ></i>
		</div>
		<div class="day">
			<p id="weekDay1">.</p>
			<img id="day1" src="" ></i>
		</div>
		<div class="day">
			<p id="weekDay2">.</p>
			<img id="day2" src="" ></i>
		</div>
		<div class="day">
			<p id="weekDay3">.</p>
			<img id="day3" src="" ></i>
		</div>
		<div class="day">
			<p id="weekDay4">.</p>
			<img id="day4" src="" ></i>
		</div>
		<div class="day">
			<p id="weekDay5">.</p>
			<img id="day5" src="" ></i>
		</div>
	</div>
</div>
<?php $meteoComplete = ob_get_clean(); ?>