/**
 * External dependencies
 */
import extender from 'object-extender';

/**
 * WordPress dependencies
 */
const { Component } = wp.element;
const {
	InnerBlocks,
} = wp.editor;

/**
 * Internal dependencies
 */

class Container extends Component {

	constructor( props ) {
		super( ...arguments );
	}

	render() {

		const {
			className,
			setAttributes,
		} = this.props;

		return <>
			<div
				className={ className }
				style={ setAttributes && {
					border: '1px dotted rgba( 0, 0, 0, 0.2)',
				} }
			>
				{ setAttributes &&
					<InnerBlocks
						template={ [
							[ 'core/paragraph', {} ],
						] }
					/>
				}
				{ ! setAttributes &&
					<InnerBlocks.Content />
				}
			</div>
		</>;

	}
}

export default Container;
