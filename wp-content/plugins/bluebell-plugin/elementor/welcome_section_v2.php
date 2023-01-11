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
class Welcome_Section_V2 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'bluebell_welcome_section_v2';
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
		return esc_html__( 'Welcome_Section_V2', 'bluebell' );
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
			'welcome_section_v2',
			[
				'label' => esc_html__( 'Welcome_Section_V2', 'bluebell' ),
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
			'rate',
			[
				'label'       => __( 'Rate/Night', 'bluebell' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Rate per Night', 'bluebell' ),
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
				'placeholder' => __( 'Enter your Text', 'bluebell' ),
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
		$this->add_control(
			'icon',
			[
				'label' => esc_html__('Select Icon', 'bluebell'),
				'label_block' => true,
				'type' => Controls_Manager::SELECT2,
				'options' => get_fontawesome_icons(),
		  	]
		);
		$this->add_control(
			'title2',
			[
				'label'       => __( 'Title2', 'bluebell' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your second title', 'bluebell' ),
			]
		);
		$this->add_control(
			'text2',
			[
				'label'       => __( 'Text2', 'bluebell' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter Your Second Text', 'bluebell' ),
			]
		);
		$this->add_control(
			'btn_title2',
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
			'btn_link2',
				[
				  'label' => __( 'Button Url', 'bluebell' ),
				  'label_block' => true,
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
        
        
	<!-- Welcome Section seven -->
    <section class="welcome-section-seven">
        <div class="auto-container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="title-box">
                        <?php if($settings['sub_title']){ ?><div class="sub-title"><?php echo wp_kses($settings['sub_title'], true); ?></div><?php } ?>
                        <?php if($settings['title']){ ?><h2 class="sec-title text-light"><?php echo wp_kses($settings['title'], true); ?></h2><?php } ?>
                        <?php if($settings['rate']){ ?><div class="price"><?php echo wp_kses($settings['rate'], true); ?></div><?php } ?>
                        
                        <?php if($settings['text']){ ?>
                        <div class="text">
                            <?php echo wp_kses($settings['text'], true); ?>
                        </div>
                        <?php } ?>
						<?php if($settings['btn_title']){ ?><div class="link-btn"><a href="<?php echo esc_url($settings['btn_link']['url']); ?>" class="read-more-btn"><?php echo wp_kses($settings['btn_title'], true); ?></a></div><?php } ?>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="content-block">
                        <div class="inner-box">
							<?php if($settings['icon']){ ?><div class="icon"><i class="<?php echo esc_attr(str_replace( "icon ",  "", $settings['icon']));?>"></i></div><?php } ?>
                            <?php if($settings['title2']){ ?><h3><?php echo wp_kses($settings['title2'], true); ?></h3><?php } ?>
                            <?php if($settings['text2']){ ?><div class="text-two"><?php echo wp_kses($settings['text2'], true); ?></div><?php } ?>
                            <?php if($settings['btn_title2']){ ?><div class="link-btn"><a href="<?php echo esc_url($settings['btn_link2']['url']); ?>" class="theme-btn btn-style-two"><?php echo wp_kses($settings['btn_title2'], true); ?></a></div><?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <?php 
	}
}