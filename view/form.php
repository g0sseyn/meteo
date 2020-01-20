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
		<p>déjà inscrit?</br>
		se connecter</p>
	</div>	
	<div class="bloc free">
		<p>visiter le site sans s'inscrire</p>			
	</div>
</div>
<?php $form = ob_get_clean(); ?>