<?php

/**
 * Register widget with WordPress.
 */

add_action('widgets_init', 'register_podamibe_social_widget');
function register_podamibe_social_widget() {
    register_widget( 'podamibe_social_widget' );
}

/**
 * Starts the main widget section
 */
class podamibe_social_widget extends WP_Widget {
    function __construct() {
        $psw_control_ops = array( 'width' => 450, 'height' =>250 );
        parent::__construct(
            'podamibe_social_widget',
            esc_html__('Podamibe Social Widget', 'psw'), 
            array( 'description' => esc_html__( 'Display social icons with links on widget', 'psw' ), ),
            $psw_control_ops
            );
    }

    /**
     *  Back-end widget form.
     */
    public function form( $instance ) {
        $instance        = wp_parse_args( (array) $instance, array( 'psw_main_title' => '') );
        $psw_main_title  = $instance[ 'psw_main_title' ];

        $instance        = wp_parse_args( (array) $instance, array( 'psw_info' => '') );
        $psw_info        = $instance[ 'psw_info' ]; 

        $instance        = wp_parse_args( (array) $instance, array( 'psw_icon_color' => '') );
        $psw_icon_color  = $instance[ 'psw_icon_color' ];

        $instance             = wp_parse_args( (array) $instance, array( 'psw_icon_hover_color' => '') );
        $psw_icon_hover_color = $instance[ 'psw_icon_hover_color' ];

        $instance        = wp_parse_args( (array) $instance, array( 'psw_bg_color' => '') );
        $psw_bg_color    = $instance[ 'psw_bg_color' ];

        $instance            = wp_parse_args( (array) $instance, array( 'psw_bg_hover_color' => '') );
        $psw_bg_hover_color  = $instance[ 'psw_bg_hover_color' ];

        $instance        = wp_parse_args( (array) $instance, array( 'psw_theme_one' => '') );
        $psw_theme_one   = $instance[ 'psw_theme_one' ];

        ?>

        <p>
            <label for="<?php echo $this->get_field_id( 'psw_main_title' ); ?>">
                <?php esc_html_e( 'Title:','psw' ); ?>
            </label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'psw_main_title' ); ?>" name="<?php echo $this->get_field_name( 'psw_main_title' ); ?>" type="text" value="<?php echo esc_attr( $psw_main_title ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('psw_info'); ?>">
                <?php esc_html_e( 'Content:', 'psw' ); ?>
            </label>
            <textarea class="widefat" id="<?php echo $this->get_field_id('psw_info'); ?>" name="<?php echo $this->get_field_name('psw_info'); ?>" name="<?php echo $this->get_field_name('psw_info'); ?>"><?php esc_html_e($psw_info); ?></textarea>
        </p>
        <div class="pss-color-wraper">
            <?php esc_html_e( 'Select the desired color','psw' ); ?>
            <p>
                <label for="<?php echo $this->get_field_id( 'psw_icon_color' ); ?>">
                    <?php esc_html_e( 'Icon Color :','psw' ); ?>
                </label><br/>
                <input class="psw-color" id="<?php echo $this->get_field_id( 'psw_icon_color' ); ?>" name="<?php echo $this->get_field_name( 'psw_icon_color' ); ?>" type="text" value="<?php echo esc_attr( $psw_icon_color ); ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'psw_icon_hover_color' ); ?>">
                    <?php esc_html_e( 'Icon hover Color :','psw' ); ?>
                </label><br/>
                <input class="psw-color" id="<?php echo $this->get_field_id( 'psw_icon_hover_color' ); ?>" name="<?php echo $this->get_field_name( 'psw_icon_hover_color' ); ?>" type="text" value="<?php echo esc_attr( $psw_icon_hover_color ); ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'psw_bg_color' ); ?>">
                    <?php esc_html_e( 'Background Color :','psw' ); ?>
                </label><br/>
                <input class="psw-color" id="<?php echo $this->get_field_id( 'psw_bg_color' ); ?>" name="<?php echo $this->get_field_name( 'psw_bg_color' ); ?>" type="text" value="<?php echo esc_attr( $psw_bg_color ); ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'psw_bg_hover_color' ); ?>">
                    <?php esc_html_e( 'Background hover Color :','psw' ); ?>
                </label><br/>
                <input class="psw-color" id="<?php echo $this->get_field_id( 'psw_bg_hover_color' ); ?>" name="<?php echo $this->get_field_name( 'psw_bg_hover_color' ); ?>" type="text" value="<?php echo esc_attr( $psw_bg_hover_color ); ?>" />
            </p>
        </div>
        <div class="pss-theme-wraper">
            <?php esc_html_e( 'Select the desired theme','psw' ); ?>
            <p>
                <label class="theme-one-label">
                    <input type="radio" id="<?php echo $this->get_field_id( 'psw_theme_one' ); ?>" name="<?php echo $this->get_field_name( 'psw_theme_one' ); ?>" <?php if (isset($psw_theme_one) && $psw_theme_one=="t1") echo "checked";?> value="t1"/>
                </label>
                <label class="theme-two-label">
                    <input type="radio" id="<?php echo $this->get_field_id( 'psw_theme_one' ); ?>" name="<?php echo $this->get_field_name( 'psw_theme_one' ); ?>" <?php if (isset($psw_theme_one) && $psw_theme_one=="t2") echo "checked";?> value="t2"/>
                </label>
                <label class="theme-three-label">
                    <input type="radio" id="<?php echo $this->get_field_id( 'psw_theme_one' ); ?>" name="<?php echo $this->get_field_name( 'psw_theme_one' ); ?>" <?php if (isset($psw_theme_one) && $psw_theme_one=="t3") echo "checked";?> value="t3"/>
                </label>
                <label class="theme-four-label">
                    <input type="radio" id="<?php echo $this->get_field_id( 'psw_theme_one' ); ?>" name="<?php echo $this->get_field_name( 'psw_theme_one' ); ?>" <?php if (isset($psw_theme_one) && $psw_theme_one=="t4") echo "checked";?> value="t4"/>
                </label>
            </p>
        </div>

        <?php 
        $psw_stream_sources = isset( $instance['psw_stream_sources'] ) ? $instance['psw_stream_sources'] : array();
        $psw_stream_num     = count($psw_stream_sources);
        $psw_stream_sources[$psw_stream_num+1] = '';
        $psw_stream_sources_html  = array();
        $psw_stream_counter       = 0;

        foreach ( $psw_stream_sources as $psw_stream_source ) 
        {   
            if ( isset($psw_stream_source['psw_icon']) )
            {
                $psw_stream_sources_html[] = sprintf(
                    '<div class="psw_icon%2$s"><p>%6$s<input type="text" name="%1$s[%2$s][psw_icon]" value="%3$s" class="widefat sourc%2$s">%8$s</p><p>%7$s<input type="text" name="%1$s[%2$s][psw_link]" value="%4$s" class="widefat sourc%2$s"></p><span class="psw_remove-field button-primary" id="%2$s">%5$s</span><hr/></div>',
                    $this->get_field_name('psw_stream_sources'),
                    $psw_stream_counter,
                    esc_attr( $psw_stream_source['psw_icon'] ),
                    esc_url( $psw_stream_source['psw_link'] ),
                    esc_html__("Remove","psw"),
                    esc_html__("Social icon :","psw"),
                    esc_html__("Social link :","psw"),
                    __("Insert icon from <a href='http://fontawesome.io/icons/' target='_blank'>here</a>","psw")
                    );
            }
            $psw_stream_counter += 1;
        }

        printf('<div class="psw-subtitle widefat"><h4>%1$s</h4></div>' . join( $psw_stream_sources_html ) , esc_html__("Social Sites List:- ","psw"));

        ?>

        <script type="text/javascript">
            var psw_fieldname = <?php echo json_encode( $this->get_field_name('psw_stream_sources') ) ?>;
            var psw_fieldnum  = <?php echo json_encode( $psw_stream_counter-1 ) ?>;

            jQuery(function($) {
                var psw_count  = psw_fieldnum;
                var psw_icon   = "<?php esc_html_e('Social icon :','psw'); ?>";
                var psw_link   = "<?php esc_html_e('Social link :','psw'); ?>";
                var psw_remove = "<?php esc_html_e('Remove','psw'); ?>";
                var psw_falink = "<?php _e('Insert icon from <a href=\"http://fontawesome.io/icons/\" target=\"_blank\">here</a>','psw'); ?>";
                jQuery('.<?php echo $this->get_field_id( 'add_field' );?>').click(function() {
                    if(psw_count < 10){
                        jQuery("#<?php echo $this->get_field_id( 'field_clone' );?>").append("<div class='psw_icon"+(psw_count+1)+"'><p>"+psw_icon+"<input type='text' name='"+psw_fieldname+"["+(psw_count+1)+"][psw_icon] value='' class='widefat sourc"+(psw_count+1)+"'>"+psw_falink+"<p>"+psw_link+"<input type='text' name='"+psw_fieldname+"["+(psw_count+1)+"][psw_link] value='' class='widefat sourc"+(psw_count+1)+"'></p><span class='psw_remove-field button-primary' id='"+(psw_count+1)+"'>"+psw_remove+"</span><hr/></div>");
                        psw_count++;
                    }
                });

                jQuery(".psw_remove-field").live('click', function() {
                    var id = this.id;
                    jQuery('.psw_icon'+id).remove();
                    psw_count--;
                });
            });
        </script>

        <span id="<?php echo $this->get_field_id( 'field_clone' );?>"></span>

        <?php
        echo '<input class="button '.$this->get_field_id('add_field').' button-primary " type="button" value="' . esc_html__( 'Add New', 'psw' ) . '" id="add_field" />';
    }

