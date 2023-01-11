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
class Map_V2 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'bluebell_map_v2';
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
		return esc_html__( 'Map_V2', 'bluebell' );
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
			'map_v2',
			[
				'label' => esc_html__( 'Map V2', 'bluebell' ),
			]
		);
		$this->add_control(
			'google_map_code',
			[
				'label'  => __( 'Google Map Iframe Code', 'bluebell' ),
				'type'   => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Google Map Iframe Code', 'bluebell' )
			]
		);
		$this->add_control(
			'text',
			[
				'label'       => __( 'Text', 'bluebell' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your text', 'bluebell' ),
			]
		);
		$this->add_control(
			'icon_image',
			[
			  'label' => __( 'Icon Image', 'nitech' ),
			  'type' => Controls_Manager::MEDIA,
			  'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'address',
			[
				'label'       => __( 'Address', 'bluebell' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your address', 'bluebell' ),
			]
		);
		$this->add_control(
             'slides', 
			  	[
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
				[
					['title' => esc_html__('By Car', 'bluebell')],
					['title' => esc_html__('By Airplane', 'bluebell')],
				],
				'fields' => 
				[
					[
						'name' => 'title',
						'label' => esc_html__('Title', 'bluebell'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('Enter Title Here', 'bluebell')
					],
					[
						'name' => 'description',
						'label' => esc_html__('Description', 'bluebell'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('Enter Description Here', 'bluebell')
					],
					
				],
				'title_field' => '{{title}}',
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
        
        
 	<!-- map section -->
    <section class="map-section light-bg mx-60 border-shape-bottom">
        <div class="auto-container">
            
            <div class="row no-gutters">
                <?php if($settings['google_map_code']){?>
                <div class="col-lg-6">
                    <div class="contact-map">
                         <?php echo do_shortcode( $settings['google_map_code'] );?>
                    </div>
                </div>
                <?php } ?>
                
                <div class="col-lg-6">
                    <div class="content-column">
                        <?php if($settings['text']){ ?><div class="text"><?php echo wp_kses($settings['text'], $allowed_tags); ?></div><?php } ?>
                        <?php if($settings['address']){ ?><h4><img src="<?php echo esc_url(wp_get_attachment_url($settings['icon_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'bluebell'); ?>"><span><?php echo wp_kses($settings['address'], $allowed_tags); ?></span></h4><?php } ?>
                        <div class="boder-bottom-three mb_40"></div>
                        
                        <div class="row">
                           <?php foreach($settings['slides'] as $key => $item): ?>
                            <div class="col-md-6">
                                <h5><?php echo wp_kses($item['title'], $allowed_tags); ?></h5>
                                <div class="text-two mb_30"><?php echo wp_kses($item['description'], $allowed_tags); ?></div>
                            </div>
                           <?php endforeach; ?>
                        </div>
                    
                    </div>
                </div>
            </div> 
        </div>
    </section>        
        
    <?php 	
	}
}