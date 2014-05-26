<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title><?php isset($this->Title) ? $this->Title : ''; ?></title>
  <!-- CSS -->
  <?php foreach($this->ressourcesCss as $ressource){echo $ressource;} ?>
</head>
<body>
	<div id="conteneur">
		<!-- CONTENT -->
		<?php echo $content_for_layout ;?>
	</div>
<!-- JS -->
<?php foreach($this->ressourcesJs as $ressource){echo $ressource;} ?>
</body>
</html>