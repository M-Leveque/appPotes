<main id="content-compte">
	
	<section class="info-compte">
		<div class="profil-pic">
			<img src="ressources/img/profile/pic-3.jpg" alt="photo de profile du compte">
		</div>

		<div class="title">
			<h2>Hey !<br>Corantin 😀</h2>
		</div>

		<div class="profil-opt">
			<a class="icon icon-down" href="?action=Deconnecter"></a>
			<a class="icon icon-sitting" href="?action=OptionCompte"></a>
		</div>
	</section>
	
	<section class="tab-compte">
		<div class="tab">
          <button class="tablinks" onclick="openTab(event, 'Albums')" id="defaultOpen">Albums</button>
		  <button class="tablinks" onclick="openTab(event, 'Evenements')">Événements</button>
		  <button class="tablinks" onclick="openTab(event, 'Cagnottes')">Cagnottes</button>
		</div>

		<div class="content-tab">
			<div id="Albums" id="profil-album" class="tabcontent">
				<a class="btn-tab" href="#"><i>modifier/supprimer</i></a>

                    <!-- GRID ALBUMS -->
                    <section class="grid-gen grid-album">
                        <?php echo $albums ?>
                    </section>
				</div>
			</div>

			<div id="Evenements" id="profil-even" class="tabcontent">
                <a class="btn-tab" href="#"><i>modifier/supprimer</i></a>

                <!-- GRID EVENEMENT -->
                <section class="grid-gen grid-even">
                    <?php echo $evenements ?>
                    <!-- BUTTON AFFICHAGE ANCIEN EVENEMENT -->
                    <button id="btnShowPasteEvents" class="even"><i><u>Afficher les événements passés</u></i></button>
                </section>
			</div>

			<div id="Cagnottes" id="profil-cagn" class="tabcontent">
                <a class="btn-tab" href="#"><i>modifier/supprimer</i></a>

                <!-- GRID CAGNOTTES -->
                <section class="grid-gen grid-cagn">
                    <?php echo $cagnottes ?>
                </section>
			</div>
		</div>
	</section>
</main>