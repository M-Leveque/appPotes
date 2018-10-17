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
            <?php echo $aff_albums ?>
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
        <?php echo $aff_Evenements ?>
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
