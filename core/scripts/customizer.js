( function( api ) {
    var sections = [ 'cpotheme_layout_home', 'cpotheme_layout_features', 'cpotheme_layout_portfolio', 'cpotheme_layout_services', 'cpotheme_layout_team', 'cpotheme_layout_testimonials', 'cpotheme_layout_clients', 'cpotheme_layout_posts' ];

    // Detect when the front page sections section is expanded (or closed) so we can adjust the preview accordingly.
    jQuery.each( sections, function ( index, section ){
        api.section( section, function( section ) {
            section.expanded.bind( function( isExpanding ) {

                // Value of isExpanding will = true if you're entering the section, false if you're leaving it.
                api.previewer.send( 'section-highlight', { expanded: isExpanding, section: section.id });
            } );
        } );
    });
    

} )( wp.customize );