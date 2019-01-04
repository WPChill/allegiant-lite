( function( api ) {

 	api.CPOThemeSelectizeControl = api.Control.extend( {

		ready: function() {
			var control = this;

			var maxItems = control.params.attributes.maxItems;

			control.container.children('select').selectize({
				maxItems: maxItems ? maxItems : null,
				create: function(value) {
					var text = value;

					if ( text.charAt(0) === '#') {
						value = value.substr(1);
					}
					else {
						text = '#' + text;
					}
					return { 'value': value, 'text': text };
				},
				createFilter: function(input) {
					if ( input.charAt(0) === '#' && ! isNaN( input.substr(1) ) ) {
						return true;
					}
					return ! isNaN(input);
				},
				onChange: function(value){
					if( value === null ){
						value = [];
					}
					control.setting( value );
				},
			});
		},

	});

	$.extend( api.controlConstructor, {
		'cpotheme-selectize-control': api.CPOThemeSelectizeControl,
    });

})( wp.customize );