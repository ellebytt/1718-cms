<?php
/**
 * ferry Admin Class.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'ferry_Admin' ) ) :

/**
 * ferry_Admin Class.
 */
class ferry_Admin {

	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'ferry_admin_menu' ) );
		add_action( 'wp_loaded', array( __CLASS__, 'ferry_hide_notices' ) );
	}

	/**
	 * Add admin menu.
	 */
	public function ferry_admin_menu() {
		$theme = wp_get_theme( get_template() );

		$page = add_theme_page( esc_html__( 'About', 'ferry' ) . ' ' . $theme->display( 'Name' ), esc_html__( 'About', 'ferry' ) . ' ' . $theme->display( 'Name' ), 'activate_plugins', 'ferry-welcome', array( $this, 'welcome_screen' ) );
		add_action( 'admin_print_styles-' . $page, array( $this, 'ferry_enqueue_styles' ) );
	}

	/**
	 * Enqueue styles.
	 */
	public function ferry_enqueue_styles() {
		global $ferry_version;

		wp_enqueue_style( 'ferry-welcome', get_template_directory_uri() . '/css/themeinfo.css', array(), $ferry_version );
	}

	/**
	 * Hide a notice if the GET variable is set.
	 */
	public static function ferry_hide_notices() {
		if ( isset( $_GET['ferry-hide-notice'] ) && isset( $_GET['_ferry_notice_nonce'] ) ) {
			if ( ! wp_verify_nonce( $_GET['_ferry_notice_nonce'], 'ferry_ferry_hide_notices_nonce' ) ) {
				wp_die( __( 'Action failed. Please refresh the page and retry.', 'ferry' ) );
			}

			if ( ! current_user_can( 'manage_options' ) ) {
				wp_die( __( 'Cheatin&#8217; huh?', 'ferry' ) );
			}

			$hide_notice = sanitize_text_field( $_GET['ferry-hide-notice'] );
		}
	}

	/**
	 * Show welcome notice.
	 */
	public function ferry_welcome_notice() {
		?>
		<div id="message" class="updated ferry-message">
			<a class="ferry-message-close notice-dismiss" href="<?php echo esc_url( wp_nonce_url( remove_query_arg( array( 'activated' ), add_query_arg( 'ferry-hide-notice', 'welcome' ) ), 'ferry_ferry_hide_notices_nonce', '_ferry_notice_nonce' ) ); ?>"><?php _e( 'Dismiss', 'ferry' ); ?></a>
			<p><?php printf( esc_html__( 'Welcome! Thank you for choosing ferry! To fully take advantage of the best our theme can offer please make sure you visit our %swelcome page%s.', 'ferry' ), '<a href="' . esc_url( admin_url( 'themes.php?page=ferry-welcome' ) ) . '">', '</a>' ); ?></p>
			<p class="submit">
				<a class="button-secondary" href="<?php echo esc_url( admin_url( 'themes.php?page=ferry-welcome' ) ); ?>"><?php esc_html_e( 'Get started with ferry', 'ferry' ); ?></a>
			</p>
		</div>
		<?php
	}

	/**
	 * ferry_intro text/links shown to all about pages.
	 *
	 * @access private
	 */
	private function ferry_intro() {
		global $ferry_version;

		$theme = wp_get_theme( get_template() );

		// Drop minor version if 0
		$major_version = substr( $ferry_version, 0, 3 );
		?>
		<div class="ferry-theme-info">
			<h1>
				<?php esc_html_e('About', 'ferry'); ?>
				<?php echo $theme->display( 'Name' ); ?>
				<?php printf( '%s', $major_version ); ?>
			</h1>

			<div class="welcome-description-wrap">
				<div class="about-text"><?php echo $theme->display( 'Description' ); ?></div>

				<div class="ferry-screenshot">
					<img src="<?php echo esc_url( get_template_directory_uri() ) . '/screenshot.png'; ?>" />
				</div>
			</div>
		</div>

		<p class="ferry-actions">
			<a href="<?php echo esc_url( 'https://themeansar.com/themes/ferry/' ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Theme Info', 'ferry' ); ?></a>

			<a href="<?php echo esc_url( 'https://themeansar.com/demo/wp/ferry/default/' ); ?>" class="button button-primary docs" target="_blank"><?php esc_html_e( 'View PRO version', 'ferry' ); ?></a>

			<a href="<?php echo esc_url( 'https://wordpress.org/support/theme/ferry/reviews/#new-post' ); ?>" class="button button-secondary docs" target="_blank"><?php esc_html_e( 'Rating this theme', 'ferry' ); ?></a>
		</p>

		<h2 class="nav-tab-wrapper">
			<a class="nav-tab <?php if ( empty( $_GET['tab'] ) && $_GET['page'] == 'ferry-welcome' ) echo 'nav-tab-active'; ?>" href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'ferry-welcome' ), 'themes.php' ) ) ); ?>">
				<?php echo $theme->display( 'Name' ); ?>
			</a>
			<a class="nav-tab <?php if ( isset( $_GET['tab'] ) && $_GET['tab'] == 'supported_plugins' ) echo 'nav-tab-active'; ?>" href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'ferry-welcome', 'tab' => 'supported_plugins' ), 'themes.php' ) ) ); ?>">
				<?php esc_html_e( 'Supported Plugins', 'ferry' ); ?>
			</a>
			<a class="nav-tab <?php if ( isset( $_GET['tab'] ) && $_GET['tab'] == 'free_vs_pro' ) echo 'nav-tab-active'; ?>" href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'ferry-welcome', 'tab' => 'free_vs_pro' ), 'themes.php' ) ) ); ?>">
				<?php esc_html_e( 'Free Vs Pro', 'ferry' ); ?>
			</a>
		</h2>
		<?php
	}

	/**
	 * Welcome screen page.
	 */
	public function welcome_screen() {
		$current_tab = empty( $_GET['tab'] ) ? 'about' : sanitize_title( $_GET['tab'] );

		// Look for a {$current_tab}_screen method.
		if ( is_callable( array( $this, $current_tab . '_screen' ) ) ) {
			return $this->{ $current_tab . '_screen' }();
		}

		// Fallback to about screen.
		return $this->about_screen();
	}

	/**
	 * Output the about screen.
	 */
	public function about_screen() {
		$theme = wp_get_theme( get_template() );
		?>
		<div class="wrap about-wrap">

			<?php $this->ferry_intro(); ?>

			<div class="changelog point-releases">
				<div class="under-the-hood two-col">
					<div class="col">
						<h3><?php esc_html_e( 'Theme Customizer', 'ferry' ); ?></h3>
						<p><?php esc_html_e( 'Theme Cusomization features availbale in Customizer setting : -   Appearance &#8594; Customize', 'ferry' ) ?></p>
						<p><a href="<?php echo admin_url( 'customize.php' ); ?>" class="button button-secondary"><?php esc_html_e( 'Customize', 'ferry' ); ?></a></p>
					</div>

					<div class="col">
						<h3><?php esc_html_e( 'Documentation', 'ferry' ); ?></h3>
						<p><?php esc_html_e( 'Please view our documentation page to setup the theme.', 'ferry' ) ?></p>
						<p><a href="<?php echo esc_url( 'https://themeansar.com/docs/wp/ferry/' ); ?>" class="button button-secondary"><?php esc_html_e( 'Documentation', 'ferry' ); ?></a></p>
					</div>

					<div class="col">
						<h3><?php esc_html_e( 'Got theme support question?', 'ferry' ); ?></h3>
						<p><?php esc_html_e( 'Please Put your question / query on support forum.', 'ferry' ) ?></p>
						<p><a href="<?php echo esc_url( 'https://wordpress.org/support/theme/ferry' ); ?>" class="button button-secondary"><?php esc_html_e( 'Support Forum', 'ferry' ); ?></a></p>
					</div>

					<div class="col">
						<h3><?php esc_html_e( 'Need more functionality / features?', 'ferry' ); ?></h3>
						<p><?php esc_html_e( 'Upgrade to PRO version for more exciting features and functionlaity.', 'ferry' ) ?></p>
						<p><a href="<?php echo esc_url( 'https://themeansar.com/demo/wp/ferry/default/' ); ?>" class="button button-secondary"><?php esc_html_e( 'View Pro', 'ferry' ); ?></a></p>
					</div>

					<div class="col">
						<h3><?php esc_html_e( 'Got sales related question?', 'ferry' ); ?></h3>
						<p><?php esc_html_e( 'Please send it via our sales contact page.', 'ferry' ) ?></p>
						<p><a href="<?php echo esc_url( 'https://themeansar.com/contact/' ); ?>" class="button button-secondary"><?php esc_html_e( 'Contact Page', 'ferry' ); ?></a></p>
					</div>

					<div class="col">
						<h3>
							<?php
							esc_html_e( 'Translate', 'ferry' );
							echo ' ' . $theme->display( 'Name' );
							?>
						</h3>
						<p><?php esc_html_e( 'Click below to translate this theme into your own language.', 'ferry' ) ?></p>
						<p>
							<a href="<?php echo esc_url( 'http://translate.wordpress.org/projects/wp-themes/ferry' ); ?>" class="button button-secondary">
								<?php
								esc_html_e( 'Translate', 'ferry' );
								echo ' ' . $theme->display( 'Name' );
								?>
							</a>
						</p>
					</div>
				</div>
			</div>

			<div class="return-to-dashboard ferry">
				<?php if ( current_user_can( 'update_core' ) && isset( $_GET['updated'] ) ) : ?>
					<a href="<?php echo esc_url( self_admin_url( 'update-core.php' ) ); ?>">
						<?php is_multisite() ? esc_html_e( 'Return to Updates', 'ferry' ) : esc_html_e( 'Return to Dashboard &rarr; Updates', 'ferry' ); ?>
					</a> |
				<?php endif; ?>
				<a href="<?php echo esc_url( self_admin_url() ); ?>"><?php is_blog_admin() ? esc_html_e( 'Go to Dashboard &rarr; Home', 'ferry' ) : esc_html_e( 'Go to Dashboard', 'ferry' ); ?></a>
			</div>
		</div>
		<?php
	}

	/**
	 * Output the supported plugins screen.
	 */
	public function supported_plugins_screen() {
		?>
		<div class="wrap about-wrap">

			<?php $this->ferry_intro(); ?>

			<p class="about-description"><?php esc_html_e( 'This theme recommends following plugins:', 'ferry' ); ?></p>
			<ol>
				<li><a href="<?php echo esc_url( 'https://wordpress.org/plugins/contact-form-7/' ); ?>" target="_blank"><?php esc_html_e( 'Contact Form 7', 'ferry' ); ?></a></li>
				<li><a href="<?php echo esc_url( 'https://wordpress.org/plugins/woocommerce/' ); ?>" target="_blank"><?php esc_html_e( 'WooCommerce', 'ferry' ); ?></a></li>
				<li><a href="<?php echo esc_url( 'https://wordpress.org/plugins/polylang/' ); ?>" target="_blank"><?php esc_html_e( 'Polylang', 'ferry' ); ?></a>
					<?php esc_html_e('Fully Compatible in Pro Version', 'ferry'); ?>
				</li>
				<li><a href="<?php echo esc_url( 'https://wpml.org/' ); ?>" target="_blank"><?php esc_html_e( 'WPML', 'ferry' ); ?></a>
					<?php esc_html_e('Fully Compatible in Pro Version', 'ferry'); ?>
				</li>
			</ol>

		</div>
		<?php
	}

	/**
	 * Output the free vs pro screen.
	 */
	public function free_vs_pro_screen() {
		?>
		<div class="wrap about-wrap">

			<?php $this->ferry_intro(); ?>

			<p class="about-description"><?php esc_html_e( 'Upgrade to PRO version for more exciting features.', 'ferry' ); ?></p>

			<table>
				<thead>
					<tr>
						<th class="table-feature-title"><h3><?php esc_html_e('Features', 'ferry'); ?></h3></th>
						<th><h3><?php esc_html_e('ferry Lite', 'ferry'); ?></h3></th>
						<th><h3><?php esc_html_e('ferry Pro', 'ferry'); ?></h3></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><h3><?php esc_html_e('Slider', 'ferry'); ?></h3></td>
						<td><?php esc_html_e('3', 'ferry'); ?></td>
						<td><?php esc_html_e('Unlimited Slides', 'ferry'); ?></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Slider Settings', 'ferry'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><?php esc_html_e('Slides type, duration & delay time', 'ferry'); ?></td>
					</tr>
					
					<tr>
						<td><h3><?php esc_html_e('Color Palette', 'ferry'); ?></h3></td>
						<td><?php esc_html_e('Primary Color Option', 'ferry'); ?></td>
						<td><?php esc_html_e('Multiple Color Options', 'ferry'); ?></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Additional Top Header', 'ferry'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><?php esc_html_e('Social Icons + Menu + Header text option', 'ferry'); ?></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Social Icons', 'ferry'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Boxed & Wide layout option', 'ferry'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Light & Dark Color skin', 'ferry'); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Woocommerce Compatible', 'ferry'); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Woocommerce Page Layouts', 'ferry'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Translation Ready', 'ferry'); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('WPML Compatible', 'ferry'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Polylang Compatible', 'ferry'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Footer Copyright Editor', 'ferry'); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Demo Content', 'ferry'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Support', 'ferry'); ?></h3></td>
						<td><?php esc_html_e('Forum', 'ferry'); ?></td>
						<td><?php esc_html_e('Forum + Emails/Support Ticket', 'ferry'); ?></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('MailChimp Subscriber', 'ferry'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					
					<tr>
						<td><h3><?php esc_html_e('Services widget', 'ferry'); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Call to Action widget', 'ferry'); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Featured Single page widget', 'ferry'); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Featured widget (Recent Work/Portfolio)', 'ferry'); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Testimonial Widget', 'ferry'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Featured Posts', 'ferry'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Our Clients widget', 'ferry'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					
					<tr>
						<td><h3><?php esc_html_e('Prizing Widget', 'ferry'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					
					<tr>
						<td><h3><?php esc_html_e('About us Template', 'ferry'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					
					<tr>
						<td><h3><?php esc_html_e('Teams Widget', 'ferry'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					
					<tr>
						<td><h3><?php esc_html_e('Portfolio 2 , 3 , 4 Column Template', 'ferry'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					
					<tr>
						<td><h3><?php esc_html_e('Prizing Template Template', 'ferry'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					
					<tr>
						<td><h3><?php esc_html_e('Contact us Template', 'ferry'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					
					
					<tr>
						<td></td>
						<td></td>
						<td class="btn-wrapper">
							<a href="<?php echo esc_url( apply_filters( 'ferry_pro_theme_url', 'https://themeansar.com/themes/ferry-pro/' ) ); ?>" class="button button-secondary docs" target="_blank"><?php esc_html_e( 'View Pro', 'ferry' ); ?></a>
						</td>
					</tr>
				</tbody>
			</table>

		</div>
		<?php
	}
}

endif;

return new ferry_Admin();
