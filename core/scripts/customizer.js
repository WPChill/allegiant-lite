( function( api ) {
    var sections = [ 'cpotheme_layout_home', 'cpotheme_layout_features', 'cpotheme_layout_portfolio', 'cpotheme_layout_services', 'cpotheme_layout_team', 'cpotheme_layout_testimonials', 'cpotheme_layout_clients', 'cpotheme_layout_contact', 'cpotheme_layout_posts' ];

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
				$pluginSelect =  control.container.children('select'),
				$wpformsContainer = control.container.find('.cpotheme_contact_control__wpforms'),
				$cf7Container = control.container.find('.cpotheme_contact_control__cf7forms');
				
			if ( $pluginSelect.length && $pluginSelect.val() !== 'wpforms' ) {
				$wpformsContainer.hide();
			}

			if ( $pluginSelect.length && $pluginSelect.val() !== 'cf7' ) {
				$cf7Container.hide();
			}
			
			$pluginSelect.change(function() {
				var val = $( this ).val();
	
				if ( val == 'wpforms' ) {
					$wpformsContainer.show().find('option:eq(0)').prop('selected', true);
					$cf7Container.hide();
				}
				else {
					$wpformsContainer.hide();
					$cf7Container.show().find('option:eq(0)').prop('selected', true);
				}
			} ); 
			
			$wpformsContainer.find('select').change(function() {
				var val = $( this ).val();

				if ( ! isNaN( val ) ) {
					control.settings.plugin_select( 'wpforms' ); 
					control.settings.form_id( val ); 
				}
			});

			$cf7Container.find('select').change(function() {
				var val = $( this ).val();

				if ( ! isNaN( val ) ) {
					control.settings.plugin_select( 'cf7' ); 
					control.settings.form_id( val ); 
				}

			});

		}

	} );
	
	$.extend( api.controlConstructor, {
        'cpotheme_contact_control': api.CPOThemeContactControl,
    });
 
} )( wp.customize );