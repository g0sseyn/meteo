<?php ob_start(); ?>

<div class="row container col-sm-12" id="favoriteTown">

</div>
<div class="container col-sm-12" id="principalBloc">
<div id="meteoDiv" class="sticky-top">
	<span>
		<div id="loc"></div><?php if (isIdentify()) { ?><a href="#" id="fav">+ ajouter aux favoris</a><span id="favOk"></span><?php } ?>
		<div id="day"></div>
		<div id="weatherDescription"></div>
	</span>
	<div>
		<img id="icon" src="" ></i>
		<div id="temperatureHead">
			<div id="temperatureValue">
				
			</div>
			<div id="temperatureUnit" style="display: none">
				<span id="celsius">°C</span> | <span id="fahrenheit">°F</span>
			</div>
		</div>
		<div id="blocInfo" style="display: none">
			<div>Précipitations : <span id="rain"></span>mm</div>
			<div>Humidité : <span id="humidity"></span>%</div>
			<div>Vent : <span id="wind"></span> km/h</div>
			<div id="blocInfoBtn">
				<div class="btn btn-primary" id="tempGraph">température</div><div class="btn btn-primary" id="rainGraph">Précipitations</div><div class="btn btn-primary" id="windGraph">Vent</div>
			</div>

		</div>		
	</div>
	<div id="chart_div" style="height: 120px"></div> 


	<div id="meteoNextDays" class="container row">
		<div class="day day0">
			<p id="weekDay0"></p>
			<img id="day0" src="" ></i>
			<p class="weekTemp" ><span id="weekTemp0" class="weekTempMax"></span><span id="weekTempMin0" class="weekTempMin"></span></p>
		</div>
		<div class="day day1">
			<p id="weekDay1"></p>
			<img id="day1" src="" ></i>
			<p class="weekTemp"><span id="weekTemp1" class="weekTempMax"></span><span id="weekTempMin1" class="weekTempMin"></span></p>
		</div>
		<div class="day day2">
			<p id="weekDay2"></p>
			<img id="day2" src="" ></i>
			<p class="weekTemp"><span id="weekTemp2" class="weekTempMax"></span><span id="weekTempMin2" class="weekTempMin"></span></p>
		</div>
		<div class="day day3">
			<p id="weekDay3"></p>
			<img id="day3" src="" ></i>
			<p class="weekTemp"><span id="weekTemp3" class="weekTempMax"></span><span id="weekTempMin3" class="weekTempMin"></span></p>
		</div>
		<div class="day day4">
			<p id="weekDay4"></p>
			<img id="day4" src="" ></i>
			<p class="weekTemp"><span id="weekTemp4" class="weekTempMax"></span><span id="weekTempMin4" class="weekTempMin"></span></p>
		</div>
	</div>
</div>
<div id="content" class="">	
	<?php 
while ($data = $posts->fetch())
{
?>
    <div class="news">
        <h3 class="center">
            <a href=""><?= htmlspecialchars($data['title_news']); ?></a>
            <br/>
            <em>le <?= $data['creation_date_news_fr']; ?></em>
        </h3>
        <?php if (isset($data['img_url'])&&$data['img_url']!=='0') { ?>       
            <div class="image center"><img src="<?= $data['img_url']?>"></div>
        <?php ;} ?>
       
        <?= nl2br($data['content_news']) ?>
        <br /> 
     </div>
     <hr>

<?php
} 
$posts->closeCursor();
?>
</div>
</div>
<script type="text/javascript">$(function() {geoCall()});</script>
<?php $meteoComplete = ob_get_clean(); ?>