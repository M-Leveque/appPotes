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
                <li class="col-xs-6 col-sm-4 col-md-3" data-src="ressources/img/album/1.jpg">
                    <a href="">
                        <img class="img-responsive" src="ressources/img/album/thumb-1.jpg" alt="Thumb-1">
                    </a>
                </li>

                <li class="col-xs-6 col-sm-4 col-md-3" data-src="ressources/img/v2.jpg">
                    <a href="">
                        <img class="img-responsive" src="ressources/img/album/thumb-2.jpg" alt="Thumb-2">
                    </a>
                </li>

                <li class="col-xs-6 col-sm-4 col-md-3" data-src="ressources/img/album/3.jpg">
                    <a href="">
                        <img class="img-responsive" src="ressources/img/album/thumb-3.jpg" alt="Thumb-3">
                    </a>        </li>

                <li class="col-xs-6 col-sm-4 col-md-3" data-src="ressources/img/album/4.jpg">
                    <a href="">
                        <img class="img-responsive" src="ressources/img/album/thumb-4.jpg" alt="Thumb-4">
                    </a>
                </li>

                <li class="col-xs-6 col-sm-4 col-md-3" data-src="ressources/img/album/5.jpg">
                    <a href="">
                        <img class="img-responsive" src="ressources/img/album/thumb-5.jpg" alt="Thumb-4">
                    </a>
                </li>

                <li class="col-xs-6 col-sm-4 col-md-3" data-src="ressources/img/album/6.jpg">
                    <a href="">
                        <img class="img-responsive" src="ressources/img/album/thumb-6.jpg" alt="Thumb-4">
                    </a>
                </li>

                <li class="col-xs-6 col-sm-4 col-md-3" data-src="ressources/img/album/7.jpg">
                    <a href="">
                        <img class="img-responsive" src="ressources/img/album/thumb-7.jpg" alt="Thumb-4">
                    </a>
                </li>

                <li class="col-xs-6 col-sm-4 col-md-3" data-src="ressources/img/album/1.jpg">
                    <a href="">
                        <img class="img-responsive" src="ressources/img/album/thumb-1.jpg" alt="Thumb-4">
                    </a>
                </li>
            </ul>
        </div>
        <!-- #GALLERY -->

	</section>
</main>

