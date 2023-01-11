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
class Our_Facilities extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'bluebell_our_facilities';
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
		return esc_html__( 'Our Facilities', 'bluebell' );
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
			'our_facilities',
			[
				'label' => esc_html__( 'Our Facilities', 'bluebell' ),
			]
		);
		$this->add_control(
			'sub_title',
			[
				'label'       => __( 'Sub Title', 'bluebell' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your sub title', 'bluebell' ),
			]
		);
		$this->add_control(
			'title',
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
			'text1',
			[
				'label'       => __( 'Text 1', 'bluebell' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Text 1', 'bluebell' ),
			]
		);
		$this->add_control(
			'text2',
			[
				'label'       => __( 'Text 2', 'bluebell' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Text 2', 'bluebell' ),
			]
		);
		$this->add_control(
			 'loop', 
				[
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
				[
					['title2' => esc_html__('Swimming Pool Fun', 'bluebell')],
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
						'name' => 'sub_title2',
						'label' => esc_html__('Title', 'bluebell'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('Enter Title Here', 'bluebell')
					],
					[
						'name' => 'title2',
						'label' => esc_html__('Title', 'bluebell'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('Enter Title Here', 'bluebell')
					],
					[
						'name' => 'text3',
						'label' => esc_html__('Text3', 'bluebell'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('Enter Text Here', 'bluebell')
					],
					
				],
			'title_field' => '{{title2}}',
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
        
        
<!-- activities section -->
    <section class="activities-section light-bg mx-60 border-shape-top">
        <div class="auto-container">
            <?php if($settings['sub_title']){ ?><div class="sub-title"><?php echo wp_kses($settings['sub_title'], true); ?></div><?php } ?>
            <?php if($settings['title']){ ?><h2 class="sec-title"><?php echo wp_kses($settings['title'], true); ?></h2><?php } ?>
            <div class="top-text mb_40">
                <div class="row">
                    <div class="col-lg-6">
                        <?php if($settings['text1']){ ?><div class="text"><?php echo wp_kses($settings['text1'], true); ?> </div><?php } ?>
                    </div>
                    <div class="col-lg-6">
                        <div class="ps-lg-5 pe-lg-5">
                            <?php if($settings['text2']){ ?><div class="text"><?php echo wp_kses($settings['text2'], true); ?> </div><?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php foreach($settings['loop'] as $key => $item):?>
                <div class="col-lg-6">                    
                    <div class="inner-box">
                        <?php if($item['image']['id']){ ?><div class="image"><img src="<?php echo esc_url(wp_get_attachment_url($item['image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'bluebell'); ?>"></div><?php } ?>
                        <div class="lower-contant">
                            <?php if($item['sub_title2']){ ?><div class="text-two"><?php echo wp_kses($item['sub_title2'], true); ?></div><?php } ?>
                            <?php if($item['title2']){ ?><h5><?php echo wp_kses($item['title2'], true); ?></h5><?php } ?>
                            <?php if($item['text3']){ ?><div class="text-three"><?php echo wp_kses($item['text3'], true); ?> </div><?php } ?>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>
    </section>        
        
     
    
		<?php 
	}

}