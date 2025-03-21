( function( api ) {

	// Extends our custom "job-listing" section.
	api.sectionConstructor['job-listing'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );