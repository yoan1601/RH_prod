<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?= base_url("assets\css\login_style.css") ?> ">
	<title>Inscription</title>
</head>
<body>
	<div class="main-container">

		<div class="img-content inscri">
		</div>

		<div class="card-body">

		<div class="pt-4 pb-2">
		<center>
		  <h2 class="card-title text-center pb-0 fs-4">Creer un compte</h2>
          <video id="background-video" class="brand-title" autoplay loop muted >
            <source src="<?= base_url('assets/video/DS.mp4') ?>" type="video/mp4">
        </video>
        </center>
		</div>

		<form action="<?= site_url("login/creerCompte") ?>" method="POST" class="row g-3 needs-validation" novalidate>

            <div class="col-12">
                <label for="yourUsername" class="form-label">Email</label>
                <div class="input-group has-validation">
                  <input type="email" name="email" class="form-control" id="yourUsername" required>
                </div>
            </div>

		  <div class="col-12">
			<label for="yourUsername" class="form-label">Nom d'utilisateur</label>
			<div class="input-group has-validation">
			  <input type="text" name="username" class="form-control" id="yourUsername" required>
			</div>
		  </div>

		  <div class="col-12">
			<label for="yourPassword" class="form-label">Mots de passe</label>
			<div class="input-group has-validation">
			<input type="password" name="mdp" class="form-control" id="yourPassword" required>
			</div>
		  </div>

		  <div class="col-12">
			<button class="btn btn-primary w-100" type="submit">CREER</button>
		  </div>
		  <div class="col-12">
			<p class="small mb-0"><a href="<?= site_url('front/index') ?>">Se connecter</a></p>
		  </div>
		</form>

		</div>
		</div>

		</div>

</body>
</html>
