<?php
///----Blog widgets---
//Popular Post
class Purehearts_Popular_Post extends WP_Widget
{
    /** constructor */
    public function __construct()
    {
        parent::__construct( /* Base ID */'Purehearts_Popular_Post', /* Name */esc_html__('Purehearts Popular Post', 'purehearts'), array( 'description' => esc_html__('Show the Popular Post', 'purehearts')));
    }


    /** @see WP_Widget::widget */
    public function widget($args, $instance)
    {
        extract($args);
        $title = apply_filters('widget_title', $instance['title']);

        echo wp_kses_post($before_widget); ?>

		<!-- Categories Widget -->
        <div class="post-widget">
            <?php echo wp_kses_post($before_title.$title.$after_title); ?>
            <div class="post-inner">
                <?php $query_string = array('showposts'=>$instance['number']);
				if ($instance['cat']) {
					$query_string['tax_query'] = array(array('taxonomy' => 'category','field' => 'id','terms' => (array)$instance['cat']));
				}
				$this->posts($query_string); ?>
            </div>
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
        $title = ($instance) ? esc_attr($instance['title']) : esc_html__('Popular Post', 'purehearts');
        $number = ($instance) ? esc_attr($instance['number']) : 3;
        $cat = ($instance) ? esc_attr($instance['cat']) : ''; ?>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'purehearts'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('No. of Posts:', 'purehearts'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr($number); ?>" />
        </p>
		<p>
            <label for="<?php echo esc_attr($this->get_field_id('categories')); ?>"><?php esc_html_e('Category', 'purehearts'); ?></label>
            <?php wp_dropdown_categories(array('show_option_all'=>esc_html__('All Categories', 'purehearts'), 'taxonomy' => 'category', 'selected'=>$cat, 'class'=>'widefat', 'name'=>$this->get_field_name('cat'))); ?>
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
            <div class="post">
                <figure class="post-thumb" style="background-image:url(<?php echo esc_url($post_thumbnail_url); ?>)"><a href="<?php echo esc_url(get_the_permalink(get_the_id())); ?>"></a></figure>
                <h5><a href="<?php echo esc_url(get_the_permalink(get_the_id())); ?>"><?php the_title(); ?></a></h5>
                <span class="post-date"><?php echo get_the_date(); ?></span>
            </div>
            <?php endwhile; ?>

        <?php endif;
        wp_reset_postdata();
    }
}

//Subscribe Us
class Purehearts_Subscribe_Us extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Purehearts_Subscribe_Us', /* Name */esc_html__('Purehearts Subscribe Us','purehearts'), array( 'description' => esc_html__('Show the Subscribe Us', 'purehearts' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget);?>
      		
			
            <!-- Contact Widget two -->
            <div class="sidebar-widget subscribe-widget centred">
                <div class="widget-content">
                    <div class="upper-content" <?php if($instance['bg_img']){ ?>style="background-image: url(<?php echo esc_url($instance['bg_img']); ?>);"<?php } ?>>
                        <div class="icon-box"><i class="icon-email-open-sketched-envelope"></i></div>
                        <h3><?php echo wp_kses_post($instance['title']); ?></h3>
                        <p><?php echo wp_kses_post($instance['text']); ?></p>
                    </div>
                    <?php if($instance['mailchimp_form_url2'] || $instance['form_text']){ ?>
                    <div class="lower-content">
                        <?php if($instance['mailchimp_form_url2']){ ?>
                        <div class="subscribe-form">
                            <?php echo do_shortcode($instance['mailchimp_form_url2']); ?>
                        </div>
                        <?php } ?>
                        <?php if($instance['form_text']){ ?><p><?php echo wp_kses_post($instance['form_text']); ?></p><?php } ?>
                    </div>
                    <?php } ?>
                </div>
            </div>
            
        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['bg_img'] = strip_tags($new_instance['bg_img']);
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['text'] = $new_instance['text'];
		$instance['mailchimp_form_url2'] = $new_instance['mailchimp_form_url2'];
		$instance['form_text'] = $new_instance['form_text'];
		
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$bg_img = ($instance) ? esc_attr($instance['bg_img']) : '';
		$title = ($instance) ? esc_attr($instance['title']) : 'Subscribe Us';
		$text = ($instance) ? esc_attr($instance['text']) : '';
		$mailchimp_form_url2 = ($instance) ? esc_attr($instance['mailchimp_form_url2']) : '';
		$form_text = ($instance) ? esc_attr($instance['form_text']) : '';
		
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('bg_img')); ?>"><?php esc_html_e('Background Image:', 'purehearts'); ?></label>
            <input placeholder="<?php esc_attr_e('BG Image Url', 'purehearts');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('bg_img')); ?>" name="<?php echo esc_attr($this->get_field_name('bg_img')); ?>" type="text" value="<?php echo esc_attr($bg_img); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Enter Title:', 'purehearts'); ?></label>
            <input placeholder="<?php esc_attr_e('Subscribe Us', 'purehearts');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('text')); ?>"><?php esc_html_e('Content:', 'purehearts'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('text')); ?>" name="<?php echo esc_attr($this->get_field_name('text')); ?>" ><?php echo wp_kses_post($text); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('mailchimp_form_url2')); ?>"><?php esc_html_e('MailChimp Form Url', 'purehearts'); ?></label>
            <input placeholder="<?php esc_attr_e('MailChimp Form Url', 'purehearts');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('mailchimp_form_url2')); ?>" name="<?php echo esc_attr($this->get_field_name('mailchimp_form_url2')); ?>" type="text" value="<?php echo esc_attr($mailchimp_form_url2); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('form_text')); ?>"><?php esc_html_e('Bottom Description:', 'purehearts'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('form_text')); ?>" name="<?php echo esc_attr($this->get_field_name('form_text')); ?>" ><?php echo wp_kses_post($form_text); ?></textarea>
        </p> 
               
		<?php 
	}
	
}


