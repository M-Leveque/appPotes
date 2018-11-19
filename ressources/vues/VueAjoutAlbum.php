<main id="content-add-album">
    <!-- FORMULAIRE AJOUT -->
    <section class="content-add">
        <div class="title">
            <h2>Ajout<br>album</h2>
        </div>

        <div class="add-visuel">
            <label for="add-visuel">Ajouter une vignette<span class="icon icon-add"><img style="display: none" src="ressources/img/album/1.jpg" alt="vignette album"></span></label>
            <input id="add-visuel" type="file">
        </div>

        <form class="content-form-add">
            <label>Titre de l'album :</label>
            <input type="name" placeholder="(max 00 caractères)">
            <label>Déscriptif de l’album :</label>
            <textarea placeholder="(max 00 caractères)" cols="30" rows="1"></textarea>
        </form>

        <div class="content-btn-page">
            <a class="btn-page" href="#"><span>Annuler</span></a>
            <a class="btn-page" href="#"><span>Valider</span></a>
        </div>
    </section>

    <!-- GRID AJOUT PHOTOS -->
    <section class="content-grid-add">
        <!-- GALLERY -->
        <div class="demo-gallery">
            <ul id="lightgallery" class="list-unstyled row">
                <li class="col-xs-6 col-sm-4 col-md-3" data-src="ressources/img/album/1.jpg">
                    <a href="">
                        <img class="img-responsive" src="ressources/img/album/thumb-1.jpg" alt="Thumb-1">
                    </a>
                </li>

                <li class="col-xs-6 col-sm-4 col-md-3" data-src="ressources/img/2.jpg">
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
        </div><!-- #GALLERY -->

        <a href="#"><span class="icon-btn icon icon-add-pic"></span></a>

    </section>
</main>