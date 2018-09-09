<link href="../css/StyleConnexion.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
<main id="content-login">
	<section id="login"><!-- droite connexion -->
		<article>
			<h1>Bienvenue !</h1>

			<form action="index.php?action=Connexion" method="post"><!-- formulaire connexion -->
				<input type="mail" name="ident" placeholder="Adresse mail ">
				<input type="password" name="mdp" placeholder="Mot de passe ">
				<input id="button-form" type="Submit" value="CONNEXION">
			</form>
			
			<a id="open-modal" href="#modal-login" rel="modal:open"><u>En savoir plus</u></a>
		</article>
		
	</section><!-- #droite connexion -->
	
	<section id="slideshow"><!-- gauche slideshow-->

	</section><!--#gauche slideshow-->
	
	<!-- Modal-Content -->
	<div id="modal-login" class="modal">
		<section>
			<div class="modal-titre">
  				<h2>La web app</h2>
				<div></div>
			</div>
			
			<p>Batnae municipium in Anthemusia conditum Macedonum manu priscorum ab Euphrate flumine brevi spatio disparatur, refertum mercatoribus opulentis, ubi annua sollemnitate prope Septembris initium mensis ad nundinas magna promiscuae fortunae convenit multitudo ad commercanda quae Indi mittunt et Seres aliaque plurima vehi terra marique consueta.</p>
		</section>
		
		<section>
			<div class="modal-titre">
  				<h2>Réalisation</h2>
				<div></div>
			</div>
			
			<div>
				<div>
					<h3>Le Vagueresse Corantin</h3>
					
					<ul>
						<li><div></div><p>WebDesigner</p></li>
						<li><div></div><p>Infographiste</p></li>
						<li><div></div><p>Motion Designer</p></li>
					</ul>
					
				</div>
				
				<div>
					<h3>Lévêque Melvin</h3>
					
					<ul>
						<li><div></div><p>Developpeur Web</p></li>
						<li><div></div><p>Developpeur Application</p></li>
						<li><div></div><p>Developpeur Logiciel</p></li>
					</ul>
				</div>
			</div>
			
			<p id="modal-info">Propriété de Le Vagueresse Corantin & Lévêque Melvin. 2018</p>
		</section>
  		<a href="#" rel="modal:close">Close</a>
	</div><!-- #Modal-Content -->
	
</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>