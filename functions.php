<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

// This theme requires WordPress 5.3 or later.
if ( version_compare( $GLOBALS['wp_version'], '5.3', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'twenty_twenty_one_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 *
	 * @since Twenty Twenty-One 1.0
	 *
	 * @return void
	 */
	function twenty_twenty_one_setup() {

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * This theme does not use a hard-coded <title> tag in the document head,
		 * WordPress will provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/**
		 * Add post-formats support.
		 */
		add_theme_support(
			'post-formats',
			array(
				'link',
				'aside',
				'gallery',
				'image',
				'quote',
				'status',
				'video',
				'audio',
				'chat',
			)
		);

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1568, 9999 );

		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary menu', 'twentytwentyone' ),
				'top-header-manu'  => esc_html__( 'Top Header Manu', 'twentytwentyone' ),
				'footer-first'  => esc_html__( 'Footer Menu First', 'twentytwentyone' ),
				'footer-second'  => esc_html__( 'Footer Menu Second', 'twentytwentyone' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'navigation-widgets',
			)
		);

		/*
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		$logo_width  = 300;
		$logo_height = 100;

		add_theme_support(
			'custom-logo',
			array(
				'height'               => $logo_height,
				'width'                => $logo_width,
				'flex-width'           => true,
				'flex-height'          => true,
				'unlink-homepage-logo' => true,
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );
		$background_color = get_theme_mod( 'background_color', 'D1E4DD' );
		if ( 127 > Twenty_Twenty_One_Custom_Colors::get_relative_luminance_from_hex( $background_color ) ) {
			add_theme_support( 'dark-editor-style' );
		}

		$editor_stylesheet_path = './assets/css/style-editor.css';

		// Note, the is_IE global variable is defined by WordPress and is used
		// to detect if the current browser is internet explorer.
		global $is_IE;
		if ( $is_IE ) {
			$editor_stylesheet_path = './assets/css/ie-editor.css';
		}

		// Enqueue editor styles.
		add_editor_style( $editor_stylesheet_path );

		// Add custom editor font sizes.
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => esc_html__( 'Extra small', 'twentytwentyone' ),
					'shortName' => esc_html_x( 'XS', 'Font size', 'twentytwentyone' ),
					'size'      => 16,
					'slug'      => 'extra-small',
				),
				array(
					'name'      => esc_html__( 'Small', 'twentytwentyone' ),
					'shortName' => esc_html_x( 'S', 'Font size', 'twentytwentyone' ),
					'size'      => 18,
					'slug'      => 'small',
				),
				array(
					'name'      => esc_html__( 'Normal', 'twentytwentyone' ),
					'shortName' => esc_html_x( 'M', 'Font size', 'twentytwentyone' ),
					'size'      => 20,
					'slug'      => 'normal',
				),
				array(
					'name'      => esc_html__( 'Large', 'twentytwentyone' ),
					'shortName' => esc_html_x( 'L', 'Font size', 'twentytwentyone' ),
					'size'      => 24,
					'slug'      => 'large',
				),
				array(
					'name'      => esc_html__( 'Extra large', 'twentytwentyone' ),
					'shortName' => esc_html_x( 'XL', 'Font size', 'twentytwentyone' ),
					'size'      => 40,
					'slug'      => 'extra-large',
				),
				array(
					'name'      => esc_html__( 'Huge', 'twentytwentyone' ),
					'shortName' => esc_html_x( 'XXL', 'Font size', 'twentytwentyone' ),
					'size'      => 96,
					'slug'      => 'huge',
				),
				array(
					'name'      => esc_html__( 'Gigantic', 'twentytwentyone' ),
					'shortName' => esc_html_x( 'XXXL', 'Font size', 'twentytwentyone' ),
					'size'      => 144,
					'slug'      => 'gigantic',
				),
			)
		);

		// Custom background color.
		add_theme_support(
			'custom-background',
			array(
				'default-color' => 'd1e4dd',
			)
		);

		// Editor color palette.
		$black     = '#000000';
		$dark_gray = '#28303D';
		$gray      = '#39414D';
		$green     = '#D1E4DD';
		$blue      = '#D1DFE4';
		$purple    = '#D1D1E4';
		$red       = '#E4D1D1';
		$orange    = '#E4DAD1';
		$yellow    = '#EEEADD';
		$white     = '#FFFFFF';

		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => esc_html__( 'Black', 'twentytwentyone' ),
					'slug'  => 'black',
					'color' => $black,
				),
				array(
					'name'  => esc_html__( 'Dark gray', 'twentytwentyone' ),
					'slug'  => 'dark-gray',
					'color' => $dark_gray,
				),
				array(
					'name'  => esc_html__( 'Gray', 'twentytwentyone' ),
					'slug'  => 'gray',
					'color' => $gray,
				),
				array(
					'name'  => esc_html__( 'Green', 'twentytwentyone' ),
					'slug'  => 'green',
					'color' => $green,
				),
				array(
					'name'  => esc_html__( 'Blue', 'twentytwentyone' ),
					'slug'  => 'blue',
					'color' => $blue,
				),
				array(
					'name'  => esc_html__( 'Purple', 'twentytwentyone' ),
					'slug'  => 'purple',
					'color' => $purple,
				),
				array(
					'name'  => esc_html__( 'Red', 'twentytwentyone' ),
					'slug'  => 'red',
					'color' => $red,
				),
				array(
					'name'  => esc_html__( 'Orange', 'twentytwentyone' ),
					'slug'  => 'orange',
					'color' => $orange,
				),
				array(
					'name'  => esc_html__( 'Yellow', 'twentytwentyone' ),
					'slug'  => 'yellow',
					'color' => $yellow,
				),
				array(
					'name'  => esc_html__( 'White', 'twentytwentyone' ),
					'slug'  => 'white',
					'color' => $white,
				),
			)
		);

		add_theme_support(
			'editor-gradient-presets',
			array(
				array(
					'name'     => esc_html__( 'Purple to yellow', 'twentytwentyone' ),
					'gradient' => 'linear-gradient(160deg, ' . $purple . ' 0%, ' . $yellow . ' 100%)',
					'slug'     => 'purple-to-yellow',
				),
				array(
					'name'     => esc_html__( 'Yellow to purple', 'twentytwentyone' ),
					'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $purple . ' 100%)',
					'slug'     => 'yellow-to-purple',
				),
				array(
					'name'     => esc_html__( 'Green to yellow', 'twentytwentyone' ),
					'gradient' => 'linear-gradient(160deg, ' . $green . ' 0%, ' . $yellow . ' 100%)',
					'slug'     => 'green-to-yellow',
				),
				array(
					'name'     => esc_html__( 'Yellow to green', 'twentytwentyone' ),
					'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $green . ' 100%)',
					'slug'     => 'yellow-to-green',
				),
				array(
					'name'     => esc_html__( 'Red to yellow', 'twentytwentyone' ),
					'gradient' => 'linear-gradient(160deg, ' . $red . ' 0%, ' . $yellow . ' 100%)',
					'slug'     => 'red-to-yellow',
				),
				array(
					'name'     => esc_html__( 'Yellow to red', 'twentytwentyone' ),
					'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $red . ' 100%)',
					'slug'     => 'yellow-to-red',
				),
				array(
					'name'     => esc_html__( 'Purple to red', 'twentytwentyone' ),
					'gradient' => 'linear-gradient(160deg, ' . $purple . ' 0%, ' . $red . ' 100%)',
					'slug'     => 'purple-to-red',
				),
				array(
					'name'     => esc_html__( 'Red to purple', 'twentytwentyone' ),
					'gradient' => 'linear-gradient(160deg, ' . $red . ' 0%, ' . $purple . ' 100%)',
					'slug'     => 'red-to-purple',
				),
			)
		);

		/*
		* Adds starter content to highlight the theme on fresh sites.
		* This is done conditionally to avoid loading the starter content on every
		* page load, as it is a one-off operation only needed once in the customizer.
		*/
		if ( is_customize_preview() ) {
			require get_template_directory() . '/inc/starter-content.php';
			add_theme_support( 'starter-content', twenty_twenty_one_get_starter_content() );
		}

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Add support for custom line height controls.
		add_theme_support( 'custom-line-height' );

		// Add support for link color control.
		add_theme_support( 'link-color' );

		// Add support for experimental cover block spacing.
		add_theme_support( 'custom-spacing' );

		// Add support for custom units.
		// This was removed in WordPress 5.6 but is still required to properly support WP 5.5.
		add_theme_support( 'custom-units' );

		// Remove feed icon link from legacy RSS widget.
		add_filter( 'rss_widget_feed_link', '__return_empty_string' );
		
		// woocommerce Support
		add_theme_support( 'woocommerce' );
	}
}
add_action( 'after_setup_theme', 'twenty_twenty_one_setup' );

