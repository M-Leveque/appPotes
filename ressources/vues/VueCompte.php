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
                </section>
			</div>

			<div id="Cagnottes" id="profil-cagn" class="tabcontent">
                <a class="btn-tab" href="#"><i>modifier/supprimer</i></a>

                <!-- GRID CAGNOTTES -->
                <section class="grid-gen grid-cagn">
                    <div class="content-cagn">
                        <div class="desc-cagn">
                            <h5>Cadeau Bastien</h5>
                            <p>DÃ©scription cagnottes Et eodem impetu Domitianum praecipitem per scalas itidem funibus constrinxerunt, eosque coniunctos per ampla spatia civitatis acri</p>
                            <button>Participer</button>
                        </div>

                        <div class="prix-cagn">
                            <span>51,00 â‚¬</span>
                            <p>Fin le<span> 00/00/00</span></p>
                        </div>
                    </div>

                    <div class="content-cagn">
                        <div class="desc-cagn">
                            <h5>Cadeau Bastien</h5>
                            <p>DÃ©scription cagnottes Et eodem impetu Domitianum praecipitem per scalas itidem funibus constrinxerunt, eosque coniunctos per ampla spatia civitatis acri</p>
                            <button>Participer</button>
                        </div>

                        <div class="prix-cagn">
                            <span>51,00 â‚¬</span>
                            <p>Fin le<span> 00/00/00</span></p>
                        </div>
                    </div>
                </section>
			</div>
		</div>
	</section>
</main>