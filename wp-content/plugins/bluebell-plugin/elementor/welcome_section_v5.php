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
class Welcome_Section_V5 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'bluebell_welcome_section_v5';
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
		return esc_html__( 'Welcome Section V5', 'bluebell' );
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
			'welcome_section_v5',
			[
				'label' => esc_html__( 'Welcome Section V5', 'bluebell' ),
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
				'placeholder' => __( 'Enter your Text ', 'bluebell' ),
			]
		);
		$this->add_control(
			'show_quotation',
			[
				'label' => __( 'Hide/Show Manager Quot', 'bluebell' ),
				'type' => Controls_Manager::SWITCHER,
				'title' => esc_html__('Enable/Disable Quotation', 'bluebell'),
				'default' => true,
			]
		);
		$this->add_control(
			'quot',
			[
				'label'       => __( 'Quote Description', 'bluebell' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter Quote Description', 'bluebell' ),
			]
		);
		$this->add_control(
			'name',
			[
				'label'       => __( 'Author Name/Designation', 'bluebell' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter Author Name/Designation', 'bluebell' ),
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
		$this->add_control(
			'description',
			[
				'label'       => __( 'Description', 'bluebell' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter Description ', 'bluebell' ),
			]
		);
		$this->add_control(
			'sign',
			[
			  'label' => __( 'Signature Image Url', 'bluebell' ),
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
        
	<!-- Welcome Section five -->
    <section class="welcome-section-five light-bg mx-60 border-shape-top">
        <div class="auto-container">
            <div class="row">
                <div class="col-lg-7">
                     <?php if($settings['sub_title']){ ?><div class="sub-title"><?php echo wp_kses($settings['sub_title'], true); ?></div><?php }?>
                     <?php if($settings['title']){ ?><h2 class="sec-title"><?php echo wp_kses($settings['title'], true); ?></h2><?php }?>
                     <?php if($settings['text']){ ?><div class="text"><?php echo wp_kses($settings['text'], true); ?></div><?php }?>
              
              	    <?php if($settings['show_quotation']):?>
                    <blockquote>
                         <?php if($settings['quot']){ ?><div class="text-two"><?php echo wp_kses($settings['quot'], true); ?> </div><?php }?>
                         <?php if($settings['name']){ ?><cite class="name"><?php echo wp_kses($settings['name'], true); ?></cite><?php }?>
                    </blockquote>
				   <?php endif; ?>
                    <div class="row">
                        <?php if($settings['image']['id']){ ?>
                        <div class="col-md-4">
                             <div class="image-three"><img src="<?php echo esc_url(wp_get_attachment_url($settings['image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'bluebell'); ?>"></div>
                        </div>
                        <?php }?>
                        <div class="col-md-8">
                             <?php if($settings['description']){ ?><div class="text-three"><?php echo wp_kses($settings['description'], true); ?></div><?php }?>
                             <?php if($settings['sign']['id']){ ?><div class="image-two"><img src="<?php echo esc_url(wp_get_attachment_url($settings['sign']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'bluebell'); ?>"></div><?php }?>
                        </div>
                    </div>
                </div>
				<?php if($settings['image2']['id']){ ?>
                <div class="col-lg-5">
                    <div class="text-lg-end">
                         <div class="image"><img src="<?php echo esc_url(wp_get_attachment_url($settings['image2']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'bluebell'); ?>"></div>
                    </div>
                </div>
                <?php }?>
            </div>        
        </div>
    </section>        
       
		<?php 
	}

}