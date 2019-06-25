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
import Container from './divb_block_div_block_editor/components/Container.jsx';

// That's how wp isFinite naming this block
const blockClassName = 'wp-block-divb-div-block';

/**
 * Register Block
 */
registerBlockType( 'divb/div-block', {
	title: __( 'Div Block', 'divb' ),

	icon: <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14z"/></svg>,	// https://material.io/tools/icons/?icon=crop_din&style=baseline

	category: 'layout',

	description: __( 'Just a simple div Block.', 'divb' ),

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