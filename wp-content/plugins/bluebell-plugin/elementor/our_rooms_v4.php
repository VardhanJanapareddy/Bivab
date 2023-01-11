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
class Our_Rooms_V4 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'bluebell_our_rooms_v4';
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
		return esc_html__( 'Our Rooms V4', 'bluebell' );
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
		return 'fa fa-briefcase';
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
			'our_rooms_v4',
			[
				'label' => esc_html__( 'Our Rooms V4', 'bluebell' ),
			]
		);
		$this->add_control(
			'subtitle',
			[
				'label'       => __( 'BG Transparent Title', 'bluebell' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your BG Transparent Title', 'bluebell' ),
			]
		);
		$this->add_control(
			'title',
			[
				'label'       => __( 'title', 'bluebell' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Title', 'bluebell' ),
			]
		);
		$this->add_control(
			'text_limit',
			[
				'label'   => esc_html__( 'Text Limit', 'bluebell' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 3,
				'min'     => 1,
				'max'     => 100,
				'step'    => 1,
			]
		);
		$this->add_control(
			'query_number',
			[
				'label'   => esc_html__( 'Number of post', 'bluebell' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 3,
				'min'     => 1,
				'max'     => 100,
				'step'    => 1,
			]
		);
		$this->add_control(
			'query_orderby',
			[
				'label'   => esc_html__( 'Order By', 'bluebell' ),
				'label_block' => true,
				'type'    => Controls_Manager::SELECT,
				'default' => 'date',
				'options' => array(
					'date'       => esc_html__( 'Date', 'bluebell' ),
					'title'      => esc_html__( 'Title', 'bluebell' ),
					'menu_order' => esc_html__( 'Menu Order', 'bluebell' ),
					'rand'       => esc_html__( 'Random', 'bluebell' ),
				),
			]
		);
		$this->add_control(
			'query_order',
			[
				'label'   => esc_html__( 'Order', 'bluebell' ),
				'label_block' => true,
				'type'    => Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => array(
					'DESC' => esc_html__( 'DESC', 'bluebell' ),
					'ASC'  => esc_html__( 'ASC', 'bluebell' ),
				),
			]
		);
		$this->add_control(
            'query_category', 
			[
			  'type' => Controls_Manager::SELECT,
			  'label' => esc_html__('Category', 'bluebell'),
			  'label_block' => true,
			  'options' => get_hb_room_categories()
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
					'two' => esc_html__( 'Choose White BG Color ', 'bluebell' ),
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
		
        $paged = bluebell_set($_POST, 'paged') ? esc_attr($_POST['paged']) : 1;

		$this->add_render_attribute( 'wrapper', 'class', 'templatepath-bluebell' );
		$args = array(
			'post_type'      => 'hb_room',
			'posts_per_page' => bluebell_set( $settings, 'query_number' ),
			'orderby'        => bluebell_set( $settings, 'query_orderby' ),
			'order'          => bluebell_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		if( bluebell_set( $settings, 'query_category' ) ) $args['hb_room_type'] = bluebell_set( $settings, 'query_category' );
		$query = new \WP_Query( $args );

		if ( $query->have_posts() ) 
	{ ?>
	
    <!-- accomodation section -->
    <section class="accomodation-section <?php if($settings['style_two'] == 'two') echo 'style-two mx-60 border-shape-bottom'; else echo ''; ?>">
        <div class="auto-container">
            <?php if($settings['subtitle'] || $settings['title']) {?>
            <div class="title-box text-center">
                <?php if($settings['subtitle']) { ?><div class="sub-title"><?php echo wp_kses( $settings['subtitle'], true );?></div><?php } ?>
                <?php if($settings['title']) { ?><h2 class="sec-title <?php if($settings['style_two'] == 'two') echo ''; else echo 'text-light'; ?>"><?php echo wp_kses( $settings['title'], true );?></h2><?php } ?>
            </div>
            <?php } ?>
            <div class="theme_carousel owl-theme owl-carousel" data-options='{"loop": true, "center": false, "margin": 30, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 6000, "smartSpeed": 1000, "responsive":{ "0" :{ "items": "1" }, "480" :{ "items" : "1" }, "600" :{ "items" : "1" }, "768" :{ "items" : "1" } , "992":{ "items" : "1" }, "1200":{ "items" : "1" }}}'>
                <?php 
					while ( $query->have_posts() ) : $query->the_post();
				?>
                <div class="accomodation-block">
                    <a href="<?php echo esc_url(get_permalink(get_the_id()));?>">
                    <div class="image">
                    	<?php the_post_thumbnail('bluebell_924x575'); ?>
                    </div>
                    </a>
                    <div class="content">
                        <div class="row">
                            <div class="col-md-5">
                                <?php echo hotel_booking_loop_room_price(); ?>
                                <h3><a href="<?php echo esc_url(get_permalink(get_the_id()));?>"><?php the_title(); ?></a></h3>
                            </div>
                            <div class="col-md-7">
                                <div class="info-list">
                                    <ul>
                                        <li><i class="flaticon-bed"></i><?php echo (get_post_meta( get_the_id(), 'total_bed', true ));?></li>
                                        <li><i class="flaticon-bath-1"></i><?php echo (get_post_meta( get_the_id(), 'total_bath', true ));?></li>
                                        <li><i class="flaticon-blueprint"></i><?php echo (get_post_meta( get_the_id(), 'room_square_ft', true ));?></li>
                                    </ul>
                                </div>
                                <div class="text"><?php echo wp_kses(bluebell_trim(get_the_content(), $settings['text_limit']), true); ?></div> 
                            </div>
                        </div>
                    </div>
                </div>
                <?php endwhile;?>
            </div>
        </div>
    </section>
    
	<?php }
    wp_reset_postdata();
	}
}