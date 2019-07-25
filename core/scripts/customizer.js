( function( api ) {
    var sections = [ 'cpotheme_layout_home', 'cpotheme_layout_features', 'cpotheme_layout_about', 'cpotheme_layout_portfolio', 'cpotheme_layout_services', 'cpotheme_layout_team', 'cpotheme_layout_testimonials', 'cpotheme_layout_clients', 'cpotheme_layout_contact', 'cpotheme_layout_posts' ];

    // Detect when the front page sections section is expanded (or closed) so we can adjust the preview accordingly.
    jQuery.each( sections, function ( index, section ){
        api.section( section, function( section ) {
            section.expanded.bind( function( isExpanding ) {

                // Value of isExpanding will = true if you're entering the section, false if you're leaving it.
                api.previewer.send( 'section-highlight', { expanded: isExpanding, section: section.id });
            } );
        } );
    });

 	api.CPOThemeContactControl = api.Control.extend( {

		ready: function() {
			var control = this,
				$kaliformsContainer = control.container.find('.cpotheme_contact_control__kali-forms');

			$kaliformsContainer.find('select').change(function() {
				var val = $( this ).val();
				control.settings.plugin_select( 'kali-forms' );
				control.settings.form_id( val );
			});

		}

	} );

	$.extend( api.controlConstructor, {
        'cpotheme_contact_control': api.CPOThemeContactControl,
    });

} )( wp.customize );