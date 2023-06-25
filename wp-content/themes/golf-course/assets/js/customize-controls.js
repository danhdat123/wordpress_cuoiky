( function( api ) {

	// Extends our custom "golf-course" section.
	api.sectionConstructor['golf-course'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );