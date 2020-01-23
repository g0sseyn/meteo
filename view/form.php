<?php $nav=false ?>


<?php ob_start(); ?>

<div class="blocForm">
	<div class="bloc inscription">
		<p class="titleInscription"> s'inscrire</p>
		<?php if (isset($formInscription)) {
				echo $formInscription;
		} ?>		
	</div>
	<div class="bloc connection">
		<p class="titleConnection">déjà inscrit?</br>
		se connecter</p>
		<?php if (isset($formConnection)) {
				echo $formConnection;
		} ?>
	</div>	
	<div class="bloc free">
		<p class="titleFree">visiter le site sans s'inscrire</p>	
		<?php if (isset($formTown)) {
				echo $formTown;
		} ?>	
		<?php if (isset($meteo)) {
				echo $meteo;
		} ?>	
	</div>
</div>
<?php $form = ob_get_clean(); ?>