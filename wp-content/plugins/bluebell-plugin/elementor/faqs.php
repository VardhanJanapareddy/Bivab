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
class Faqs extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'bluebell_faqs';
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
		return esc_html__( 'Faqs', 'bluebell' );
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
			'faqs',
			[
				'label' => esc_html__( 'Faqs', 'bluebell' ),
			]
		);
		$this->add_control(
			'bold_title',
			[
				'label'       => __( 'bold_title', 'bluebell' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter Bold title', 'bluebell' ),
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
		$this->add_control(
			'text2',
			[
				'label'       => __( 'Text2', 'bluebell' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your text2', 'bluebell' ),
			]
		);
		$this->add_control(
			'text3',
			[
				'label'       => __( 'Text3', 'bluebell' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your text2', 'bluebell' ),
			]
		);
		$this->add_control(
			'faq_title',
			[
				'label'       => __( 'Title1', 'bluebell' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your title1', 'bluebell' ),
			]
		);
		$this->add_control(
              'our_faq', 
			  	[
				'type' => Controls_Manager::REPEATER,
				'seperator' => 'before',
				'default' => 
					[
						['acc_title' => esc_html__('What special treatment for VIP Customer', 'bluebell')],
						['acc_title' => esc_html__('How you can make payment in our hotel', 'bluebell')],
						['acc_title' => esc_html__('Checkout our laundry service', 'bluebell')],
					],
				'fields' => 
					[
						[
							'name' => 'acc_title',
							'label' => esc_html__('Title', 'bluebell'),
							'type' => Controls_Manager::TEXTAREA,
							'default' => esc_html__('Enter Title', 'bluebell')
						],
						[
							'name' => 'acc_text',
							'label' => esc_html__('Text', 'bluebell'),
							'type' => Controls_Manager::TEXTAREA,
							'default' => esc_html__('Enter Text', 'bluebell')
						],
					],
				'title_field' => '{{acc_title}}',
			 ]
        );
		$this->add_control(
			'faq_title2',
			[
				'label'       => __( 'Title2', 'bluebell' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your title2', 'bluebell' ),
			]
		);
		$this->add_control(
              'our_faqs', 
			  	[
				'type' => Controls_Manager::REPEATER,
				'seperator' => 'before',
				'default' => 
					[
						['acc_title2' => esc_html__('Checkout our pick and drop service', 'bluebell')],
						['acc_title2' => esc_html__('Know about swimming pool of our hotel', 'bluebell')],
						['acc_title2' => esc_html__('Best location of our hotel', 'bluebell')],
					],
				'fields' => 
					[
						[
							'name' => 'acc_title2',
							'label' => esc_html__('Title2', 'bluebell'),
							'type' => Controls_Manager::TEXTAREA,
							'default' => esc_html__('Enter Title2', 'bluebell')
						],
						[
							'name' => 'acc_text2',
							'label' => esc_html__('Text2', 'bluebell'),
							'type' => Controls_Manager::TEXTAREA,
							'default' => esc_html__('Enter Text2', 'bluebell')
						],
					],
				'title_field' => '{{acc_title2}}',
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
        
 	<!-- faq section -->
    <section class="faq-section  light-bg mx-60 border-shape-top">
        <div class="auto-container">
            <div class="mb_80">
                <div class="row">
                    <?php if($settings['bold_title'] || $settings['text']){ ?>
                    <div class="col-lg-7 pe-lg-5">
                        <?php if($settings['bold_title']){ ?><h5><?php echo wp_kses($settings['bold_title'], true); ?></h5><?php } ?>
                        <?php if($settings['text']){ ?><div class="text"><?php echo wp_kses($settings['text'], true); ?></div><?php } ?>
                    </div>
                    <?php } ?>
                    
                    <?php if($settings['text2'] || $settings['text3']){ ?>
                    <div class="col-lg-5">
                        <?php if($settings['text2']){ ?><div class="text-two"><?php echo wp_kses($settings['text2'], true); ?></div><?php } ?>
                        <?php if($settings['text3']){ ?><div class="text-three"><?php echo wp_kses($settings['text3'], true); ?></div><?php } ?>
                    </div>
                    <?php } ?>
                </div>
            </div>   
            <div class="row">
                <div class="col-lg-6">                    
                    <?php if($settings['faq_title']){ ?><div class="faq-title"><?php echo wp_kses($settings['faq_title'], true); ?></div><?php } ?>
                    <span class="shape"></span>
                    <!--Accordian Boxed-->
                    <div class="accordian-boxed style-two">
                        <!--Accordian Box-->
                        <ul class="accordion-box style-three">
                            
                            <!--Block-->
                            <?php $count = 1; foreach($settings['our_faq'] as $key => $item): ?>
                            <li class="accordion block">
                                <div class="acc-btn <?php if($key == 1) echo 'active'; ?>"><div class="icon-outer"><span class="icon icon-plus fa fa-plus"></span> <span class="icon icon-minus fa fa-minus"></span></div><?php echo wp_kses($item['acc_title'], true);?></div>
                                <div class="acc-content <?php if($key == 1) echo 'current'; ?>">
                                    <div class="content">
                                        <div class="text"><?php echo wp_kses($item['acc_text'], true);?></div>
                                    </div>
                                </div>
                            </li>
                            <?php $count++; endforeach; ?>
                        </ul>                        
                    </div>
                </div>
                <div class="col-lg-6">                    
                    <?php if($settings['faq_title2']){ ?><div class="faq-title"><?php echo wp_kses($settings['faq_title2'], true); ?></div><?php } ?>
                    <span class="shape"></span>
                    <!--Accordian Boxed-->
                    <div class="accordian-boxed style-two">
                        <!--Accordian Box-->
                        <ul class="accordion-box style-three">
                            
                            <!--Block-->
                      	    <?php $i = 2; foreach($settings['our_faqs'] as $key => $item): ?>
                            <li class="accordion block">
                                <div class="acc-btn <?php if($key == 2) echo 'active'; ?>"><div class="icon-outer"><span class="icon icon-plus fa fa-plus"></span> <span class="icon icon-minus fa fa-minus"></span></div><?php echo wp_kses($item['acc_title2'], true);?></div>
                                <div class="acc-content <?php if($key == 2) echo 'current'; ?>">
                                    <div class="content">
                                        <div class="text"><?php echo wp_kses($item['acc_text2'], true);?></div>
                                    </div>
                                </div>
                            </li>
							<?php $i++; endforeach; ?>
                        </ul>                        
                    </div>
                </div>
            </div>    
        </div>
    </section>        
    
	<?php 
	}
}