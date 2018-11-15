// JavaScript Document
// INFO CONNEXION //
$(document).ready(function(){
    $("#open-toggle").click(function() {
        $("#toggle-co").toggle("slide");
    });
});

// MENU AJOUT //
$(document).ready(function(){
	$("#menu").click(function() {
		$("#add-menu").toggle("slide");
	});
});

// TEXTE BOUTON AJOUT //
$(document).ready(function(){
$("#menu").click(function() {
  $(".btn-add").toggle();
	});
});