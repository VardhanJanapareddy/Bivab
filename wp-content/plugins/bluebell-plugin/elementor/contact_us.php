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
class Contact_Us extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'bluebell_contact_us';
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
		return esc_html__( 'Contact Us', 'bluebell' );
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
			'contact_us',
			[
				'label' => esc_html__( 'Contact Us', 'bluebell' ),
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
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your title', 'bluebell' ),
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
		   'contact_us_form',
		   [
				'label'       => __( 'Contact Form 7 Url', 'bluebell' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
				'active' => true,
				],
			  'placeholder' => __( 'Enter your Contact Form 7 Url', 'bluebell' )
			]
		);
		$this->add_control(
			 'show_contact_info',
			[
				'label'       => __( 'Enable/Disable conact info', 'bluebell' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'bluebell' ),
				'label_off' => __( 'Hide', 'bluebell' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		$this->add_control(
			'title1',
			[
				'label'       => __( 'Title', 'bluebell' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your title', 'bluebell' ),
			]
		);
		$this->add_control(
			'address',
			[
				'label'       => __( 'Address', 'bluebell' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Address', 'bluebell' ),
			]
		);
		$this->add_control(
			'email',
			[
				'label'       => __( 'Email', 'bluebell' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Email', 'bluebell' ),
			]
		);
		$this->add_control(
			'title2',
			[
				'label'       => __( 'Title 2', 'bluebell' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Title 2', 'bluebell' ),
			]
		);
		$this->add_control(
			'phone',
			[
				'label'       => __( 'Phone', 'bluebell' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Phone', 'bluebell' ),
			]
		);
		$this->add_control(
			'time',
			[
				'label'       => __( 'Time', 'bluebell' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Time', 'bluebell' ),
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
        
        
 	<!-- Contact Form section -->
    <section class="contact-form-section light-bg mx-60 border-shape-top border-shape-bottom">
        <div class="auto-container">        
            <div class="sec-title">
                <?php if($settings['sub_title']){ ?><div class="sub-title"><?php echo wp_kses($settings['sub_title'], true); ?></div><?php } ?>
                <?php if($settings['title']){ ?><h2><?php echo wp_kses($settings['title'], true); ?></h2><?php } ?>
                <?php if($settings['text']){ ?><div class="text"><?php echo wp_kses($settings['text'], true); ?> </div><?php } ?>
            </div>
            <div class="row">
                <?php if($settings['contact_us_form']){ ?>
                <div class="col-lg-8">
                    <!--Contact Form-->
                  	<div class="contact-form style-two">
                       <?php echo do_shortcode($settings['contact_us_form']);?>
                    </div>
                </div>
                <?php } ?>
                
                <?php if($settings['show_contact_info']):?>
                <div class="col-lg-4 icon_box">
                    <div class="inner-box">
                        <?php if($settings['title1']){ ?>
                        <h4><?php echo wp_kses($settings['title1'], true); ?></h4>
                        <div class="border-shap"></div>
                        <?php } ?>
                        
                        <?php if($settings['address']){ ?><div class="text-two"><?php echo wp_kses($settings['address'], true); ?></div><?php } ?>
                        <?php if($settings['email']){ ?><div class="text-three"><a href="<?php echo esc_url($settings['email'], true); ?>"><?php echo wp_kses($settings['email'], true); ?></a></div><?php } ?>
                    </div>
                    <div class="icon-box">
                        <?php if($settings['title2']){ ?><h4><?php echo wp_kses($settings['title2'], true); ?></h4><?php } ?>
                        <?php if($settings['phone']){ ?><div class="icon"><h5><i class="fas fa-phone"></i><a href="tel:<?php echo esc_attr($settings['phone'], true); ?>"><?php echo wp_kses($settings['phone'], true); ?></a></h5></div><?php } ?>
                        <?php if($settings['time']){ ?><div class="text-four"><?php echo wp_kses($settings['time'], true); ?></div><?php } ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>        
        
		<?php 
	}

}