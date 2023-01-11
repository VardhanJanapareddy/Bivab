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
class Our_Team extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'bluebell_our_team';
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
		return esc_html__( 'Our_Team', 'bluebell' );
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
			'our_team',
			[
				'label' => esc_html__( 'Our Team', 'bluebell' ),
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
				'placeholder' => __( 'Enter your text', 'bluebell' ),
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
				  'options' => get_team_categories()
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
					'two' => esc_html__( 'Choose Dark BG Color', 'bluebell' ),
					'three' => esc_html__( 'Choose White BG Color', 'bluebell' ),
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
			'post_type'      => 'team',
			'posts_per_page' => bluebell_set( $settings, 'query_number' ),
			'orderby'        => bluebell_set( $settings, 'query_orderby' ),
			'order'          => bluebell_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		if( bluebell_set( $settings, 'query_category' ) ) $args['team_categories'] = bluebell_set( $settings, 'query_category' );
		$query = new \WP_Query( $args );
		if ( $query->have_posts() ) 
	{ ?>
        
 	<!-- Our Team -->
    <section class="<?php if($settings['style_two'] == 'three') echo 'team-section light-bg border-shape-top mx-60'; elseif($settings['style_two'] == 'two') echo 'team-section-two dark_bg'; else echo 'team-section mx-60 border-shape-bottom'; ?>">
        <div class="auto-container">
            <?php if($settings['style_two'] == 'two'): ?>
            <div class="top-content">
                <div class="title-box">
                    <div class="sub-title"><?php echo wp_kses( $settings['sub_title'], true );?></div>
                    <h2 class="sec-title text-light "><?php echo wp_kses( $settings['title'], true );?></h2>
                </div>
                <div class="text"><?php echo wp_kses( $settings['text'], true );?> </div>
            </div>
            <?php else: ?>
            <div class="top-content">
                <div class="title-box">
                    <?php if($settings['sub_title']){ ?><div class="sub-title"><?php echo wp_kses( $settings['sub_title'], true );?></div><?php } ?>
                    <?php if($settings['title']){ ?><h2 class="sec-title "><?php echo wp_kses( $settings['title'], true );?></h2><?php } ?>
                    <div class="text">
                        <?php echo wp_kses( $settings['text'], true );?>
                    </div>
                </div>
            </div> 
            <?php endif; ?>
            
            <div class="row">
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                <div class="col-lg-3 col-md-6 team-block-one">
                    <div class="inner-box wow fadeInUp" data-wow-duration="1500ms">
                        <div class="image">
                            <?php the_post_thumbnail('bluebell_270x324'); ?>
                            <div class="overlay-box">
                             	<?php $icons = get_post_meta( get_the_id(), 'social_profile', true );
									if ( ! empty( $icons ) ) :
								?>
                                <ul class="social-links">
                             	   <?php foreach ( $icons as $h_icon ) :
										$header_social_icons = json_decode( urldecode( bluebell_set( $h_icon, 'data' ) ) );
										if ( bluebell_set( $header_social_icons, 'enable' ) == '' ) {
											continue;
										}
										
										$background = bluebell_set($header_social_icons, 'background');
										$color = bluebell_set($header_social_icons, 'color');
										
										if(!empty($background))
											$icon_background = "background-color:".$background.";";
										else
											$icon_background = '';
										
										if(!empty($color))
											$icon_color = "color:".$color.";";
										else
											$icon_color = '';
										
										$icon_class = explode( '-', bluebell_set( $header_social_icons, 'icon' ) ); ?>
                                    <li><a href="<?php echo bluebell_set( $header_social_icons, 'url' ); ?>"><span class="fab <?php echo esc_attr( bluebell_set( $header_social_icons, 'icon' ) ); ?>"></span></a></li>
                                    <?php endforeach; ?>
                                </ul>
                                <?php endif; ?>
                            </div>                                
                        </div>
                        <div class="content">
                            <h4><?php the_title(); ?></h4>
                            <div class="designation"><?php echo (get_post_meta( get_the_id(), 'designation', true ));?></div>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>        
       
	<?php }
    wp_reset_postdata();
	}

}