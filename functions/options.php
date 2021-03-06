<?php
	class bci_Admin {
		private $key = 'bci_options';
		private $metabox_id = 'bci_option_metabox';
		protected $title = '';
		protected $options_page = '';
		private static $instance = null;
		private function __construct() {
			$this->title = __( 'Intranet Options', 'bci' );
		}
		public static function get_instance() {
			if( is_null( self::$instance ) ) {
				self::$instance = new self();
				self::$instance->hooks();
			}
			return self::$instance;
		}
		public function hooks() {
			add_action( 'admin_init', array( $this, 'init' ) );
			add_action( 'admin_menu', array( $this, 'add_options_page' ) );
			add_action( 'cmb2_admin_init', array( $this, 'add_options_page_metabox' ) );
		}
		public function init() {
			register_setting( $this->key, $this->key );
		}
		public function add_options_page() {
			$this->options_page = add_menu_page( $this->title, $this->title, 'manage_options', $this->key, array( $this, 'admin_page_display' ) );
			add_action( "admin_print_styles-{$this->options_page}", array( 'CMB2_hookup', 'enqueue_cmb_css' ) );
		}
		public function admin_page_display() {
			?>
			<div class="wrap cmb2-options-page <?php echo $this->key; ?>">
				<h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
				<?php cmb2_metabox_form( $this->metabox_id, $this->key ); ?>
			</div>
			<?php
		}
		function add_options_page_metabox() {
			add_action( "cmb2_save_options-page_fields_{$this->metabox_id}", array( $this, 'settings_notices' ), 10, 2 );
			$prefix = 'option';
			$cmb = new_cmb2_box( array(
				'id'		 => $this->metabox_id,
				'hookup'	 => false,
				'cmb_styles' => false,
				'show_on'	=> array(
					'key'   => 'options-page',
					'value' => array( $this->key, )
				),
			) );
			$cmb->add_field( array(
				'name' => __( 'Intranet Error email address notifications', 'bci' ),
				'desc' => __( 'Enter the email address of the person responsible for checking errors', 'bci' ),
				'id'   => 'intranet_email',
				'type' => 'text_email',
				'default' => 'someone@qmul.ac.uk',
			) );
			$cmb->add_field( array(
				'name' => __( 'Piwik URL', 'bci' ),
				'desc' => __( 'Enter the Piwik URL (no leading http:, just the //', 'bci' ),
				'id'   => 'piwik',
				'type' => 'text',
			) );
			$cmb->add_field( array(
				'name' => __( 'Piwik Site ID', 'bci' ),
				'desc' => __( 'Enter the Piwik site ID', 'bci' ),
				'id'   => 'piwikID',
				'type' => 'text_small',
			) );
			$cmb->add_field( array(
				'name' => __( 'Google Analytics Tracking Code', 'bci' ),
				'desc' => __( 'Enter the tracking ID number', 'bci' ),
				'id'   => 'googleanalytics',
				'type' => 'text',
			) );
			$cmb->add_field( array(
				'name' => __( '404 Page title', 'bci' ),
				'desc' => __( 'Enter the title for the 404 Page', 'bci' ),
				'id'   => '404title',
				'type' => 'text',
				'default' => '404 Error',
			) );
			$cmb->add_field( array(
				'name' => __( '404 Page banner', 'bci' ),
				'desc' => __( 'Enter the banner for the 404 Page', 'bci' ),
				'id'   => '404image',
				'type' => 'file',
			) );
			$cmb->add_field( array(
				'name' => __( '404 Page content', 'bci' ),
				'desc' => __( 'Enter the content for the 404 Page', 'bci' ),
				'id'   => '404content',
				'type' => 'wysiwyg',
			) );
			$cmb->add_field( array(
				'name' => __( 'Home Page News Stories', 'bci' ),
				'desc' => __( 'Enter number of articles to appear on the home page (\'Stickies\' will increase this number)', 'bci' ),
				'id'   => 'homenews',
				'type' => 'text_small',
			) );
			$cmb->add_field( array(
				'name' => __( 'Home Page Events', 'bci' ),
				'desc' => __( 'Enter number of events to appear on the home page', 'bci' ),
				'id'   => 'homeevents',
				'type' => 'text_small',
			) );
			$cmb->add_field( array(
				'name' => __( 'Twitter', 'bci' ),
				'desc' => __( 'Enter the BCI Twitter username', 'bci' ),
				'id'   => 'twitter',
				'type' => 'text',
			) );
			$cmb->add_field( array(
				'name' => __( 'Facebook', 'bci' ),
				'desc' => __( 'Enter the BCI Facebook username', 'bci' ),
				'id'   => 'facebook',
				'type' => 'text',
			) );
			$cmb->add_field( array(
				'name' => __( 'LinkedIn', 'bci' ),
				'desc' => __( 'Enter the BCI LinkedIn username', 'bci' ),
				'id'   => 'linkedin',
				'type' => 'text',
			) );
			$cmb->add_field( array(
				'name' => __( 'Pinterest', 'bci' ),
				'desc' => __( 'Enter the BCI Pinterest username', 'bci' ),
				'id'   => 'pinterest',
				'type' => 'text',
			) );
			$cmb->add_field( array(
				'name' => __( 'Flickr', 'bci' ),
				'desc' => __( 'Enter the BCI Flickr username', 'bci' ),
				'id'   => 'flickr',
				'type' => 'text',
			) );
			$cmb->add_field( array(
				'name' => __( 'G+', 'bci' ),
				'desc' => __( 'Enter the BCI G+ username', 'bci' ),
				'id'   => 'google',
				'type' => 'text',
			) );
			$cmb->add_field( array(
				'name' => __( 'YouTube', 'bci' ),
				'desc' => __( 'Enter the BCI YouTube username', 'bci' ),
				'id'   => 'youtube',
				'type' => 'text',
			) );
			$cmb->add_field( array(
				'name' => __( 'Athena Swan on Signature', 'bci' ),
				'desc' => __( 'check to include the Athena Swan logo in the email signature', 'bci' ),
				'id'   => 'aslogo',
				'type' => 'checkbox',
			) );
			$cmb->add_field( array(
				'name' => __( 'Athena Swan Signature Image', 'bci' ),
				'desc' => __( 'upload image here (width: 170 pixels / height: 84 pixels)', 'bci' ),
				'id'   => 'aslogofile',
				'type' => 'file',
			) );
			$cmb->add_field( array(
				'name' => __( 'Header/Footer Background Colour', 'bci' ),
				'desc' => __( 'Choose a colour for the page header and footer', 'bci' ),
				'id'   => 'color',
				'type' => 'colorpicker',
			) );
			$cmb->add_field( array(
				'name' => __( 'Side Nav Background Colour', 'bci' ),
				'desc' => __( 'Choose a colour for the Side Nav', 'bci' ),
				'id'   => 'color3',
				'type' => 'colorpicker',
			) );
			$cmb->add_field( array(
				'name' => __( 'Side Nav Background Highlight Colour', 'bci' ),
				'desc' => __( 'Choose a highlight colour for the Side Nav', 'bci' ),
				'id'   => 'color2',
				'type' => 'colorpicker',
			) );
			$cmb->add_field( array(
				'name' => 'Announcement Text Colour',
				'description' => __( 'Text colour for announcements', 'sc' ),
				'id'   => 'text',
				'type' => 'select',
				'default' => 'black',
				'options' => array(
					'red' => 'red',
					'pink' => 'pink',
					'purple' => 'purple',
					'deep-purple' => 'deep-purple',
					'indigo' => 'indigo',
					'blue' => 'blue',
					'light-blue' => 'light-blue',
					'cyan' => 'cyan',
					'teal' => 'teal',
					'green' => 'green',
					'light-green' => 'light-green',
					'lime' => 'lime ',
					'yellow' => 'yellow',
					'amber' => 'amber',
					'orange' => 'orange',
					'deep-orange' => 'deep-orange',
					'brown' => 'brown',
					'grey' => 'grey',
					'blue-grey ' => 'blue-grey ',
					'black' => 'black',
					'white' => 'white'
				)
			) );
			$cmb->add_field( array(
				'name' => 'Announcement Background Colour',
				'description' => __( 'Background colour for announcements', 'sc' ),
				'id'   => 'bg',
				'type' => 'select',
				'default' => 'yellow',
				'options' => array(
					'red' => 'red',
					'pink' => 'pink',
					'purple' => 'purple',
					'deep-purple' => 'deep-purple',
					'indigo' => 'indigo',
					'blue' => 'blue',
					'light-blue' => 'light-blue',
					'cyan' => 'cyan',
					'teal' => 'teal',
					'green' => 'green',
					'light-green' => 'light-green',
					'lime' => 'lime ',
					'yellow' => 'yellow',
					'amber' => 'amber',
					'orange' => 'orange',
					'deep-orange' => 'deep-orange',
					'brown' => 'brown',
					'grey' => 'grey',
					'blue-grey ' => 'blue-grey ',
					'black' => 'black',
					'white' => 'white'
				)
			) );
		}
		public function settings_notices( $object_id, $updated ) {
			if ( $object_id !== $this->key || empty( $updated ) ) {
				return;
			}
			add_settings_error( $this->key . '-notices', '', __( 'Settings updated.', 'bci' ), 'updated' );
			settings_errors( $this->key . '-notices' );
		}
		public function __get( $field ) {
			if ( in_array( $field, array( 'key', 'metabox_id', 'title', 'options_page' ), true ) ) {
				return $this->{$field};
			}
			throw new Exception( 'Invalid property: ' . $field );
		}
	}
	function bci_admin() {
		return bci_Admin::get_instance();
	}
	function bci_get_option( $key = '' ) {
		return cmb2_get_option( bci_admin()->key, $key );
	}
	bci_admin();