/**
 * Registers widget area.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 *
 * @return void
 */
function twenty_twenty_one_widgets_init() {

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer', 'twentytwentyone' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'twentytwentyone' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'twenty_twenty_one_widgets_init' );

/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @global int $content_width Content width.
 *
 * @return void
 */
function twenty_twenty_one_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'twenty_twenty_one_content_width', 750 );
}
add_action( 'after_setup_theme', 'twenty_twenty_one_content_width', 0 );

/**
 * Enqueues scripts and styles.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @global bool       $is_IE
 * @global WP_Scripts $wp_scripts
 *
 * @return void
 */
function twenty_twenty_one_scripts() {
	// Note, the is_IE global variable is defined by WordPress and is used
	// to detect if the current browser is internet explorer.
	global $is_IE, $wp_scripts;
	if ( $is_IE ) {
		// If IE 11 or below, use a flattened stylesheet with static values replacing CSS Variables.
		wp_enqueue_style( 'twenty-twenty-one-style', get_template_directory_uri() . '/assets/css/ie.css', array(), wp_get_theme()->get( 'Version' ) );
	} else {
		// If not IE, use the standard stylesheet.
		wp_enqueue_style( 'twenty-twenty-one-style', get_template_directory_uri() . '/style.css', array(), wp_get_theme()->get( 'Version' ) );
	}

	// RTL styles.
	wp_style_add_data( 'twenty-twenty-one-style', 'rtl', 'replace' );

	// Print styles.
	wp_enqueue_style( 'twenty-twenty-one-print-style', get_template_directory_uri() . '/assets/css/print.css', array(), wp_get_theme()->get( 'Version' ), 'print' );

	// Threaded comment reply styles.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Register the IE11 polyfill file.
	wp_register_script(
		'twenty-twenty-one-ie11-polyfills-asset',
		get_template_directory_uri() . '/assets/js/polyfills.js',
		array(),
		wp_get_theme()->get( 'Version' ),
		array( 'in_footer' => true )
	);

	// Register the IE11 polyfill loader.
	wp_register_script(
		'twenty-twenty-one-ie11-polyfills',
		null,
		array(),
		wp_get_theme()->get( 'Version' ),
		array( 'in_footer' => true )
	);
	wp_add_inline_script(
		'twenty-twenty-one-ie11-polyfills',
		wp_get_script_polyfill(
			$wp_scripts,
			array(
				'Element.prototype.matches && Element.prototype.closest && window.NodeList && NodeList.prototype.forEach' => 'twenty-twenty-one-ie11-polyfills-asset',
			)
		)
	);

	// Main navigation scripts.
	if ( has_nav_menu( 'primary' ) ) {
		wp_enqueue_script(
			'twenty-twenty-one-primary-navigation-script',
			get_template_directory_uri() . '/assets/js/primary-navigation.js',
			array( 'twenty-twenty-one-ie11-polyfills' ),
			wp_get_theme()->get( 'Version' ),
			array(
				'in_footer' => false, // Because involves header.
				'strategy'  => 'defer',
			)
		);
	}

	// Responsive embeds script.
	wp_enqueue_script(
		'twenty-twenty-one-responsive-embeds-script',
		get_template_directory_uri() . '/assets/js/responsive-embeds.js',
		array( 'twenty-twenty-one-ie11-polyfills' ),
		wp_get_theme()->get( 'Version' ),
		array( 'in_footer' => true )
	);
}
add_action( 'wp_enqueue_scripts', 'twenty_twenty_one_scripts' );

