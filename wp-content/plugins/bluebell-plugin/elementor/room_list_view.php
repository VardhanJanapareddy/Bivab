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
class Room_List_View extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'bluebell_room_list_view';
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
		return esc_html__( 'Room List View', 'bluebell' );
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
			'room_list_view',
			[
				'label' => esc_html__( 'Room List View', 'bluebell' ),
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
				'placeholder' => __( 'Enter your Title', 'bluebell' ),
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
			'show_pagination',
			[
				'label'       => __( 'Enable/Disable Pagination', 'bluebell' ),
                'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'bluebell' ),
				'label_off' => __( 'Hide', 'bluebell' ),
				'return_value' => 'yes',
				'default' => 'no',
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
		
        $paged = get_query_var('paged');
		$paged = bluebell_set($_REQUEST, 'paged') ? esc_attr($_REQUEST['paged']) : $paged;

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
	
	<!-- room list section  -->
    <section class="room-list-section light-bg mx-60 border-shape-top">
        <div class="auto-container">
            <?php if($settings['title'] || $settings['text']) {?>
            <div class="text-center">
                <?php if($settings['title']) {?><div class="sub-title"><?php echo wp_kses( $settings['title'], true );?></div><?php } ?>
                <?php if($settings['text']) {?><div class="text"><?php echo wp_kses( $settings['text'], true );?></div><?php } ?>
            </div>
            <?php } ?>
            
            <?php 
				while ( $query->have_posts() ) : $query->the_post();
			?>
            <div class="room-block-three">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <a href="<?php echo esc_url(get_permalink(get_the_id()));?>"><div class="image"><?php the_post_thumbnail('bluebell_520x360'); ?></div></a>
                    </div>
                    <div class="col-lg-6">
                        <div class="pricing"><?php echo hotel_booking_loop_room_price(); ?></div>
                        <h3><a href="<?php echo esc_url(get_permalink(get_the_id()));?>"><?php the_title(); ?></a></h3>
                        <div class="icon-list">
                            <ul>
                                <li><i class="flaticon-bed"></i><?php echo (get_post_meta( get_the_id(), 'total_bed', true ));?></li>
                                <li><i class="flaticon-bath-1"></i><?php echo (get_post_meta( get_the_id(), 'total_bath', true ));?></li>
                                <li><i class="flaticon-blueprint"></i><?php echo (get_post_meta( get_the_id(), 'room_square_ft', true ));?></li>
                            </ul>
                        </div>
                        <div class="text-two"><?php echo wp_kses(bluebell_trim(get_the_content(), $settings['text_limit']), true); ?></div>
                        <div class="link-btn"><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>" class="theme-btn btn-style-one btn-md"><span><?php esc_html_e('room details', 'bluebell'); ?></span></a></div>
                    </div>
                </div>
            </div>
            <?php endwhile;?>
            
			<?php if($settings['show_pagination']) {?>
            <div class="styled-pagination ms-0 text-center">
                <?php bluebell_the_pagination2(array('total'=>$query->max_num_pages, 'next_text' => '<i class="flaticon-right-arrow"></i> ', 'prev_text' => '<i class="flaticon-left-arrow"></i>')); ?>
            </div>
            <?php } ?>
        </div>
    </section>
                   
	<?php }
    wp_reset_postdata();
	}
}