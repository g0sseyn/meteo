<?php ob_start(); ?>
<section class="row container col-sm-12" id="favoriteTown">
</section>
<div class="container col-sm-12" id="principalBloc">
	<aside id="meteoDiv" class="sticky-top">
		<div>
			<div id="loc"></div><?php if (isIdentify()) { ?><a href="#" id="fav">+ ajouter aux favoris</a><span id="favOk"></span><?php } ?>
			<div id="day"></div>
			<div id="weatherDescription"></div>
		</div>
		<div>
			<div id="icon"></div>
			<div id="temperatureHead">
				<div id="temperatureValue"></div>
				<div id="temperatureUnit" style="display: none">
					<span id="celsius">°C</span> | <span id="fahrenheit">°F</span>
				</div>
			</div>
			<div id="blocInfo" style="display: none">
				<div>Précipitations : <span id="rain"></span>mm</div>
				<div>Humidité : <span id="humidity"></span>%</div>
				<div>Vent : <span id="wind"></span> km/h</div>
				<div id="blocInfoBtn">
					<div class="btn btn-primary" id="tempGraph">température</div><!-- @whitespace
				 --><div class="btn btn-primary" id="rainGraph">Précipitations</div><!-- @whitespace
				 --><div class="btn btn-primary" id="windGraph">Vent</div>
				</div>
			</div>		
		</div>
		<div id="chart_div" style="height: 120px"></div>
		<div id="meteoNextDays" class="container row">
			<div class="day day0">
				<p id="weekDay0"></p>
				<span id="day0"></span>
				<p class="weekTemp" ><span id="weekTemp0" class="weekTempMax"></span><span id="weekTempMin0" class="weekTempMin"></span></p>
			</div>
			<div class="day day1">
				<p id="weekDay1"></p>
				<span id="day1"></span>
				<p class="weekTemp"><span id="weekTemp1" class="weekTempMax"></span><span id="weekTempMin1" class="weekTempMin"></span></p>
			</div>
			<div class="day day2">
				<p id="weekDay2"></p>
				<span id="day2"></span>
				<p class="weekTemp"><span id="weekTemp2" class="weekTempMax"></span><span id="weekTempMin2" class="weekTempMin"></span></p>
			</div>
			<div class="day day3">
				<p id="weekDay3"></p>
				<span id="day3"></span>
				<p class="weekTemp"><span id="weekTemp3" class="weekTempMax"></span><span id="weekTempMin3" class="weekTempMin"></span></p>
			</div>
			<div class="day day4">
				<p id="weekDay4"></p>
				<span id="day4"></span>
				<p class="weekTemp"><span id="weekTemp4" class="weekTempMax"></span><span id="weekTempMin4" class="weekTempMin"></span></p>
			</div>
		</div>
	</aside>
	<section id="content" class="col-md-6">	
		<?php if (isset($newsContent)) {
			echo $newsContent;
		} ?>
	</section>
</div>
<script type="text/javascript">$(function() {call("<?php if (isset($_SESSION['defautTown'])) {echo $_SESSION['defautTown'];} ?>")});</script>
<?php $meteoComplete = ob_get_clean(); ?>