///----footer widgets---
//About Company
class Purehearts_About_Company extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Purehearts_About_Company', /* Name */esc_html__('Purehearts About Company','purehearts'), array( 'description' => esc_html__('Show the About Company', 'purehearts' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		
		echo wp_kses_post($before_widget);?>
      		
			<!--Footer Column-->
            <div class="about-widget">
                <?php if($instance['subtitle'] || $instance['title']){ ?>
                <div class="title-box">
                    <div class="icon-box"><i class="icon-hand"></i></div>
                    <?php if($instance['subtitle']){ ?><span><?php echo wp_kses_post($instance['subtitle']); ?></span><?php } ?>
                    <?php if($instance['title']){ ?><h3><?php echo wp_kses_post($instance['title']); ?></h3><?php } ?>
                </div>
                <?php } ?>
                <div class="text">
                    <p><?php echo wp_kses_post($instance['content']); ?></p>
                    <?php if($instance['btn_link'] && $instance['btn_title']){ ?>
                    <a href="<?php echo esc_url($instance['btn_link']); ?>" class="theme-btn btn-one"><?php echo wp_kses_post($instance['btn_title']); ?></a>
                	<?php } ?>
                </div>
            </div>
            
        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['subtitle'] = $new_instance['subtitle'];
		$instance['title'] = $new_instance['title'];
		$instance['content'] = $new_instance['content'];
		$instance['btn_title'] = $new_instance['btn_title'];
		$instance['btn_link'] = $new_instance['btn_link'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$subtitle = ($instance) ? esc_attr($instance['subtitle']) : 'Charity of Choice';
		$title = ($instance) ? esc_attr($instance['title']) : 'Partner With Us';
		$content = ($instance) ? esc_attr($instance['content']) : '';
		$btn_title = ($instance) ? esc_attr($instance['btn_title']) : '';
		$btn_link = ($instance) ? esc_attr($instance['btn_link']) : '';
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('subtitle')); ?>"><?php esc_html_e('Sub Title:', 'purehearts'); ?></label>
            <input placeholder="<?php esc_attr_e('Charity of Choice', 'purehearts');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('subtitle')); ?>" name="<?php echo esc_attr($this->get_field_name('subtitle')); ?>" type="text" value="<?php echo esc_attr($subtitle); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'purehearts'); ?></label>
            <input placeholder="<?php esc_attr_e('Partner With Us', 'purehearts');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content')); ?>"><?php esc_html_e('Content:', 'purehearts'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content')); ?>" name="<?php echo esc_attr($this->get_field_name('content')); ?>" ><?php echo wp_kses_post($content); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('btn_title')); ?>"><?php esc_html_e('Button Title:', 'purehearts'); ?></label>
            <input placeholder="<?php esc_attr_e('Join With Us', 'purehearts');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('btn_title')); ?>" name="<?php echo esc_attr($this->get_field_name('btn_title')); ?>" type="text" value="<?php echo esc_attr($btn_title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('btn_link')); ?>"><?php esc_html_e('Button Link:', 'purehearts'); ?></label>
            <input placeholder="<?php esc_attr_e('#', 'purehearts');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('btn_link')); ?>" name="<?php echo esc_attr($this->get_field_name('btn_link')); ?>" type="text" value="<?php echo esc_attr($btn_link); ?>" />
        </p>              
                
		<?php 
	}
	
}

