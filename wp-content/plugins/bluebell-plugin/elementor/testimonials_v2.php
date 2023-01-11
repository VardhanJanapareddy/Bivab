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
class Testimonials_V2 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'bluebell_testimonials_v2';
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
		return esc_html__( 'Testimonials V2', 'bluebell' );
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
			'testimonials_v2',
			[
				'label' => esc_html__( 'Testimonials V2', 'bluebell' ),
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
			'show_author',
			[
				'label' => __( 'Hide/Show Author Info', 'bluebell' ),
				'type' => Controls_Manager::SWITCHER,
				'title' => esc_html__('Enable/Disable Author Info', 'bluebell'),
				'default' => true,
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
					'one' => esc_html__( 'Show without Carousel Testimonials', 'bluebell' ),
					'two' => esc_html__( 'Show Carousel Testimonials ', 'bluebell' ),
				),
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
				'default' => 4,
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
			  'options' => get_testimonials_categories()
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
			'post_type'      => 'testimonials',
			'posts_per_page' => bluebell_set( $settings, 'query_number' ),
			'orderby'        => bluebell_set( $settings, 'query_orderby' ),
			'order'          => bluebell_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		
		if( bluebell_set( $settings, 'query_category' ) ) $args['testimonials_cat'] = bluebell_set( $settings, 'query_category' );
		$query = new \WP_Query( $args );
		if ( $query->have_posts() ) 
	{ ?>
        
        
  	<?php if($settings['style_two'] == 'two'): ?>
 	<!-- Testimonials section three -->
    <section class="testimonials-section-three mx-60 light-bg border-shape-top">
        <div class="auto-container">
            <div class="title-box mb_60">
                <?php if($settings['sub_title']){ ?><div class="sub-title"><?php echo wp_kses($settings['sub_title'], true); ?></div><?php } ?>
                <?php if($settings['title']){ ?><h2 class="sec-title mb-30"><?php echo wp_kses($settings['title'], true); ?></h2><?php } ?>
                <?php if($settings['text']){ ?><div class="text"><?php echo wp_kses($settings['text'], true); ?></div><?php } ?>
            </div>
            <div class="theme_carousel owl-theme owl-carousel" data-options='{"loop": true, "center": false, "margin": 30, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 6000, "smartSpeed": 1000, "responsive":{ "0" :{ "items": "1" }, "480" :{ "items" : "1" }, "600" :{ "items" : "1" }, "768" :{ "items" : "1" } , "992":{ "items" : "2" }, "1200":{ "items" : "2" }}}'>
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                <div class="testimonial-block style-two">                                
                    <h3><span class="quote">“</span><?php the_title(); ?></h3>
                    <div class="text"><?php echo wp_kses(bluebell_trim(get_the_content(), $settings['text_limit']), true); ?> </div>
                  
                   <?php if($settings['show_author']):?>
                    <div class="author-info">
                        <div class="author-thumb"><?php the_post_thumbnail('bluebell_60x59'); ?></div>
                        <div class="name"><?php echo (get_post_meta( get_the_id(), 'author_name', true ));?></div>
                    </div>
           		  <?php endif; ?>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>        
    
    <?php else: ?>

    <!-- testimonials section two -->
    <section class="testimonials-section-two light-bg mx-60 border-shape-top">
        <div class="auto-container">
            <div class="sub-title"><?php echo wp_kses($settings['sub_title'], true); ?></div>
            <h2 class="sec-title mb-30"><?php echo wp_kses($settings['title'], true); ?></h2>
            <div class="title-desc mb_60"><?php echo wp_kses($settings['text'], true); ?></div>
            <div class="row">
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                <div class="col-lg-6">
                    <div class="testimonial-block style-two">                                
                        <h3><span class="quote">“</span><?php the_title(); ?></h3>
                        <div class="text"><?php echo wp_kses(bluebell_trim(get_the_content(), $settings['text_limit']), true); ?> </div>
                       
                       <?php if($settings['show_author']):?>
                        <div class="author-info">
                            <div class="author-thumb"><?php the_post_thumbnail('bluebell_60x59'); ?></div>
                            <div class="name"><?php echo (get_post_meta( get_the_id(), 'author_name', true ));?></div>
                        </div>
                   	  <?php endif; ?>	
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>      
    
	<?php endif; }
    wp_reset_postdata();
	}
}