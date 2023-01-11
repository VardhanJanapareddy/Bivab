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
class Room_Grid_View extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'bluebell_room_grid_view';
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
		return esc_html__( 'Room Grid View', 'bluebell' );
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
			'room_grid_view',
			[
				'label' => esc_html__( 'Room Grid View', 'bluebell' ),
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
			'cat_exclude',
			[
				'label'       => esc_html__( 'Exclude', 'bluebell' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'Exclude categories, etc. by ID with comma separated.', 'bluebell' ),
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
		$this->add_render_attribute( 'wrapper', 'class', 'themeexpo-bluebell' );
		$args = array(
			'post_type'      => 'hb_room',
			'posts_per_page' => bluebell_set( $settings, 'query_number' ),
			'orderby'        => bluebell_set( $settings, 'query_orderby' ),
			'order'          => bluebell_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		$terms_array = explode(",",bluebell_set( $settings, 'cat_exclude' ));
		if(bluebell_set( $settings, 'cat_exclude' )) $args['tax_query'] = array(array('taxonomy' => 'hb_room_type','field' => 'id','terms' => $terms_array,'operator' => 'NOT IN',));
		$allowed_tags = wp_kses_allowed_html('post');
		$query = new \WP_Query( $args );
		$t = '';
		$data_filtration = '';
		$data_posts = '';
		if ( $query->have_posts() ) 
		{
		ob_start();
		?>
  
		<?php 
            $count = 0; 
            $fliteration = array();
            while( $query->have_posts() ): $query->the_post();
            global  $post;
            $meta = ''; //printr($meta);
            $meta1 = ''; //_WSH()->get_meta();
            $post_terms = get_the_terms( get_the_id(), 'hb_room_type');// printr($post_terms); exit();
            foreach( (array)$post_terms as $pos_term ) $fliteration[$pos_term->term_id] = $pos_term;
            $temp_category = get_the_term_list(get_the_id(), 'hb_room_type', '', ', ');
            
            $post_terms = wp_get_post_terms( get_the_id(), 'hb_room_type'); 
            $term_slug = '';
            if( $post_terms ) foreach( $post_terms as $p_term ) $term_slug .= $p_term->slug.' ';
        	
			$term_list = wp_get_post_terms(get_the_id(), 'hb_room_type', array("fields" => "names"));
			$post_thumbnail_id = get_post_thumbnail_id($post->ID);
			$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
			
       	?>
            
        <div class="col-lg-6 room-block-two masonry-item all <?php echo esc_attr($term_slug); ?>">
            <div class="inner-box">
                <a href="<?php echo esc_url(get_permalink(get_the_id()));?>">
                <div class="image">
					<?php the_post_thumbnail('bluebell_520x360'); ?>
                	<div class="text"><?php echo hotel_booking_loop_room_price(); ?></div>
                </div>
                </a>
                <h3><a href="<?php echo esc_url(get_permalink(get_the_id()));?>"><?php the_title(); ?></a> </h3>
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
            
        <?php endwhile;?>       
             
		<?php wp_reset_postdata();
        $data_posts = ob_get_contents();
        ob_end_clean();
        
        ob_start();?>
            
     <?php $terms = get_terms(array('hb_room_type')); ?>

     <!-- gallery section four -->
     <section class="room-grid-section pb-3 light-bg mx-60 border-shape-top border-shape-bottom">
        <div class="container">
            <?php if($settings['title'] || $settings['text']) {?>
            <div class="title-box text-center">
                <?php if($settings['title']) {?><div class="sub-title mb-4"><?php echo wp_kses( $settings['title'], true );?></div><?php } ?>
                <?php if($settings['text']) {?><div class="text"><?php echo wp_kses( $settings['text'], true );?></div><?php } ?>
            </div>
            <?php } ?>
            
            <!--Filter-->
            <div class="filters style-two">
                <ul class="filter-tabs filter-btns">
                    <li class="filter active" data-role="button" data-filter=".all"><?php esc_attr_e('All', 'bluebell');?></li>
                    <?php foreach( $fliteration as $t ): ?>
                  	<li class="filter" data-role="button" data-filter=".<?php echo esc_attr(bluebell_set( $t, 'slug' )); ?>"><?php echo bluebell_set( $t, 'name'); ?></li>
                    <?php endforeach;?>
                </ul>
            </div>
                
            <!--Sortable Galery-->
            <div class="sortable-masonry">
                <div class="items-container row">
                    <?php echo wp_kses($data_posts, true); ?>
                </div>
            </div>
            
        </div>
    </section>
    
	<?php }
	}

}