//Contact Info
class Purehearts_Contact_Info extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Purehearts_Contact_Info', /* Name */esc_html__('Purehearts Contact Info','purehearts'), array( 'description' => esc_html__('Show the Contact Info', 'purehearts' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		
		echo wp_kses_post($before_widget);?>
      		
            <div class="contact-widget ml-30">
                <?php if($instance['subtitle'] || $instance['title']){ ?>
                <div class="title-box">
                    <div class="icon-box"><i class="icon-donation-2"></i></div>
                    <?php if($instance['subtitle']){ ?><span><?php echo wp_kses_post($instance['subtitle']); ?></span><?php } ?>
                    <?php if($instance['title']){ ?><h3><?php echo wp_kses_post($instance['title']); ?></h3><?php } ?>
                </div>
                <?php } ?>
                
                <div class="widget-content">
                    <?php if($instance['phone_no'] || $instance['email_address']){ ?>
                    <div class="single-item">
                        <?php if($instance['phone_no']){ ?><h3><a href="tel:<?php echo esc_attr($instance['phone_no']); ?>"><?php echo wp_kses_post($instance['phone_no']); ?></a></h3><?php } ?>
                        <?php if($instance['email_address']){ ?><p><a href="mailto:<?php echo esc_attr($instance['email_address']); ?>"><?php echo wp_kses_post($instance['email_address']); ?></a></p><?php } ?>
                    </div>
                    <?php } ?>
                    
                    <?php if($instance['sub_heading'] || $instance['address']){ ?>
                    <div class="single-item">
                        <?php if($instance['sub_heading']){ ?><h5><?php echo wp_kses_post($instance['sub_heading']); ?></h5><?php } ?>
                        <?php if($instance['address']){ ?><p><?php echo wp_kses_post($instance['address']); ?></p><?php } ?>
                    </div>
                    <?php } ?>
                </div>
            </div>
                
        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['subtitle'] = strip_tags($new_instance['subtitle']);
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['phone_no'] = $new_instance['phone_no'];
		$instance['email_address'] = $new_instance['email_address'];
		$instance['sub_heading'] = $new_instance['sub_heading'];
		$instance['address'] = $new_instance['address'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		
		$subtitle = ($instance) ? esc_attr($instance['subtitle']) : 'Pure Hearts';
		$title = ($instance) ? esc_attr($instance['title']) : 'Giving / Enquiry';
		$phone_no = ($instance) ? esc_attr($instance['phone_no']) : '';
		$email_address = ($instance) ? esc_attr($instance['email_address']) : '';
		$sub_heading = ($instance) ? esc_attr($instance['sub_heading']) : '';
		$address = ($instance) ? esc_attr($instance['address']) : '';
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('subtitle')); ?>"><?php esc_html_e('Enter Sub Title:', 'purehearts'); ?></label>
            <input placeholder="<?php esc_attr_e('Pure Hearts', 'purehearts');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('subtitle')); ?>" name="<?php echo esc_attr($this->get_field_name('subtitle')); ?>" type="text" value="<?php echo esc_attr($subtitle); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Enter Title:', 'purehearts'); ?></label>
            <input placeholder="<?php esc_attr_e('Giving / Enquiry', 'purehearts');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('phone_no')); ?>"><?php esc_html_e('Phone Number:', 'purehearts'); ?></label>
            <input placeholder="<?php esc_attr_e('+1-800-555-44-678', 'purehearts');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('phone_no')); ?>" name="<?php echo esc_attr($this->get_field_name('phone_no')); ?>" type="text" value="<?php echo esc_attr($phone_no); ?>" />
        </p> 
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('email_address')); ?>"><?php esc_html_e('Email Addess:', 'purehearts'); ?></label>
            <input placeholder="<?php esc_attr_e('info@example.com', 'purehearts');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('email_address')); ?>" name="<?php echo esc_attr($this->get_field_name('email_address')); ?>" type="text" value="<?php echo esc_attr($email_address); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('sub_heading')); ?>"><?php esc_html_e('Enter Sub Heading:', 'purehearts'); ?></label>
            <input placeholder="<?php esc_attr_e('Charity Shop', 'purehearts');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('sub_heading')); ?>" name="<?php echo esc_attr($this->get_field_name('sub_heading')); ?>" type="text" value="<?php echo esc_attr($sub_heading); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('address')); ?>"><?php esc_html_e('Address:', 'purehearts'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('address')); ?>" name="<?php echo esc_attr($this->get_field_name('address')); ?>" ><?php echo wp_kses_post($address); ?></textarea>
        </p>
               
                
		<?php 
	}
	
}


