<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://zachtrice.com
 * @since      0.1.0
 *
 * @package    Perfecto_WP_Instagram
 * @subpackage Perfecto_WP_Instagram/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Perfecto_WP_Instagram
 * @subpackage Perfecto_WP_Instagram/public
 * @author     ZachTRice <contact@zachtrice.com>
 */
class Perfecto_WP_Instagram_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    0.1.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    0.1.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    0.1.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    0.1.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Perfecto_WP_Instagram_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Perfecto_WP_Instagram_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/perfecto-wp-instagram-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    0.1.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Perfecto_WP_Instagram_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Perfecto_WP_Instagram_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/perfecto-wp-instagram-public.js', array( 'jquery' ), $this->version, false );

	}

}


/**
 * Perfecto Widget Class
 */
class perfecto_widget extends WP_Widget {
 
 
    /** constructor -- name this the same as the class above */
    function perfecto_widget() {
        parent::WP_Widget(false, $name = 'Perfecto! Instagram');	
    }
 
    /** @see WP_Widget::widget -- do not rename this */
    function widget($args, $instance) {	
        extract( $args );
        $title 		= apply_filters('widget_title', $instance['title']);
        $instagram_tag 	= $instance['instagram_tag'];
        $instagram_photos 	= $instance['instagram_photos']
        ?>
              <?php echo $before_widget; ?>
                  <?php if ( $title )
                        echo $before_title . $title . $after_title; ?>
                        <div id="perfecto_instagram" class="perfecto_photos-<?php echo $instagram_photos; ?>" data-tag="<?php echo $instagram_tag; ?>" data-photos="<?php echo $instagram_photos; ?>"><ul class="instagram-pics instagram-size-large"></ul></div>
              <?php echo $after_widget; ?>

        <?php
    }
 
    /** @see WP_Widget::update -- do not rename this */
    function update($new_instance, $old_instance) {		
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['instagram_tag'] = strip_tags($new_instance['instagram_tag']);
		$instance['instagram_photos'] = strip_tags($new_instance['instagram_photos']);
        return $instance;
    }
 
    /** @see WP_Widget::form -- do not rename this */
    function form($instance) {	
 
        $title 		= esc_attr($instance['title']);
        $instagram_tag	= esc_attr($instance['instagram_tag']);
        $instagram_photos	= esc_attr($instance['instagram_photos']);
        ?>
         <p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
		<p>
          <label for="<?php echo $this->get_field_id('instagram_tag'); ?>"><?php _e('Instagram Hashtag'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('instagram_tag'); ?>" name="<?php echo $this->get_field_name('instagram_tag'); ?>" type="text" value="<?php echo $instagram_tag; ?>" />
        </p>
        <p>
          <label for="<?php echo $this->get_field_id('instagram_photos'); ?>"><?php _e('# of Photos'); ?></label> 
          <input class="widefat perfecto_insta_photos" id="<?php echo $this->get_field_id('instagram_photos'); ?>" name="<?php echo $this->get_field_name('instagram_photos'); ?>" type="number" min="0" max="66" onchange="handleChange(this);" value="<?php echo $instagram_photos; ?>" />
        </p>

        <script>
		  function handleChange(input) {
		    if (input.value < 0) input.value = 0;
		    if (input.value > 66) input.value = 66;
		  }
		</script>

        <?php 
    }
 
 
} // end class perfecto_widget
add_action('widgets_init', create_function('', 'return register_widget("perfecto_widget");'));
