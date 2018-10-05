$(document).ready(function () {
    $('.js-scrollTo').on('click', function () { // Au clic sur un élément
        var page = $(this).attr('href'); // Page cible
        var speed = 1000; // Durée de l'animation (en ms)
        $('html, body').animate({scrollTop: $(page).offset().top}, speed); // Go
        return false;
    });
    $('.dropdown-button').dropdown({
        inDuration: 300,
        outDuration: 225,
        constrainWidth: true, //true => adapte le dropdown à la taille des onglets, false => adpate à la taille des liens à l'intérieur
        hover: true, // S'active au survol, false => clic pour s'activer
        gutter: 0, // Spacing from edge
        belowOrigin: true, // deffilement du dropdown sous l'onglet, false => defilment sur l'onglet
        alignment: 'left', // alignement sur la gauche des liens dans le dropdown
        stopPropagation: false // Stops event propagation
    });
});