///----footer Two widgets---
//About Company V2
class Purehearts_About_Company_V2 extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Purehearts_About_Company_V2', /* Name */esc_html__('Purehearts About Company V2','purehearts'), array( 'description' => esc_html__('Show the About Company V2', 'purehearts' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget);?>
      		
			<!--Footer Column-->
            <div class="about-widget">
                <?php echo wp_kses_post($before_title.$title.$after_title); ?>
                <div class="widget-content">
                    <p><?php echo wp_kses_post($instance['content']); ?></p>
                    
					<?php if($instance['copyright_text']){ ?>
                    <div class="inner">
                        <div class="icon-box"><i class="icon-charity"></i></div>
                        <p><?php echo wp_kses_post($instance['copyright_text']); ?></p>
                    </div>
                    <?php } ?>
                    
					<?php if($instance['btn_link'] && $instance['btn_title']){ ?>
                    <div class="links"><a href="<?php echo esc_url($instance['btn_link']); ?>"><i class="fa fa-angle-right"></i><?php echo wp_kses_post($instance['btn_title']); ?></a></div>
                    <?php } ?>
                </div>
            </div>
            
        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = $new_instance['title'];
		$instance['content'] = $new_instance['content'];
		$instance['copyright_text'] = $new_instance['copyright_text'];
		$instance['btn_title'] = $new_instance['btn_title'];
		$instance['btn_link'] = $new_instance['btn_link'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : 'About Charity';
		$content = ($instance) ? esc_attr($instance['content']) : '';
		$copyright_text = ($instance) ? esc_attr($instance['copyright_text']) : '';
		$btn_title = ($instance) ? esc_attr($instance['btn_title']) : '';
		$btn_link = ($instance) ? esc_attr($instance['btn_link']) : '';
		?>
        
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'purehearts'); ?></label>
            <input placeholder="<?php esc_attr_e('About Charity', 'purehearts');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content')); ?>"><?php esc_html_e('Content:', 'purehearts'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content')); ?>" name="<?php echo esc_attr($this->get_field_name('content')); ?>" ><?php echo wp_kses_post($content); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('copyright_text')); ?>"><?php esc_html_e('Copyright Content:', 'purehearts'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('copyright_text')); ?>" name="<?php echo esc_attr($this->get_field_name('copyright_text')); ?>" ><?php echo wp_kses_post($copyright_text); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('btn_title')); ?>"><?php esc_html_e('Button Title:', 'purehearts'); ?></label>
            <input placeholder="<?php esc_attr_e('More About Us', 'purehearts');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('btn_title')); ?>" name="<?php echo esc_attr($this->get_field_name('btn_title')); ?>" type="text" value="<?php echo esc_attr($btn_title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('btn_link')); ?>"><?php esc_html_e('Button Link:', 'purehearts'); ?></label>
            <input placeholder="<?php esc_attr_e('#', 'purehearts');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('btn_link')); ?>" name="<?php echo esc_attr($this->get_field_name('btn_link')); ?>" type="text" value="<?php echo esc_attr($btn_link); ?>" />
        </p>              
                
		<?php 
	}
	
}

//Recent Posts
class Purehearts_Recent_Posts extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Purehearts_Recent_Posts', /* Name */esc_html__('Purehearts Recent Posts','purehearts'), array( 'description' => esc_html__('Show the Recent Posts', 'purehearts' )) );
	}
 

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget); ?>
		
        <!--Recent Posts-->
        <div class="post-widget">
            <?php echo wp_kses_post($before_title.$title.$after_title); ?>
            <div class="post-inner">
                <?php $query_string = array('showposts'=>$instance['number']);
				if ($instance['cat']) {
					$query_string['tax_query'] = array(array('taxonomy' => 'category','field' => 'id','terms' => (array)$instance['cat']));
				}
				$this->posts($query_string); ?>
            </div>
        </div>
        
		<?php echo wp_kses_post($after_widget);
	}
 
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ( $instance ) ? esc_attr($instance['title']) : esc_html__('Recent Posts', 'purehearts');
		$number = ( $instance ) ? esc_attr($instance['number']) : 2;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : '';?>
			
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'purehearts'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('No. of Posts:', 'purehearts'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('categories')); ?>"><?php esc_html_e('Category', 'purehearts'); ?></label>
            <?php wp_dropdown_categories(array('show_option_all'=>esc_html__('All Categories', 'purehearts'), 'taxonomy' => 'category', 'selected'=>$cat, 'class'=>'widefat', 'name'=>$this->get_field_name('cat'))); ?>
        </p>
            
		<?php 
	}
	
	function posts($query_string)
	{
		
		$query = new WP_Query($query_string);
		if( $query->have_posts() ):?>
        
           	<!-- Title -->
			<?php 
				global $post;
				while ( $query->have_posts() ) : $query->the_post(); 
				$post_thumbnail_id = get_post_thumbnail_id($post->ID);
				$post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id);
			?>
            <div class="post">
                <figure class="post-thumb" style="background-image:url(<?php echo esc_url($post_thumbnail_url);?>);"><a href="<?php echo esc_url(get_the_permalink(get_the_id()));?>"></a></figure>
                <h4><a href="<?php echo esc_url(get_the_permalink(get_the_id()));?>"><?php the_title(); ?></a></h4>
                <span><?php echo get_the_date();?></span>
            </div>
            <?php endwhile; ?>
            
        <?php endif;
		wp_reset_postdata();
    }
}

