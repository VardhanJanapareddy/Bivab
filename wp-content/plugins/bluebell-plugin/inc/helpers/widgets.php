<?php
///----Blog widgets---
//Popular Post
class Bluebell_Popular_Post extends WP_Widget
{
    /** constructor */
    public function __construct()
    {
        parent::__construct( /* Base ID */'Bluebell_Popular_Post', /* Name */esc_html__('Bluebell Popular Post', 'bluebell'), array( 'description' => esc_html__('Show the Popular Post', 'bluebell')));
    }


    /** @see WP_Widget::widget */
    public function widget($args, $instance)
    {
        extract($args);
        $title = apply_filters('widget_title', $instance['title']);

        echo wp_kses_post($before_widget); ?>
		
		<!-- Popular Posts -->
        <div class="sidebar-widget popular-posts">
            <?php echo wp_kses_post($before_title.$title.$after_title); ?>
            
            <?php $query_string = 'posts_per_page='.$instance['number'];
                if( $instance['cat'] ) $query_string .= '&cat='.$instance['cat'];
                $this->posts($query_string);
            ?>
        </div>
        
        
        <?php echo wp_kses_post($after_widget);
    }


    /** @see WP_Widget::update */
    public function update($new_instance, $old_instance)
    {
        $instance = $old_instance;

        $instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = $new_instance['number'];
        $instance['cat'] = $new_instance['cat'];

        return $instance;
    }

    /** @see WP_Widget::form */
    public function form($instance)
    {
        $title = ($instance) ? esc_attr($instance['title']) : esc_html__('Popular Post', 'bluebell');
        $number = ($instance) ? esc_attr($instance['number']) : 3;
        $cat = ($instance) ? esc_attr($instance['cat']) : ''; ?>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'bluebell'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('No. of Posts:', 'bluebell'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr($number); ?>" />
        </p>
		<p>
            <label for="<?php echo esc_attr($this->get_field_id('categories')); ?>"><?php esc_html_e('Category', 'bluebell'); ?></label>
            <?php wp_dropdown_categories(array('show_option_all'=>esc_html__('All Categories', 'bluebell'), 'taxonomy' => 'category', 'selected'=>$cat, 'class'=>'widefat', 'name'=>$this->get_field_name('cat'))); ?>
        </p>

        <?php
    }

    public function posts($query_string)
    {
        $query = new WP_Query($query_string);
        if ($query->have_posts()):?>

            <!-- Title -->
            <?php
                global $post;
				while ($query->have_posts()): $query->the_post();
				$post_thumbnail_id = get_post_thumbnail_id($post->ID);
				$post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id); 
			?>
            <article class="post">
                <figure class="post-thumb" style="background-image:url(<?php echo esc_url($post_thumbnail_url); ?>)"><a href="<?php echo esc_url(get_the_permalink(get_the_id())); ?>"></a></figure>
                <div class="text"><a href="<?php echo esc_url(get_the_permalink(get_the_id())); ?>"><?php the_title(); ?></a></div>
                <div class="post-info"><?php echo esc_attr(get_the_date()); ?></div>
            </article>
            <?php endwhile; ?>

        <?php endif;
        wp_reset_postdata();
    }
}


