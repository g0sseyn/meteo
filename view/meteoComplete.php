<?php ob_start(); ?>
<nav class="navbar navbar-light bg-light">
  <a class="navbar-brand" id="titleDay"></a>
  <div class="form-inline">
    <input class="form-control mr-sm-2" type="text" placeholder="changer de ville" id="search" name="search" autocomplete="off" required list="results" >
    <datalist id="results">		
	</datalist>
    <button class="btn btn-outline-success my-2 my-sm-0" id="changeBtn" type="button">go!</button>
  </div>
  <?php if (isIdentify()) { ?>
    <div class="flex">
    	<form action="index.php?action=parametre" method="post">
       		<button type="submit" class="btn btn-default btn-sm">
          		<img src="houseicon.png">          	
          		<p class="smallfont"><a href="index.php?action=parametre">paramètres</a></p>
          	</button>
        </form>
        <form action="index.php?action=deco" method="post" class="center" id="formDeco">        	
			<button type="submit" class="btn btn-danger">X</button>
			<p class="smallfont"><a href="index.php?action=deco">se déconnecter</a></p>			
		</form>
    </div>

   <?php }else {?>
   	<div>
   	  	<form onsubmit='return false;' method="post" class="container formConnection">   
    		<div class="">
       	 		<input type="email" id="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Email" required>    
     		</div>
      		<div class="">
        		<input type="password" class="form-control" id='password' name="password" placeholder="Mot de passe" required>
      		</div>      
      		<button type="submit" class="btn btn-primary formConnectionBtn">Se connecter</button>   

 		</form>
 		<div id="errorConnection"></div>
      	<div id="linkInscription"><a href="">pas encore inscris?inscrivez-vous vite</a></div>
 	</div>
<?php } ?>
</nav>
<div class="row sticky-top container col-sm-12">
	<div class="container col-sm-2">
		<a class="btn btn-primary btn-block">favori1</a>
	</div>
	<div class="container col-sm-2">
		<a class="btn btn-primary btn-block">favori2</a>
	</div>
	<div class="container col-sm-2">
		<a class="btn btn-primary btn-block">favori3</a>
	</div>
	<div class="container col-sm-2">
		<a class="btn btn-primary btn-block">favori4</a>
	</div>
	<div class="container col-sm-2 ">
		<a class="btn btn-primary btn-block">favori5</a>
	</div>
</div>
<div class="container col-sm-12" id="principalBloc">
<div id="meteoDiv">
	<span>
		<div id="loc" style="display: inline"></div><?php if (isIdentify()) { ?><a href="#" id="fav">+ ajouter aux favoris</a><span id="favOk"></span><?php } ?>
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
			<p class="weekTemp" ><span id="weekTemp0" ></span><span id="weekTempMin0" class="weekTempMin"></span></p>
		</div>
		<div class="day day1">
			<p id="weekDay1"></p>
			<img id="day1" src="" ></i>
			<p class="weekTemp"><span id="weekTemp1" ></span><span id="weekTempMin1" class="weekTempMin"></span></p>
		</div>
		<div class="day day2">
			<p id="weekDay2"></p>
			<img id="day2" src="" ></i>
			<p class="weekTemp"><span id="weekTemp2" ></span><span id="weekTempMin2" class="weekTempMin"></span></p>
		</div>
		<div class="day day3">
			<p id="weekDay3"></p>
			<img id="day3" src="" ></i>
			<p class="weekTemp"><span id="weekTemp3" ></span><span id="weekTempMin3" class="weekTempMin"></span></p>
		</div>
		<div class="day day4">
			<p id="weekDay4"></p>
			<img id="day4" src="" ></i>
			<p class="weekTemp"><span id="weekTemp4" ></span><span id="weekTempMin4" class="weekTempMin"></span></p>
		</div>
	</div>
</div>
<div id="content" class="">	
</div>
</div>
<?php $meteoComplete = ob_get_clean(); ?>