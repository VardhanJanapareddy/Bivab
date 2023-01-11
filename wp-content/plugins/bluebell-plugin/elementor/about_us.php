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
class About_Us extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'bluebell_about_us';
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
		return esc_html__( 'About Us', 'bluebell' );
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
			'about_us',
			[
				'label' => esc_html__( 'About US', 'bluebell' ),
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
			'sign_image',
			[
			  'label' => __( 'Signature Image', 'bluebell' ),
			  'type' => Controls_Manager::MEDIA,
			  'default' => ['url' => Utils::get_placeholder_image_src(),],
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
		$this->add_control(
			'show_award',
			[
				'label' => __( 'Hide/Show Award Section', 'bluebell' ),
				'type' => Controls_Manager::SWITCHER,
				'title' => esc_html__('Enable/Disable Award Section', 'bluebell'),
				'default' => true,
			]
		);
		$this->add_control(
			'icon',
			[
			  'label' => __( 'Icon Image', 'bluebell' ),
			  'type' => Controls_Manager::MEDIA,
			  'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'icon_title',
			[
				'label'       => __( 'Icon Title', 'bluebell' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Icon title', 'bluebell' ),
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
        
    <!-- About Us -->
    <section class="about-us-section light-bg mx-60 border-shape-top">
        <div class="auto-container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="content-block">
                        <?php if($settings['sub_title'] || $settings['title']){ ?>
                        <div class="title-box">
                            <?php if($settings['sub_title']){ ?><div class="sub-title"><?php echo wp_kses($settings['sub_title'], true); ?></div><?php } ?>
                            <?php if($settings['title']){ ?><h2 class="sec-title"><?php echo wp_kses($settings['title'], true); ?></h2><?php } ?>
                        </div>
                        <?php } ?>
						<?php if($settings['text1']){ ?><div class="text"><?php echo wp_kses($settings['text1'], true); ?></div><?php } ?>
                        <?php if($settings['text2']){ ?><div class="text"><?php echo wp_kses($settings['text2'], true); ?></div><?php } ?>
                        <?php if($settings['sign_image']['id']){ ?><div class="signature"><img src="<?php echo esc_url(wp_get_attachment_url($settings['sign_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'bluebell'); ?>"></div><?php } ?>
                        <?php if($settings['btn_title']){ ?><div class="link-btn"><a href="<?php echo esc_url($settings['btn_link']['url']);?>" class="theme-btn btn-style-two btn-lg"><span><?php echo wp_kses($settings['btn_title'], true);?> <i class="flaticon-right-arrow"></i></span></a></div><?php } ?>
                        <?php if($settings['show_award']):?>
                        <div class="award" data-parallax='{"x": 20}'>
                            <?php if($settings['icon']){ ?><div class="icon"><img src="<?php echo esc_url(wp_get_attachment_url($settings['icon']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'bluebell'); ?>"></div><?php } ?>
                           <?php if($settings['icon_title']){ ?> <h4><?php echo wp_kses($settings['icon_title'], true); ?></h4><?php } ?>
                        </div>
                  		<?php endif; ?>  
                    </div>
                </div>
                <?php if($settings['image']['id']){ ?>
                <div class="col-lg-6">
                    <div class="image img_hover_3"><img src="<?php echo esc_url(wp_get_attachment_url($settings['image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'bluebell'); ?>"></div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>        
        
    <?php 
	}

}