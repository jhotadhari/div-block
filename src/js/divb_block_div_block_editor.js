/**
 * External dependencies
 */
import extender from 'object-extender';

/**
 * WordPress dependencies
 */
const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;

/**
 * Internal dependencies
 */
import getDefault 				from './divb_block_div_block_editor/getDefault';
import parseSerialized			from './divb_block_div_block_editor/parseSerialized';
import Container				from './divb_block_div_block_editor/components/Container.jsx';

const blockClassName = 'wp-block-divb-div-block';

registerBlockType( 'divb/div-block', {
	title: __( 'Div Block', 'divb' ),

	icon: <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14z"/></svg>,	// https://material.io/tools/icons/?icon=crop_din&style=baseline

	category: 'layout',

	description: __( 'Just a simple div Block.', 'divb' ),

	supports: {
		html: true,
	},

    attributes: {
		settings: {
			type: 'string',
			default:  JSON.stringify( getDefault( 'settings', {} ) ),
		},
    },

    edit( { className, attributes, setAttributes } ) {

    	const {
    		align,
    	} = attributes;

    	const classNameSorted = className.split( ' ' ).sort( ( a, b ) => {
			if ( blockClassName === a ) return 1;
			if ( blockClassName === b ) return -1;
			return 0;
    	} ).join( ' ' );

    	const settings = extender.merge( getDefault( 'settings', {} ), parseSerialized( attributes.settings ) );

        return <>

			<Container
				settings={ settings }
				className={ classNameSorted }
				setAttributes={ setAttributes }
			/>

        </>;
    },

    save( { attributes } ) {

    	const {
    		className,
    	} = attributes;

    	const settings = extender.merge( getDefault( 'settings', {} ), parseSerialized( attributes.settings ) );

    	const classNameSorted = [
    		className,
    		blockClassName,
    	].join( ' ' );

		return <>
			<Container
				className={ classNameSorted }
			/>
		</>;
    }

});






// const { createHigherOrderComponent } = wp.compose;

// const withCustomClassName = createHigherOrderComponent( ( BlockListBlock ) => {
//     return ( props ) => {


//     	// console.log( 'debug props', props );		// ??? debug


// 		if ( props.attributes.className &&
// 			props.attributes.className.split().some( _className => ['row','col'].includes( _className ) )
// 		) {
// 			return <BlockListBlock { ...props } className={ props.attributes.className } />;
//         } else {
//             return <BlockListBlock {...props} />
//         }

//     };
// }, 'withClientIdClassName' );

// wp.hooks.addFilter( 'editor.BlockListBlock', 'my-plugin/with-client-id-class-name', withCustomClassName )