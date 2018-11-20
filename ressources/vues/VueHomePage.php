<!--
	CONTENT HOMEPAGE
-->
<main id="content-home">
	<!-- DERNIERS ALBUMS -->
	<section>
		<!-- title -->
		<a href="?action=Albums">
			<div class=" title">
				<h2>Derniers<br>Albums</h2>
				<span class="icon icon-arrow-26"></span>
			</div>
		</a>

        <?php echo $albumCommun ?>

		<!-- GRID ALBUMS -->
        <div class="grid-album">
            <?php echo $albums ?>
        </div>
	</section>

	<!-- EVENEMENTS -->
	<section>
		<!-- title -->
		<a href="?action=Evenements">
			<div class="title title-section">
				<h2>Événements</h2>
				<span class="icon icon-arrow-26"></span>
			</div>
		</a>

		<!-- GRID EVENEMENTS -->
        <?php echo $evenements ?>
	</section>

	<!-- CAGNOTTES -->
	<section>
		<!-- title -->
		<a href="?action=Cagnottes">
			<div class="title title-section">
				<h2>Cagnottes</h2>
				<span class="icon icon-arrow-26"></span>
			</div>
		</a>

		<!-- content cagnotte -->

        <?php echo $cagnottes ?>
	</section>
</main>
