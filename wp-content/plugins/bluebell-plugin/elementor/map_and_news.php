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
class Map_And_News extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'bluebell_map_and_news';
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
		return esc_html__( 'Map_And_News', 'bluebell' );
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
			'map_and_news',
			[
				'label' => esc_html__( 'Map And News', 'bluebell' ),
			]
		);
		$this->add_control(
			'map_sub_title',
			[
				'label'       => __( 'Map Sub Title', 'bluebell' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Map sub title', 'bluebell' ),
			]
		);
		$this->add_control(
			'map_title',
			[
				'label'       => __( 'Map Title', 'bluebell' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Map title', 'bluebell' ),
			]
		);
		$this->add_control(
			'google_map_code',
			[
				'label'  => __( 'Google Map Code', 'nitech' ),
				'type'   => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Google Map Code', 'nitech' )
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
			  'options' => get_blog_categories()
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
					'one' => esc_html__( 'Choose Gray BG Color', 'bluebell' ),
					'two' => esc_html__( 'Choose White BG Color', 'bluebell' ),
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
			'post_type'      => 'post',
			'posts_per_page' => bluebell_set( $settings, 'query_number' ),
			'orderby'        => bluebell_set( $settings, 'query_orderby' ),
			'order'          => bluebell_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		
		if( bluebell_set( $settings, 'query_category' ) ) $args['blog_categories'] = bluebell_set( $settings, 'query_category' );
		$query = new \WP_Query( $args );
		if ( $query->have_posts() ) 
	{ ?>
        
 	<!-- news section two -->
    <section class="news-section-two mx-60 border-shape-bottom <?php if($settings['style_two'] == 'two') echo 'light-bg'; else echo ''; ?>">
        <div class="auto-container">
            
            <div class="row">
                <div class="col-lg-5">
                    <?php if($settings['map_sub_title'] || $settings['map_title']){ ?>
                    <div class="title-box">
                        <?php if($settings['map_sub_title']){ ?><div class="sub-title"><?php echo wp_kses($settings['map_sub_title'], true); ?></div><?php } ?>
                        <?php if($settings['map_title']){ ?><h2 class="sec-title"><?php echo wp_kses($settings['map_title'], true); ?></h2><?php } ?>
                    </div>
                    <?php } ?>
                    <?php if($settings['google_map_code']){ ?>
                    <div class="contact-map">
                        <?php echo do_shortcode( $settings['google_map_code'] );?>
                    </div>
                    <?php } ?>
                </div>
                <div class="col-lg-7">
                    <?php if($settings['sub_title'] || $settings['title']){ ?>
                    <div class="title-box">
                        <?php if($settings['sub_title']){ ?><div class="sub-title"><?php echo wp_kses($settings['sub_title'], true); ?></div><?php } ?>
                        <?php if($settings['title']){ ?><h2 class="sec-title"><?php echo wp_kses($settings['title'], true); ?></h2><?php } ?>
                    </div>
                    <?php } ?>
                    <div class="row">
                    	<?php while ( $query->have_posts() ) : $query->the_post(); ?>
                        <div class="col-md-6 news-block">
                            <div class="inner-box">
                                <div class="image"><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_post_thumbnail('bluebell_370x272'); ?></a></div>
                                <div class="lower-content">
                                    <div class="date"><?php echo get_the_date('d'); ?> <br><span><?php echo get_the_date('M'); ?></span></div>
                                    <div class="post-meta"><?php the_author(); ?>  /  <?php comments_number( wp_kses(__('0 Comments' , 'bluebell'), true), wp_kses(__('1 Comment' , 'bluebell'), true), wp_kses(__('% Comments' , 'bluebell'), true)); ?></div>
                                    <h3><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_title(); ?></a></h3>
                                    <div class="link-btn"><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>" class="theme-btn btn-style-three"><span><?php esc_html_e('Read More', 'bluebell'); ?></span></a></div>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div> 
        </div>
    </section>       
   	
	<?php }
    wp_reset_postdata();
	}

}