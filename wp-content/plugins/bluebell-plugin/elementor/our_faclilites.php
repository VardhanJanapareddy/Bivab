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
class Our_Faclilites extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'bluebell_our_faclilites';
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
		return esc_html__( 'Our_Faclilites', 'bluebell' );
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
			'our_faclilites',
			[
				'label' => esc_html__( 'Our Faclilites', 'bluebell' ),
			]
		);
		$this->add_control(
             'slides', 
			  	[
					'type' => Controls_Manager::REPEATER,
					'separator' => 'before',
					'default' => 
				[
					['title' => esc_html__('Restaurant', 'bluebell')],
				],
				'fields' => 
				[
					[
						'name' => 'image',
						'label' => __( 'Slide BG Image', 'bluebell' ),
						'type' => Controls_Manager::MEDIA,
						'default' => ['url' => Utils::get_placeholder_image_src(),],
					],
					[
						'name' => 'title',
						'label' => esc_html__('Title', 'bluebell'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('Enter Title Here', 'bluebell')
					],
					[
						'name' => 'ext_url',
						'label' => __( 'External Url', 'bluebell' ),
						'label_block' => true,
						'type' => Controls_Manager::URL,
						'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
						'show_external' => true,
						'default' => [
							'url' => '',
							'is_external' => true,
							'nofollow' => true,
						],
					],
				],
				'title_field' => '{{title}}',
        	]
        );
		$this->add_control(
			'discount',
			[
				'label'       => __( 'Discount', 'bluebell' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Discount', 'bluebell' ),
			]
		);
		$this->add_control(
			'title2',
			[
				'label'       => __( 'Title', 'bluebell' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your title', 'bluebell' ),
			]
		);
		$this->add_control(
			'btn_title',
			[
				'label'       => __( 'Button Title', 'bluebell' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Button Title', 'bluebell' ),
				'default'     => __( '', 'bluebell' ),
			]
		);
		$this->add_control(
			'btn_link',
			[
			  'label' => __( 'Button Url', 'bluebell' ),
			  'type' => Controls_Manager::URL,
			  'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
			  'show_external' => true,
			  'default' => [
				'url' => '',
				'is_external' => true,
				'nofollow' => true,
			  ],
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
        
    <!-- faclilites section -->
    <section class="faclilites-section light-bg mx-60 border-shape-top">
        <div class="auto-container">
            <div class="row no-gutters">
                <?php foreach($settings['slides'] as $key => $item):?>
                <div class="col-lg-4 col-md-6 faclilites-block">
                    <div class="image">
                        <a href="<?php echo esc_url( $item['ext_url']['url'] );?>"><img src="<?php echo esc_url(wp_get_attachment_url($item['image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'bluebell'); ?>"></a>
                        <?php if($item['title']){ ?><div class="text"><?php echo wp_kses($item['title'], true); ?></div><?php } ?>
                    </div>
                </div>
                <?php endforeach;?> 
               
                <div class="col-lg-4 col-md-6 faclilites-block-with-text">
                    <div class="inner-box">
                        <?php if($settings['discount']){ ?><h4><?php echo wp_kses($settings['discount'], true); ?></h4><?php } ?>
                        <?php if($settings['title2']){ ?><div class="text-two"><?php echo wp_kses($settings['title2'], true); ?></div><?php } ?>
                        <?php if($settings['btn_title']){ ?><div class="link-btn"><a href="<?php echo esc_url($settings['btn_link']['url']); ?>" class="theme-btn btn-style-two btn-md"><span><?php echo wp_kses($settings['btn_title'], true); ?></span></a></div><?php } ?>
                    </div>
                </div>
            
           </div>
        </div>
    </section>        
       
	<?php 
	}
}