/**
 * Enqueues block editor script.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twentytwentyone_block_editor_script() {

	wp_enqueue_script( 'twentytwentyone-editor', get_theme_file_uri( '/assets/js/editor.js' ), array( 'wp-blocks', 'wp-dom' ), wp_get_theme()->get( 'Version' ), array( 'in_footer' => true ) );
}

add_action( 'enqueue_block_editor_assets', 'twentytwentyone_block_editor_script' );

/**
 * Fixes skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @since Twenty Twenty-One 1.0
 * @deprecated Twenty Twenty-One 1.9 Removed from wp_print_footer_scripts action.
 *
 * @link https://git.io/vWdr2
 */
function twenty_twenty_one_skip_link_focus_fix() {

	// If SCRIPT_DEBUG is defined and true, print the unminified file.
	if ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) {
		echo '<script>';
		include get_template_directory() . '/assets/js/skip-link-focus-fix.js';
		echo '</script>';
	} else {
		// The following is minified via `npx terser --compress --mangle -- assets/js/skip-link-focus-fix.js`.
		?>
		<script>
		/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",(function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())}),!1);
		</script>
		<?php
	}
}

/**
 * Enqueues non-latin language styles.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twenty_twenty_one_non_latin_languages() {
	$custom_css = twenty_twenty_one_get_non_latin_css( 'front-end' );

	if ( $custom_css ) {
		wp_add_inline_style( 'twenty-twenty-one-style', $custom_css );
	}
}
add_action( 'wp_enqueue_scripts', 'twenty_twenty_one_non_latin_languages' );

// SVG Icons class.
require get_template_directory() . '/classes/class-twenty-twenty-one-svg-icons.php';

// Custom color classes.
require get_template_directory() . '/classes/class-twenty-twenty-one-custom-colors.php';
new Twenty_Twenty_One_Custom_Colors();

// Enhance the theme by hooking into WordPress.
require get_template_directory() . '/inc/template-functions.php';

// Menu functions and filters.
require get_template_directory() . '/inc/menu-functions.php';

// Custom template tags for the theme.
require get_template_directory() . '/inc/template-tags.php';

// Customizer additions.
require get_template_directory() . '/classes/class-twenty-twenty-one-customize.php';
new Twenty_Twenty_One_Customize();

// Block Patterns.
require get_template_directory() . '/inc/block-patterns.php';

// Block Styles.
require get_template_directory() . '/inc/block-styles.php';

// Dark Mode.
require_once get_template_directory() . '/classes/class-twenty-twenty-one-dark-mode.php';
new Twenty_Twenty_One_Dark_Mode();

/**
 * Enqueues scripts for the customizer preview.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twentytwentyone_customize_preview_init() {
	wp_enqueue_script(
		'twentytwentyone-customize-helpers',
		get_theme_file_uri( '/assets/js/customize-helpers.js' ),
		array(),
		wp_get_theme()->get( 'Version' ),
		array( 'in_footer' => true )
	);

	wp_enqueue_script(
		'twentytwentyone-customize-preview',
		get_theme_file_uri( '/assets/js/customize-preview.js' ),
		array( 'customize-preview', 'customize-selective-refresh', 'jquery', 'twentytwentyone-customize-helpers' ),
		wp_get_theme()->get( 'Version' ),
		array( 'in_footer' => true )
	);
}
add_action( 'customize_preview_init', 'twentytwentyone_customize_preview_init' );

/**
 * Enqueues scripts for the customizer.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twentytwentyone_customize_controls_enqueue_scripts() {

	wp_enqueue_script(
		'twentytwentyone-customize-helpers',
		get_theme_file_uri( '/assets/js/customize-helpers.js' ),
		array(),
		wp_get_theme()->get( 'Version' ),
		array( 'in_footer' => true )
	);
}
add_action( 'customize_controls_enqueue_scripts', 'twentytwentyone_customize_controls_enqueue_scripts' );

/**
 * Calculates classes for the main <html> element.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twentytwentyone_the_html_classes() {
	/**
	 * Filters the classes for the main <html> element.
	 *
	 * @since Twenty Twenty-One 1.0
	 *
	 * @param string The list of classes. Default empty string.
	 */
	$classes = apply_filters( 'twentytwentyone_html_classes', '' );
	if ( ! $classes ) {
		return;
	}
	echo 'class="' . esc_attr( $classes ) . '"';
}

