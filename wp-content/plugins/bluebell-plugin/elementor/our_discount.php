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
class Our_Discount extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'bluebell_our_discount';
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
		return esc_html__( 'Our_Discount', 'bluebell' );
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
			'our_discount',
			[
				'label' => esc_html__( 'Our_Discount', 'bluebell' ),
			]
		);
		$this->add_control(
			'image1',
			[
			  'label' => __( 'Image', 'bluebell' ),
			  'type' => Controls_Manager::MEDIA,
			  'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'discount',
			[
				'label'       => __( 'Discount', 'bluebell' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Discount', 'bluebell' ),
			]
		);
		$this->add_control(
			'title1',
			[
				'label'       => __( 'Title', 'bluebell' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Title', 'bluebell' ),
			]
		);
		$this->add_control(
			'text1',
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
			 'show_discount',
			[
				'label'       => __( 'Enable/Disable Discount', 'bluebell' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'bluebell' ),
				'label_off' => __( 'Hide', 'bluebell' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		$this->add_control(
			'days',
			[
				'label'       => __( 'Days', 'bluebell' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your stay time ', 'bluebell' ),
			]
		);
		$this->add_control(
			'discount2',
			[
				'label'       => __( 'Discount Value', 'bluebell' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Discount Value', 'bluebell' ),
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
				'placeholder' => __( 'Enter your second text', 'bluebell' ),
			]
		);
		$this->add_control(
			'image2',
			[
			  'label' => __( 'Feature Image', 'bluebell' ),
			  'type' => Controls_Manager::MEDIA,
			  'default' => ['url' => Utils::get_placeholder_image_src(),],
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
        
 	<!-- offers section -->
    <section class="offer-section">
        <div class="auto-container">
            <div class="row">
                <div class="col-lg-4 offer-block">
                    <div class="inner-box">
                        <?php if($settings['image1']['id']){ ?><div class="image"><img src="<?php echo esc_url(wp_get_attachment_url($settings['image1']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'bluebell'); ?>"></div><?php } ?>
                        <?php if($settings['discount']){ ?><div class="offer"><?php echo wp_kses($settings['discount'], true); ?></div><?php }?>
                        <?php if($settings['title1']){ ?>
                        <div class="lower-content">
                            <h3 class="wrapper"><?php echo wp_kses($settings['title1'], true); ?></h3>
                            <div class="text-three"><?php echo wp_kses($settings['text1'], true); ?></div>
                        </div>
                  		<?php }?>
                    </div>
                </div>
                <div class="col-lg-4 offer-block-two">
                    <div class="inner-box">
                       <?php if($settings['show_discount']):?>
                        <div class="content">
                            <h3><?php echo wp_kses($settings['days'], true); ?></h3>
                            <div class="text"><?php echo wp_kses($settings['discount2'], true); ?></div>
                            <div class="text-two"><?php echo wp_kses($settings['text2'], true); ?></div>
                        </div>
                        <?php endif; ?>
                        <?php if($settings['image2']['id']){ ?>
                        <div class="image"><img src="<?php echo esc_url(wp_get_attachment_url($settings['image2']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'bluebell'); ?>"></div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-lg-4 offer-block-three">
                    <div class="sub-title"><?php echo wp_kses($settings['sub_title'], true); ?></div>
                    <h2 class="sec-title text-light mb-30"><?php echo wp_kses($settings['title'], true); ?></h2>
                    <div class="text"><?php echo wp_kses($settings['text'], true); ?></div>
                </div>
            </div>
        </div>
    </section>        
        
    <?php 
	}
}