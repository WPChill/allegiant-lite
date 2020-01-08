jQuery( 'a[href*="#"]:not([href="#"])' ).on( 'click', function(e) {
    let target;
    if ( location.pathname.replace( /^\//, '' ) === this.pathname.replace( /^\//, '' ) && location.hostname === this.hostname ) {
        target = jQuery( this.hash );
        target = target.length ? target : jQuery( '[name=' + this.hash.slice( 1 ) + ']' );
        if ( target.length ) {
            e.preventDefault();
            jQuery('body').removeClass('menu-mobile-active');
            jQuery( 'html, body' ).animate( { scrollTop: target.offset().top }, 1000, 'swing' );
        }
    }
});

/* Remove behaviour of anchors linking to # */
jQuery( 'a[href="#"]' ).on( 'click', function( e ) {
    e.preventDefault();
});