/**
 * Adds "is-IE" class to body if the user is on Internet Explorer.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twentytwentyone_add_ie_class() {
	?>
	<script>
	if ( -1 !== navigator.userAgent.indexOf( 'MSIE' ) || -1 !== navigator.appVersion.indexOf( 'Trident/' ) ) {
		document.body.classList.add( 'is-IE' );
	}
	</script>
	<?php
}
add_action( 'wp_footer', 'twentytwentyone_add_ie_class' );

if ( ! function_exists( 'wp_get_list_item_separator' ) ) :
	/**
	 * Retrieves the list item separator based on the locale.
	 *
	 * Added for backward compatibility to support pre-6.0.0 WordPress versions.
	 *
	 * @since 6.0.0
	 */
	function wp_get_list_item_separator() {
		/* translators: Used between list items, there is a space after the comma. */
		return __( ', ', 'twentytwentyone' );
	}
endif;


/*################################* allow SVG ##################################*/

add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {
	$filetype = wp_check_filetype( $filename, $mimes );
	return [
	'ext' => $filetype['ext'],
	'type' => $filetype['type'],
	'proper_filename' => $data['proper_filename']
	];
}, 10, 4 );
function cc_mime_types( $mimes ){
	$mimes['svg'] = 'image/svg+xml';
	$mimes['webp'] = 'image/webp';
	return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );
function fix_svg() {
	echo '<style type="text/css">
	.attachment-266x266, .thumbnail img {
	width: 100% !important;
	height: auto !important;
	}
	</style>';
}
add_action( 'admin_head', 'fix_svg' );
/*################################* end allow SVG ##################################*/

/* ######################### use widgets block editor ###############################*/
add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );
add_filter( 'use_widgets_block_editor', '__return_false' );


/*###################### Classic Editor ####################*/

add_filter('use_block_editor_for_post','__return_false');
add_filter('gutenberg_can_edit_post','__return_false');

/* ############## Define the wpcf7_is_tel callback ############### */

function custom_filter_wpcf7_is_tel( $result, $tel ) {
	$result = preg_match( '/^\(?\+?([0-9]{1,4})?\)?[-\. ]?(\d{10})$/', $tel );
	return $result;
}

add_filter( 'wpcf7_is_tel', 'custom_filter_wpcf7_is_tel', 10, 2 );

// ############## Retrieves the alt tag from the Image URL ##############

function pippin_get_image_id($image_url) {
    global $wpdb;
    $attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url )); 
        //return $attachment[0]; 
		$attachment_title = get_the_title($attachment[0]);
		 return $attachment_title;
}

// ####################### Custom post for Slider ##########################

add_action( 'init', 'register_slider_posttype' );
	
function register_slider_posttype() {
	$labels = array(
		'name'               => _x( 'Slider', 'post type general name', '' ),
		'singular_name'      => _x( 'Slider', 'post type singular name', '' ),
		'menu_name'          => _x( 'Slider', 'admin menu', '' ),
		'name_admin_bar'     => _x( 'Slider', 'add new on admin bar', '' ),
		'add_new'            => _x( 'Add New', 'Slider', '' ),
		'add_new_item'       => __( 'Add New Slider', '' ),
		'new_item'           => __( 'New Slider', '' ),
		'edit_item'          => __( 'Edit Slider', '' ),
		'view_item'          => __( 'View Slider', '' ),
		'all_items'          => __( 'All Slider', '' ),
		'search_items'       => __( 'Search Slider', '' ),
		'parent_item_colon'  => __( 'Parent Slider:', '' ),
		'not_found'          => __( 'No Slider found.', '' ),
		'not_found_in_trash' => __( 'No Slider found in Trash.', '' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Add Slider here.', '' ),
		'public'             => false,
		'publicly_queryable' => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => 20,
		'rewrite'            => array('slug' => 'slider'),
		'menu_icon' 		 => 'dashicons-images-alt',
		'supports'           => array( 'title','thumbnail' )
	);

	register_post_type( 'slider', $args );
}

add_action( 'init', 'service_post_type');
function service_post_type() {
    $labels = array(
        'name'                => _x( 'Services', 'Post Type General Name', '' ),
        'singular_name'       => _x( 'Service', 'Post Type Singular Name', '' ),
        'menu_name'           => __( 'Services', '' ),
        'parent_item_colon'   => __( 'Parent Service', '' ),
        'all_items'           => __( 'All Services', '' ),
        'view_item'           => __( 'View Service', '' ),
        'add_new_item'        => __( 'Add New Service', '' ),
        'add_new'             => __( 'Add New', '' ),
        'edit_item'           => __( 'Edit Service', '' ),
        'update_item'         => __( 'Update Service', '' ),
        'search_items'        => __( 'Search Service', '' ),
        'not_found'           => __( 'Not Found', '' ),
        'not_found_in_trash'  => __( 'Not found in Trash', '' ),
    );
     
    $args = array(
        'labels'              => $labels,
        'public'              => false,
		'publicly_queryable'  => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
		'query_var'           => true,
		'capability_type'     => 'post',
		'has_archive'         => true,
		'hierarchical'        => false,
        'menu_position'       => 5,
        'can_export'          => true,
        'exclude_from_search' => false,
        'show_in_rest' => true,
		'rewrite'            => array('slug' => 'services'),
		'menu_icon' 		 => 'dashicons-embed-post',
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ), 
    );
    register_post_type( 'services', $args );
}

