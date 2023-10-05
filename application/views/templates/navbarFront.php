<?php 	$this->load->view('templates/headerFront');?>

<nav class="navbar">
        <video id="background-video" class="brand-title" autoplay loop muted >
            <source src="<?= base_url('assets/video/DS (1).mp4') ?>" type="video/mp4">
        </video>
        <a href="#" class="toggle-button">
          <span class="bar"></span>
          <span class="bar"></span>
          <span class="bar"></span>
        </a>
        <div class="navbar-links">
          <ul>
            <li><a class="active" href="<?= site_url('recrutement/index'); ?>">Accueil</a></li>
            <li id="annonceur">Annonces</li>
						<li><div class="imgContent"><img src="<?= base_url('assets/img/icons8-doorbell-48.png') ?>" alt="" srcset=""></div></li>
            <li><a href="<?= site_url('deconnection') ?>"><button>Deconnection</button></a></li>
          </ul>
        </div>
      </nav> 

</body>
</html>
