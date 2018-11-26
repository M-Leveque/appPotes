<main id="content-pic">
	<!-- HEADER ALBUM -->
	<section id="header-pic">
		<!-- Vignette album -->
		<img src="ressources/img/album/7.jpg" alt="photo de l'album">
		
		<!-- Infos album -->
        <div>
            <p>Créé le <span><?php echo $dateCreation ?></span></p>
            <h1><?php echo $titre ?></h1>
            <p><?php echo $description ?></p>
        </div>
		
		<!-- Bouton joindre -->
		<button>Joindre à un événement</button>
	</section>

	<section id="grid-pic">
		<a class="reveal" href="#"><div class="icon-btn icon icon-add-pic"></div>Ajouter<br>vos photos</a>

        <!-- GALLERY -->
        <div class="demo-gallery">
            <ul id="lightgallery" class="list-unstyled row">
                <?php echo $htmlPhotos ?>
            </ul>
        </div>
        <!-- #GALLERY -->
	</section>
</main>

