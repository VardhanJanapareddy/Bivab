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
class Our_Funfacts extends Widget_Base {
	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'bluebell_our_funfacts';
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
		return esc_html__( 'Our Funfacts', 'bluebell' );
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
			'our_funfacts',
			[
				'label' => esc_html__( 'Our Funfacts', 'bluebell' ),
			]
		);
		$this->add_control(
			 'show_border',
			[
				'label'       => __( 'Enable/Disable Border Style', 'bluebell' ),
                'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'bluebell' ),
				'label_off' => __( 'Hide', 'bluebell' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		$this->add_control(
             'slides', 
			  	[
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
				[
					['title' => esc_html__('Booking Month', 'bluebell')],
					['title' => esc_html__('Visitors daily', 'bluebell')],
					['title' => esc_html__('Positive feedback', 'bluebell')],
					['title' => esc_html__('Awards & honors', 'bluebell')],
				],
				'fields' => 
				[
					[
						'name' => 'title',
						'label' => esc_html__('Title', 'bluebell'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('Enter Title Here', 'bluebell')
					],
					[
						'name' => 'counter_start',
						'label' => esc_html__('Counter Start', 'bluebell'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
					],
					[
						'name' => 'counter_stop',
						'label' => esc_html__('Counter Stop', 'bluebell'),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
					],
					[
						'name' => 'alphabet_letter',
						'label' => esc_html__('Alphabet Letter', 'bluebell'),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
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
    <?php if($settings['show_border']){ ?>    
	<!-- funfact section -->
	<div class="light-bg mx-60">
        <div class="auto-container">
            <div class="boder-bottom-two"></div>
        </div>
    </div> 
    <?php } ?>
    <section class="funfact-section light-bg mx-60">
        <div class="auto-container">
            <div class="row">
                <?php foreach($settings['slides'] as $key => $item):?>
                <div class="col-lg-3 funfact-block">
                    <div class="count-outer count-box">
                   		<span class="count-text" data-speed="3000" data-stop="<?php echo esc_attr($item['counter_stop']);?>"><?php echo esc_attr($item['counter_start']);?></span><span class="plus"><?php echo esc_attr($item['alphabet_letter']);?></span>
                    </div>
                    <div class="text"><?php echo wp_kses($item['title'], true);?></div>
                </div>
                <?php endforeach;?> 
            </div>
        </div>
    </section>       
    
    <?php 
	}
}
