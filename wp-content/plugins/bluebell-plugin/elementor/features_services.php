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
class Features_Services extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'bluebell_features_services';
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
		return esc_html__( 'Features_Services', 'bluebell' );
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
			'features_services',
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
			'main_title',
			[
				'label'       => __( 'Main Title', 'bluebell' ),
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
				'seperator' => 'before',
				'default' => 
				[
					['title' => esc_html__('High Speed Wifi', 'bluebell')],
					['title' => esc_html__('Pick & Drop Facility', 'bluebell')],
					['title' => esc_html__('Smart TV', 'bluebell')],
					['title' => esc_html__('Swimming Pool', 'bluebell')],
					['title' => esc_html__('Breakfast Included', 'bluebell')],
					['title' => esc_html__('Shower Bathtub', 'bluebell')]
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
			'style_two',
			[
				'label'   => esc_html__( 'Choose Different Style', 'bluebell' ),
				'label_block' => true,
				'type'    => Controls_Manager::SELECT,
				'default' => 'one',
				'options' => array(
					'one' => esc_html__( 'Choose Light BG Color', 'bluebell' ),
					'two' => esc_html__( 'Choose Dark BG Color', 'bluebell' ),
					'three' => esc_html__( 'Choose Light BG With Top Space', 'bluebell' ),
				),
			]
		);
		$this->add_control(
			 'show_bottom_border',
			[
				'label'       => __( 'Enable/Disable Bottom Border', 'bluebell' ),
                'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'bluebell' ),
				'label_off' => __( 'Hide', 'bluebell' ),
				'return_value' => 'yes',
				'default' => 'no',
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
         
 	<!-- amenities -->
    <section class="<?php if($settings['style_two'] == 'three') echo 'amenities-section pt_120 light-bg mx-60 border-shape-bottom'; elseif($settings['style_two'] == 'two') echo 'amenities-section-three'; else echo 'amenities-section light-bg mx-60 border-shape-bottom'; ?>">
        <div class="auto-container">
            <div class="title-box text-center">
                <?php if($settings['sub_title']){ ?><div class="sub-title"><?php echo wp_kses($settings['sub_title'], true); ?></div><?php } ?>
                <?php if($settings['main_title']){ ?><h2 class="sec-title <?php if($settings['style_two'] == 'two') echo 'text-light'; else echo ''; ?>"><?php echo wp_kses($settings['main_title'], true); ?></h2><?php } ?>
            </div>

            <div class="row">
               <?php foreach($settings['slides'] as $key => $item): ?>
                <div class="col-lg-4 amenities-block">
                    <div class="inner-box">
                        <div class="icon"><i class="<?php echo esc_attr($item['icons']);?>"></i></div>
                        <h1><?php echo wp_kses($item['title'], true); ?></h1>
                        <div class="text"><?php echo wp_kses($item['text'], true); ?></div>
                    </div>                    
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>        
    
	<?php if($settings['show_bottom_border']){ ?>
    <div class="auto-container">
        <div class="boder-bottom-three"></div>
    </div>
    <?php } ?>
	
	<?php 
	}

}