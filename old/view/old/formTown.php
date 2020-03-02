
<?php ob_start(); ?>
<div class="meteoForm">
	<p id="meteoFormTitle">De quel ville souhaitez-vous connaître la météo ? </p>
	<input type="text" id="search" name="search" autocomplete="off" required list="results">
	<datalist id="results">		
	</datalist>
	<button class="townBtn btn btn-primary">valider</button>


</div>
<?php $formTown = ob_get_clean(); ?>