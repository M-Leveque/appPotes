<main id="content-add-even">
    <!-- FORMULAIRE AJOUT -->
    <section class="content-add">
        <div class="title">
            <h2>Ajout<br>événement</h2>
        </div>

        <div class="add-visuel">
            <label for="add-visuel">Ajouter un emoji<span class="icon icon-add"><img style="display: none" src="" alt="icon evenement"></span></label>
            <input id="add-visuel" type="file">
        </div>

        <form class="content-form-add">
            <label>Titre de l'evenement :</label>
            <input type="name" placeholder="(max 00 caractères)">
            <label>Déscriptif de l’evenement :</label>
            <textarea placeholder="(max 00 caractères)" cols="30" rows="1"></textarea>
        </form>

        <div class="content-btn-page">
            <a class="btn-page" href="#"><span>Annuler</span></a>
            <a class="btn-page" href="#"><span>Valider</span></a>
        </div>
    </section><!-- #FORMULAIRE AJOUT -->

    <!-- ELEMENTS EVENEMENT --------------------------------------------------------------->
    <section class="content-opt-even">
        <!-- Cagnotte evenement -->
        <div class="content-even-cagn">
            <p class="label-add">Cagnotte ajoutée :</p>

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
        </div><!-- #cagnotte evenement -->

        <!-- Album evenement -->
        <div class="content-alb">
            <p class="label-add">Album ajouté :</p>

            <a href="#">
                <div class="album album-grid">
                    <img src="ressources/img/vignettes/pic-2.jpg" alt="vignette de l'album">
                    <p>Titre ðŸ–•</p>
                </div>
            </a>
        </div><!-- #Exclusion evenement -->

        <!-- Album evenement -->
        <div class="content-excl">

        </div><!-- #Exclusion evenement -->

        <!-- Button add -->
        <ul class="btn-add">
            <a class="reveal" href="#"><li><div class="icon-btn icon icon-add-cash"></div></li>Ajouter<br>une cagnotte</a>
            <a class="reveal" href="#"><li><div class="icon-btn icon icon-add-pic"></div></li>Ajouter<br>un album</a>
            <a class="reveal" href="#"><li><div class="icon-btn icon icon-add-people-no"></div></li>Exclure<br>une personne</a>
        </ul>
    </section><!-- #ELEMENTS EVENEMENT -->
</main>