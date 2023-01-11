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
class Welcome_Section_V3 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'bluebell_welcome_section_v3';
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
		return esc_html__( 'Welcome Section V3', 'bluebell' );
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
			'welcome_section_v3',
			[
				'label' => esc_html__( 'Welcome Section V3', 'bluebell' ),
			]
		);
		$this->add_control(
			'pattern_image',
			[
			  'label' => __( 'Pattern Image', 'bluebell' ),
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
			'title2',
			[
				'label'       => __( 'Title2', 'bluebell' ),
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
			'show_author',
			[
				'label' => __( 'Hide/Show Author Section', 'bluebell' ),
				'type' => Controls_Manager::SWITCHER,
				'title' => esc_html__('Enable/Disable Author Section', 'bluebell'),
				'default' => true,
			]
		);
		$this->add_control(
			'author_image',
			[
			  'label' => __( 'Author Image', 'bluebell' ),
			  'type' => Controls_Manager::MEDIA,
			  'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'author_name',
			[
				'label'       => __( 'Author Name', 'bluebell' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter Author Name', 'bluebell' ),
			]
		);
		$this->add_control(
			'designation',
			[
				'label'       => __( 'Designation', 'bluebell' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter Author Designation', 'bluebell' ),
			]
		);
		$this->add_control(
			'sign_image',
			[
			  'label' => __( 'Sign Image', 'bluebell' ),
			  'type' => Controls_Manager::MEDIA,
			  'default' => ['url' => Utils::get_placeholder_image_src(),],
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
			'style_two',
			[
				'label'   => esc_html__( 'Choose Different Style', 'bluebell' ),
				'label_block' => true,
				'type'    => Controls_Manager::SELECT,
				'default' => 'one',
				'options' => array(
					'one' => esc_html__( 'Choose Dark BG Color', 'bluebell' ),
					'two' => esc_html__( 'Choose Light BG Color', 'bluebell' ),
				),
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
       
 	<!-- Welcome Section three -->
    <section class=" <?php if($settings['style_two'] == 'two') echo 'welcome-section-six light-bg mx-60 border-shape-top'; else echo 'welcome-section-three'; ?>">
        <?php if($settings['pattern_image']['id']){ ?><div class="shape"><img src="<?php echo esc_url(wp_get_attachment_url($settings['pattern_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'bluebell'); ?>"></div><?php }?>
        <div class="auto-container">
            <div class="row">
                <div class="<?php if($settings['style_two'] == 'two') echo 'col-lg-6'; else echo 'col-lg-6 welcome-block-three'; ?>">
                    <div class="title-box">
                        <?php if($settings['sub_title']){ ?><div class="sub-title"><?php echo wp_kses($settings['sub_title'], true); ?></div><?php }?>
                        <h2 class="sec-title <?php if($settings['style_two'] == 'two') echo 'sec-title small mb-30'; else echo 'sec-title text-light small mb-30'; ?>"><?php echo wp_kses($settings['title'], true); ?></h2>
                        <?php if($settings['title2']){ ?><div class="text"><?php echo wp_kses($settings['title2'], true); ?></div><?php }?>
                        <?php if($settings['text']){ ?><div class="text-two"><?php echo wp_kses($settings['text'], true); ?>  </div><?php }?>
                        <?php if($settings['text2']){ ?><div class="text-two"><?php echo wp_kses($settings['text2'], true); ?> </div><?php }?>
                       
                        <?php if($settings['show_author']):?>
                        <div class="author-info">
                            <div class="author-wrap">
                                <?php if($settings['author_image']['id']){ ?><div class="author-thumb"><img src="<?php echo esc_url(wp_get_attachment_url($settings['author_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'bluebell'); ?>"></div><?php } ?>
                                <?php if($settings['author_name']){ ?><div class="name"><?php echo wp_kses($settings['author_name'], true); ?></div><?php } ?>
                                <?php if($settings['designation']){ ?><div class="designation"><?php echo wp_kses($settings['designation'], true); ?> </div><?php } ?>
                            </div>
                            <?php if($settings['sign_image']['id']){ ?><div class="signature"><img src="<?php echo esc_url(wp_get_attachment_url($settings['sign_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'bluebell'); ?>"></div><?php } ?>
                        </div>
                  	    <?php endif; ?>
                  
                    </div>
                </div>
                <div class="col-lg-6">
                	<div class="<?php if($settings['style_two'] == 'two') echo 'text-end'; else echo ''; ?>">
                    	<div class="image"><img src="<?php echo esc_url(wp_get_attachment_url($settings['image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'bluebell'); ?>"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>        
    
    <?php 
	}
}