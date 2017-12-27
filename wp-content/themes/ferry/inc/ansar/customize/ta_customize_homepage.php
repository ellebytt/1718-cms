<?php
function ferry_homepage_setting( $wp_customize ) {


	/* Option list of all post */	
    $options_posts = array();
    $options_posts_obj = get_posts('posts_per_page=-1');
    $options_posts[''] = __( 'Choose Post', 'ferry' );
    foreach ( $options_posts_obj as $posts ) {
    	$options_posts[$posts->ID] = $posts->post_title;
    }
	
	
	
	$options_pages = array();
    $options_pages_obj = get_pages('posts_per_page=-1');
    $options_pages[''] = __( 'Choose Post', 'ferry' );
    foreach ( $options_pages_obj as $posts ) {
    	$options_pages[$posts->ID] = $posts->post_title;
    }
	
			

	 

    

    class ferry_Theme_Support_news extends WP_Customize_Control {
        public function render_content() {
           
		   echo __('Check out the','ferry');
		?>
           <a href="<?php echo esc_url( __('http://themeansar.com/themes/ferry', 'ferry')); ?>" target="_blank" ><?php _e( 'PRO version','ferry' ); ?></a><?php
		 echo __(' Want to display News & Event With Categorization','ferry');
			
			
        }
    } 
		$wp_customize->add_panel( 'homepage_setting', array(
                'priority'       => 30,
                'capability'     => 'edit_theme_options',
                'title'      => __('Homepage Section Settings', 'ferry'),
            ) );

            /* --------------------------------------
            =========================================
            Slider Section
            =========================================
            -----------------------------------------*/ 
            $wp_customize->add_section(
                'ferry_slider_section_settings', array(
                'title' => __('Slider Setting','ferry'),
				'panel'  => 'homepage_setting',
            ) );

			//Enable slider
			$wp_customize->add_setting(
		    	'ferry_slider_enable', array(
		        'capability'     => 'edit_theme_options',
		        'sanitize_callback' => 'ferry_homepage_sanitize_checkbox',
		    ) );	
		    $wp_customize->add_control( 
		    	'ferry_slider_enable', array(
		    	'label'   => __('Enable Slider Section','ferry'),
		    	'section' => 'ferry_slider_section_settings',
		    	'type' => 'checkbox',
		    ) );
			
			
			//Select Post One
			$wp_customize->add_setting('slider_post_one',array(
				'capability'=>'edit_theme_options',
				'sanitize_callback'=>'sanitize_text_field',
			));
			
			$wp_customize->add_control('slider_post_one',array(
				'label' => __('Select Post One','ferry'),
				'section'=>'ferry_slider_section_settings',
				'type'=>'select',
				'choices'=>$options_posts,
			));
			
			//Select Post Two
			$wp_customize->add_setting('slider_post_two',array(
				'capability'=>'edit_theme_options',
				'sanitize_callback'=>'sanitize_text_field',
			));
			
			$wp_customize->add_control('slider_post_two',array(
				'label' => __('Select Post Two','ferry'),
				'section'=>'ferry_slider_section_settings',
				'type'=>'select',
				'choices'=>$options_posts,
			));
			
			//Select Post Three
			$wp_customize->add_setting('slider_post_three',array(
				'capability'=>'edit_theme_options',
				'sanitize_callback'=>'sanitize_text_field',
			));
			
			$wp_customize->add_control('slider_post_three',array(
				'label' => __('Select Post Three','ferry'),
				'section'=>'ferry_slider_section_settings',
				'type'=>'select',
				'choices'=>$options_posts,
			));
		    
			/* --------------------------------------
            =========================================
            Ads Section
            =========================================
            -----------------------------------------*/  
            // add section to manage adss
            $wp_customize->add_section(
                'ferry_ads_section_settings', array(
                'title' => __('Ads Setting','ferry'),
                'description' => '',
                'panel'  => 'homepage_setting',
            ) );

            //Enable slider
			$wp_customize->add_setting(
		    	'ferry_ads_enable', array(
		        'capability'     => 'edit_theme_options',
		        'sanitize_callback' => 'ferry_homepage_sanitize_checkbox',
		    ) );	
		    $wp_customize->add_control( 
		    	'ferry_ads_enable', array(
		    	'label'   => __('Enable Ads Section','ferry'),
		    	'section' => 'ferry_ads_section_settings',
		    	'type' => 'checkbox',
		    ) );
			
			
			 // Ads Setting
            $wp_customize->add_setting(
            	'ferry_ads_title', array(
                'default' => '',
                'capability'     => 'edit_theme_options',
                'sanitize_callback' => 'sanitize_text_field',
            ) );  
            $wp_customize->add_control( 
            	'ferry_ads_title', array(
                'label'   => __('Ads Title','ferry'),
                'section' => 'ferry_ads_section_settings',
                'type' => 'text',
            ) );
			
			$wp_customize->add_setting(
            	'ferry_ads_subtitle', array(
                'default' => '',
                'capability'     => 'edit_theme_options',
                'sanitize_callback' => 'sanitize_text_field',
            ) );  
            $wp_customize->add_control( 
            	'ferry_ads_subtitle', array(
                'label'   => __('Ads Subtitle','ferry'),
                'section' => 'ferry_ads_section_settings',
                'type' => 'text',
            ) );
			
			
			//Select Ads One
			$wp_customize->add_setting('ferry_ads_one',array(
				'capability'=>'edit_theme_options',
				'sanitize_callback'=>'sanitize_text_field',
			));
			
			$wp_customize->add_control('ferry_ads_one',array(
				'label' => __('Select Ads One','ferry'),
				'section'=>'ferry_ads_section_settings',
				'type'=>'select',
				'choices'=>$options_pages,
			));
			
			//Select Ads Two
			$wp_customize->add_setting('ferry_ads_two',array(
				'capability'=>'edit_theme_options',
				'sanitize_callback'=>'sanitize_text_field',
			));
			
			$wp_customize->add_control('ferry_ads_two',array(
				'label' => __('Select Ads Two','ferry'),
				'section'=>'ferry_ads_section_settings',
				'type'=>'select',
				'choices'=>$options_pages,
			));
			
			//Select Ads Three
			$wp_customize->add_setting('ferry_ads_three',array(
				'capability'=>'edit_theme_options',
				'sanitize_callback'=>'sanitize_text_field',
			));
			
			$wp_customize->add_control('ferry_ads_three',array(
				'label' => __('Select Ads Three','ferry'),
				'section'=>'ferry_ads_section_settings',
				'type'=>'select',
				'choices'=>$options_pages,
			));
			
		    /* --------------------------------------
		    =========================================
		    product Section
		    =========================================
		    -----------------------------------------*/  
		    // add section to manage 
		    $wp_customize->add_section(
		    	'ferry_product_section_settings', array(
		        'title' => __('Shop Setting','ferry'),
		        'panel'  => 'homepage_setting',
		    ) );

		    //Enable product
			$wp_customize->add_setting(
		    	'ferry_product_enable', array(
		        'capability'     => 'edit_theme_options',
		        'sanitize_callback' => 'ferry_homepage_sanitize_checkbox',
		    ) );	
		    $wp_customize->add_control( 
		    	'ferry_product_enable', array(
		    	'label'   => __('Enable Product Section','ferry'),
		    	'section' => 'ferry_product_section_settings',
		    	'type' => 'checkbox',
		    ) );

            //product Title setting
            $wp_customize->add_setting(
                'ferry_product_title', array(
				'capability'     => 'edit_theme_options',
                'sanitize_callback' => 'ferry_homepage_title_sanitize_text',
            ) );  
            $wp_customize->add_control( 
            	'ferry_product_title', array(
                'label'   => __('Product Title','ferry'),
                'section' => 'ferry_product_section_settings',
                'type' => 'text',
            ) );

            //product Subtitle setting
            $wp_customize->add_setting(
                'ferry_product_subtitle', array(
                'capability'     => 'edit_theme_options',
                'sanitize_callback' => 'ferry_homepage_title_sanitize_text',
            ) );  
            $wp_customize->add_control( 'ferry_product_subtitle',array(
                'label'   => __('Product Subtitle','ferry'),
                'section' => 'ferry_product_section_settings',
                'type' => 'textarea',)  );
				
			class ferry_product_Customize_Control extends WP_Customize_Control {
				
				public $type = 'new_menu';
				public function render_content() {
				?>
				<p>
				<a href="<?php echo esc_url('https://woocommerce.com/videos/installing-woocommerce/'); ?>" class="button"  target="_blank"><?php _e( 'Click here to install woocommerce plugin', 'ferry' ); ?></a></br>
				<?php _e('Install woocommerce plugin to show Shop related product','ferry'); ?>
				</p>
				<?php
				}
			}
			
			$wp_customize->add_setting('woo_product',	array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			) );
			
			$wp_customize->add_control( new ferry_product_Customize_Control( $wp_customize, 'woo_product', array(	
				'section' => 'ferry_product_section_settings',
			) )	);	
			

		    /* --------------------------------------
		    =========================================
		    Latest News Section
		    =========================================
		    -----------------------------------------*/
		    // add section to manage Latest News
		    $wp_customize->add_section(
		    	'news_section_settings', array(
		        'title' => __('News & Events Setting','ferry'),
				'panel'  => 'homepage_setting'
		    ) );

		    //Enable News
			$wp_customize->add_setting(
		    	'ferry_news_enable', array(
		        'capability'     => 'edit_theme_options',
		        'sanitize_callback' => 'ferry_homepage_sanitize_checkbox',
		    ) );	
		    $wp_customize->add_control( 
		    	'ferry_news_enable', array(
		    	'label'   => __('Enable News Section','ferry'),
		    	'section' => 'news_section_settings',
		    	'type' => 'checkbox',
		    ) );

		    //Latest News Background Image
		    $wp_customize->add_setting( 
		    	'news_background', array(
		    	'sanitize_callback' => 'ferry_sanitize_image',
		    ) );
		    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 
		    	'news_background', array(
		    	'label'    => __( 'Choose Background Image', 'ferry' ),
		    	'section'  => 'news_section_settings',
		    	'settings' => 'news_background', ) 
		    ) );

		    // hide meta content
           
			$wp_customize->add_setting(
                'disable_news_meta', array(
                'default' => 'false',
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'sanitize_text_field',
            ) );
            $wp_customize->add_control(
                'disable_news_meta', array(
                'label' => __('Hide/Show Blog Meta:- Like author name,categories','bizwhoop'),
                'section' => 'news_section_settings',
                'type' => 'checkbox',
            ) );
			

		    // Latest News Title Setting
		    $wp_customize->add_setting(
		    	'ferry_news_title', array(
				'capability'     => 'edit_theme_options',
		        'sanitize_callback' => 'ferry_homepage_title_sanitize_text',
		    ) );	
		    $wp_customize->add_control( 
		    	'ferry_news_title',array(
		    	'label'   => __('Latest News Title','ferry'),
		    	'section' => 'news_section_settings',
		    	'type' => 'text',
		    ) );

		    // Latest News Subtitle Setting
		    $wp_customize->add_setting(
		    	'ferry_news_subtitle', array(
				'capability'     => 'edit_theme_options',
		        'sanitize_callback' => 'ferry_homepage_title_sanitize_text',
		    ) );  
		    $wp_customize->add_control( 
		    	'ferry_news_subtitle',array(
		    	'label'   => __('Latest News Subtitle','ferry'),
		    	'section' => 'news_section_settings',
		    	'type' => 'textarea',
		    ) );	

		    $wp_customize->add_setting( 'ferry_news_section', array(
                'sanitize_callback' => 'ferry_pro_version_sanitize_text'
            ) );
            
            $wp_customize->add_control( new ferry_Theme_Support_news( $wp_customize, 'ferry_news_section', array(
                'section' => 'news_section_settings',)
            ) );

            
			function ferry_pro_version_sanitize_text( $input ) {

			return wp_kses_post( force_balance_tags( $input ) );

			}
			
			
			function ferry_homepage_title_sanitize_text ( $input ) {

			return wp_kses_post( force_balance_tags( $input ) );

			}
			
			function ferry_homepage_sanitize_checkbox( $input ) {
			// Boolean check 
			return ( ( isset( $input ) && true == $input ) ? true : false );
			}
	
	
			function ferry_sanitize_image( $image, $setting ) {
			/*
			 * Array of valid image file types.
			 *
			 * The array includes image mime types that are included in wp_get_mime_types()
			 */
			$mimes = array(
				'jpg|jpeg|jpe' => 'image/jpeg',
				'gif'          => 'image/gif',
				'png'          => 'image/png',
				'bmp'          => 'image/bmp',
				'tif|tiff'     => 'image/tiff',
				'ico'          => 'image/x-icon'
			);
			// Return an array with file extension and mime_type.
			$file = wp_check_filetype( $image, $mimes );
			// If $image has a valid mime_type, return it; otherwise, return the default.
			return ( $file['ext'] ? $image : $setting->default );
}
}

add_action( 'customize_register', 'ferry_homepage_setting' );
?>