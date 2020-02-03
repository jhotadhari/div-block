/**
 * WordPress dependencies
 */
const { Component } = wp.element;
const {
	InnerBlocks,
} = wp.editor;

class Container extends Component {

	constructor( props ) {
		super( ...arguments );
	}

	render() {

		const {
			className,
			setAttributes,
		} = this.props;

		const classNameEditor = className.split( ' ' )
			// remove classNames starts with col*
			.filter( _className => ! [
				'col',
			].map( _start => _className.startsWith( _start ) ).includes( true ) )
			// rename `row` to `divb-row`
			.map( _className => 'row' === _className ? 'divb-row' : _className )
			.join( ' ' );

		return <>
			<div
				className={ setAttributes ? classNameEditor : 'divb ' + className }
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
