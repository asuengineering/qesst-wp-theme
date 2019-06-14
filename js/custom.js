/**
 * --------------------------------------------------------------------------
 * Custom JS for QESST site
 * --------------------------------------------------------------------------
*/ 

jQuery(document).ready(function( $ ) {
    
    $('.home .typed').css('display','block');

    // Home Page
    new TypeIt('.ti-hero-slugs', {
        breakLines: false,
        loop: true,
        nextStringDelay: [3000, 500],
        loopDelay: 3000,
        lifelike: false
    }).go();

    new TypeIt('.typed-normal', {
        breakLines: false,
        loop: false,
        speed: 75,
        lifelike: false,
        waitUntilVisible: true
    }).go();

});