function add_custom_taxonomies() {
    register_taxonomy('destination', 'product', array(
        'hierarchical' => true,
        'labels' => array(
            'name' => _x( 'Destinations', 'taxonomy general name' ),
            'singular_name' => _x( 'Destination', 'taxonomy singular name' ),
            'search_items' =>  __( 'Search Destinations' ),
            'all_items' => __( 'All Destinations' ),
            'parent_item' => __( 'Parent Destination' ),
            'parent_item_colon' => __( 'Parent Destination:' ),
            'edit_item' => __( 'Edit Destination' ),
            'update_item' => __( 'Update Destination' ),
            'add_new_item' => __( 'Add New Destination' ),
            'new_item_name' => __( 'New Destination Name' ),
            'menu_name' => __( 'Destinations' ),
        ),
        'rewrite' => array(
            'slug' => 'destinations', 
            'with_front' => false, 
            'hierarchical' => true
        ),
    ));
}
add_action( 'init', 'add_custom_taxonomies', 0 );

/*Custom Taxonomy Hotel*/
function travlofy_hotel_taxonomies() {
    register_taxonomy('hotels', 'product', array(
        'hierarchical' => true,
        'labels' => array(
            'name' => _x( 'Hotels', 'taxonomy general name' ),
            'singular_name' => _x( 'Hotel', 'taxonomy singular name' ),
            'search_items' =>  __( 'Search Hotel' ),
            'all_items' => __( 'All Hotel' ),
            'parent_item' => __( 'Parent Hotel' ),
            'parent_item_colon' => __( 'Parent Hotel:' ),
            'edit_item' => __( 'Edit Hotel' ),
            'update_item' => __( 'Update Hotel' ),
            'add_new_item' => __( 'Add New Hotel' ),
            'new_item_name' => __( 'New Hotel Name' ),
            'menu_name' => __( 'Hotels' ),
        ),
        'rewrite' => array(
            'slug' => 'hotels', 
            'with_front' => false, 
            'hierarchical' => true
        ),
    ));
}
add_action( 'init', 'travlofy_hotel_taxonomies', 0 );

/*Holiday*/
function travlofy_holiday_taxonomies() {
    register_taxonomy('holidays', 'product', array(
        'hierarchical' => true,
        'labels' => array(
            'name' => _x( 'Holidays', 'taxonomy general name' ),
            'singular_name' => _x( 'Holiday', 'taxonomy singular name' ),
            'search_items' =>  __( 'Search Holiday' ),
            'all_items' => __( 'All Holiday' ),
            'parent_item' => __( 'Parent Holiday' ),
            'parent_item_colon' => __( 'Parent Holiday:' ),
            'edit_item' => __( 'Edit Holiday' ),
            'update_item' => __( 'Update Holiday' ),
            'add_new_item' => __( 'Add New Holiday' ),
            'new_item_name' => __( 'New Holiday Name' ),
            'menu_name' => __( 'Holidays' ),
        ),
        'rewrite' => array(
            'slug' => 'holidays', 
            'with_front' => false, 
            'hierarchical' => true
        ),
    ));
}
add_action( 'init', 'travlofy_holiday_taxonomies', 0 );

/*Holiday*/
function travlofy_visa_taxonomies() {
    register_taxonomy('visas', 'product', array(
        'hierarchical' => true,
        'labels' => array(
            'name' => _x( 'Visas', 'taxonomy general name' ),
            'singular_name' => _x( 'Visa', 'taxonomy singular name' ),
            'search_items' =>  __( 'Search Visa' ),
            'all_items' => __( 'All Visa' ),
            'parent_item' => __( 'Parent Visa' ),
            'parent_item_colon' => __( 'Parent Visa:' ),
            'edit_item' => __( 'Edit Visa' ),
            'update_item' => __( 'Update Visa' ),
            'add_new_item' => __( 'Add New Visa' ),
            'new_item_name' => __( 'New Visa Name' ),
            'menu_name' => __( 'Visas' ),
        ),
        'rewrite' => array(
            'slug' => 'holidays', 
            'with_front' => false, 
            'hierarchical' => true
        ),
    ));
}
add_action( 'init', 'travlofy_visa_taxonomies', 0 );

