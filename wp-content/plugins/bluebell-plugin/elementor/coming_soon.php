<?php

namespace BLUEBELLPLUGIN\Element;

use Elementor\Controls_Manager;
use Elementor\Controls_Stack;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Border;
use Elementor\Repeater;
use Elementor\Widget_Base;
use Elementor\Utils;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Plugin;

/**
 * Elementor button widget.
 * Elementor widget that displays a button with the ability to control every
 * aspect of the button design.
 *
 * @since 1.0.0
 */
class Coming_Soon extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'bluebell_coming_soon';
	}

	/**
	 * Get widget title.
	 * Retrieve button widget title.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Coming_Soon', 'bluebell' );
	}

	/**
	 * Get widget icon.
	 * Retrieve button widget icon.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-library-open';
	}

	/**
	 * Get widget categories.
	 * Retrieve the list of categories the button widget belongs to.
	 * Used to determine where to display the widget in the editor.
	 *
	 * @since  2.0.0
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'bluebell' ];
	}
	
	/**
	 * Register button widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since  1.0.0
	 * @access protected
	 */
	protected function _register_controls() {
		$this->start_controls_section(
			'coming_soon',
			[
				'label' => esc_html__( 'Coming_Soon', 'bluebell' ),
			]
		);
		$this->add_control(
			'bg_img',
			[
			  'label' => __( 'Background Image', 'nitech' ),
			  'type' => Controls_Manager::MEDIA,
			  'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
	    );
		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'nitech' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your title', 'nitech' ),
			]
		);
		$this->add_control(
			'counter_value',
			[
				'label'       => __( 'Counter Value', 'nitech' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Counter Value', 'nitech' ),
				'default' => esc_html__('2022/12/31', 'nitech'),
			]
		);
		$this->add_control(
			'text',
			[
				'label'       => __( 'Text', 'nitech' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Text', 'nitech' ),
			]
		);
		$this->add_control(
			'btn_title',
			[
				'label'       => __( 'Button Title', 'eminent' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Button Title', 'eminent' ),
				'default'     => __( '', 'eminent' ),
			]
		);
		
		$this->end_controls_section();
	}

	/**
	 * Render button widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since  1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		$allowed_tags = wp_kses_allowed_html('post');
	?>
        
        
    <!--Comming Soon-->
    <section class="comming-soon" <?php if($settings['bg_img']['id']) { ?>style="background-image:url(<?php echo wp_get_attachment_url($settings['bg_img']['id']);?>)"<?php } ?>>
        <div class="auto-container">
            <div class="content">
                <div class="content-inner">
                    <h2><?php echo wp_kses( $settings['title'], true );?></h2>
                    <div class="time-counter"><div class="time-countdown clearfix" data-countdown="<?php echo esc_attr( $settings['counter_value'] );?>"></div></div>
                    <div class="text"><?php echo wp_kses( $settings['text'], true );?></div>
                    <!--Emailed Form-->
                    <div class="emailed-form">
                        <form class="ajax-sub-form" method="post" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <div class="form-group">
                                <input type="email" name="s" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="<?php echo esc_attr__( 'Subscribe now', 'bluebell' ); ?>" id="subscription-email">
                                <button class="theme-btn btn-style-one" type="submit"><?php echo wp_kses( $settings['btn_title'], true );?></button>
                                <label class="subscription-label" for="subscription-email"></label>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <!--End Comming Soon-->       
        
    <?php 
	}
}