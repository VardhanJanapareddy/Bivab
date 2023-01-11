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
class Room_Features extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'bluebell_room_features';
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
		return esc_html__( 'Room_Features', 'bluebell' );
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
			'room_features',
			[
				'label' => esc_html__( 'Room Features', 'bluebell' ),
			]
		);
		$this->add_control(
             'slides', 
			  	[
					'type' => Controls_Manager::REPEATER,
					'separator' => 'before',
					'default' => 
				[
					['title' => esc_html__('Luxuary Room', 'bluebell')],
				],
				'fields' => 
				[
					[
						'name' => 'image',
						'label' => __( 'Tab Image', 'bluebell' ),
						'type' => Controls_Manager::MEDIA,
						'default' => ['url' => Utils::get_placeholder_image_src(),],
					],
					[
						'name' => 'title',
						'label' => esc_html__('Title', 'bluebell'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('Enter Title Here', 'bluebell')
					],
					[
						 'name' => 'icon_1',
						 'label' => esc_html__('Select Icon', 'bluebell'),
						 'label_block' => true,
						 'type' => Controls_Manager::SELECT2,
						 'options' => get_fontawesome_icons(),
					],
					[
						'name' => 'detail_1',
						'label' => esc_html__('Detail V1', 'bluebell'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'bluebell')
					],
					[
						 'name' => 'icon_2',
						 'label' => esc_html__('Select Icon', 'bluebell'),
						 'label_block' => true,
						 'type' => Controls_Manager::SELECT2,
						 'options' => get_fontawesome_icons(),
					],
					[
						'name' => 'detail_2',
						'label' => esc_html__('Detail V2', 'bluebell'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'bluebell')
					],
					[
						 'name' => 'icon_3',
						 'label' => esc_html__('Select Icon', 'bluebell'),
						 'label_block' => true,
						 'type' => Controls_Manager::SELECT2,
						 'options' => get_fontawesome_icons(),
					],
					[
						'name' => 'detail_3',
						'label' => esc_html__('Detail V3', 'bluebell'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'bluebell')
					],
				],
				'title_field' => '{{title}}',
        	]
        );
		$this->add_control(
			'side_title',
			[
				'label'       => __( 'Sidebar Vertical Title', 'bluebell' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter Sidebar Vertical Title', 'bluebell' ),
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
       
    <!-- room section three -->
    <section class="room-section-three mx-60">
        <div class="auto-container">
            <div class="tab-area">
                <div class="row no-gutters">
                    <div class="col-lg-6 order-lg-2">
                        <div class="outer-box">
                            <div class="nav-tab-wrapper">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <?php $count = 1; foreach($settings['slides'] as $key => $item): ?>
                                    <li class="nav-item" role="presentation">
                                        <div class="nav-link <?php if($key == 1) echo 'active'; ?>" id="home-tab<?php echo esc_attr($key); ?>" data-bs-toggle="tab" data-bs-target="#home<?php echo esc_attr($key); ?>" role="tab" aria-controls="home<?php echo esc_attr($key); ?>" aria-selected="true">
                                            <div class="count"><?php $count = sprintf('%2d', $count); echo $count; ?></div>
                                            <h4><?php echo wp_kses($item['title'], true); ?></h4>
                                            <div class="info-list">
                                                <ul>
                                                    <?php if($item['detail_1']){ ?><li> <i class="<?php echo esc_attr($item['icon_1']); ?>"></i><?php echo wp_kses($item['detail_1'], true); ?></li><?php } ?>
                                                    <?php if($item['detail_2']){ ?><li> <i class="<?php echo esc_attr($item['icon_2']); ?>"></i><?php echo wp_kses($item['detail_2'], true); ?></li><?php } ?>
                                                    <?php if($item['detail_3']){ ?><li> <i class="<?php echo esc_attr($item['icon_3']); ?>"></i><?php echo wp_kses($item['detail_3'], true); ?></li><?php } ?>
                                                </ul>
                                            </div>
                                      	</div>
                                    </li>
                                    <?php $count++; endforeach; ?>
                                </ul>
                                <?php if($settings['side_title']){ ?><div class="curve-text"><?php echo wp_kses($settings['side_title'], true); ?></div><?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 image-column">
                        <div class="tab-content" id="myTabContent">
                            <?php foreach($settings['slides'] as $key => $item): ?>
                            <div class="tab-pane fade <?php if($key == 1) echo 'show active'; ?>" id="home<?php echo esc_attr($key); ?>" role="tabpanel" aria-labelledby="home-tab<?php echo esc_attr($key); ?>">
                                <div class="image" style="background-image: url(<?php echo esc_url(wp_get_attachment_url($item['image']['id'])); ?>);"><img src="<?php echo esc_url(wp_get_attachment_url($item['image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'bluebell'); ?>"></div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>           
                                
            </div>
        </div>
    </section>        
   
    <?php 
	}
}