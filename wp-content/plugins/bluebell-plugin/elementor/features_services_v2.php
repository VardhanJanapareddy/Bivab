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
class Features_Services_V2 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'bluebell_features_services_v2';
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
		return esc_html__( 'Features_Services_V2', 'bluebell' );
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
			'features_services_v2',
			[
				'label' => esc_html__( 'Features Services', 'bluebell' ),
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
				'placeholder' => __( 'Enter your main title', 'bluebell' ),
			]
		);
		$this->add_control(
             'slides', 
			  	[
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				 [
					['title' => esc_html__('High Speed Wifi', 'bluebell')],
				],
				'fields' => 
				[
					[
						 'name' => 'icons',
						 'label' => esc_html__('Select Icon', 'bluebell'),
						 'label_block' => true,
						 'type' => Controls_Manager::SELECT2,
						 'options' => get_fontawesome_icons(),
					],
					[
						'name' => 'title',
						'label' => esc_html__('Title', 'bluebell'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('Enter Title Here', 'bluebell')
					],
					[
						'name' => 'text',
						'label' => esc_html__('Description', 'bluebell'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
					],
				],
				'title_field' => '{{title}}',
              ]
        );
		$this->add_control(
			'image',
			[
			  'label' => __( 'Image', 'bluebell' ),
			  'type' => Controls_Manager::MEDIA,
			  'default' => ['url' => Utils::get_placeholder_image_src(),],
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
        
 	<!-- aminities section two -->
    <section class="aminities-section-two light-bg mx-60">
        <div class="auto-container">
            <div class="outer-box">                    
                <div class="row gutters-5">
                    <div class="col-xl-6 content-column">
                        <div class="content-block">
                            <?php if($settings['sub_title'] || $settings['title']){ ?>
                            <div class="title-box">
                                <?php if($settings['sub_title']){ ?><div class="sub-title"><?php echo wp_kses($settings['sub_title'], true); ?></div><?php } ?>
                                <?php if($settings['title']){ ?><h2 class="sec-title text-light"><?php echo wp_kses($settings['title'], true); ?></h2><?php } ?>
                            </div>
                            <?php } ?>
                            <div class="row">
                                <?php foreach($settings['slides'] as $key => $item): ?>
                                <div class="col-md-6 amenities-block style-two">
                                    <div class="inner-box">
                                        <div class="icon"><i class="<?php echo esc_attr($item['icons']);?>"></i></div>
                                        <h1><?php echo wp_kses($item['title'], true); ?></h1>
                                        <div class="text"><?php echo wp_kses($item['text'], true); ?></div>
                                    </div>                    
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <?php if($settings['image']['id']){ ?>
                    <div class="col-xl-6 image-column">
                        <div class="bg" style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['image']['id'])); ?>);"></div>
                        <div class="image"><img src="<?php echo esc_url(wp_get_attachment_url($settings['image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'bluebell'); ?>"></div>
                    </div>
                    <?php } ?>
                </div>
            </div>     
        </div>    
    </section>        
     	
	<?php 
	}
}