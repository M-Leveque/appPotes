<!--
	CONNEXION
-->
<main id="content-connexion">
	<section>
		<!-- RIGHT LOGIN -->
		<div>
			<h1>Bienvenue !</h1>
			
			<!-- formulaire connexion -->
			<form action="index.php?action=Connexion" method="post">
				<input type="mail" name="ident" placeholder="Adresse mail ">
				<input type="password" name="mdp" placeholder="Mot de passe ">
				<input id="btn-form" type="Submit" value="CONNEXION">
			</form>
			
			<!-- Open Toggle -->
			<button id="open-toggle"><u>En savoir plus</u></button>
		</div>
	
		<!-- LEFT LOGIN -->
		<div id="slideshow">
		</div>
	</section>
	
	<!-- TOGGLE -->
	<section id="toggle">
		<p>test</p>
	</section>
</main>

<!-- 
	SCRIPT
-->
<!-- toggle -->
<script src="//code.jquery.com/jquery-1.12.4.js"></script>
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$(document).ready(function(){
	$("#open-toggle").click(function() {
		$("#toggle").toggle("slide");
	});
});
</script>