// JavaScript Document
// INFO CONNEXION //
// TOGGLE PAGE CONNEXION //
$(document).ready(function(){
    $(".open-toggle").click(function() {
        $("#toggle-co").toggle("slide");
    });
});

// MENU AJOUT //
$(document).ready(function(){
	$("#menu").click(function() {
		$("#add-menu").toggle("slideDown");
	});
});

// TEXTE BOUTON AJOUT //
$(document).ready(function(){
    $("#menu").click(function() {
        $(".btn-add").toggle();
	});
});

// TEXTE BOUTON EVENEMENT PASSES //
$(document).ready(function(){
    $("#btnShowPasteEvents").click(function() {
        $(".btn-even-paste").toggle();
    });
});