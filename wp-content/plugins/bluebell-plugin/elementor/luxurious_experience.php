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
class Luxurious_Experience extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'bluebell_luxurious_experience';
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
		return esc_html__( 'Luxurious_Experience', 'bluebell' );
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
			'luxurious_experience',
			[
				'label' => esc_html__( 'Luxurious_Experience', 'bluebell' ),
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
			'phone_title',
			[
				'label'       => __( 'Phone Title', 'bluebell' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Phone title', 'bluebell' ),
			]
		);
		$this->add_control(
			'phone_number',
			[
				'label'       => __( 'Phone_Number', 'bluebell' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your phone number', 'bluebell' ),
			]
		);
		$this->add_control(
			'image1',
			[
			  'label' => __( 'Image V1', 'bluebell' ),
			  'type' => Controls_Manager::MEDIA,
			  'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'image2',
			[
			  'label' => __( 'Image V2', 'bluebell' ),
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
        
        
 	<!-- service section two -->
    <section class="service-section-two light-bg mx-60 border-shape-bottom">
        <div class="auto-container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="content-block">
                        <?php if($settings['sub_title'] || $settings['title']){ ?>
                        <div class="title-box">
                            <?php if($settings['sub_title']){ ?><div class="sub-title"><?php echo wp_kses($settings['sub_title'], true); ?></div><?php }?>
                            <?php if($settings['title']){ ?><h2 class="sec-title small"><?php echo wp_kses($settings['title'], true); ?></h2><?php }?>
                        </div>
                        <?php } ?>
                        
                        <?php if($settings['phone_title']){ ?><div class="text"><?php echo wp_kses($settings['phone_title'], true); ?></div><?php }?>
                        <?php if($settings['phone_number']){ ?><h4><?php esc_html_e('front office :', 'bluebell'); ?><a href="tel:<?php echo esc_attr($settings['phone_number']);?>"> <?php echo wp_kses($settings['phone_number'], true);?></a></h4><?php }?>
                    </div>
                </div>
                <?php if($settings['image1']['id'] || $settings['image2']['id']){ ?>
                <div class="col-lg-7">
                    <div class="image-block">
                        <?php if($settings['image1']['id']){ ?><div class="image"><img src="<?php echo esc_url(wp_get_attachment_url($settings['image1']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'bluebell'); ?>"></div><?php }?>
                        <?php if($settings['image2']['id']){ ?><div class="image-two img_hover_1"><img src="<?php echo esc_url(wp_get_attachment_url($settings['image2']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'bluebell'); ?>"></div><?php }?>
                    </div>
                </div>
                <?php } ?>
            </div>  
        </div>
    </section>        
    
	<?php 
	}

}