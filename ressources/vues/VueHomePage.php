<!--
	CONTENT HOMEPAGE
-->
<main id="content-home">
	<!-- DERNIERS ALBUMS -->
	<section>
		<!-- title -->
		<a href="#">
			<div class=" title">
				<h2>Derniers<br>Albums</h2>
				<span class="icon icon-arrow-26"></span>
			</div>
		</a>

		<a href="?action=Photos&Album=1">
			<div id="album-com" class="album">
				<img src="ressources/img/vignettes/pic-2.jpg" alt="vignette de l'album commun">
				<p>Album commun 📦</p>
			</div>
		</a>

		<!-- GRID ALBUMS -->
		<div class="grid-album">

            <?php
            //Affichage des albums

            foreach($albums as $album){
                if($album->getId() != 1){
                    echo "
                    <a href=\"?action=Photos&Album=".$album->getId()."\">
                        <div class=\"album album-grid\">
                        <img src=\"".$album->getVisuel()."\" alt=\"vignette de l'album\">
                        <p>".$album->getNom()."</p>
                    </div>
                    </a>";
                }
            }

            //---------------------
            ?>
		</div>
	</section>

	<!-- EVENEMENTS -->
	<section>
		<!-- title -->
		<a href="#">
			<div class="title title-section">
				<h2>Événements</h2>
				<span class="icon icon-arrow-26"></span>
			</div>
		</a>

		<!-- GRID EVENEMENTS -->
		<a class="even" href="#">
			<div class="content-even">
				<span>🎁</span>

				<div class="desc-even">
					<h6>Anniversaire Bastien</h6>
					<p>Déscription événement Sp cum ducibus est civitas memoriam crudelitatem.</p>
				</div>

				<div class="date-even">
					<p>VEN</p>
					<span>14</span>
					<p>JUIN</p>
				</div>
			</div>
		</a>

		<a class="even" href="#">
			<div class="content-even">
				<span>🎁</span>

				<div class="desc-even">
					<h6>Titre événement</h6>
					<p>Déscription événement</p>
				</div>

				<div class="date-even">
					<p>JOUR</p>
					<span>00</span>
					<p>MOIS</p>
				</div>
			</div>
		</a>

		<a class="even" href="#">
			<div class="content-even">
				<span>🎁</span>

				<div class="desc-even">
					<h6>Titre événement</h6>
					<p>Déscription événement</p>
				</div>

				<div class="date-even">
					<p>JOUR</p>
					<span>00</span>
					<p>MOIS</p>
				</div>
			</div>
		</a>

		<a class="even" href="#">
			<div class="content-even">
				<span>🎁</span>

				<div class="desc-even">
					<h6>Titre événement</h6>
					<p>Déscription événement</p>
				</div>

				<div class="date-even">
					<p>JOUR</p>
					<span>00</span>
					<p>MOIS</p>
				</div>
			</div>
		</a>
	</section>

	<!-- CAGNOTTES -->
	<section>
		<!-- title -->
		<a href="#">
			<div class="title title-section">
				<h2>Cagnottes</h2>
				<span class="icon icon-arrow-26"></span>
			</div>
		</a>

		<!-- content cagnotte -->
		<div class="content-cagn">
			<div class="desc-cagn">
				<h5>Cadeau Bastien</h5>
				<p>Déscription cagnottes Et eodem impetu Domitianum praecipitem per scalas itidem funibus constrinxerunt, eosque coniunctos per ampla spatia civitatis acri</p>
				<button>Participer</button>
			</div>

			<div class="prix-cagn">
				<span>51,00 €</span>
				<p>Fin le<span> 00/00/00</span></p>
			</div>
		</div>

		<div class="content-cagn">
			<div class="desc-cagn">
				<h5>Titre Cagnotte</h5>
				<p>Déscription cagnottes Et eodem impetu Domitianum praecipitem per scalas itidem funibus constrinxerunt, eosque coniunctos per ampla spatia civitatis acri</p>
				<button>Participer</button>
			</div>

			<div class="prix-cagn">
				<span>00,00 €</span>
				<p>Fin le<span> 00/00/00</span></p>
			</div>
		</div>
	</section>
</main>
