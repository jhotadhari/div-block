/**
 * External dependencies
 */
const {
	get,
} = lodash;

/**
 * WordPress dependencies
 */
const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;
const { createHigherOrderComponent } = wp.compose;
const { addFilter } = wp.hooks;
const { BlockControls } = wp.editor;
const {
	TextControl,
	Toolbar,
	Tooltip,
} = wp.components;

/**
 * Internal dependencies
 */
import Container from './divb_block_div_block_admin/components/Container.jsx';

// That's how wp is naming this block
const blockClassName = 'wp-block-divb-div-block';

/**
 * Register Block
 */
registerBlockType( 'divb/div-block', {
	title: __( 'Div Block', 'divb' ),

	icon: <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="none" d="M0 0h24v24H0V0z"/><path d="M4 10h12v2H4zm0-4h12v2H4zm0 8h8v2H4zm10 0v6l5-3z"/></svg>,	// https://material.io/tools/icons/?icon=playlist_play&style=baseline

	category: 'layout',

	description: __( 'Just a simple div Block.', 'divb' ),

	keywords: [
		__( 'container' ),
		__( 'wrapper' ),
	],

	supports: {
		html: true,
	},

    attributes: {},

    edit( { className, attributes, setAttributes } ) {

    	const classNameSorted = className.split( ' ' ).sort( ( a, b ) => {
			if ( blockClassName === a ) return 1;
			if ( blockClassName === b ) return -1;
			return 0;
    	} ).join( ' ' );

        return <>

			<BlockControls>
				<Toolbar className={ 'divb-toolbar-text' }>
					<Tooltip text={ 'Additional CSS Class' }>
						<div>
							<TextControl
								value={ attributes.className }
								onChange={ ( className ) => setAttributes( { className } ) }
							/>
						</div>
					</Tooltip>
				</Toolbar>
			</BlockControls>

			<Container
				className={ classNameSorted }
				setAttributes={ setAttributes }
			/>

        </>;
    },

    save( { attributes } ) {

    	const {
    		className,
    	} = attributes;

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

/**
 * Assign block `.col*` classNames to the editor block wrapper div
 */
const withColClassNames = createHigherOrderComponent( ( BlockListBlock ) => {
    return ( props ) => {

    	const colClassNames = get( props, ['attributes','className'], '' )
    		.split( ' ' )
    		// filter col*
			.filter( _className => [
				'col',
			].map( _start => _className.startsWith( _start ) ).includes( true ) )
			.join( ' ' );

		if ( colClassNames.length ) {
			return <BlockListBlock { ...props } className={ colClassNames } />;
        } else {
            return <BlockListBlock {...props} />
        }

    };
}, 'withClientIdClassName' );
addFilter( 'editor.BlockListBlock', 'divb.editor.BlockListBlock', withColClassNames )