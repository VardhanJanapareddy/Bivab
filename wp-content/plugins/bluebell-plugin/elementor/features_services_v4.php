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
class Features_Services_V4 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'bluebell_features_services_v4';
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
		return esc_html__( 'Features Services V4', 'bluebell' );
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
			'features_services_v4',
			[
				'label' => esc_html__( 'Features Services V4', 'bluebell' ),
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
		 'skills', 
			[
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
			[
				['title2' => esc_html__('Restaurant & Bar', 'bluebell')],
			],
			'fields' => 
				[
					[
						'name' => 'image',
						'label' => __( 'Image', 'bluebell' ),
						'type' => Controls_Manager::MEDIA,
						'default' => ['url' => Utils::get_placeholder_image_src(),],
					],
					[
						'name' => 'sub_title2',
						'label' => esc_html__('Sub Title', 'bluebell'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('Enter Sub Title Here', 'bluebell')
					],
					[
						'name' => 'title2',
						'label' => esc_html__('Title', 'bluebell'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('Enter Title Here', 'bluebell')
					],
					[
						'name' => 'text',
						'label' => esc_html__('Text', 'bluebell'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('Enter Text Here', 'bluebell')
					],
					[
						'name' => 'time',
						'label' => esc_html__('Time', 'bluebell'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('Enter Time Here', 'bluebell')
					],
					[
						'name' => 'btn_title',
						'label' => esc_html__('Button Title v1', 'bluebell'),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
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
      
	<!-- service section four -->
    <section class="service-section-four light-bg mx-60 border-shape-top border-shape-bottom">
        <div class="auto-container">
            <?php if($settings['sub_title']){ ?><div class="service-title text-center"><?php echo wp_kses($settings['sub_title'], true); ?></div><?php } ?>
            <?php if($settings['title']){ ?><div class="text text-center"><?php echo wp_kses($settings['title'], true); ?></div><?php } ?>
            <div class="services-block-wrapper">
                <?php foreach($settings['skills'] as $key => $item):?>
                <div class="service-block-three">
                    <div class="row">
                        <?php if($item['image']['id']){ ?>
                        <div class="col-lg-7 image-column">
                            <div class="image"><img src="<?php echo esc_url(wp_get_attachment_url($item['image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'bluebell'); ?>"></div>
                        </div>
                        <?php } ?>
                        <div class="col-lg-5 content-column">
                            <div class="content">
                            	<?php if($item['sub_title2']){ ?> <div class="sub-title"><?php echo wp_kses($item['sub_title2'], true); ?></div><?php } ?>
                                <?php if($item['title2']){ ?><h2 class="sec-title small mb-30"><?php echo wp_kses($item['title2'], true); ?></h2><?php } ?>
                                <?php if($item['text']){ ?><div class="text-two"><?php echo wp_kses($item['text'], true); ?></div><?php } ?>
                                <?php if($item['time']){ ?><div class="time"><?php echo wp_kses($item['time'], true); ?></div><?php } ?>
                                <?php if($item['btn_title']){ ?><div class="link-btn"><a href="<?php echo esc_url($item['btn_link']['url']); ?>" class="theme-btn btn-style-two btn-lg"><span><?php echo wp_kses($item['btn_title'], true); ?></span></a></div><?php } ?>
                            </div>
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