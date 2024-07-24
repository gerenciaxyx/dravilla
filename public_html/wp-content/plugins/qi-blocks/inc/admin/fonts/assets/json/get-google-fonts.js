/**
 * Downloads and generates list of the Google Fonts
 */
const path     = require( 'path' );
const axios    = require( 'axios' );
const jsonfile = require( 'jsonfile' );

let file = './google-fonts.json';

let entries = fontData => {
	return {
		family: fontData.family,
		variants: fontData.variants,
		subsets: fontData.subsets,
	};
};

if ( process.argv.slice( 2 ).length && 'dropdown' === process.argv.slice( 2 )[0] ) {
	file = './google-fonts-dropdown.json';

	entries = fontData => {
		return {
			family: fontData.family
		};
	};
}

axios.get( 'https://www.googleapis.com/webfonts/v1/webfonts?key=AIzaSyC9lzpgIpyZ9rAXREmWsuI0CxXevYjkU7Y' )
.then( response => {
	const fonts    = response.data.items.map( entries );
	const fullPath = path.resolve( __dirname, file );

	jsonfile.writeFile(
		fullPath,
		fonts,
		{
			spaces: 2,
			EOL: '\r\n'
		},
		err =>
		{
			if ( err ) {
				console.error( err ); // eslint-disable-line
			}
		}
	);

	console.log( `Sucessfully writen ${file.match( /[^\/]+.json/ )}` ); // eslint-disable-line
} )
.catch( error => {
	console.log( error ); // eslint-disable-line
} );
