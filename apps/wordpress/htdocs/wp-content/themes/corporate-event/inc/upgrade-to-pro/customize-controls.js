( function( api ) {

	// Extends our custom "corporate-event" section.
	api.sectionConstructor['corporate-event'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
