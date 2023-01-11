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
class Eat_And_Drink_V4 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'bluebell_eat_and_drink_v4';
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
		return esc_html__( 'Eat_And_Drink_V4', 'bluebell' );
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
			'eat_and_drink_v4',
			[
				'label' => esc_html__( 'Eat And Drink V4', 'bluebell' ),
			]
		);
		$this->add_control(
			'main_sub_title',
			[
				'label'       => __( 'Main Sub Title', 'bluebell' ),
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
			'slides', 
				[
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
				[
					['sub_title' => esc_html__('eat & drink', 'bluebell')],
					['sub_title' => esc_html__('wellness', 'bluebell')],
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
						'name' => 'sub_title',
						'label' => esc_html__('Sub Title', 'bluebell'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('Enter Sub Title Here', 'bluebell')
					],
					[
						'name' => 'title',
						'label' => esc_html__('Title', 'bluebell'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('Enter Title Here', 'bluebell')
					],
					[
						'name' => 'title1',
						'label' => esc_html__('Title1', 'bluebell'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('Enter Time Table Title', 'bluebell')
					],
					[
						'name' => 'features_list',
						'label' => esc_html__('Feature List', 'bluebell'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'bluebell')
					], 
				],
  		  		'title_field' => '{{sub_title}}',
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
        
  	<!-- feature section two -->
    <section class="<?php if($settings['style_two'] == 'two') echo 'feature-section-three dark_bg'; else echo 'feature-section-two light-bg mx-60 border-shape-top'; ?>">
        <div class="auto-container">
           
            <div class="text-center">
                <?php if($settings['main_sub_title']){ ?><div class="sub-title"><?php echo wp_kses($settings['main_sub_title'], true); ?></div><?php } ?>
                <h2 class="sec-title mb-30 <?php if($settings['style_two'] == 'two') echo 'text-light'; else echo ''; ?>"><?php echo wp_kses($settings['main_title'], true); ?></h2>
                <div class="title-desc mb_65 <?php if($settings['style_two'] == 'two') echo 'text-light'; else echo ''; ?>">
                    <?php echo wp_kses($settings['text'], true); ?>
                </div>
            </div>
          
            <div class="row">
               
                <?php foreach($settings['slides'] as $key => $item):?>
                <div class="col-lg-6 feature-block-two <?php if($settings['style_two'] == 'two') echo 'light-text'; else echo ''; ?>">
                    <div class="inner-box">
                        <div class="image">
                            <img src="<?php echo esc_url(wp_get_attachment_url($item['image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'bluebell'); ?>">
                        </div>
                        <div class="title-box">
                            <div class="sub-title"><?php echo wp_kses($item['sub_title'], true); ?></div>
                            <h2 class="sec-title small mb-30 <?php if($settings['style_two'] == 'two') echo 'text-light'; else echo ''; ?>"><?php echo wp_kses($item['title'], true); ?></h2>
                        </div>
                        <div class="content">
                            <h5><?php echo wp_kses($item['title1'], true); ?></h5>
                            
							<?php $features_list = $item['features_list'];
                              if(!empty($features_list)){
                              $features_list = explode("\n", ($features_list)); 
                            ?>
                            
                            <?php foreach($features_list as $features): ?>
                            <?php echo wp_kses($features, true); ?>
                            <?php endforeach; ?>
                            
                            <?php } ?>
                       
                        </div>
                    </div>
                </div>
                <?php endforeach;?> 
            </div>
        </div>
    </section>       
        
    <?php 
	}

}