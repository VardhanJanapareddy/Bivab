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
class Menu_List extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'bluebell_menu_list';
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
		return esc_html__( 'Menu List', 'bluebell' );
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
			'menu_list',
			[
				'label' => esc_html__( 'Menu List', 'bluebell' ),
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
			'breakfast',
			[
				'label'       => __( 'Breakfast Title', 'bluebell' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Breakfast Title', 'bluebell' ),
			]
		);
		$this->add_control(
			'breakfast_time',
			[
				'label'       => __( 'Breakfast Time', 'bluebell' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Breakfast Time', 'bluebell' ),
			]
		);
		$this->add_control(
			'lunch',
			[
				'label'       => __( 'Lunch Title', 'bluebell' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Lunch Title', 'bluebell' ),
			]
		);
		$this->add_control(
			'lunch_time',
			[
				'label'       => __( 'Lunch Time', 'bluebell' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Lunch Time', 'bluebell' ),
			]
		);
		$this->add_control(
			'dinner',
			[
				'label'       => __( 'Dinner Title', 'bluebell' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Dinner Title', 'bluebell' ),
			]
		);
		$this->add_control(
			'dinner_time',
			[
				'label'       => __( 'Dinner Time', 'bluebell' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Dinner Time', 'bluebell' ),
			]
		);
		$this->add_control(
			 'loop', 
				[
					'type' => Controls_Manager::REPEATER,
					'separator' => 'before',
					'default' => 
				[
					['dish' => esc_html__('Rosemary Chicken', 'bluebell')],
				],
				'fields' => 
				[
					[
						'name' => 'image',
						'label' => __( 'Slide BG Image', 'bluebell' ),
						'type' => Controls_Manager::MEDIA,
						'default' => ['url' => Utils::get_placeholder_image_src(),],
					],
					[
						'name' => 'dish',
						'label' => esc_html__('Dish', 'bluebell'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('Enter Dish Here', 'bluebell')
					],
					[
						'name' => 'menu_item',
						'label' => esc_html__('Menu Items', 'bluebell'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('Enter Menu Items Here', 'bluebell')
					],
				],
				'title_field' => '{{dish}}',
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
        
        
    <!-- our menu -->
    <section class="our-menu-section light-bg mx-60 border-shape-bottom">
        <div class="auto-container">
            <?php if($settings['sub_title'] || $settings['title']){ ?>
            <div class="text-center">
                <?php if($settings['sub_title']){ ?><div class="sub-title"><?php echo wp_kses($settings['sub_title'], true); ?></div><?php } ?>
                <?php if($settings['title']){ ?><h2 class="sec-title"> <?php echo wp_kses($settings['title'], true); ?></h2><?php } ?>
            </div>
            <?php } ?>
            <div class="row">
                <div class="col-lg-4">
                    <?php if($settings['breakfast']){ ?><h5><?php echo wp_kses($settings['breakfast'], true); ?></h5><?php } ?>
                    <?php if($settings['breakfast_time']){ ?><div class="time"><?php echo wp_kses($settings['breakfast_time'], true); ?></div><?php } ?>
                </div>
                <div class="col-lg-4">
                    <?php if($settings['lunch']){ ?><h5><?php echo wp_kses($settings['lunch'], true); ?></h5><?php } ?>
                    <?php if($settings['lunch_time']){ ?><div class="time"><?php echo wp_kses($settings['lunch_time'], true); ?></div><?php } ?>
                </div> 
                <div class="col-lg-4">
                    <?php if($settings['dinner']){ ?><h5><?php echo wp_kses($settings['dinner'], true); ?></h5><?php } ?>
                    <?php if($settings['dinner_time']){ ?><div class="time"><?php echo wp_kses($settings['dinner_time'], true); ?></div><?php } ?>
                </div>      
            </div>
             <div class="row">
               <?php foreach($settings['loop'] as $key => $item):?>
                <div class="col-lg-4">
                    <div class="image-box">
                        <?php if($item['image']['id']){ ?><div class="image"><img src="<?php echo esc_url(wp_get_attachment_url($item['image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'bluebell'); ?>"></div><?php } ?>
                        <?php if($item['dish']){ ?><div class="text"><?php echo wp_kses($item['dish'], true); ?></div><?php } ?>
                        <?php if($item['menu_item']){ ?>
                        <ul>
                            <?php echo wp_kses($item['menu_item'], true); ?>
                        </ul>
                        <?php } ?>
                    </div>
                </div>
               <?php endforeach;?>
             </div>
        </div>
    </section>        
        	
	<?php 
	}
}