/*Holiday Taxonomy*/
function travlofy_activities_taxonomies() {
    register_taxonomy('activities', 'product', array(
        'hierarchical' => true,
        'labels' => array(
            'name' => _x( 'Activities', 'taxonomy general name' ),
            'singular_name' => _x( 'Activities', 'taxonomy singular name' ),
            'search_items' =>  __( 'Search Activities' ),
            'all_items' => __( 'All Activities' ),
            'parent_item' => __( 'Parent Activities' ),
            'parent_item_colon' => __( 'Parent Activities:' ),
            'edit_item' => __( 'Edit Activities' ),
            'update_item' => __( 'Update Activities' ),
            'add_new_item' => __( 'Add New Activities' ),
            'new_item_name' => __( 'New Activities Name' ),
            'menu_name' => __( 'Activities' ),
        ),
        'rewrite' => array(
            'slug' => 'activities', 
            'with_front' => false, 
            'hierarchical' => true
        ),
		'show_in_rest' => true,
    ));
}
add_action( 'init', 'travlofy_activities_taxonomies', 0 );

/* ############### Testimonial Post Type #################### */

add_action( 'init', 'register_testimonials_posttype' );	
function register_testimonials_posttype() {
	$labels = array(
		'name'               => _x( 'Testimonials', 'post type general name', '' ),
		'singular_name'      => _x( 'Testimonials', 'post type singular name', '' ),
		'menu_name'          => _x( 'Testimonials', 'admin menu', '' ),
		'name_admin_bar'     => _x( 'Testimonials', 'add new on admin bar', '' ),
		'add_new'            => _x( 'Add New', 'Testimonials', '' ),
		'add_new_item'       => __( 'Add New Testimonials', '' ),
		'new_item'           => __( 'New Testimonials', '' ),
		'edit_item'          => __( 'Edit Testimonials', '' ),
		'view_item'          => __( 'View Testimonials', '' ),
		'all_items'          => __( 'All Testimonials', '' ),
		'search_items'       => __( 'Search Testimonials', '' ),
		'parent_item_colon'  => __( 'Parent Testimonials:', '' ),
		'not_found'          => __( 'No Testimonials found.', '' ),
		'not_found_in_trash' => __( 'No Testimonials found in Trash.', '' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Add Testimonials here.', '' ),
		'public'             => false,
		'publicly_queryable' => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => 20,
		'rewrite'            => array('slug' => 'testimonials'),
		'menu_icon' 		 => 'dashicons-editor-strikethrough',
		'supports'           => array( 'title','editor','thumbnail' )
	);

	register_post_type( 'testimonials', $args );
}

/* ############################# Custom Post Type Team  ######################## */

function team_post_type() {

    $labels = array(
        'name'                => _x( 'Teams', 'Post Type General Name', '' ),
        'singular_name'       => _x( 'Team', 'Post Type Singular Name', '' ),
        'menu_name'           => __( 'Teams', '' ),
        'parent_item_colon'   => __( 'Parent Team', '' ),
        'all_items'           => __( 'All Teams', '' ),
        'view_item'           => __( 'View Team', '' ),
        'add_new_item'        => __( 'Add New Team', '' ),
        'add_new'             => __( 'Add New', '' ),
        'edit_item'           => __( 'Edit Team', '' ),
        'update_item'         => __( 'Update Team', '' ),
        'search_items'        => __( 'Search Team', '' ),
        'not_found'           => __( 'Not Found', '' ),
        'not_found_in_trash'  => __( 'Not found in Trash', '' ),
    );
      
    $args = array(
        'labels'              	=> $labels,
        'description'         	=> __( 'Team news and reviews', '' ),
        'public'              	=> false,
        'publicly_queryable'  	=> false,
        'show_ui'             	=> true,
        'show_in_menu'        	=> true,
        'query_var'           	=> true,
        'capability_type'     	=> 'post',
        'has_archive'         	=> false,
        'hierarchical'        	=> false,
        'menu_position'       	=> 5,
        'rewrite'             	=> array('slug' => 'services'),
        'can_export'          	=> true,
        'show_in_nav_menus'   	=> true,
        'show_in_admin_bar'   	=> true,
        'show_in_rest' 			=> false,
        'exclude_from_search' 	=> false,
        'menu_icon' 		  	=> 'dashicons-buddicons-buddypress-logo',
        'supports'            	=> array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields'),  
    );
      
    register_post_type( 'teams', $args );
  
}
  
add_action( 'init', 'team_post_type', 0 );

/* ACF Custom Theme Option */

if( function_exists('acf_add_options_page') ) {
     
    acf_add_options_page(array(
        'page_title'    => 'Theme General Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => true
    ));
     
    acf_add_options_sub_page(array(
        'page_title'    => 'Theme Header Settings',
        'menu_title'    => 'Header',
        'parent_slug'   => 'theme-general-settings',
    ));
     
    acf_add_options_sub_page(array(
        'page_title'    => 'Theme Footer Settings',
        'menu_title'    => 'Footer',
        'parent_slug'   => 'theme-general-settings',
    ));
	
	acf_add_options_sub_page(array(
        'page_title'    => 'Theme General Option Settings',
        'menu_title'    => 'General Option',
        'parent_slug'   => 'theme-general-settings',
    ));
	
 }

// Contact Form 7 Remove P and br tags
add_filter('wpcf7_autop_or_not', '__return_false');

/*################## Count Like and Dislike Count ##################*/

/*function add_like_dislike_meta($post_id) {
    add_post_meta($post_id, '_post_likes', 0, true);
    add_post_meta($post_id, '_post_dislikes', 0, true);
}
add_action('wp_insert_post', 'add_like_dislike_meta');*/

/*################## Count Like and Dislike AJAX ##################*/

/*add_action('wp_ajax_nopriv_handle_like_dislike', 'handle_like_dislike');
add_action('wp_ajax_handle_like_dislike', 'handle_like_dislike');
function handle_like_dislike() {
    if (isset($_POST['post_id']) && isset($_POST['action_type'])) {
        $post_id = intval($_POST['post_id']);
        $action_type = sanitize_text_field($_POST['action_type']);

        if ($action_type === 'like') {
            $current_likes = get_post_meta($post_id, '_post_likes', true);
            update_post_meta($post_id, '_post_likes', ++$current_likes);
            echo $current_likes;
        } elseif ($action_type === 'dislike') {
            $current_dislikes = get_post_meta($post_id, '_post_dislikes', true);
            update_post_meta($post_id, '_post_dislikes', ++$current_dislikes);
            echo $current_dislikes;
        }
    }
    wp_die();
}*/

/*################## Destination Ajax for Child Category ##################*/

add_action('wp_ajax_nopriv_activities_listing', 'activities_listing');
add_action('wp_ajax_activities_listing', 'activities_listing');

function activities_listing(){
	parse_str($_POST['data'], $searcharray);
	$destination_child_id = $_POST['data'];
	$post_per_page 		 = get_option('posts_per_page');
	$args = array(
		'post_type'      => 'product',
		'posts_per_page' => $post_per_page,
		'orderby'        => 'date',
		'order'          => 'DESC',
		'post_status'    => 'publish',
		'tax_query'      => array(
			array(
				'taxonomy' => 'activities',
				'field'    => 'term_id', 
				'terms'    => $destination_child_id,
			),
		),
	);
	$loop = new WP_Query($args);
	$currency = get_woocommerce_currency();
	$currency_symbol = get_woocommerce_currency_symbol($currency);
	if ($loop->have_posts()) {
		while ($loop->have_posts()) { 
			$loop->the_post();
			get_template_part('page-template-parts/products-listing', '');
		} 
	} wp_reset_postdata();
	die();
}

/*################################## Custom Taxonomy Export ##################################*/

add_action('admin_menu', function () {
    add_submenu_page(
        'tools.php',
        'Export Custom Taxonomy',
        'Export Taxonomy',
        'manage_options',
        'export-custom-taxonomy',
        'custom_taxonomy_export_page'
    );
});

function custom_taxonomy_export_page() {
    // Show form if not submitted
    if (!isset($_POST['export_taxonomy']) || !isset($_POST['taxonomy'])) {
        ?>
        <div class="wrap">
            <h1>Export Custom Taxonomy</h1>
            <form method="post">
                <label for="taxonomy">Select Taxonomy:</label>
                <select name="taxonomy" id="taxonomy">
                    <?php foreach (get_taxonomies(['public' => true], 'objects') as $taxonomy): ?>
                        <option value="<?php echo esc_attr($taxonomy->name); ?>">
                            <?php echo esc_html($taxonomy->labels->name); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <?php submit_button('Export to CSV', 'primary', 'export_taxonomy'); ?>
            </form>
        </div>
        <?php
        return;
    }
	
    ob_clean();

    // Process export
    $taxonomy = sanitize_text_field($_POST['taxonomy']);
    $terms = get_terms([
        'taxonomy'   => $taxonomy,
        'hide_empty' => false,
    ]);

    $filename = $taxonomy . '-export-' . date('YmdHis') . '.csv';

    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    header('Pragma: no-cache');
    header('Expires: 0');

    $output = fopen('php://output', 'w');

    fputcsv($output, ['Name', 'Slug', 'Description', 'Parent slug', 'Category Image' , 'Banner Slider Image']);

    foreach ($terms as $term) {
		$term_id = $term->term_id;

		$taxonomy_image = get_field('taxonomy_image', $term); 

		$repeater_data = get_field('banner_slider', $term);
		$repeater_values = [];

		if ($repeater_data && is_array($repeater_data)) {
			foreach ($repeater_data as $row) {
				// Suppose repeater has 'title' and 'value'
				$repeater_values[] = $row['banner_image'] ;
			}
		}

		// Join repeater values as string
		$repeater_string = implode(" | ", $repeater_values);
		
		$parent_slug = $term->parent ? get_term($term->parent, $taxonomy)->slug : '';

		fputcsv($output, [
			$term->name,
			$term->slug,
			strip_tags($term->description),
			$parent_slug,
			$taxonomy_image,
			$repeater_string
		]);
	}

    fclose($output);
    exit;
}

/*##########################################Custom Taxonomy Import##############################*/

add_action('admin_menu', function () {
    add_submenu_page(
        'tools.php',
        'Import Taxonomies',
        'Import Taxonomies',
        'manage_options',
        'import-taxonomies',
        'render_taxonomy_importer'
    );
});

function render_taxonomy_importer() {
    ?>
    <div class="wrap">
        <h1>Custom Taxonomy Import</h1>
        <form method="post" enctype="multipart/form-data">
            <input type="file" name="taxonomy_csv" accept=".csv" required>
            <select name="taxonomy" required>
                <?php foreach (get_taxonomies(['public' => true], 'objects') as $taxonomy): ?>
                    <option value="<?php echo esc_attr($taxonomy->name); ?>">
                        <?php echo esc_html($taxonomy->labels->name); ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <?php submit_button('Import Taxonomy Terms'); ?>
        </form>
    </div>
    <?php

    if (!empty($_FILES['taxonomy_csv']['tmp_name']) && isset($_POST['taxonomy'])) {
        $taxonomy = sanitize_text_field($_POST['taxonomy']);
        $csv_file = $_FILES['taxonomy_csv']['tmp_name'];

        $file = fopen($csv_file, 'r');
        $header = fgetcsv($file); // Skip header

        $rows = [];
        $slug_to_term_id = [];

        // PASS 1: Insert or update terms WITHOUT parent
        while (($row = fgetcsv($file)) !== false) {
            // CSV Format: Name, Slug, Description, Parent Slug, Taxonomy Image, Banner Slider
            [$name, $slug, $description, $parent_slug, $taxonomy_image_url, $banner_images_str] = $row;

            $existing = get_term_by('slug', $slug, $taxonomy);
            if ($existing) {
                $term_id = $existing->term_id;
                wp_update_term($term_id, $taxonomy, [
                    'name'        => $name,
                    'description' => $description,
                    'slug'        => $slug,
                ]);
            } else {
                $new_term = wp_insert_term($name, $taxonomy, [
                    'slug'        => $slug,
                    'description' => $description,
                ]);
                $term_id = is_wp_error($new_term) ? 0 : $new_term['term_id'];
            }

            if ($term_id) {
                $slug_to_term_id[$slug] = $term_id;

                $rows[] = [
                    'term_id'          => $term_id,
                    'slug'             => $slug,
                    'parent_slug'      => trim($parent_slug),
                    'taxonomy_image'   => $taxonomy_image_url,
                    'banner_slider'    => $banner_images_str,
                ];
            }
        }

        fclose($file);

        // PASS 2: Assign parents and custom fields
        foreach ($rows as $row) {
            $term_id        = $row['term_id'];
            $parent_slug    = $row['parent_slug'];
            $taxonomy_image = $row['taxonomy_image'];
            $banner_images_str = $row['banner_slider'];

            // Set parent using parent slug
            if (!empty($parent_slug) && isset($slug_to_term_id[$parent_slug])) {
                $parent_id = $slug_to_term_id[$parent_slug];
                wp_update_term($term_id, $taxonomy, [
                    'parent' => $parent_id,
                ]);
            }

            // Category Image
            if (!empty($taxonomy_image)) {
                $image_id = media_sideload_image_to_id($taxonomy_image);
                if ($image_id) {
                    update_field('taxonomy_image', $image_id, "term_$term_id");
                }
            }

            // Banner Slider Repeater
            $banner_images = array_map('trim', explode('|', $banner_images_str));
            $repeater_data = [];

            foreach ($banner_images as $img_url) {
                if (!empty($img_url)) {
                    $img_id = media_sideload_image_to_id($img_url);
                    if ($img_id) {
                        $repeater_data[] = ['banner_image' => $img_id];
                    }
                }
            }

            if (!empty($repeater_data)) {
                update_field('banner_slider', $repeater_data, "term_$term_id");
            }
        }

        echo '<div class="notice notice-success"><p>Taxonomy terms imported successfully with parent-child via slug.</p></div>';
    }
}

function media_sideload_image_to_id($file_url) {
    if (empty($file_url)) return false;

    require_once ABSPATH . 'wp-admin/includes/media.php';
    require_once ABSPATH . 'wp-admin/includes/file.php';
    require_once ABSPATH . 'wp-admin/includes/image.php';

    $tmp = download_url($file_url);
    if (is_wp_error($tmp)) return false;

    $file_array = [
        'name'     => basename($file_url),
        'tmp_name' => $tmp
    ];

    $id = media_handle_sideload($file_array, 0);
    if (is_wp_error($id)) return false;

    return $id;
}

/*#################### Remove Activities Taxonomy slug in Url on Front #####################*/

function custom_taxonomy_rewrite_rules() {
    add_rewrite_rule(
        '^([^/]+)/?$',
        'index.php?activities=$matches[1]',
        'top'
    );
}
add_action('init', 'custom_taxonomy_rewrite_rules');

function custom_term_link($url, $term, $taxonomy) {
    if ($taxonomy === 'activities') {
        return home_url('/' . $term->slug . '/');
    }
    return $url;
}
add_filter('term_link', 'custom_term_link', 10, 3);




