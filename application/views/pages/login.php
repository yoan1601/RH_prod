<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?= base_url("assets\css\login_style.css") ?> ">
    <title>DS dev soft</title>
</head>
<body>
<div class="main-container">

<div class="img-content">
	<p class="intro-text">
		<h1>
			Faites partie de notre 
			equipe .
		</h1>
	</p>
</div>

<div class="card-body">

<div class="pt-4 pb-2">
<center>
  <h2 class="card-title text-center pb-0 fs-4">Se connecter</h2>
  <p>            
	<video id="background-video" class="brand-title" autoplay loop muted >
	<source src="<?= base_url('assets/video/DS.mp4') ?>" type="video/mp4">
	</video>
  </p>
  <p class="text-center small">Entrer votre email & mots de passe</p>
</center>
</div>

<form action="<?= site_url("login/seConnecter") ?>" class="row g-3 needs-validation" method="POST" novalidate>

  <div class="col-12">
	<label for="yourmail" class="form-label">email</label>
	<div class="input-group has-validation">
	  <input type="email" name="emailUser" class="form-control" id="yourmail" required>
	</div>
  </div>

  <div class="col-12">
	<label for="yourPassword" class="form-label">Mots de passe</label>
	<div class="input-group has-validation">
	<input type="password" name="mdpUser" class="form-control" id="yourPassword" required>
	</div>
  </div>

  <div class="col-12">
	<button class="btn btn-primary w-100" type="submit">Se connecter</button>
  </div>
  <div class="col-12">
	<p class="small mb-0">Pas de compte? <a href="<?= site_url('front/inscription') ?>">Creer un compte</a></p>
  </div>
</form>

</div>
</div>

</div>

</body>
</html>
