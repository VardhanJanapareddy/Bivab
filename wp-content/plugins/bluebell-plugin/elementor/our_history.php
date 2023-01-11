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
class Our_History extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'bluebell_our_history';
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
		return esc_html__( 'Our History', 'bluebell' );
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
			'our_history',
			[
				'label' => esc_html__( 'Our History', 'bluebell' ),
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
				'placeholder' => __( 'Enter your Text 1', 'bluebell' ),
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
			 'slides', 
				[
					'type' => Controls_Manager::REPEATER,
					'separator' => 'before',
					'default' => 
				[
					['title' => esc_html__('Launch small Restaurant', 'bluebell')],
				],
				'fields' => 
				[
					[
						'name' => 'year',
						'label' => esc_html__('Year', 'bluebell'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'bluebell')
					],
					[
						'name' => 'title',
						'label' => esc_html__('Title', 'bluebell'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'bluebell')
					],
					[
						'name' => 'text2',
						'label' => esc_html__('Text 2', 'bluebell'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'bluebell')
					],
					[	
						'name' => 'show_images',
						'label' => __( 'Hide/Show Images', 'bluebell' ),
						'type' => Controls_Manager::SWITCHER,
						'title' => esc_html__('Enable/Disable Images', 'bluebell'),
						'default' => true,
					],
					[
						'name' => 'image2',
						'label' => __( 'Image V1', 'bluebell' ),
						'type' => Controls_Manager::MEDIA,
						'default' => ['url' => Utils::get_placeholder_image_src(),],
					],
					[
						'name' => 'image3',
						'label' => __( 'Image V2', 'bluebell' ),
						'type' => Controls_Manager::MEDIA,
						'default' => ['url' => Utils::get_placeholder_image_src(),],
					],
					[
						'name' => 'bottom_text',
						'label' => esc_html__('Bottom Text', 'bluebell'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('Enter Bottom Text', 'bluebell')
					],
					
				],
			'title_field' => '{{title}}',
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
        
	<!-- history section -->
    <section class="history-section light-bg mx-60 border-shape-top border-shape-bottom">
        <div class="auto-container">
            <div class="mb_100">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="content">
                            <?php if($settings['sub_title']){ ?><h3><?php echo wp_kses($settings['sub_title'], true); ?></h3><?php } ?>
                            <?php if($settings['title']){ ?><h2><?php echo wp_kses($settings['title'], true); ?></h2><?php } ?>
                            
							<?php if($settings['text']){ ?>
                            <div class="text">
                                <?php echo wp_kses($settings['text'], true); ?>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    
                    <?php if($settings['image']['id']){ ?>
                    <div class="col-lg-5">
                        <div class="image"><img src="<?php echo esc_url(wp_get_attachment_url($settings['image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'bluebell'); ?>"></div>
                    </div>
                    <?php } ?>
                </div>
            </div>
          
            <?php foreach($settings['slides'] as $key => $item): ?>
            <div class="history-block">
                <?php if($item['year']){ ?><div class="years"><?php echo wp_kses($item['year'], true); ?></div><?php } ?>
                
                <div class="content">
                    <?php if($item['title']){ ?><h4><?php echo wp_kses($item['title'], true); ?></h4><?php } ?>
                    <?php if($item['text2']){ ?><div class="text"><?php echo wp_kses($item['text2'], true); ?> </div><?php } ?>
                   
                    <?php if($item['show_images']):?>
                    <div class="image-box">
                        <?php if($item['image2']['id']){ ?><div class="image"><img src="<?php echo esc_url(wp_get_attachment_url($item['image2']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'bluebell'); ?>"></div><?php } ?>
                        <?php if($item['image3']['id']){ ?><div class="image"><img src="<?php echo esc_url(wp_get_attachment_url($item['image3']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'bluebell'); ?>"></div><?php } ?>
                    </div>
                    <?php endif; ?>
                    
                    <?php if($item['bottom_text']){ ?>
                    <div class="text">
                        <?php echo wp_kses($item['bottom_text'], true); ?>
                    </div>
                    <?php } ?>
               </div>
           </div>
           <?php endforeach; ?>
    	</div>
    </section>        
    
	<?php 
	}

}