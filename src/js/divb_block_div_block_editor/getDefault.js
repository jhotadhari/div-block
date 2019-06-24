/**
 * WordPress dependencies
 */
const { applyFilters } = wp.hooks;

const getDefault = ( key, args ) => {

	switch( key ){

		case 'settings':
			return applyFilters( 'divb.default.settings', {

			}, args );

	}
};

export default getDefault;
