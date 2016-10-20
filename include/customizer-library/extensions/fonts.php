<?php
/**
 * Theme Customizer Fonts
 *
 * @package 	Customizer_Library
 * @author		The Theme Foundry
 */

if ( ! function_exists( 'customizer_library_get_font_choices' ) ) :
/**
 * Packages the font choices into value/label pairs for use with the customizer.
 *
 * @since  1.0.0.
 *
 * @return array    The fonts in value/label pairs.
 */
function customizer_library_get_all_fonts() {
	$heading1       = array( 1 => array( 'label' => sprintf( '--- %s ---', __( 'Standard Fonts', 'customizer-library' ) ) ) );
	$standard_fonts = customizer_library_get_standard_fonts();
	$heading2       = array( 2 => array( 'label' => sprintf( '--- %s ---', __( 'Google Fonts', 'customizer-library' ) ) ) );
	$google_fonts   = customizer_library_get_google_fonts();

	/**
	 * Allow for developers to modify the full list of fonts.
	 *
	 * @since 1.3.0.
	 *
	 * @param array    $fonts    The list of all fonts.
	 */
	return apply_filters( 'customizer_library_all_fonts', array_merge( $heading1, $standard_fonts, $heading2, $google_fonts ) );
}
endif;

if ( ! function_exists( 'customizer_library_get_font_choices' ) ) :
/**
 * Packages the font choices into value/label pairs for use with the customizer.
 *
 * @since  1.0.0.
 *
 * @return array    The fonts in value/label pairs.
 */
function customizer_library_get_font_choices() {
	$fonts   = customizer_library_get_all_fonts();
	$choices = array();

	// Repackage the fonts into value/label pairs
	foreach ( $fonts as $key => $font ) {
		$choices[ $key ] = $font['label'];
	}

	return $choices;
}
endif;

if ( ! function_exists( 'customizer_library_get_google_font_uri' ) ) :
/**
 * Build the HTTP request URL for Google Fonts.
 *
 * @since  1.0.0.
 *
 * @return string    The URL for including Google Fonts.
 */
function customizer_library_get_google_font_uri( $fonts ) {

	// De-dupe the fonts
	$fonts         = array_unique( $fonts );
	$allowed_fonts = customizer_library_get_google_fonts();
	$family        = array();

	// Validate each font and convert to URL format
	foreach ( $fonts as $font ) {
		$font = trim( $font );

		// Verify that the font exists
		if ( array_key_exists( $font, $allowed_fonts ) ) {
			// Build the family name and variant string (e.g., "Open+Sans:regular,italic,700")
			$family[] = urlencode( $font . ':' . join( ',', customizer_library_choose_google_font_variants( $font, $allowed_fonts[ $font ]['variant'] ) ) );
		}
	}

	// Convert from array to string
	if ( empty( $family ) ) {
		return '';
	} else {
		$request = '//fonts.googleapis.com/css?family=' . implode( '|', $family );
	}

	// Load the font subset
	$subset = get_theme_mod( 'font-subset', customizer_library_get_default( 'font-subset' ) );

	if ( 'all' === $subset ) {
		$subsets_available = customizer_library_get_google_font_subsets();

		// Remove the all set
		unset( $subsets_available['all'] );

		// Build the array
		$subsets = array_keys( $subsets_available );
	} else {
		$subsets = array(
			'latin',
			$subset,
		);
	}

	// Append the subset string
	if ( ! empty( $subsets ) ) {
		$request .= urlencode( '&subset=' . join( ',', $subsets ) );
	}

	return esc_url( $request );
}
endif;

if ( ! function_exists( 'customizer_library_get_google_font_subsets' ) ) :
/**
 * Retrieve the list of available Google font subsets.
 *
 * @since  1.0.0.
 *
 * @return array    The available subsets.
 */
function customizer_library_get_google_font_subsets() {
	return array(
		'all'          => __( 'All', 'textdomain' ),
		'cyrillic'     => __( 'Cyrillic', 'textdomain' ),
		'cyrillic-ext' => __( 'Cyrillic Extended', 'textdomain' ),
		'devanagari'   => __( 'Devanagari', 'textdomain' ),
		'greek'        => __( 'Greek', 'textdomain' ),
		'greek-ext'    => __( 'Greek Extended', 'textdomain' ),
		'khmer'        => __( 'Khmer', 'textdomain' ),
		'latin'        => __( 'Latin', 'textdomain' ),
		'latin-ext'    => __( 'Latin Extended', 'textdomain' ),
		'vietnamese'   => __( 'Vietnamese', 'textdomain' ),
	);
}
endif;

if ( ! function_exists( 'customizer_library_choose_google_font_variants' ) ) :
/**
 * Given a font, chose the variant to load for the theme.
 *
 * Attempts to load regular, italic, and 700. If regular is not found, the first variant in the family is chosen. italic
 * and 700 are only loaded if found. No fallbacks are loaded for those fonts.
 *
 * @since  1.0.0.
 *
 * @param  string    $font        The font to load variant for.
 * @param  array     $variant    The variant for the font.
 * @return array                  The chosen variant.
 */
function customizer_library_choose_google_font_variants( $font, $variants = array() ) {
	$chosen_variants = array();
	if ( empty( $variants ) ) {
		$fonts = customizer_library_get_google_fonts();

		if ( array_key_exists( $font, $fonts ) ) {
			$variants = $fonts[ $font ]['variant'];
		}
	}

	// If a "regular" variant is not found, get the first variant
	if ( ! in_array( 'regular', $variants ) ) {
		$chosen_variants[] = $variants[0];
	} else {
		$chosen_variants[] = 'regular';
	}

	// Only add "italic" if it exists
	if ( in_array( 'italic', $variants ) ) {
		$chosen_variants[] = 'italic';
	}

	// Only add "700" if it exists
	if ( in_array( '700', $variants ) ) {
		$chosen_variants[] = '700';
	}

	return apply_filters( 'customizer_library_font_variants', array_unique( $chosen_variants ), $font, $variants );
}
endif;

if ( ! function_exists( 'customizer_library_get_standard_fonts' ) ) :
/**
 * Return an array of standard websafe fonts.
 *
 * @since  1.0.0.
 *
 * @return array    Standard websafe fonts.
 */
function customizer_library_get_standard_fonts() {
	return array(
		'serif' => array(
			'label' => _x( 'Serif', 'font style', 'textdomain' ),
			'stack' => 'Georgia,Times,"Times New Roman",serif'
		),
		'sans-serif' => array(
			'label' => _x( 'Sans Serif', 'font style', 'textdomain' ),
			'stack' => '"Helvetica Neue",Helvetica,Arial,sans-serif'
		),
		'monospace' => array(
			'label' => _x( 'Monospaced', 'font style', 'textdomain' ),
			'stack' => 'Monaco,"Lucida Sans Typewriter","Lucida Typewriter","Courier New",Courier,monospace'
		)
	);
}
endif;

if ( ! function_exists( 'customizer_library_get_font_stack' ) ) :
/**
 * Validate the font choice and get a font stack for it.
 *
 * @since  1.0.0.
 *
 * @param  string    $font    The 1st font in the stack.
 * @return string             The full font stack.
 */
function customizer_library_get_font_stack( $font ) {

	$all_fonts = customizer_library_get_all_fonts();

	// Sanitize font choice
	$font = customizer_library_sanitize_font_choice( $font );

	$sans = '"Helvetica Neue",sans-serif';
	$serif = 'Georgia, serif';

	// Use stack if one is identified
	if ( isset( $all_fonts[ $font ]['stack'] ) && ! empty( $all_fonts[ $font ]['stack'] ) ) {
		$stack = $all_fonts[ $font ]['stack'];
	} else {
		$stack = '"' . $font . '",' . $sans;
	}

	return $stack;
}
endif;

if ( ! function_exists( 'customizer_library_sanitize_font_choice' ) ) :
/**
 * Sanitize a font choice.
 *
 * @since  1.0.0.
 *
 * @param  string    $value    The font choice.
 * @return string              The sanitized font choice.
 */
function customizer_library_sanitize_font_choice( $value ) {
	if ( is_int( $value ) ) {
		// The array key is an integer, so the chosen option is a heading, not a real choice
		return '';
	} else if ( array_key_exists( $value, customizer_library_get_font_choices() ) ) {
		return $value;
	} else {
		return '';
	}
}
endif;

if ( ! function_exists( 'customizer_library_get_google_fonts' ) ) :
/**
 * Return an array of all available Google Fonts.
 *
 * @since  1.0.0.
 *
 * @return array    All Google Fonts.
 */
