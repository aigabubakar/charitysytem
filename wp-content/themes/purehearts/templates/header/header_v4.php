<?php
$options = purehearts_WSH()->option();
$allowed_html = wp_kses_allowed_html( 'post' );

//Light Color Logo Settings
$light_logo = $options->get( 'light_color_logo' );
$light_logo_dimension = $options->get( 'light_color_logo_dimension' );

$logo_type = '';
$logo_text = '';
$logo_typography = ''; ?>

<div class="boxed_wrapper rtl">
	
    <?php if( $options->get( 'theme_preloader' ) ):?>
    <!-- Preloader -->
    <div class="loader-wrap">
        <div class="preloader"><div class="preloader-close"><?php esc_html_e('Preloader Close', 'purehearts'); ?></div></div>
        <div class="layer layer-one"><span class="overlay"></span></div>
        <div class="layer layer-two"><span class="overlay"></span></div>        
        <div class="layer layer-three"><span class="overlay"></span></div>
    </div>
	<?php endif; ?>

    <!-- main header -->
    <header class="main-header header-style-one">
        <!-- logo-box -->
        <div class="logo-box">
            <div class="shape" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape-1.png);"></div>
            <figure class="logo"><?php echo purehearts_logo( $logo_type, $light_logo, $light_logo_dimension, $logo_text, $logo_typography ); ?></figure>
        </div>
        
        <?php if( $options->get('show_header_topbar_v4') ){?>
        <!-- header-top -->
        <div class="header-top">
            <div class="outer-container">
                <div class="top-inner clearfix">
                    <div class="left-column pull-left">
                        <ul class="info-list clearfix">
                            <?php if( $options->get('phone_no_v4') ){?>
                            <li>
                                <i class="icon-chat"></i>
                                <span><?php esc_html_e('Helpline:', 'purehearts'); ?></span>
                                <a href="tel:<?php echo esc_attr($options->get('phone_no_v4')); ?>"><?php echo wp_kses($options->get('phone_no_v4'), true); ?></a>
                            </li>
                            <?php } ?>
                            <?php if( $options->get('email_address_v4') ){?>
                            <li>
                                <a href="mailto:<?php echo esc_attr($options->get('email_address_v4')); ?>"><?php echo wp_kses($options->get('email_address_v4'), true); ?></a>
                            </li>
                            <?php } ?>
                            <?php if( $options->get('address_v4') ){?>
                            <li>
                                <?php echo wp_kses($options->get('address_v4'), true); ?>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <?php if( $options->get('welcome_text_v4') ){?>
                    <div class="right-column pull-right">
                        <div class="update-news">
                            <p><i class="icon-megaphone"></i><?php echo wp_kses($options->get('welcome_text_v4'), true); ?></p>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <?php if( $options->get('show_donate_btn_v4') ){?>
            <!-- donate-btn -->
            <div class="donate-btn">
                <a href="<?php echo esc_url($options->get('btn_link_v4')); ?>" class="donate-box-btn theme-btn btn-one"><?php echo wp_kses($options->get('btn_title_v4'), true); ?></a>
            </div>
            <?php } ?>
        </div>
        <?php } ?>
        
        <!-- header-lower -->
        <div class="header-lower">
            <div class="outer-container">
                <div class="outer-box">
                    <?php if( $options->get('volunteer_text_v4') ){?> 
                    <div class="text">
                        <a href="<?php echo esc_url( $options->get( 'vol_link4' ) );?>">
                        <figure class="icon-box"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icons/heart-1.png" alt="<?php esc_attr_e('Awesome Image', 'purehearts'); ?>"></figure>
                        <span><?php echo wp_kses($options->get('volunteer_text_v4'), true); ?></span>
                        </a>
                    </div>
                    <?php } ?>
                    <div class="menu-area clearfix">
                        <!--Mobile Navigation Toggler-->
                        <div class="mobile-nav-toggler">
                            <i class="icon-bar"></i>
                            <i class="icon-bar"></i>
                            <i class="icon-bar"></i>
                        </div>
                        <nav class="main-menu navbar-expand-md navbar-light">
                            <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                <ul class="navigation clearfix">
                                    <?php wp_nav_menu( array( 'theme_location' => 'rtl_menu', 'container_id' => 'navbar-collapse-1',
                                        'container_class'=>'navbar-collapse collapse navbar-right',
                                        'menu_class'=>'nav navbar-nav',
                                        'fallback_cb'=>false,
                                        'items_wrap' => '%3$s',
                                        'container'=>false,
                                        'depth'=>'3',
                                        'walker'=> new Bootstrap_walker()
                                    ) ); ?> 
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <div class="nav-right-content clearfix">
                        <?php 
							$icons = $options->get( 'header_social_share_v4' );
							if ( !empty( $icons ) ) : 
						?>
                        <ul class="social-style-one clearfix">
                            <?php foreach ( $icons as $h_icon ) :
							$header_social_icons = json_decode( urldecode( purehearts_set( $h_icon, 'data' ) ) );
							if ( purehearts_set( $header_social_icons, 'enable' ) == '' ) {
								continue;
							}
							$icon_class = explode( '-', purehearts_set( $header_social_icons, 'icon' ) ); ?>
							<li><a href="<?php echo esc_url(purehearts_set( $header_social_icons, 'url' )); ?>" style="background-color:<?php echo esc_attr(purehearts_set( $header_social_icons, 'background' )); ?>; color: <?php echo esc_attr(purehearts_set( $header_social_icons, 'color' )); ?>" target="_blank"><i class="fa <?php echo esc_attr( purehearts_set( $header_social_icons, 'icon' ) ); ?>"></i></a></li>
							<?php endforeach; ?>
                        </ul>
                        <?php endif; ?>
                        
                        <?php if( $options->get('show_seach_form_v4') ){?>
                        <div class="search-box-outer">
                            <div class="dropdown">
                                <button class="search-box-btn" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon-search"></i></button>
                                <div class="dropdown-menu search-panel" aria-labelledby="dropdownMenu3">
                                    <div class="form-container">
                                        <?php get_template_part('searchform1')?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                         
                        <?php if( $options->get('show_cart_icon_v4') ){?>
                        <?php if( function_exists( 'WC' ) ): global $woocommerce; ?>
                        <div class="cart-box">
                            <a href="<?php echo esc_url( wc_get_cart_url() ); ?>"><i class="icon-shopping-bag"></i></a>
                        </div>
                        <?php endif; } ?>
                        
                        <?php if( $options->get('show_sidebar_icon_v4') ){?>
                        <div class="nav-btn nav-toggler navSidebar-button clearfix">
                            <i class="icon-menu"></i>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>

        <!--sticky Header-->
        <div class="sticky-header">
            <div class="auto-container">
                <div class="outer-box">
                    <div class="menu-area clearfix">
                        <nav class="main-menu clearfix">
                            <!--Keep This Empty / Menu will come through Javascript-->
                        </nav>
                    </div>
                    <div class="nav-right-content clearfix">
                        <?php 
							$icons = $options->get( 'header_social_share_v4' );
							if ( !empty( $icons ) ) : 
						?>
                        <ul class="social-style-one clearfix">
                            <?php foreach ( $icons as $h_icon ) :
							$header_social_icons = json_decode( urldecode( purehearts_set( $h_icon, 'data' ) ) );
							if ( purehearts_set( $header_social_icons, 'enable' ) == '' ) {
								continue;
							}
							$icon_class = explode( '-', purehearts_set( $header_social_icons, 'icon' ) ); ?>
							<li><a href="<?php echo esc_url(purehearts_set( $header_social_icons, 'url' )); ?>" style="background-color:<?php echo esc_attr(purehearts_set( $header_social_icons, 'background' )); ?>; color: <?php echo esc_attr(purehearts_set( $header_social_icons, 'color' )); ?>" target="_blank"><i class="fa <?php echo esc_attr( purehearts_set( $header_social_icons, 'icon' ) ); ?>"></i></a></li>
							<?php endforeach; ?>
                        </ul>
                        <?php endif; ?>
                        
                        <?php if( $options->get('show_seach_form_v4') ){ ?>
                        <div class="search-box-outer">
                            <div class="dropdown">
                                <button class="search-box-btn" type="button" id="dropdownMenu4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon-search"></i></button>
                                <div class="dropdown-menu search-panel" aria-labelledby="dropdownMenu4">
                                    <div class="form-container">
                                        <?php get_template_part('searchform1')?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        
                        <?php if( $options->get('show_cart_icon_v4') ){?>
                        <?php if( function_exists( 'WC' ) ): global $woocommerce; ?>
                        <div class="cart-box">
                            <a href="<?php echo esc_url( wc_get_cart_url() ); ?>"><i class="icon-shopping-bag"></i></a>
                        </div>
                        <?php endif; } ?>
                        
                        <?php if( $options->get('show_sidebar_icon_v4') ){ ?>
                        <div class="nav-btn nav-toggler navSidebar-button clearfix">
                            <i class="icon-menu"></i>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- main-header end -->

    <!-- Mobile Menu  -->
    <div class="mobile-menu">
        <div class="menu-backdrop"></div>
        <div class="close-btn"><i class="fa fa-times"></i></div>
        
        <nav class="menu-box">
            <div class="nav-logo"><?php echo purehearts_logo( $logo_type, $light_logo, $light_logo_dimension, $logo_text, $logo_typography ); ?></div>
            <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
            <?php if( $options->get('address_v4') || $options->get('phone_no_v4') || $options->get('email_address_v4') ){?>
            <div class="contact-info">
                <?php if($options->get('info_title_v4')){ ?><h4><?php echo wp_kses($options->get('info_title_v4'), true); ?></h4><?php } ?>
                <ul>
                    <?php if( $options->get('address_v4') ){ ?><li><?php echo wp_kses($options->get('address_v4'), true); ?></li><?php } ?>
                    <?php if( $options->get('phone_no_v4') ){ ?><li><a href="tel:<?php echo esc_attr($options->get('phone_no_v4')); ?>"><?php echo wp_kses($options->get('phone_no_v4'), true); ?></a></li><?php } ?>
                    <?php if( $options->get('email_address_v4') ){ ?><li><a href="mailto:<?php echo esc_attr($options->get('email_address_v4')); ?>"><?php echo wp_kses($options->get('email_address_v4'), true); ?></a></li><?php } ?>
                </ul>
            </div>
            <?php } ?>
			<?php 
				$icons = $options->get( 'header_social_share_v4' );
				if ( !empty( $icons ) ) : 
			?>
            <div class="social-links">
                <ul class="clearfix">
                    <?php foreach ( $icons as $h_icon ) :
					$header_social_icons = json_decode( urldecode( purehearts_set( $h_icon, 'data' ) ) );
					if ( purehearts_set( $header_social_icons, 'enable' ) == '' ) {
						continue;
					}
					$icon_class = explode( '-', purehearts_set( $header_social_icons, 'icon' ) ); ?>
					<li><a href="<?php echo esc_url(purehearts_set( $header_social_icons, 'url' )); ?>" style="background-color:<?php echo esc_attr(purehearts_set( $header_social_icons, 'background' )); ?>; color: <?php echo esc_attr(purehearts_set( $header_social_icons, 'color' )); ?>" target="_blank"><span class="fa <?php echo esc_attr( purehearts_set( $header_social_icons, 'icon' ) ); ?>"></span></a></li>
					<?php endforeach; ?>
                </ul>
            </div>
            <?php endif; ?>
        </nav>
    </div><!-- End Mobile Menu -->
    
    
    <!-- sidebar cart item -->
    <div class="xs-sidebar-group info-group info-sidebar">
        <div class="xs-overlay xs-bg-black"></div>
        <div class="xs-sidebar-widget">
            <div class="sidebar-widget-container">
                <div class="widget-heading">
                    <a href="#" class="close-side-widget"><i class="icon-close"></i></a>
                </div>
                <div class="sidebar-textwidget">
                <div class="sidebar-info-contents">
                    <div class="content-inner">
                        <div class="logo">
                            <?php echo purehearts_logo( $logo_type, $light_logo, $light_logo_dimension, $logo_text, $logo_typography ); ?>
                        </div>
                        <div class="content-box">
                            <h4><?php echo wp_kses($options->get('sidebar_info_title_v4'), true); ?></h4>
                            <p><?php echo wp_kses($options->get('sidebar_info_text_v4'), true); ?></p>
                        </div>
                        <div class="form-inner">
                            <h4><?php echo wp_kses($options->get('sidebar_form_title_v4'), true); ?></h4>
                            <?php echo do_shortcode($options->get('sidebar_contact_form_url_v4')); ?>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    <!-- sidebar widget item end -->