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
class Slider_V1 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'bluebell_slider_v1';
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
		return esc_html__( 'Slider V1', 'bluebell' );
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
			'slider_v1',
			[
				'label' => esc_html__( 'Slider V1', 'bluebell' ),
			]
		);
		$this->add_control(
             'slides', 
			  	[
					'type' => Controls_Manager::REPEATER,
					'separator' => 'before',
					'default' => 
				[
					['title1' => esc_html__('Launch small Restaurant', 'bluebell')],
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
						'name' => 'title1',
						'label' => esc_html__('Title', 'bluebell'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'bluebell')
					],
					[
						'name' => 'text1',
						'label' => esc_html__('Description', 'bluebell'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'bluebell')
					],
					[
						'name' => 'btn_title',
						'label' => esc_html__('Button Title', 'bluebell'),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
						'default' => esc_html__('', 'bluebell')
					],
					[
						'name' => 'btn_link',
						'label' => __( 'External Url', 'bluebell' ),
						'type' => Controls_Manager::URL,
						'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
						'show_external' => true,
						'default' => ['url' => '','is_external' => true,'nofollow' => true,],
					],
				],
				'title_field' => '{{title1}}',
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
			'booking_form_url',
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
    <section class="banner-section">
        <div class="swiper-container banner-slider">
            <div class="swiper-wrapper">
                <!-- Slide Item -->
                <?php foreach($settings['slides'] as $key => $item): ?>
                <div class="swiper-slide" style="background-image: url(<?php echo esc_url(wp_get_attachment_url($item['bg_image']['id'])); ?>);">
                    <div class="content-outer">
                        <div class="content-box">
                            <div class="inner">
                                <?php if($item['title1']){ ?><h1 class="banner-title"><?php echo wp_kses($item['title1'], true); ?></h1><?php } ?>
                                <?php if($item['text1']){ ?><div class="text"><?php echo wp_kses($item['text1'], true); ?></div><?php } ?>
                                <div class="video-box">
                                    <?php if($item['btn_link']['url']){ ?><div class="video-btn"><a href="<?php echo esc_url($item['btn_link']['url']);?>" class="overlay-link play-now ripple" data-fancybox="" data-caption=""><i class="fas fa-play"></i></a></div><?php } ?>
                                    <?php if($item['btn_title']){ ?><span><?php echo wp_kses($item['btn_title'], true);?></span><?php } ?>
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
    </section>
    <!-- End Bnner Section -->

    <?php if($settings['show_availability']):?>
    <!-- Check availability -->
    <div class="check-availability">
        <div class="auto-container">
            <div class="form border-shape-top">
                <?php echo do_shortcode($settings['booking_form_url']); ?>
            </div>
        </div>
    </div>        
    <?php endif; ?>     
        
   <?php 
   }
}