function customizer_library_get_google_fonts() {
	return apply_filters( 'customizer_library_get_google_fonts', array(
		'ABeeZee' => array(
			'label'    => 'ABeeZee',
			'variant' => array(
				'regular',
				'italic',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Abel' => array(
			'label'    => 'Abel',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Abril Fatface' => array(
			'label'    => 'Abril Fatface',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Aclonica' => array(
			'label'    => 'Aclonica',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Acme' => array(
			'label'    => 'Acme',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Actor' => array(
			'label'    => 'Actor',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Adamina' => array(
			'label'    => 'Adamina',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Advent Pro' => array(
			'label'    => 'Advent Pro',
			'variant' => array(
				'100',
				'200',
				'300',
				'regular',
				'500',
				'600',
				'700',
			),
			'subsets' => array(
				'latin',
				'greek',
				'latin-ext',
			),
		),
		'Aguafina Script' => array(
			'label'    => 'Aguafina Script',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Akronim' => array(
			'label'    => 'Akronim',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Aladin' => array(
			'label'    => 'Aladin',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Aldrich' => array(
			'label'    => 'Aldrich',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Alef' => array(
			'label'    => 'Alef',
			'variant' => array(
				'regular',
				'700',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Alegreya' => array(
			'label'    => 'Alegreya',
			'variant' => array(
				'regular',
				'italic',
				'700',
				'700italic',
				'900',
				'900italic',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Alegreya SC' => array(
			'label'    => 'Alegreya SC',
			'variant' => array(
				'regular',
				'italic',
				'700',
				'700italic',
				'900',
				'900italic',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Alegreya Sans' => array(
			'label'    => 'Alegreya Sans',
			'variant' => array(
				'100',
				'100italic',
				'300',
				'300italic',
				'regular',
				'italic',
				'500',
				'500italic',
				'700',
				'700italic',
				'800',
				'800italic',
				'900',
				'900italic',
			),
			'subsets' => array(
				'latin',
				'vietnamese',
				'latin-ext',
			),
		),
		'Alegreya Sans SC' => array(
			'label'    => 'Alegreya Sans SC',
			'variant' => array(
				'100',
				'100italic',
				'300',
				'300italic',
				'regular',
				'italic',
				'500',
				'500italic',
				'700',
				'700italic',
				'800',
				'800italic',
				'900',
				'900italic',
			),
			'subsets' => array(
				'latin',
				'vietnamese',
				'latin-ext',
			),
		),
		'Alex Brush' => array(
			'label'    => 'Alex Brush',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Alfa Slab One' => array(
			'label'    => 'Alfa Slab One',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Alice' => array(
			'label'    => 'Alice',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Alike' => array(
			'label'    => 'Alike',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Alike Angular' => array(
			'label'    => 'Alike Angular',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Allan' => array(
			'label'    => 'Allan',
			'variant' => array(
				'regular',
				'700',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Allerta' => array(
			'label'    => 'Allerta',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Allerta Stencil' => array(
			'label'    => 'Allerta Stencil',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Allura' => array(
			'label'    => 'Allura',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Almendra' => array(
			'label'    => 'Almendra',
			'variant' => array(
				'regular',
				'italic',
				'700',
				'700italic',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Almendra Display' => array(
			'label'    => 'Almendra Display',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Almendra SC' => array(
			'label'    => 'Almendra SC',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Amarante' => array(
			'label'    => 'Amarante',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Amaranth' => array(
			'label'    => 'Amaranth',
			'variant' => array(
				'regular',
				'italic',
				'700',
				'700italic',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Amatic SC' => array(
			'label'    => 'Amatic SC',
			'variant' => array(
				'regular',
				'700',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Amethysta' => array(
			'label'    => 'Amethysta',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Anaheim' => array(
			'label'    => 'Anaheim',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Andada' => array(
			'label'    => 'Andada',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Andika' => array(
			'label'    => 'Andika',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'cyrillic',
				'latin-ext',
				'cyrillic-ext',
			),
		),
		'Angkor' => array(
			'label'    => 'Angkor',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'khmer',
			),
		),
		'Annie Use Your Telescope' => array(
			'label'    => 'Annie Use Your Telescope',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Anonymous Pro' => array(
			'label'    => 'Anonymous Pro',
			'variant' => array(
				'regular',
				'italic',
				'700',
				'700italic',
			),
			'subsets' => array(
				'latin',
				'greek-ext',
				'cyrillic',
				'greek',
				'latin-ext',
				'cyrillic-ext',
			),
		),
		'Antic' => array(
			'label'    => 'Antic',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Antic Didone' => array(
			'label'    => 'Antic Didone',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Antic Slab' => array(
			'label'    => 'Antic Slab',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Anton' => array(
			'label'    => 'Anton',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Arapey' => array(
			'label'    => 'Arapey',
			'variant' => array(
				'regular',
				'italic',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Arbutus' => array(
			'label'    => 'Arbutus',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Arbutus Slab' => array(
			'label'    => 'Arbutus Slab',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Architects Daughter' => array(
			'label'    => 'Architects Daughter',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Archivo Black' => array(
			'label'    => 'Archivo Black',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Archivo Narrow' => array(
			'label'    => 'Archivo Narrow',
			'variant' => array(
				'regular',
				'italic',
				'700',
				'700italic',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Arimo' => array(
			'label'    => 'Arimo',
			'variant' => array(
				'regular',
				'italic',
				'700',
				'700italic',
			),
			'subsets' => array(
				'latin',
				'greek-ext',
				'cyrillic',
				'greek',
				'vietnamese',
				'latin-ext',
				'cyrillic-ext',
			),
		),
		'Arizonia' => array(
			'label'    => 'Arizonia',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Armata' => array(
			'label'    => 'Armata',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Artifika' => array(
			'label'    => 'Artifika',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Arvo' => array(
			'label'    => 'Arvo',
			'variant' => array(
				'regular',
				'italic',
				'700',
				'700italic',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Asap' => array(
			'label'    => 'Asap',
			'variant' => array(
				'regular',
				'italic',
				'700',
				'700italic',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Asset' => array(
			'label'    => 'Asset',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Astloch' => array(
			'label'    => 'Astloch',
			'variant' => array(
				'regular',
				'700',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Asul' => array(
			'label'    => 'Asul',
			'variant' => array(
				'regular',
				'700',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Atomic Age' => array(
			'label'    => 'Atomic Age',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Aubrey' => array(
			'label'    => 'Aubrey',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Audiowide' => array(
			'label'    => 'Audiowide',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Autour One' => array(
			'label'    => 'Autour One',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Average' => array(
			'label'    => 'Average',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Average Sans' => array(
			'label'    => 'Average Sans',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Averia Gruesa Libre' => array(
			'label'    => 'Averia Gruesa Libre',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Averia Libre' => array(
			'label'    => 'Averia Libre',
			'variant' => array(
				'300',
				'300italic',
				'regular',
				'italic',
				'700',
				'700italic',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Averia Sans Libre' => array(
			'label'    => 'Averia Sans Libre',
			'variant' => array(
				'300',
				'300italic',
				'regular',
				'italic',
				'700',
				'700italic',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Averia Serif Libre' => array(
			'label'    => 'Averia Serif Libre',
			'variant' => array(
				'300',
				'300italic',
				'regular',
				'italic',
				'700',
				'700italic',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Bad Script' => array(
			'label'    => 'Bad Script',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'cyrillic',
			),
		),
		'Balthazar' => array(
			'label'    => 'Balthazar',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Bangers' => array(
			'label'    => 'Bangers',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Basic' => array(
			'label'    => 'Basic',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Battambang' => array(
			'label'    => 'Battambang',
			'variant' => array(
				'regular',
				'700',
			),
			'subsets' => array(
				'khmer',
			),
		),
		'Baumans' => array(
			'label'    => 'Baumans',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Bayon' => array(
			'label'    => 'Bayon',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'khmer',
			),
		),
		'Belgrano' => array(
			'label'    => 'Belgrano',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Belleza' => array(
			'label'    => 'Belleza',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'BenchNine' => array(
			'label'    => 'BenchNine',
			'variant' => array(
				'300',
				'regular',
				'700',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Bentham' => array(
			'label'    => 'Bentham',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Berkshire Swash' => array(
			'label'    => 'Berkshire Swash',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Bevan' => array(
			'label'    => 'Bevan',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Bigelow Rules' => array(
			'label'    => 'Bigelow Rules',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Bigshot One' => array(
			'label'    => 'Bigshot One',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Bilbo' => array(
			'label'    => 'Bilbo',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Bilbo Swash Caps' => array(
			'label'    => 'Bilbo Swash Caps',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Bitter' => array(
			'label'    => 'Bitter',
			'variant' => array(
				'regular',
				'italic',
				'700',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Black Ops One' => array(
			'label'    => 'Black Ops One',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Bokor' => array(
			'label'    => 'Bokor',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'khmer',
			),
		),
		'Bonbon' => array(
			'label'    => 'Bonbon',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Boogaloo' => array(
			'label'    => 'Boogaloo',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Bowlby One' => array(
			'label'    => 'Bowlby One',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Bowlby One SC' => array(
			'label'    => 'Bowlby One SC',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Brawler' => array(
			'label'    => 'Brawler',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Bree Serif' => array(
			'label'    => 'Bree Serif',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Bubblegum Sans' => array(
			'label'    => 'Bubblegum Sans',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Bubbler One' => array(
			'label'    => 'Bubbler One',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Buda' => array(
			'label'    => 'Buda',
			'variant' => array(
				'300',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Buenard' => array(
			'label'    => 'Buenard',
			'variant' => array(
				'regular',
				'700',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Butcherman' => array(
			'label'    => 'Butcherman',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Butterfly Kids' => array(
			'label'    => 'Butterfly Kids',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Cabin' => array(
			'label'    => 'Cabin',
			'variant' => array(
				'regular',
				'italic',
				'500',
				'500italic',
				'600',
				'600italic',
				'700',
				'700italic',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Cabin Condensed' => array(
			'label'    => 'Cabin Condensed',
			'variant' => array(
				'regular',
				'500',
				'600',
				'700',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Cabin Sketch' => array(
			'label'    => 'Cabin Sketch',
			'variant' => array(
				'regular',
				'700',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Caesar Dressing' => array(
			'label'    => 'Caesar Dressing',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Cagliostro' => array(
			'label'    => 'Cagliostro',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Calligraffitti' => array(
			'label'    => 'Calligraffitti',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Cambo' => array(
			'label'    => 'Cambo',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Candal' => array(
			'label'    => 'Candal',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Cantarell' => array(
			'label'    => 'Cantarell',
			'variant' => array(
				'regular',
				'italic',
				'700',
				'700italic',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Cantata One' => array(
			'label'    => 'Cantata One',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Cantora One' => array(
			'label'    => 'Cantora One',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Capriola' => array(
			'label'    => 'Capriola',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Cardo' => array(
			'label'    => 'Cardo',
			'variant' => array(
				'regular',
				'italic',
				'700',
			),
			'subsets' => array(
				'latin',
				'greek-ext',
				'greek',
				'latin-ext',
			),
		),
		'Carme' => array(
			'label'    => 'Carme',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Carrois Gothic' => array(
			'label'    => 'Carrois Gothic',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Carrois Gothic SC' => array(
			'label'    => 'Carrois Gothic SC',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Carter One' => array(
			'label'    => 'Carter One',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Caudex' => array(
			'label'    => 'Caudex',
			'variant' => array(
				'regular',
				'italic',
				'700',
				'700italic',
			),
			'subsets' => array(
				'latin',
				'greek-ext',
				'greek',
				'latin-ext',
			),
		),
		'Cedarville Cursive' => array(
			'label'    => 'Cedarville Cursive',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Ceviche One' => array(
			'label'    => 'Ceviche One',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Changa One' => array(
			'label'    => 'Changa One',
			'variant' => array(
				'regular',
				'italic',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Chango' => array(
			'label'    => 'Chango',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Chau Philomene One' => array(
			'label'    => 'Chau Philomene One',
			'variant' => array(
				'regular',
				'italic',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Chela One' => array(
			'label'    => 'Chela One',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Chelsea Market' => array(
			'label'    => 'Chelsea Market',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Chenla' => array(
			'label'    => 'Chenla',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'khmer',
			),
		),
		'Cherry Cream Soda' => array(
			'label'    => 'Cherry Cream Soda',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Cherry Swash' => array(
			'label'    => 'Cherry Swash',
			'variant' => array(
				'regular',
				'700',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Chewy' => array(
			'label'    => 'Chewy',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Chicle' => array(
			'label'    => 'Chicle',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Chivo' => array(
			'label'    => 'Chivo',
			'variant' => array(
				'regular',
				'italic',
				'900',
				'900italic',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Cinzel' => array(
			'label'    => 'Cinzel',
			'variant' => array(
				'regular',
				'700',
				'900',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Cinzel Decorative' => array(
			'label'    => 'Cinzel Decorative',
			'variant' => array(
				'regular',
				'700',
				'900',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Clicker Script' => array(
			'label'    => 'Clicker Script',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Coda' => array(
			'label'    => 'Coda',
			'variant' => array(
				'regular',
				'800',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Coda Caption' => array(
			'label'    => 'Coda Caption',
			'variant' => array(
				'800',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Codystar' => array(
			'label'    => 'Codystar',
			'variant' => array(
				'300',
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Combo' => array(
			'label'    => 'Combo',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Comfortaa' => array(
			'label'    => 'Comfortaa',
			'variant' => array(
				'300',
				'regular',
				'700',
			),
			'subsets' => array(
				'latin',
				'cyrillic',
				'greek',
				'latin-ext',
				'cyrillic-ext',
			),
		),
		'Coming Soon' => array(
			'label'    => 'Coming Soon',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Concert One' => array(
			'label'    => 'Concert One',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Condiment' => array(
			'label'    => 'Condiment',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Content' => array(
			'label'    => 'Content',
			'variant' => array(
				'regular',
				'700',
			),
			'subsets' => array(
				'khmer',
			),
		),
		'Contrail One' => array(
			'label'    => 'Contrail One',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Convergence' => array(
			'label'    => 'Convergence',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Cookie' => array(
			'label'    => 'Cookie',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Copse' => array(
			'label'    => 'Copse',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Corben' => array(
			'label'    => 'Corben',
			'variant' => array(
				'regular',
				'700',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Courgette' => array(
			'label'    => 'Courgette',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Cousine' => array(
			'label'    => 'Cousine',
			'variant' => array(
				'regular',
				'italic',
				'700',
				'700italic',
			),
			'subsets' => array(
				'latin',
				'greek-ext',
				'cyrillic',
				'greek',
				'vietnamese',
				'latin-ext',
				'cyrillic-ext',
			),
		),
		'Coustard' => array(
			'label'    => 'Coustard',
			'variant' => array(
				'regular',
				'900',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Covered By Your Grace' => array(
			'label'    => 'Covered By Your Grace',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Crafty Girls' => array(
			'label'    => 'Crafty Girls',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Creepster' => array(
			'label'    => 'Creepster',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Crete Round' => array(
			'label'    => 'Crete Round',
			'variant' => array(
				'regular',
				'italic',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Crimson Text' => array(
			'label'    => 'Crimson Text',
			'variant' => array(
				'regular',
				'italic',
				'600',
				'600italic',
				'700',
				'700italic',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Croissant One' => array(
			'label'    => 'Croissant One',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Crushed' => array(
			'label'    => 'Crushed',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Cuprum' => array(
			'label'    => 'Cuprum',
			'variant' => array(
				'regular',
				'italic',
				'700',
				'700italic',
			),
			'subsets' => array(
				'latin',
				'cyrillic',
				'latin-ext',
			),
		),
		'Cutive' => array(
			'label'    => 'Cutive',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Cutive Mono' => array(
			'label'    => 'Cutive Mono',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Damion' => array(
			'label'    => 'Damion',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Dancing Script' => array(
			'label'    => 'Dancing Script',
			'variant' => array(
				'regular',
				'700',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Dangrek' => array(
			'label'    => 'Dangrek',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'khmer',
			),
		),
		'Dawning of a New Day' => array(
			'label'    => 'Dawning of a New Day',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Days One' => array(
			'label'    => 'Days One',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Delius' => array(
			'label'    => 'Delius',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Delius Swash Caps' => array(
			'label'    => 'Delius Swash Caps',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Delius Unicase' => array(
			'label'    => 'Delius Unicase',
			'variant' => array(
				'regular',
				'700',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Della Respira' => array(
			'label'    => 'Della Respira',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Denk One' => array(
			'label'    => 'Denk One',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Devonshire' => array(
			'label'    => 'Devonshire',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Didact Gothic' => array(
			'label'    => 'Didact Gothic',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'greek-ext',
				'cyrillic',
				'greek',
				'latin-ext',
				'cyrillic-ext',
			),
		),
		'Diplomata' => array(
			'label'    => 'Diplomata',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Diplomata SC' => array(
			'label'    => 'Diplomata SC',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Domine' => array(
			'label'    => 'Domine',
			'variant' => array(
				'regular',
				'700',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Donegal One' => array(
			'label'    => 'Donegal One',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Doppio One' => array(
			'label'    => 'Doppio One',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Dorsa' => array(
			'label'    => 'Dorsa',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Dosis' => array(
			'label'    => 'Dosis',
			'variant' => array(
				'200',
				'300',
				'regular',
				'500',
				'600',
				'700',
				'800',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Dr Sugiyama' => array(
			'label'    => 'Dr Sugiyama',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Droid Sans' => array(
			'label'    => 'Droid Sans',
			'variant' => array(
				'regular',
				'700',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Droid Sans Mono' => array(
			'label'    => 'Droid Sans Mono',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Droid Serif' => array(
			'label'    => 'Droid Serif',
			'variant' => array(
				'regular',
				'italic',
				'700',
				'700italic',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Duru Sans' => array(
			'label'    => 'Duru Sans',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Dynalight' => array(
			'label'    => 'Dynalight',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'EB Garamond' => array(
			'label'    => 'EB Garamond',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'cyrillic',
				'vietnamese',
				'latin-ext',
				'cyrillic-ext',
			),
		),
		'Eagle Lake' => array(
			'label'    => 'Eagle Lake',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Eater' => array(
			'label'    => 'Eater',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Economica' => array(
			'label'    => 'Economica',
			'variant' => array(
				'regular',
				'italic',
				'700',
				'700italic',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Electrolize' => array(
			'label'    => 'Electrolize',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Elsie' => array(
			'label'    => 'Elsie',
			'variant' => array(
				'regular',
				'900',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Elsie Swash Caps' => array(
			'label'    => 'Elsie Swash Caps',
			'variant' => array(
				'regular',
				'900',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Emblema One' => array(
			'label'    => 'Emblema One',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Emilys Candy' => array(
			'label'    => 'Emilys Candy',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Engagement' => array(
			'label'    => 'Engagement',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Englebert' => array(
			'label'    => 'Englebert',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Enriqueta' => array(
			'label'    => 'Enriqueta',
			'variant' => array(
				'regular',
				'700',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Erica One' => array(
			'label'    => 'Erica One',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Esteban' => array(
			'label'    => 'Esteban',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Euphoria Script' => array(
			'label'    => 'Euphoria Script',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Ewert' => array(
			'label'    => 'Ewert',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Exo' => array(
			'label'    => 'Exo',
			'variant' => array(
				'100',
				'100italic',
				'200',
				'200italic',
				'300',
				'300italic',
				'regular',
				'italic',
				'500',
				'500italic',
				'600',
				'600italic',
				'700',
				'700italic',
				'800',
				'800italic',
				'900',
				'900italic',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Exo 2' => array(
			'label'    => 'Exo 2',
			'variant' => array(
				'100',
				'100italic',
				'200',
				'200italic',
				'300',
				'300italic',
				'regular',
				'italic',
				'500',
				'500italic',
				'600',
				'600italic',
				'700',
				'700italic',
				'800',
				'800italic',
				'900',
				'900italic',
			),
			'subsets' => array(
				'latin',
				'cyrillic',
				'latin-ext',
			),
		),
		'Expletus Sans' => array(
			'label'    => 'Expletus Sans',
			'variant' => array(
				'regular',
				'italic',
				'500',
				'500italic',
				'600',
				'600italic',
				'700',
				'700italic',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Fanwood Text' => array(
			'label'    => 'Fanwood Text',
			'variant' => array(
				'regular',
				'italic',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Fascinate' => array(
			'label'    => 'Fascinate',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Fascinate Inline' => array(
			'label'    => 'Fascinate Inline',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Faster One' => array(
			'label'    => 'Faster One',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Fasthand' => array(
			'label'    => 'Fasthand',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'khmer',
			),
		),
		'Fauna One' => array(
			'label'    => 'Fauna One',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Federant' => array(
			'label'    => 'Federant',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Federo' => array(
			'label'    => 'Federo',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Felipa' => array(
			'label'    => 'Felipa',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Fenix' => array(
			'label'    => 'Fenix',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Finger Paint' => array(
			'label'    => 'Finger Paint',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Fira Sans' => array(
			'label'    => 'Fira Sans',
			'variant' => array(
				'300',
				'300italic',
				'400',
				'400italic',
				'500',
				'500italic',
				'700',
				'700italic',
			),
			'subsets' => array(
				'latin',
				'greek',
				'cyrillic',
				'latin-ext',
				'cyrillic-ext',
			),
		),
		'Fira Mono' => array(
			'label'    => 'Fira Mono',
			'variant' => array(
				'400',
				'700',
			),
			'subsets' => array(
				'latin',
				'greek',
				'cyrillic',
				'latin-ext',
				'cyrillic-ext',
			),
		),
		'Fjalla One' => array(
			'label'    => 'Fjalla One',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Fjord One' => array(
			'label'    => 'Fjord One',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Flamenco' => array(
			'label'    => 'Flamenco',
			'variant' => array(
				'300',
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Flavors' => array(
			'label'    => 'Flavors',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Fondamento' => array(
			'label'    => 'Fondamento',
			'variant' => array(
				'regular',
				'italic',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Fontdiner Swanky' => array(
			'label'    => 'Fontdiner Swanky',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Forum' => array(
			'label'    => 'Forum',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'cyrillic',
				'latin-ext',
				'cyrillic-ext',
			),
		),
		'Francois One' => array(
			'label'    => 'Francois One',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Freckle Face' => array(
			'label'    => 'Freckle Face',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Fredericka the Great' => array(
			'label'    => 'Fredericka the Great',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Fredoka One' => array(
			'label'    => 'Fredoka One',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Freehand' => array(
			'label'    => 'Freehand',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'khmer',
			),
		),
		'Fresca' => array(
			'label'    => 'Fresca',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Frijole' => array(
			'label'    => 'Frijole',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Fruktur' => array(
			'label'    => 'Fruktur',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Fugaz One' => array(
			'label'    => 'Fugaz One',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'GFS Didot' => array(
			'label'    => 'GFS Didot',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'greek',
			),
		),
		'GFS Neohellenic' => array(
			'label'    => 'GFS Neohellenic',
			'variant' => array(
				'regular',
				'italic',
				'700',
				'700italic',
			),
			'subsets' => array(
				'greek',
			),
		),
		'Gabriela' => array(
			'label'    => 'Gabriela',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Gafata' => array(
			'label'    => 'Gafata',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Galdeano' => array(
			'label'    => 'Galdeano',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Galindo' => array(
			'label'    => 'Galindo',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Gentium Basic' => array(
			'label'    => 'Gentium Basic',
			'variant' => array(
				'regular',
				'italic',
				'700',
				'700italic',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Gentium Book Basic' => array(
			'label'    => 'Gentium Book Basic',
			'variant' => array(
				'regular',
				'italic',
				'700',
				'700italic',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Geo' => array(
			'label'    => 'Geo',
			'variant' => array(
				'regular',
				'italic',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Geostar' => array(
			'label'    => 'Geostar',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Geostar Fill' => array(
			'label'    => 'Geostar Fill',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Germania One' => array(
			'label'    => 'Germania One',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Gilda Display' => array(
			'label'    => 'Gilda Display',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Give You Glory' => array(
			'label'    => 'Give You Glory',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Glass Antiqua' => array(
			'label'    => 'Glass Antiqua',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Glegoo' => array(
			'label'    => 'Glegoo',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Gloria Hallelujah' => array(
			'label'    => 'Gloria Hallelujah',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Goblin One' => array(
			'label'    => 'Goblin One',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Gochi Hand' => array(
			'label'    => 'Gochi Hand',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Gorditas' => array(
			'label'    => 'Gorditas',
			'variant' => array(
				'regular',
				'700',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Goudy Bookletter 1911' => array(
			'label'    => 'Goudy Bookletter 1911',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Graduate' => array(
			'label'    => 'Graduate',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Grand Hotel' => array(
			'label'    => 'Grand Hotel',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Gravitas One' => array(
			'label'    => 'Gravitas One',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Great Vibes' => array(
			'label'    => 'Great Vibes',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Griffy' => array(
			'label'    => 'Griffy',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Gruppo' => array(
			'label'    => 'Gruppo',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Gudea' => array(
			'label'    => 'Gudea',
			'variant' => array(
				'regular',
				'italic',
				'700',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Habibi' => array(
			'label'    => 'Habibi',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Hammersmith One' => array(
			'label'    => 'Hammersmith One',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Hanalei' => array(
			'label'    => 'Hanalei',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Hanalei Fill' => array(
			'label'    => 'Hanalei Fill',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Handlee' => array(
			'label'    => 'Handlee',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Hanuman' => array(
			'label'    => 'Hanuman',
			'variant' => array(
				'regular',
				'700',
			),
			'subsets' => array(
				'khmer',
			),
		),
		'Happy Monkey' => array(
			'label'    => 'Happy Monkey',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Headland One' => array(
			'label'    => 'Headland One',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Henny Penny' => array(
			'label'    => 'Henny Penny',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Herr Von Muellerhoff' => array(
			'label'    => 'Herr Von Muellerhoff',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Holtwood One SC' => array(
			'label'    => 'Holtwood One SC',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Homemade Apple' => array(
			'label'    => 'Homemade Apple',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Homenaje' => array(
			'label'    => 'Homenaje',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'IM Fell DW Pica' => array(
			'label'    => 'IM Fell DW Pica',
			'variant' => array(
				'regular',
				'italic',
			),
			'subsets' => array(
				'latin',
			),
		),
		'IM Fell DW Pica SC' => array(
			'label'    => 'IM Fell DW Pica SC',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'IM Fell Double Pica' => array(
			'label'    => 'IM Fell Double Pica',
			'variant' => array(
				'regular',
				'italic',
			),
			'subsets' => array(
				'latin',
			),
		),
		'IM Fell Double Pica SC' => array(
			'label'    => 'IM Fell Double Pica SC',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'IM Fell English' => array(
			'label'    => 'IM Fell English',
			'variant' => array(
				'regular',
				'italic',
			),
			'subsets' => array(
				'latin',
			),
		),
		'IM Fell English SC' => array(
			'label'    => 'IM Fell English SC',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'IM Fell French Canon' => array(
			'label'    => 'IM Fell French Canon',
			'variant' => array(
				'regular',
				'italic',
			),
			'subsets' => array(
				'latin',
			),
		),
		'IM Fell French Canon SC' => array(
			'label'    => 'IM Fell French Canon SC',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'IM Fell Great Primer' => array(
			'label'    => 'IM Fell Great Primer',
			'variant' => array(
				'regular',
				'italic',
			),
			'subsets' => array(
				'latin',
			),
		),
		'IM Fell Great Primer SC' => array(
			'label'    => 'IM Fell Great Primer SC',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Iceberg' => array(
			'label'    => 'Iceberg',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Iceland' => array(
			'label'    => 'Iceland',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Imprima' => array(
			'label'    => 'Imprima',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Inconsolata' => array(
			'label'    => 'Inconsolata',
			'variant' => array(
				'regular',
				'700',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Inder' => array(
			'label'    => 'Inder',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Indie Flower' => array(
			'label'    => 'Indie Flower',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Inika' => array(
			'label'    => 'Inika',
			'variant' => array(
				'regular',
				'700',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Irish Grover' => array(
			'label'    => 'Irish Grover',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Istok Web' => array(
			'label'    => 'Istok Web',
			'variant' => array(
				'regular',
				'italic',
				'700',
				'700italic',
			),
			'subsets' => array(
				'latin',
				'cyrillic',
				'latin-ext',
				'cyrillic-ext',
			),
		),
		'Italiana' => array(
			'label'    => 'Italiana',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Italianno' => array(
			'label'    => 'Italianno',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Jacques Francois' => array(
			'label'    => 'Jacques Francois',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Jacques Francois Shadow' => array(
			'label'    => 'Jacques Francois Shadow',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Jim Nightshade' => array(
			'label'    => 'Jim Nightshade',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Jockey One' => array(
			'label'    => 'Jockey One',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Jolly Lodger' => array(
			'label'    => 'Jolly Lodger',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Josefin Sans' => array(
			'label'    => 'Josefin Sans',
			'variant' => array(
				'100',
				'100italic',
				'300',
				'300italic',
				'regular',
				'italic',
				'600',
				'600italic',
				'700',
				'700italic',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Josefin Slab' => array(
			'label'    => 'Josefin Slab',
			'variant' => array(
				'100',
				'100italic',
				'300',
				'300italic',
				'regular',
				'italic',
				'600',
				'600italic',
				'700',
				'700italic',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Joti One' => array(
			'label'    => 'Joti One',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Judson' => array(
			'label'    => 'Judson',
			'variant' => array(
				'regular',
				'italic',
				'700',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Julee' => array(
			'label'    => 'Julee',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Julius Sans One' => array(
			'label'    => 'Julius Sans One',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Junge' => array(
			'label'    => 'Junge',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Jura' => array(
			'label'    => 'Jura',
			'variant' => array(
				'300',
				'regular',
				'500',
				'600',
			),
			'subsets' => array(
				'latin',
				'greek-ext',
				'cyrillic',
				'greek',
				'latin-ext',
				'cyrillic-ext',
			),
		),
		'Just Another Hand' => array(
			'label'    => 'Just Another Hand',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Just Me Again Down Here' => array(
			'label'    => 'Just Me Again Down Here',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Kameron' => array(
			'label'    => 'Kameron',
			'variant' => array(
				'regular',
				'700',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Kantumruy' => array(
			'label'    => 'Kantumruy',
			'variant' => array(
				'300',
				'regular',
				'700',
			),
			'subsets' => array(
				'khmer',
			),
		),
		'Karla' => array(
			'label'    => 'Karla',
			'variant' => array(
				'regular',
				'italic',
				'700',
				'700italic',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Kaushan Script' => array(
			'label'    => 'Kaushan Script',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Kavoon' => array(
			'label'    => 'Kavoon',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Kdam Thmor' => array(
			'label'    => 'Kdam Thmor',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'khmer',
			),
		),
		'Keania One' => array(
			'label'    => 'Keania One',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Kelly Slab' => array(
			'label'    => 'Kelly Slab',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'cyrillic',
				'latin-ext',
			),
		),
		'Kenia' => array(
			'label'    => 'Kenia',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Khmer' => array(
			'label'    => 'Khmer',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'khmer',
			),
		),
		'Kite One' => array(
			'label'    => 'Kite One',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Knewave' => array(
			'label'    => 'Knewave',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Kotta One' => array(
			'label'    => 'Kotta One',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Koulen' => array(
			'label'    => 'Koulen',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'khmer',
			),
		),
		'Kranky' => array(
			'label'    => 'Kranky',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Kreon' => array(
			'label'    => 'Kreon',
			'variant' => array(
				'300',
				'regular',
				'700',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Kristi' => array(
			'label'    => 'Kristi',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Krona One' => array(
			'label'    => 'Krona One',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'La Belle Aurore' => array(
			'label'    => 'La Belle Aurore',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Lancelot' => array(
			'label'    => 'Lancelot',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Lato' => array(
			'label'    => 'Lato',
			'variant' => array(
				'100',
				'100italic',
				'300',
				'300italic',
				'regular',
				'italic',
				'700',
				'700italic',
				'900',
				'900italic',
			),
			'subsets' => array(
				'latin',
			),
		),
		'League Script' => array(
			'label'    => 'League Script',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Leckerli One' => array(
			'label'    => 'Leckerli One',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Ledger' => array(
			'label'    => 'Ledger',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'cyrillic',
				'latin-ext',
			),
		),
		'Lekton' => array(
			'label'    => 'Lekton',
			'variant' => array(
				'regular',
				'italic',
				'700',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Lemon' => array(
			'label'    => 'Lemon',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Libre Baskerville' => array(
			'label'    => 'Libre Baskerville',
			'variant' => array(
				'regular',
				'italic',
				'700',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Life Savers' => array(
			'label'    => 'Life Savers',
			'variant' => array(
				'regular',
				'700',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Lilita One' => array(
			'label'    => 'Lilita One',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Lily Script One' => array(
			'label'    => 'Lily Script One',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Limelight' => array(
			'label'    => 'Limelight',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Linden Hill' => array(
			'label'    => 'Linden Hill',
			'variant' => array(
				'regular',
				'italic',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Lobster' => array(
			'label'    => 'Lobster',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'cyrillic',
				'latin-ext',
				'cyrillic-ext',
			),
		),
		'Lobster Two' => array(
			'label'    => 'Lobster Two',
			'variant' => array(
				'regular',
				'italic',
				'700',
				'700italic',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Londrina Outline' => array(
			'label'    => 'Londrina Outline',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Londrina Shadow' => array(
			'label'    => 'Londrina Shadow',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Londrina Sketch' => array(
			'label'    => 'Londrina Sketch',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Londrina Solid' => array(
			'label'    => 'Londrina Solid',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Lora' => array(
			'label'    => 'Lora',
			'variant' => array(
				'regular',
				'italic',
				'700',
				'700italic',
			),
			'subsets' => array(
				'latin',
				'cyrillic',
				'latin-ext',
			),
		),
		'Love Ya Like A Sister' => array(
			'label'    => 'Love Ya Like A Sister',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Loved by the King' => array(
			'label'    => 'Loved by the King',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Lovers Quarrel' => array(
			'label'    => 'Lovers Quarrel',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Luckiest Guy' => array(
			'label'    => 'Luckiest Guy',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Lusitana' => array(
			'label'    => 'Lusitana',
			'variant' => array(
				'regular',
				'700',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Lustria' => array(
			'label'    => 'Lustria',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Macondo' => array(
			'label'    => 'Macondo',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Macondo Swash Caps' => array(
			'label'    => 'Macondo Swash Caps',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Magra' => array(
			'label'    => 'Magra',
			'variant' => array(
				'regular',
				'700',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Maiden Orange' => array(
			'label'    => 'Maiden Orange',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Mako' => array(
			'label'    => 'Mako',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Marcellus' => array(
			'label'    => 'Marcellus',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Marcellus SC' => array(
			'label'    => 'Marcellus SC',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Marck Script' => array(
			'label'    => 'Marck Script',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'cyrillic',
				'latin-ext',
			),
		),
		'Margarine' => array(
			'label'    => 'Margarine',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Marko One' => array(
			'label'    => 'Marko One',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Marmelad' => array(
			'label'    => 'Marmelad',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'cyrillic',
				'latin-ext',
			),
		),
		'Marvel' => array(
			'label'    => 'Marvel',
			'variant' => array(
				'regular',
				'italic',
				'700',
				'700italic',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Mate' => array(
			'label'    => 'Mate',
			'variant' => array(
				'regular',
				'italic',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Mate SC' => array(
			'label'    => 'Mate SC',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Maven Pro' => array(
			'label'    => 'Maven Pro',
			'variant' => array(
				'regular',
				'500',
				'700',
				'900',
			),
			'subsets' => array(
				'latin',
			),
		),
		'McLaren' => array(
			'label'    => 'McLaren',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Meddon' => array(
			'label'    => 'Meddon',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'MedievalSharp' => array(
			'label'    => 'MedievalSharp',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Medula One' => array(
			'label'    => 'Medula One',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Megrim' => array(
			'label'    => 'Megrim',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Meie Script' => array(
			'label'    => 'Meie Script',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Merienda' => array(
			'label'    => 'Merienda',
			'variant' => array(
				'regular',
				'700',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Merienda One' => array(
			'label'    => 'Merienda One',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Merriweather' => array(
			'label'    => 'Merriweather',
			'variant' => array(
				'300',
				'300italic',
				'regular',
				'italic',
				'700',
				'700italic',
				'900',
				'900italic',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Merriweather Sans' => array(
			'label'    => 'Merriweather Sans',
			'variant' => array(
				'300',
				'300italic',
				'regular',
				'italic',
				'700',
				'700italic',
				'800',
				'800italic',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Metal' => array(
			'label'    => 'Metal',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'khmer',
			),
		),
		'Metal Mania' => array(
			'label'    => 'Metal Mania',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Metamorphous' => array(
			'label'    => 'Metamorphous',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Metrophobic' => array(
			'label'    => 'Metrophobic',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Michroma' => array(
			'label'    => 'Michroma',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Milonga' => array(
			'label'    => 'Milonga',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Miltonian' => array(
			'label'    => 'Miltonian',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Miltonian Tattoo' => array(
			'label'    => 'Miltonian Tattoo',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Miniver' => array(
			'label'    => 'Miniver',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Miss Fajardose' => array(
			'label'    => 'Miss Fajardose',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Modern Antiqua' => array(
			'label'    => 'Modern Antiqua',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Molengo' => array(
			'label'    => 'Molengo',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Molle' => array(
			'label'    => 'Molle',
			'variant' => array(
				'italic',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Monda' => array(
			'label'    => 'Monda',
			'variant' => array(
				'regular',
				'700',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Monofett' => array(
			'label'    => 'Monofett',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Monoton' => array(
			'label'    => 'Monoton',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Monsieur La Doulaise' => array(
			'label'    => 'Monsieur La Doulaise',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Montaga' => array(
			'label'    => 'Montaga',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Montez' => array(
			'label'    => 'Montez',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Montserrat' => array(
			'label'    => 'Montserrat',
			'variant' => array(
				'regular',
				'700',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Montserrat Alternates' => array(
			'label'    => 'Montserrat Alternates',
			'variant' => array(
				'regular',
				'700',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Montserrat Subrayada' => array(
			'label'    => 'Montserrat Subrayada',
			'variant' => array(
				'regular',
				'700',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Moul' => array(
			'label'    => 'Moul',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'khmer',
			),
		),
		'Moulpali' => array(
			'label'    => 'Moulpali',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'khmer',
			),
		),
		'Mountains of Christmas' => array(
			'label'    => 'Mountains of Christmas',
			'variant' => array(
				'regular',
				'700',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Mouse Memoirs' => array(
			'label'    => 'Mouse Memoirs',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Mr Bedfort' => array(
			'label'    => 'Mr Bedfort',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Mr Dafoe' => array(
			'label'    => 'Mr Dafoe',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Mr De Haviland' => array(
			'label'    => 'Mr De Haviland',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Mrs Saint Delafield' => array(
			'label'    => 'Mrs Saint Delafield',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Mrs Sheppards' => array(
			'label'    => 'Mrs Sheppards',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Muli' => array(
			'label'    => 'Muli',
			'variant' => array(
				'300',
				'300italic',
				'regular',
				'italic',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Mystery Quest' => array(
			'label'    => 'Mystery Quest',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Neucha' => array(
			'label'    => 'Neucha',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'cyrillic',
			),
		),
		'Neuton' => array(
			'label'    => 'Neuton',
			'variant' => array(
				'200',
				'300',
				'regular',
				'italic',
				'700',
				'800',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'New Rocker' => array(
			'label'    => 'New Rocker',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'News Cycle' => array(
			'label'    => 'News Cycle',
			'variant' => array(
				'regular',
				'700',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Niconne' => array(
			'label'    => 'Niconne',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Nixie One' => array(
			'label'    => 'Nixie One',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Nobile' => array(
			'label'    => 'Nobile',
			'variant' => array(
				'regular',
				'italic',
				'700',
				'700italic',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Nokora' => array(
			'label'    => 'Nokora',
			'variant' => array(
				'regular',
				'700',
			),
			'subsets' => array(
				'khmer',
			),
		),
		'Norican' => array(
			'label'    => 'Norican',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Nosifer' => array(
			'label'    => 'Nosifer',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Nothing You Could Do' => array(
			'label'    => 'Nothing You Could Do',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Noticia Text' => array(
			'label'    => 'Noticia Text',
			'variant' => array(
				'regular',
				'italic',
				'700',
				'700italic',
			),
			'subsets' => array(
				'latin',
				'vietnamese',
				'latin-ext',
			),
		),
		'Noto Sans' => array(
			'label'    => 'Noto Sans',
			'variant' => array(
				'regular',
				'italic',
				'700',
				'700italic',
			),
			'subsets' => array(
				'latin',
				'greek-ext',
				'cyrillic',
				'greek',
				'vietnamese',
				'latin-ext',
				'devanagari',
				'cyrillic-ext',
			),
		),
		'Noto Serif' => array(
			'label'    => 'Noto Serif',
			'variant' => array(
				'regular',
				'italic',
				'700',
				'700italic',
			),
			'subsets' => array(
				'latin',
				'greek-ext',
				'cyrillic',
				'greek',
				'vietnamese',
				'latin-ext',
				'cyrillic-ext',
			),
		),
		'Nova Cut' => array(
			'label'    => 'Nova Cut',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Nova Flat' => array(
			'label'    => 'Nova Flat',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Nova Mono' => array(
			'label'    => 'Nova Mono',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'greek',
			),
		),
		'Nova Oval' => array(
			'label'    => 'Nova Oval',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Nova Round' => array(
			'label'    => 'Nova Round',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Nova Script' => array(
			'label'    => 'Nova Script',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Nova Slim' => array(
			'label'    => 'Nova Slim',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Nova Square' => array(
			'label'    => 'Nova Square',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Numans' => array(
			'label'    => 'Numans',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Nunito' => array(
			'label'    => 'Nunito',
			'variant' => array(
				'300',
				'regular',
				'700',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Odor Mean Chey' => array(
			'label'    => 'Odor Mean Chey',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'khmer',
			),
		),
		'Offside' => array(
			'label'    => 'Offside',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Old Standard TT' => array(
			'label'    => 'Old Standard TT',
			'variant' => array(
				'regular',
				'italic',
				'700',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Oldenburg' => array(
			'label'    => 'Oldenburg',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Oleo Script' => array(
			'label'    => 'Oleo Script',
			'variant' => array(
				'regular',
				'700',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Oleo Script Swash Caps' => array(
			'label'    => 'Oleo Script Swash Caps',
			'variant' => array(
				'regular',
				'700',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Open Sans' => array(
			'label'    => 'Open Sans',
			'variant' => array(
				'300',
				'300italic',
				'regular',
				'italic',
				'600',
				'600italic',
				'700',
				'700italic',
				'800',
				'800italic',
			),
			'subsets' => array(
				'latin',
				'greek-ext',
				'cyrillic',
				'greek',
				'vietnamese',
				'latin-ext',
				'devanagari',
				'cyrillic-ext',
			),
		),
		'Open Sans Condensed' => array(
			'label'    => 'Open Sans Condensed',
			'variant' => array(
				'300',
				'300italic',
				'700',
			),
			'subsets' => array(
				'latin',
				'greek-ext',
				'cyrillic',
				'greek',
				'vietnamese',
				'latin-ext',
				'cyrillic-ext',
			),
		),
		'Oranienbaum' => array(
			'label'    => 'Oranienbaum',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'cyrillic',
				'latin-ext',
				'cyrillic-ext',
			),
		),
		'Orbitron' => array(
			'label'    => 'Orbitron',
			'variant' => array(
				'regular',
				'500',
				'700',
				'900',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Oregano' => array(
			'label'    => 'Oregano',
			'variant' => array(
				'regular',
				'italic',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Orienta' => array(
			'label'    => 'Orienta',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Original Surfer' => array(
			'label'    => 'Original Surfer',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Oswald' => array(
			'label'    => 'Oswald',
			'variant' => array(
				'300',
				'regular',
				'700',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Over the Rainbow' => array(
			'label'    => 'Over the Rainbow',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Overlock' => array(
			'label'    => 'Overlock',
			'variant' => array(
				'regular',
				'italic',
				'700',
				'700italic',
				'900',
				'900italic',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Overlock SC' => array(
			'label'    => 'Overlock SC',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Ovo' => array(
			'label'    => 'Ovo',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Oxygen' => array(
			'label'    => 'Oxygen',
			'variant' => array(
				'300',
				'regular',
				'700',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Oxygen Mono' => array(
			'label'    => 'Oxygen Mono',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'PT Mono' => array(
			'label'    => 'PT Mono',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'cyrillic',
				'latin-ext',
				'cyrillic-ext',
			),
		),
		'PT Sans' => array(
			'label'    => 'PT Sans',
			'variant' => array(
				'regular',
				'italic',
				'700',
				'700italic',
			),
			'subsets' => array(
				'latin',
				'cyrillic',
				'latin-ext',
				'cyrillic-ext',
			),
		),
		'PT Sans Caption' => array(
			'label'    => 'PT Sans Caption',
			'variant' => array(
				'regular',
				'700',
			),
			'subsets' => array(
				'latin',
				'cyrillic',
				'latin-ext',
				'cyrillic-ext',
			),
		),
		'PT Sans Narrow' => array(
			'label'    => 'PT Sans Narrow',
			'variant' => array(
				'regular',
				'700',
			),
			'subsets' => array(
				'latin',
				'cyrillic',
				'latin-ext',
				'cyrillic-ext',
			),
		),
		'PT Serif' => array(
			'label'    => 'PT Serif',
			'variant' => array(
				'regular',
				'italic',
				'700',
				'700italic',
			),
			'subsets' => array(
				'latin',
				'cyrillic',
				'latin-ext',
				'cyrillic-ext',
			),
		),
		'PT Serif Caption' => array(
			'label'    => 'PT Serif Caption',
			'variant' => array(
				'regular',
				'italic',
			),
			'subsets' => array(
				'latin',
				'cyrillic',
				'latin-ext',
				'cyrillic-ext',
			),
		),
		'Pacifico' => array(
			'label'    => 'Pacifico',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Paprika' => array(
			'label'    => 'Paprika',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Parisienne' => array(
			'label'    => 'Parisienne',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Passero One' => array(
			'label'    => 'Passero One',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Passion One' => array(
			'label'    => 'Passion One',
			'variant' => array(
				'regular',
				'700',
				'900',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Pathway Gothic One' => array(
			'label'    => 'Pathway Gothic One',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Patrick Hand' => array(
			'label'    => 'Patrick Hand',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'vietnamese',
				'latin-ext',
			),
		),
		'Patrick Hand SC' => array(
			'label'    => 'Patrick Hand SC',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'vietnamese',
				'latin-ext',
			),
		),
		'Patua One' => array(
			'label'    => 'Patua One',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Paytone One' => array(
			'label'    => 'Paytone One',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Peralta' => array(
			'label'    => 'Peralta',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Permanent Marker' => array(
			'label'    => 'Permanent Marker',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Petit Formal Script' => array(
			'label'    => 'Petit Formal Script',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Petrona' => array(
			'label'    => 'Petrona',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Philosopher' => array(
			'label'    => 'Philosopher',
			'variant' => array(
				'regular',
				'italic',
				'700',
				'700italic',
			),
			'subsets' => array(
				'latin',
				'cyrillic',
			),
		),
		'Piedra' => array(
			'label'    => 'Piedra',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Pinyon Script' => array(
			'label'    => 'Pinyon Script',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Pirata One' => array(
			'label'    => 'Pirata One',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Plaster' => array(
			'label'    => 'Plaster',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Play' => array(
			'label'    => 'Play',
			'variant' => array(
				'regular',
				'700',
			),
			'subsets' => array(
				'latin',
				'greek-ext',
				'cyrillic',
				'greek',
				'latin-ext',
				'cyrillic-ext',
			),
		),
		'Playball' => array(
			'label'    => 'Playball',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Playfair Display' => array(
			'label'    => 'Playfair Display',
			'variant' => array(
				'regular',
				'italic',
				'700',
				'700italic',
				'900',
				'900italic',
			),
			'subsets' => array(
				'latin',
				'cyrillic',
				'latin-ext',
			),
		),
		'Playfair Display SC' => array(
			'label'    => 'Playfair Display SC',
			'variant' => array(
				'regular',
				'italic',
				'700',
				'700italic',
				'900',
				'900italic',
			),
			'subsets' => array(
				'latin',
				'cyrillic',
				'latin-ext',
			),
		),
		'Podkova' => array(
			'label'    => 'Podkova',
			'variant' => array(
				'regular',
				'700',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Poiret One' => array(
			'label'    => 'Poiret One',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'cyrillic',
				'latin-ext',
			),
		),
		'Poller One' => array(
			'label'    => 'Poller One',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Poly' => array(
			'label'    => 'Poly',
			'variant' => array(
				'regular',
				'italic',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Pompiere' => array(
			'label'    => 'Pompiere',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Pontano Sans' => array(
			'label'    => 'Pontano Sans',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Port Lligat Sans' => array(
			'label'    => 'Port Lligat Sans',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Port Lligat Slab' => array(
			'label'    => 'Port Lligat Slab',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Prata' => array(
			'label'    => 'Prata',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Preahvihear' => array(
			'label'    => 'Preahvihear',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'khmer',
			),
		),
		'Press Start 2P' => array(
			'label'    => 'Press Start 2P',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'cyrillic',
				'greek',
				'latin-ext',
			),
		),
		'Princess Sofia' => array(
			'label'    => 'Princess Sofia',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Prociono' => array(
			'label'    => 'Prociono',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Prosto One' => array(
			'label'    => 'Prosto One',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'cyrillic',
				'latin-ext',
			),
		),
		'Puritan' => array(
			'label'    => 'Puritan',
			'variant' => array(
				'regular',
				'italic',
				'700',
				'700italic',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Purple Purse' => array(
			'label'    => 'Purple Purse',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Quando' => array(
			'label'    => 'Quando',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Quantico' => array(
			'label'    => 'Quantico',
			'variant' => array(
				'regular',
				'italic',
				'700',
				'700italic',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Quattrocento' => array(
			'label'    => 'Quattrocento',
			'variant' => array(
				'regular',
				'700',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Quattrocento Sans' => array(
			'label'    => 'Quattrocento Sans',
			'variant' => array(
				'regular',
				'italic',
				'700',
				'700italic',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Questrial' => array(
			'label'    => 'Questrial',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Quicksand' => array(
			'label'    => 'Quicksand',
			'variant' => array(
				'300',
				'regular',
				'700',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Quintessential' => array(
			'label'    => 'Quintessential',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Qwigley' => array(
			'label'    => 'Qwigley',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Racing Sans One' => array(
			'label'    => 'Racing Sans One',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Radley' => array(
			'label'    => 'Radley',
			'variant' => array(
				'regular',
				'italic',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Raleway' => array(
			'label'    => 'Raleway',
			'variant' => array(
				'100',
				'200',
				'300',
				'regular',
				'500',
				'600',
				'700',
				'800',
				'900',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Raleway Dots' => array(
			'label'    => 'Raleway Dots',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Rambla' => array(
			'label'    => 'Rambla',
			'variant' => array(
				'regular',
				'italic',
				'700',
				'700italic',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Rammetto One' => array(
			'label'    => 'Rammetto One',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Ranchers' => array(
			'label'    => 'Ranchers',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Rancho' => array(
			'label'    => 'Rancho',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Rationale' => array(
			'label'    => 'Rationale',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Redressed' => array(
			'label'    => 'Redressed',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Reenie Beanie' => array(
			'label'    => 'Reenie Beanie',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Revalia' => array(
			'label'    => 'Revalia',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Ribeye' => array(
			'label'    => 'Ribeye',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Ribeye Marrow' => array(
			'label'    => 'Ribeye Marrow',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Righteous' => array(
			'label'    => 'Righteous',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Risque' => array(
			'label'    => 'Risque',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Roboto' => array(
			'label'    => 'Roboto',
			'variant' => array(
				'100',
				'100italic',
				'300',
				'300italic',
				'regular',
				'italic',
				'500',
				'500italic',
				'700',
				'700italic',
				'900',
				'900italic',
			),
			'subsets' => array(
				'latin',
				'greek-ext',
				'cyrillic',
				'greek',
				'vietnamese',
				'latin-ext',
				'cyrillic-ext',
			),
		),
		'Roboto Condensed' => array(
			'label'    => 'Roboto Condensed',
			'variant' => array(
				'300',
				'300italic',
				'regular',
				'italic',
				'700',
				'700italic',
			),
			'subsets' => array(
				'latin',
				'greek-ext',
				'cyrillic',
				'greek',
				'vietnamese',
				'latin-ext',
				'cyrillic-ext',
			),
		),
		'Roboto Slab' => array(
			'label'    => 'Roboto Slab',
			'variant' => array(
				'100',
				'300',
				'regular',
				'700',
			),
			'subsets' => array(
				'latin',
				'greek-ext',
				'cyrillic',
				'greek',
				'vietnamese',
				'latin-ext',
				'cyrillic-ext',
			),
		),
		'Rochester' => array(
			'label'    => 'Rochester',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Rock Salt' => array(
			'label'    => 'Rock Salt',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Rokkitt' => array(
			'label'    => 'Rokkitt',
			'variant' => array(
				'regular',
				'700',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Romanesco' => array(
			'label'    => 'Romanesco',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Ropa Sans' => array(
			'label'    => 'Ropa Sans',
			'variant' => array(
				'regular',
				'italic',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Rosario' => array(
			'label'    => 'Rosario',
			'variant' => array(
				'regular',
				'italic',
				'700',
				'700italic',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Rosarivo' => array(
			'label'    => 'Rosarivo',
			'variant' => array(
				'regular',
				'italic',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Rouge Script' => array(
			'label'    => 'Rouge Script',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Ruda' => array(
			'label'    => 'Ruda',
			'variant' => array(
				'regular',
				'700',
				'900',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Rubik One' => array(
			'label'    => 'Rubik One',
			'variant' => array(
				'400',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Rubik Mono One' => array(
			'label'    => 'Rubik Mono One',
			'variant' => array(
				'400',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Rufina' => array(
			'label'    => 'Rufina',
			'variant' => array(
				'regular',
				'700',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Ruge Boogie' => array(
			'label'    => 'Ruge Boogie',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Ruluko' => array(
			'label'    => 'Ruluko',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Rum Raisin' => array(
			'label'    => 'Rum Raisin',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Ruslan Display' => array(
			'label'    => 'Ruslan Display',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'cyrillic',
				'latin-ext',
				'cyrillic-ext',
			),
		),
		'Russo One' => array(
			'label'    => 'Russo One',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'cyrillic',
				'latin-ext',
			),
		),
		'Ruthie' => array(
			'label'    => 'Ruthie',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Rye' => array(
			'label'    => 'Rye',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Sacramento' => array(
			'label'    => 'Sacramento',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Sail' => array(
			'label'    => 'Sail',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Salsa' => array(
			'label'    => 'Salsa',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Sanchez' => array(
			'label'    => 'Sanchez',
			'variant' => array(
				'regular',
				'italic',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Sancreek' => array(
			'label'    => 'Sancreek',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Sansita One' => array(
			'label'    => 'Sansita One',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Sarina' => array(
			'label'    => 'Sarina',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Satisfy' => array(
			'label'    => 'Satisfy',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Scada' => array(
			'label'    => 'Scada',
			'variant' => array(
				'regular',
				'italic',
				'700',
				'700italic',
			),
			'subsets' => array(
				'latin',
				'cyrillic',
				'latin-ext',
			),
		),
		'Schoolbell' => array(
			'label'    => 'Schoolbell',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Seaweed Script' => array(
			'label'    => 'Seaweed Script',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Sevillana' => array(
			'label'    => 'Sevillana',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Seymour One' => array(
			'label'    => 'Seymour One',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'cyrillic',
				'latin-ext',
			),
		),
		'Shadows Into Light' => array(
			'label'    => 'Shadows Into Light',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Shadows Into Light Two' => array(
			'label'    => 'Shadows Into Light Two',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Shanti' => array(
			'label'    => 'Shanti',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Share' => array(
			'label'    => 'Share',
			'variant' => array(
				'regular',
				'italic',
				'700',
				'700italic',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Share Tech' => array(
			'label'    => 'Share Tech',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Share Tech Mono' => array(
			'label'    => 'Share Tech Mono',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Shojumaru' => array(
			'label'    => 'Shojumaru',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Short Stack' => array(
			'label'    => 'Short Stack',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Siemreap' => array(
			'label'    => 'Siemreap',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'khmer',
			),
		),
		'Sigmar One' => array(
			'label'    => 'Sigmar One',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Signika' => array(
			'label'    => 'Signika',
			'variant' => array(
				'300',
				'regular',
				'600',
				'700',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Signika Negative' => array(
			'label'    => 'Signika Negative',
			'variant' => array(
				'300',
				'regular',
				'600',
				'700',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Simonetta' => array(
			'label'    => 'Simonetta',
			'variant' => array(
				'regular',
				'italic',
				'900',
				'900italic',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Sintony' => array(
			'label'    => 'Sintony',
			'variant' => array(
				'regular',
				'700',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Sirin Stencil' => array(
			'label'    => 'Sirin Stencil',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Six Caps' => array(
			'label'    => 'Six Caps',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Skranji' => array(
			'label'    => 'Skranji',
			'variant' => array(
				'regular',
				'700',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Slackey' => array(
			'label'    => 'Slackey',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Smokum' => array(
			'label'    => 'Smokum',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Smythe' => array(
			'label'    => 'Smythe',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Sniglet' => array(
			'label'    => 'Sniglet',
			'variant' => array(
				'regular',
				'800',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Snippet' => array(
			'label'    => 'Snippet',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Snowburst One' => array(
			'label'    => 'Snowburst One',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Sofadi One' => array(
			'label'    => 'Sofadi One',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Sofia' => array(
			'label'    => 'Sofia',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Sonsie One' => array(
			'label'    => 'Sonsie One',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Sorts Mill Goudy' => array(
			'label'    => 'Sorts Mill Goudy',
			'variant' => array(
				'regular',
				'italic',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Source Code Pro' => array(
			'label'    => 'Source Code Pro',
			'variant' => array(
				'200',
				'300',
				'regular',
				'500',
				'600',
				'700',
				'900',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Source Sans Pro' => array(
			'label'    => 'Source Sans Pro',
			'variant' => array(
				'200',
				'200italic',
				'300',
				'300italic',
				'regular',
				'italic',
				'600',
				'600italic',
				'700',
				'700italic',
				'900',
				'900italic',
			),
			'subsets' => array(
				'latin',
				'vietnamese',
				'latin-ext',
			),
		),
		'Source Serif Pro' => array(
			'label'    => 'Source Serif Pro',
			'variant' => array(
				'400',
				'600',
				'700',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Special Elite' => array(
			'label'    => 'Special Elite',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Spicy Rice' => array(
			'label'    => 'Spicy Rice',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Spinnaker' => array(
			'label'    => 'Spinnaker',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Spirax' => array(
			'label'    => 'Spirax',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Squada One' => array(
			'label'    => 'Squada One',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Stalemate' => array(
			'label'    => 'Stalemate',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Stalinist One' => array(
			'label'    => 'Stalinist One',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'cyrillic',
				'latin-ext',
			),
		),
		'Stardos Stencil' => array(
			'label'    => 'Stardos Stencil',
			'variant' => array(
				'regular',
				'700',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Stint Ultra Condensed' => array(
			'label'    => 'Stint Ultra Condensed',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Stint Ultra Expanded' => array(
			'label'    => 'Stint Ultra Expanded',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Stoke' => array(
			'label'    => 'Stoke',
			'variant' => array(
				'300',
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Strait' => array(
			'label'    => 'Strait',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Sue Ellen Francisco' => array(
			'label'    => 'Sue Ellen Francisco',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Sunshiney' => array(
			'label'    => 'Sunshiney',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Supermercado One' => array(
			'label'    => 'Supermercado One',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Suwannaphum' => array(
			'label'    => 'Suwannaphum',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'khmer',
			),
		),
		'Swanky and Moo Moo' => array(
			'label'    => 'Swanky and Moo Moo',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Syncopate' => array(
			'label'    => 'Syncopate',
			'variant' => array(
				'regular',
				'700',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Tangerine' => array(
			'label'    => 'Tangerine',
			'variant' => array(
				'regular',
				'700',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Taprom' => array(
			'label'    => 'Taprom',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'khmer',
			),
		),
		'Tauri' => array(
			'label'    => 'Tauri',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Telex' => array(
			'label'    => 'Telex',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Tenor Sans' => array(
			'label'    => 'Tenor Sans',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'cyrillic',
				'latin-ext',
				'cyrillic-ext',
			),
		),
		'Text Me One' => array(
			'label'    => 'Text Me One',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'The Girl Next Door' => array(
			'label'    => 'The Girl Next Door',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Tienne' => array(
			'label'    => 'Tienne',
			'variant' => array(
				'regular',
				'700',
				'900',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Tinos' => array(
			'label'    => 'Tinos',
			'variant' => array(
				'regular',
				'italic',
				'700',
				'700italic',
			),
			'subsets' => array(
				'latin',
				'greek-ext',
				'cyrillic',
				'greek',
				'vietnamese',
				'latin-ext',
				'cyrillic-ext',
			),
		),
		'Titan One' => array(
			'label'    => 'Titan One',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Titillium Web' => array(
			'label'    => 'Titillium Web',
			'variant' => array(
				'200',
				'200italic',
				'300',
				'300italic',
				'regular',
				'italic',
				'600',
				'600italic',
				'700',
				'700italic',
				'900',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Trade Winds' => array(
			'label'    => 'Trade Winds',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Trocchi' => array(
			'label'    => 'Trocchi',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Trochut' => array(
			'label'    => 'Trochut',
			'variant' => array(
				'regular',
				'italic',
				'700',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Trykker' => array(
			'label'    => 'Trykker',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Tulpen One' => array(
			'label'    => 'Tulpen One',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Ubuntu' => array(
			'label'    => 'Ubuntu',
			'variant' => array(
				'300',
				'300italic',
				'regular',
				'italic',
				'500',
				'500italic',
				'700',
				'700italic',
			),
			'subsets' => array(
				'latin',
				'greek-ext',
				'cyrillic',
				'greek',
				'latin-ext',
				'cyrillic-ext',
			),
		),
		'Ubuntu Condensed' => array(
			'label'    => 'Ubuntu Condensed',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'greek-ext',
				'cyrillic',
				'greek',
				'latin-ext',
				'cyrillic-ext',
			),
		),
		'Ubuntu Mono' => array(
			'label'    => 'Ubuntu Mono',
			'variant' => array(
				'regular',
				'italic',
				'700',
				'700italic',
			),
			'subsets' => array(
				'latin',
				'greek-ext',
				'cyrillic',
				'greek',
				'latin-ext',
				'cyrillic-ext',
			),
		),
		'Ultra' => array(
			'label'    => 'Ultra',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Uncial Antiqua' => array(
			'label'    => 'Uncial Antiqua',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Underdog' => array(
			'label'    => 'Underdog',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'cyrillic',
				'latin-ext',
			),
		),
		'Unica One' => array(
			'label'    => 'Unica One',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'UnifrakturCook' => array(
			'label'    => 'UnifrakturCook',
			'variant' => array(
				'700',
			),
			'subsets' => array(
				'latin',
			),
		),
		'UnifrakturMaguntia' => array(
			'label'    => 'UnifrakturMaguntia',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Unkempt' => array(
			'label'    => 'Unkempt',
			'variant' => array(
				'regular',
				'700',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Unlock' => array(
			'label'    => 'Unlock',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Unna' => array(
			'label'    => 'Unna',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'VT323' => array(
			'label'    => 'VT323',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Vampiro One' => array(
			'label'    => 'Vampiro One',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Varela' => array(
			'label'    => 'Varela',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Varela Round' => array(
			'label'    => 'Varela Round',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Vast Shadow' => array(
			'label'    => 'Vast Shadow',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Vibur' => array(
			'label'    => 'Vibur',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Vidaloka' => array(
			'label'    => 'Vidaloka',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Viga' => array(
			'label'    => 'Viga',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Voces' => array(
			'label'    => 'Voces',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Volkhov' => array(
			'label'    => 'Volkhov',
			'variant' => array(
				'regular',
				'italic',
				'700',
				'700italic',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Vollkorn' => array(
			'label'    => 'Vollkorn',
			'variant' => array(
				'regular',
				'italic',
				'700',
				'700italic',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Voltaire' => array(
			'label'    => 'Voltaire',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Waiting for the Sunrise' => array(
			'label'    => 'Waiting for the Sunrise',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Wallpoet' => array(
			'label'    => 'Wallpoet',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Walter Turncoat' => array(
			'label'    => 'Walter Turncoat',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Warnes' => array(
			'label'    => 'Warnes',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Wellfleet' => array(
			'label'    => 'Wellfleet',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Wendy One' => array(
			'label'    => 'Wendy One',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Wire One' => array(
			'label'    => 'Wire One',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Yanone Kaffeesatz' => array(
			'label'    => 'Yanone Kaffeesatz',
			'variant' => array(
				'200',
				'300',
				'regular',
				'700',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Yellowtail' => array(
			'label'    => 'Yellowtail',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Yeseva One' => array(
			'label'    => 'Yeseva One',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'cyrillic',
				'latin-ext',
			),
		),
		'Yesteryear' => array(
			'label'    => 'Yesteryear',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Zeyada' => array(
			'label'    => 'Zeyada',
			'variant' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
			),
		),
	) );
}
endif;