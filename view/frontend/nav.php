<?php ob_start(); ?>	
<nav class="navbar navbar-light bg-light">
  <a class="navbar-brand" id="titleDay" href="index.php?action=meteo"></a>
  <?php if (isset($searchTown)&&$searchTown) { ?>
  <div>
	  <div class="form-inline">
	    <input class="form-control mr-sm-2" type="text" placeholder="changer de ville" id="search" name="search" autocomplete="off" required list="results" >
	    <datalist id="results">		
		  </datalist>
	    <button class="btn btn-outline-success my-2 my-sm-0" id="changeBtn" type="button">go!</button>	    
	  </div>
	  <p id="errorTown" class="smallfont"></p>
	</div>
  <?php } ?>
  <?php if (isIdentify()) { ?>
    <div class="flex">
      <?php if (isAdmin()) { ?>
        <form action="index.php?action=admin" method="post" class="center" id="formDeco">          
          <button type="submit" class="btn btn-danger">A</button>
          <p class="smallfont"><a href="index.php?action=admin">espace<br>administration</a></p>     
        </form>
      <?php } ?>
    	<form action="index.php?action=parametre" method="post">
       	<button type="submit" class="btn btn-default btn-sm">
          <img src="public/img/houseicon.png">          	
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
      	<div id="linkInscription"><a href="index.php?action=inscription">pas encore inscris ? inscrivez-vous vite</a></div>
 	</div>
<?php } ?>
</nav>
<?php $menuNav = ob_get_clean(); ?>