<!--
	CONNEXION
-->
<main id="content-connexion">
	<section>
		<!-- RIGHT LOGIN -->
		<div>
			<h1>Bienvenue !</h1>
			
			<!-- formulaire connexion -->
			<form id="form-co" action="index.php?action=Connexion" method="post">
				<input class="champ-form-co" type="mail" name="ident" placeholder="Adresse mail">
				<input class="champ-form-co" type="password" name="mdp" placeholder="Mot de passe">
				<input id="btn-form-co" type="Submit" value="CONNEXION">
			</form>
			
			<!-- Open Toggle -->
			<button class="open-toggle"><u>En savoir plus</u></button>
		</div>
	
		<!-- LEFT LOGIN -->
		<div id="slideshow">
            <ul class="rslides">
                <li><img src="ressources/img/slideshow/app-1.png" alt=""></li>
                <li><img src="ressources/img/slideshow/app-2.png" alt=""></li>
                <li><img src="ressources/img/slideshow/app-3.png" alt=""></li>
            </ul>
		</div>
	</section>
	
	<!-- TOGGLE ---------------------------------------------------------------------->
	<section id="toggle-co">
		<button class="open-toggle icon icon-close-two">fermer</button>
        <!-- article gauche  -->
        <article>
            <h2>La web app</h2>
            <p>Batnae municipium in Anthemusia conditum Macedonum manu priscorum ab Euphrate flumine brevi spatio disparatur, refertum mercatoribus opulentis, ubi annua sollemnitate prope Septembris initium mensis ad nundinas magna promiscuae fortunae convenit multitudo ad commercanda quae Indi mittunt et Seres aliaque plurima vehi terra marique consueta.</p>
        </article>

        <!-- article droite -->
        <article>
            <h2>Réalisation</h2>
            <div>
                <span>Le Vagueresse Corantin</span>

                <ul>
                    <li>Web Designer</li>
                    <li>Infographiste</li>
                    <li>Motion Designer</li>
                </ul>
            </div>

            <div>
                <span>Lévêque Melvin</span>

                <ul>
                    <li>Developpeur Web</li>
                    <li>Developpeur Application</li>
                    <li>Developpeur Logiciel</li>
                    <li>Sécurité informatique</li>
                </ul>
            </div>
        </article>

        <p>Propriété de Le Vagueresse Corantin & Lévêque Melvin. 2018</p>
	</section>
</main>