///----footer widgets---
//About Company
class Bluebell_About_Company extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Bluebell_About_Company', /* Name */esc_html__('Bluebell About Company','bluebell'), array( 'description' => esc_html__('Show the About Company', 'bluebell' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		
		echo wp_kses_post($before_widget);?>
      		
            <div class="contact-widget">
                <?php if($instance['widget_logo_img']){ ?>
                <div class="image"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url($instance['widget_logo_img']); ?>" alt="<?php esc_attr_e('Awesome Image', 'bluebell'); ?>" /></a></div>
                <?php } ?>
                <table>
                   <?php if($instance['phone']){ ?>
                    <tr>
                      <td class="lebel"><?php esc_html_e('Tel :', 'bluebell'); ?></td>
                      <td><a href="tel:<?php echo esc_attr($instance['phone']); ?>"><?php echo wp_kses_post($instance['phone']); ?></a></td>
                     </tr>
                    <?php } ?>
                    <?php if($instance['email']){ ?>
                    <tr>
                      <td class="lebel"><?php esc_html_e('Email :', 'bluebell'); ?></td>
                      <td><a href="mailto:<?php echo sanitize_email($instance['email']); ?>"><?php echo sanitize_email($instance['email']); ?></a></td>
                    </tr>
                    <?php } ?>
                  	<?php if($instance['location']){ ?>
                    <tr>
                      <td class="lebel"><?php esc_html_e('Location :', 'bluebell'); ?></td>
                      <td><?php echo wp_kses_post($instance['location']); ?></td>
                     </tr>
                    <?php } ?>
                </table>
            </div>    
            
           
        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['widget_logo_img'] = $new_instance['widget_logo_img'];
		$instance['phone'] = $new_instance['phone'];
		$instance['email'] = $new_instance['email'];
		$instance['location'] = $new_instance['location'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$widget_logo_img = ($instance) ? esc_attr($instance['widget_logo_img']) : 'http://fastwpdemo.com/newwp/bluebell/wp-content/uploads/2021/12/footer-1.png';
		$phone = ($instance) ? esc_attr($instance['phone']) : '';
		$email = ($instance) ? esc_attr($instance['email']) : '';
		$location = ($instance) ? esc_attr($instance['location']) : '';
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('widget_logo_img')); ?>"><?php esc_html_e('Enter Logo Image:', 'bluebell'); ?></label>
            <input placeholder="<?php esc_attr_e('Image Url', 'bluebell');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('widget_logo_img')); ?>" name="<?php echo esc_attr($this->get_field_name('widget_logo_img')); ?>" type="text" value="<?php echo esc_attr($widget_logo_img); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('phone')); ?>"><?php esc_html_e('phone:', 'bluebell'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('phone')); ?>" name="<?php echo esc_attr($this->get_field_name('phone')); ?>" ><?php echo wp_kses_post($phone); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('email')); ?>"><?php esc_html_e('email:', 'bluebell'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('email')); ?>" name="<?php echo esc_attr($this->get_field_name('email')); ?>" ><?php echo wp_kses_post($email); ?></textarea>
        </p>    
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('location')); ?>"><?php esc_html_e('location:', 'bluebell'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('location')); ?>" name="<?php echo esc_attr($this->get_field_name('location')); ?>" ><?php echo wp_kses_post($location); ?></textarea>
        </p>            
                
		<?php 
	}
	
}

//Subscribe Us
class Bluebell_Subscribe_Us extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Bluebell_Subscribe_Us', /* Name */esc_html__('Bluebell Subscribe Us','bluebell'), array( 'description' => esc_html__('Show the Subscribe Us', 'bluebell' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters('widget_title', $instance['title']);
		
		echo wp_kses_post($before_widget);?>
      		
			<!--Start Single Sidebar Box-->
            <div class="newsletter-widget">    
                <?php echo wp_kses_post($before_title.$title.$after_title); ?>                 
                <div class="widget-content">
                    <div class="newsletter-form">
                        <div class="ajax-sub-form">
                            <?php echo do_shortcode($instance['form_url']); ?>
                        </div>
                    </div>
                </div>
            </div>
            
        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['form_url'] = $new_instance['form_url'];
		
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : 'Subscribe Us';
		$form_url = ($instance) ? esc_attr($instance['form_url']) : '';
		
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Enter Title:', 'bluebell'); ?></label>
            <input placeholder="<?php esc_attr_e('Subscribe Us', 'bluebell');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('form_url')); ?>"><?php esc_html_e('Mail Chimp Form Url:', 'bluebell'); ?></label>
            <input placeholder="<?php esc_attr_e('MailChimp Form Url', 'bluebell');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('form_url')); ?>" name="<?php echo esc_attr($this->get_field_name('form_url')); ?>" type="text" value="<?php echo esc_attr($form_url); ?>" />
        </p>
               
		<?php 
	}
	
}










