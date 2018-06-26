/**
 * --------------------------------------------------------------------------
 * Custom JS for QESST MaterialWP site
 * --------------------------------------------------------------------------
*/ 

jQuery(document).ready(function( $ ) {
   
    // Home Page
    new TypeIt('.ti-hero-slugs', {
        strings: [
            'is winning the Terawatt challenge.',
            'is driving PV innovation.',
            'is multiple universities working together.',
            'stands for quantum energy and sustainable solar technologies.'
        ],
        breakLines: false,
        loop: true,
        loopDelay: 5000,
        nextStringDelay: [400, 5000],
        lifelike: false
    });

    new TypeIt('.typed-normal', {
        breakLines: false,
        loop: false,
        speed: 75,
        lifelike: false,
        autostart: false,
    });

});


