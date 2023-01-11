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
class Slider_V2 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'bluebell_slider_v2';
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
		return esc_html__( 'Slider V2', 'bluebell' );
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
			'slider_v2',
			[
				'label' => esc_html__( 'Slider V2', 'bluebell' ),
			]
		);
		$this->add_control(
             'slides', 
			  	[
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				[
					['title' => esc_html__('Boutique Hotel', 'bluebell')],
					['title' => esc_html__('Boutique Architecture', 'bluebell')],
					['title' => esc_html__('Enjoy Life <br> With Greenry', 'bluebell')]
				],
				'fields' => 
				[
					[
						'name' => 'bg_image',
						'label' => __( 'Slide Image', 'bluebell' ),
						'type' => Controls_Manager::MEDIA,
						'default' => ['url' => Utils::get_placeholder_image_src(),],
					],
					[
						'name' => 'title',
						'label' => esc_html__('Title', 'bluebell'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'bluebell')
					],
					[
						'name' => 'text',
						'label' => esc_html__('Description', 'bluebell'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'bluebell')
					],
				],
				'title_field' => '{{title}}',
			]
        );
		$this->add_control(
			 'show_availability',
			[
				'label'       => __( 'Enable/Disable Booking Form', 'bluebell' ),
                'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'bluebell' ),
				'label_off' => __( 'Hide', 'bluebell' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		$this->add_control(
			'booking_form_url2',
			[
				'label'       => __( 'Booking Form Url', 'bluebell' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Booking Form Url', 'bluebell' ),
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
        
 	<!-- Bnner Section -->
    <section class="banner-section style-two">
        <div class="swiper-container banner-slider">
            <div class="swiper-wrapper">
                <!-- Slide Item -->
          	   <?php foreach($settings['slides'] as $key => $item): ?>
                <div class="swiper-slide" style="background-image: url(<?php echo esc_url(wp_get_attachment_url($item['bg_image']['id'])); ?>);">
                    <div class="content-outer">
                        <div class="content-box">
                            <div class="inner">
                                <?php if($item['title']){ ?><h1 class="banner-title"><?php echo wp_kses($item['title'], true); ?></h1><?php } ?>
                                <?php if($item['text']){ ?><div class="text"><?php echo wp_kses($item['text'], true); ?><?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="banner-slider-nav style-three">
            <div class="banner-slider-control banner-slider-button-prev"><span><i class="fal fa-angle-right"></i></span></div>
            <div class="banner-slider-control banner-slider-button-next"><span><i class="fal fa-angle-right"></i></span> </div>
        </div>
        
        <!-- Check availability style three -->
        <?php if($settings['show_availability']):?>
        <div class="auto-container">
            <div class="bb-slider-two">
            	<div class="check-availability style-three">
                	<?php echo do_shortcode($settings['booking_form_url2']); ?>
                </div>
            </div>
        </div>
        <?php endif; ?> 
        
    </section>
    <!-- End Bnner Section -->        
     	
	<?php 
	}
}