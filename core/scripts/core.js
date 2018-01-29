//CORE JS FUNCTIONALITY
//Contains only the most essential functions for the theme. No jQuery.

//MOBILE MENU TOGGLE
var menuElement = document.getElementById( 'menu-mobile-open' );
var menuExists = ! ! menuElement;
if ( menuExists ) {
    menuElement.addEventListener( 'click', function() {
    document.body.classList.add( 'menu-mobile-active' );
  } );

  document.getElementById( 'menu-mobile-close' ).addEventListener( 'click', function() {
    document.body.classList.remove( 'menu-mobile-active' );
  } );
}