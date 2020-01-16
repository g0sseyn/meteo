<?php $nav=false ?>


<?php ob_start(); ?>

<div class="container">
	<div class="row">
		<a href="index.php?action=inscription" class="container bloc col-sm-3">
			<div class="lien">
				<p> s'inscrire</p>
			</div>
		</a>
		<a href="index.php?action=connection" class="container bloc col-sm-3">
			<div class="lien">
				<p>déjà inscrit?</br>
				se connecter</p>
			</div>
		</a>
	</div>
	<div class="row">
		<a href="index.php?action=free" class="container bloc col-sm-3">
			<div class="lien">
				<p>visiter le site sans s'inscrire</p>
			</div>
		</a>
	</div>
</div>
<?php $form = ob_get_clean(); ?>