    /**
     * Sanitize widget form values as they are saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance                    = $old_instance;
        $instance['psw_main_title']  = strip_tags( $new_instance['psw_main_title'] );
        $instance[ 'psw_info' ]      = strip_tags( $new_instance['psw_info'] );
        $instance[ 'psw_icon_color' ]        = esc_attr($new_instance[ 'psw_icon_color' ]);
        $instance[ 'psw_icon_hover_color' ]  = esc_attr($new_instance[ 'psw_icon_hover_color' ]);
        $instance[ 'psw_bg_color' ]          = esc_attr($new_instance[ 'psw_bg_color' ]);
        $instance[ 'psw_bg_hover_color' ]    = esc_attr($new_instance[ 'psw_bg_hover_color' ]);
        $instance[ 'psw_theme_one' ]         = esc_attr($new_instance[ 'psw_theme_one' ]);
        $instance['psw_stream_sources'] = array();

        if ( isset( $new_instance['psw_stream_sources'] ) )
        {
            foreach ( $new_instance['psw_stream_sources'] as $psw_stream_source )
            {
                if ( '' !== trim( $psw_stream_source['psw_icon'] ) )
                    $instance['psw_stream_sources'][] = $psw_stream_source;
            }
        }

        return $instance;
    }

    /**
     * Front-end display of widget.
     */
    public function widget( $args, $instance ) {
        $psw_main_title = apply_filters( 'widget-title', $instance['psw_main_title'] );
        $psw_info       = isset( $instance[ 'psw_info' ] ) ? $instance[ 'psw_info' ] : '';
        $psw_icon_color = isset( $instance[ 'psw_icon_color' ] ) ? $instance[ 'psw_icon_color' ] : '';
        $psw_icon_hover_color = isset( $instance[ 'psw_icon_hover_color' ] ) ? $instance[ 'psw_icon_hover_color' ] : '';
        $psw_bg_color       = isset( $instance[ 'psw_bg_color' ] ) ? $instance[ 'psw_bg_color' ] : '';
        $psw_bg_hover_color = isset( $instance[ 'psw_bg_hover_color' ] ) ? $instance[ 'psw_bg_hover_color' ] : '';
        $psw_theme_one      = isset( $instance[ 'psw_theme_one' ] ) ? $instance[ 'psw_theme_one' ] : '';
        $psw_stream_sources = isset( $instance['psw_stream_sources'] ) ? $instance['psw_stream_sources'] : array();

        echo $args['before_widget'];

        if($psw_main_title || $psw_stream_sources){ ?>

        <div class="psw-social-container">
            <?php if($psw_main_title){ ?>
            <h4 class="psw-title"><?php esc_html_e($psw_main_title); ?></h4>
            <p class="psw-info"><?php esc_html_e($psw_info); ?></p>
            <?php } if($psw_stream_sources){ ?>
            <ul class="psw-list">
                <?php foreach($psw_stream_sources as $psw_stream_source){
                    switch($psw_theme_one){
                        case 't1':
                        $psw_theme_class = 'psw-theme-default';
                        break;

                        case 't2':
                        $psw_theme_class = 'rounded-rect';
                        break;

                        case 't3':
                        $psw_theme_class = 'round';
                        break;

                        case 't4':
                        $psw_theme_class = 'diamond';
                        break;
                    } ?>
                    <li>
                        <a class="psw-icon <?php echo esc_attr($psw_theme_class);?>" href="<?php echo esc_url($psw_stream_source[ 'psw_link']); ?>" target="_blank">
                            <i class="fa fa-<?php echo esc_html($psw_stream_source[ 'psw_icon']); ?>"></i>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
                <?php } ?>
            </div>
            <style type="text/css" media="screen">
                <?php if($psw_icon_color || $psw_bg_color){ ?>
                    .psw-icon{
                        <?php if($psw_icon_color){ ?>
                            color: <?php echo esc_attr($psw_icon_color); ?>;
                            <?php } if($psw_bg_color){ ?>
                                background: <?php echo esc_attr($psw_bg_color); ?>;
                                <?php 
                            } ?>
                        }
                        <?php 
                    }
                    if($psw_icon_hover_color || $psw_bg_hover_color){ ?>
                        .psw-icon:hover{
                            <?php if($psw_icon_hover_color){ ?>
                                color: <?php echo esc_attr($psw_icon_hover_color); ?>;
                                <?php } if($psw_bg_hover_color){?>
                                    background: <?php echo esc_attr($psw_bg_hover_color); ?>;
                                    <?php 
                                } ?>
                            }
                            <?php 
                        } ?>
                    </style>

                    <?php }

                    echo $args['after_widget'];

                }

            }