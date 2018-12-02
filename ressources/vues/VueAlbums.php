<main id="content-album">
	<div class="title">
		<h2>Tous les albums</h2>
	</div>

   <!-- Recherche -->
   <section class="content-search-album accordion-container">
       <button class="ac"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 49.99 50">
               <g class="nc-icon-wrapper js-transition-icon" data-effect="scale" data-event="click">
                   <g class="js-transition-icon__state" style="">
                       <defs>
                           <style>.cls-1{fill:url(#Dégradé_sans_nom_4);}</style>
                           <linearGradient id="Dégradé_sans_nom_4" x1="29.99" y1="55" x2="29.99" y2="5"
                                           gradientUnits="userSpaceOnUse">
                               <stop offset="0" stop-color="#e0c3fc"></stop>
                               <stop offset="1" stop-color="#8ec5fc"></stop>
                           </linearGradient>
                       </defs>
                       <title>search</title>
                       <path class="cls-1"
                             d="M54.6,52.5,42.4,40.3a20.85,20.85,0,0,0,5.2-14A21.3,21.3,0,1,0,26.3,47.6a21.77,21.77,0,0,0,14-5.2L52.5,54.6a1.71,1.71,0,0,0,2.2,0A1.8,1.8,0,0,0,54.6,52.5ZM8,26.3A18.3,18.3,0,1,1,26.3,44.6,18.31,18.31,0,0,1,8,26.3Z"
                             transform="translate(-5 -5)"></path>
                   </g>
                   <g class="js-transition-icon__state" aria-hidden="true" style="display: none;">
                       <defs>
                           <style>.cls-1{fill:url(#Dégradé_sans_nom_5);}</style>
                           <linearGradient id="Dégradé_sans_nom_5" x1="11.27" y1="11.25" x2="54.66" y2="54.64"
                                           gradientUnits="userSpaceOnUse">
                               <stop offset="0" stop-color="#8ec5fc"></stop>
                               <stop offset="1" stop-color="#e0c3fc"></stop>
                           </linearGradient>
                       </defs>
                       <title>search-two</title>
                       <path class="cls-1"
                             d="M54.6,52.5,42.4,40.3a20.85,20.85,0,0,0,5.2-14A21.3,21.3,0,1,0,26.3,47.6a21.77,21.77,0,0,0,14-5.2L52.5,54.6a1.71,1.71,0,0,0,2.2,0A1.8,1.8,0,0,0,54.6,52.5Z"
                             transform="translate(-5 -5)"></path>
                   </g>
               </g>
       </button>

        <div class="ac-a">
            <div class="ac-q" tabindex="0">
                <select>
                    <option value="#">Date</option>
                    <option value="#">Date</option>
                    <option value="#">Date</option>
                    <option value="#">Date</option>
                    <option value="#">Date</option>
                </select>
            </div>
        </div>
    </div>
   </section><!-- #Recherche -->
	
	<!-- Album Commun -->
    <?php echo $albumCommun ?>
	
	<!-- GRID ALBUMS -->
	<section class="grid-gen grid-album">
        <?php echo $albums ?>
	</section>
</main>