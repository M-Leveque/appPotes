<main id="content-optcompte" id="app">
    <div class="profil-pic">
        <a href="#">
            <img src="ressources/img/profile/pic-3.jpg" alt="Votre photo profile">
        </a>
        <button>modifier</button>
    </div>

    <form>
        <span>Pseudo :</span>
        <input type="name" name="pseudo">
        <span>Adresse mail de connexion :</span>
        <input type="email" name="pseudo">
    </form>

        <button id="btn-mp" id="show-modal" @click="showModal = true">Changer de mot de passe</button>

    <script type="text/x-template" id="modal-template">
        <transition name="modal">
            <div class="modal-mask">
                <div class="modal-container"

                <button class="modal-default-button" @click="$emit('close')">
                    OK
                </button>
            </div>
            </div>
        </transition>
    </script>

            <modal v-if="showModal" @close="showModal = false">
            </modal>

    <section class="content-btn-page">
        <a class="btn-page" href="#"><span>Annuler</span></a>
        <a class="btn-page" href="#"><span>Valider</span></a>
    </section>
</main>