//Our Projects
class Purehearts_Our_Projects extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Purehearts_Our_Projects', /* Name */esc_html__('Purehearts Our Projects','purehearts'), array( 'description' => esc_html__('Show the Our Projects', 'purehearts' )) );
	}
 
	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget); ?>
		
        <!-- Instagram Widget -->
        <div class="gallery-widget">
            <?php echo wp_kses_post($before_title.$title.$after_title); ?>
            <div class="widget-content">
                <ul class="image-list clearfix">
                    <?php 
						$args = array('post_type' => 'project', 'showposts'=>$instance['number']);
						if( $instance['cat'] ) $args['tax_query'] = array(array('taxonomy' => 'project_cat','field' => 'id','terms' => (array)$instance['cat']));
						$this->posts($args);
                    ?>
                </ul>
                <?php if($instance['btn_link'] && $instance['btn_title']){ ?>
                <div class="more-links"><a href="<?php echo esc_url($instance['btn_link']); ?>"><i class="fa fa-angle-right"></i><?php echo wp_kses_post($instance['btn_title']); ?></a></div>
                <?php } ?>
            </div>
        </div>
        
        <?php echo wp_kses_post($after_widget);
	}
 
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = $new_instance['title'];
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		$instance['btn_title'] = $new_instance['btn_title'];
		$instance['btn_link'] = $new_instance['btn_link'];
		
		return $instance;
	}
	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ( $instance ) ? esc_attr($instance['title']) : 'Our Projects';
		$number = ( $instance ) ? esc_attr($instance['number']) : 6;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : '';
		$btn_title = ( $instance ) ? esc_attr($instance['btn_title']) : '';
		$btn_link = ( $instance ) ? esc_attr($instance['btn_link']) : '';
		?>
		
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'purehearts'); ?></label>
            <input placeholder="<?php esc_attr_e('Our Projects', 'purehearts');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('Number of posts: ', 'purehearts'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('cat')); ?>"><?php esc_html_e('Category', 'purehearts'); ?></label>
            <?php wp_dropdown_categories( array('show_option_all'=>esc_html__('All Categories', 'purehearts'), 'selected'=>$cat, 'taxonomy' => 'project_cat', 'class'=>'widefat', 'name'=>$this->get_field_name('cat')) ); ?>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('btn_title')); ?>"><?php esc_html_e('Button Title:', 'purehearts'); ?></label>
            <input placeholder="<?php esc_attr_e('Read More', 'purehearts');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('btn_title')); ?>" name="<?php echo esc_attr($this->get_field_name('btn_title')); ?>" type="text" value="<?php echo esc_attr($btn_title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('btn_link')); ?>"><?php esc_html_e('Button Link:', 'purehearts'); ?></label>
            <input placeholder="<?php esc_attr_e('#', 'purehearts');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('btn_link')); ?>" name="<?php echo esc_attr($this->get_field_name('btn_link')); ?>" type="text" value="<?php echo esc_attr($btn_link); ?>" />
        </p> 
        
		<?php 
	}
	
	function posts($args)
	{
		
		$query = new WP_Query($args);
		if( $query->have_posts() ):?>
        
           	<!-- Title -->
            <?php 
				global $post;
				while( $query->have_posts() ): $query->the_post(); 
				$post_thumbnail_id = get_post_thumbnail_id($post->ID);
				$post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id); 
			?>
            <li>
                <figure class="image" style="background-image:url(<?php echo esc_url($post_thumbnail_url);?>);">
                    <a href="<?php echo esc_url(get_post_meta( get_the_id(), 'project_url', true ));?>"><i class="fa fa-expand"></i></a>
                </figure>
            </li>
            <?php endwhile; ?>
                
        <?php endif;
		wp_reset_postdata();
    }
}

