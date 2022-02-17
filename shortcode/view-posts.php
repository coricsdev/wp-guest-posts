<?php

/**
 * Manage admin area
 *
 * @author coricsdev
 */
// check wither class exists or not
if( ! class_exists('GP_View_Post') ) :
    
    class GP_View_Post  extends GP_Common{

        public function __construct() {
            
        }

        /*
    	*  gp_view_posts
    	*
    	*  [gp_view_posts /] call function
    	*  @type	function
    	*
    	*  @param	atts,content
    	*  @return	List of post with or message
    	*/
        public static function gp_view_posts($atts, $content = null){

            $is_author_login = parent::check_is_author_login();  //Check user is login with particular role
            if( true === $is_author_login):
                ob_start();
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; //Page query
                $user_id = get_current_user_id(); //get the current login user id

                $args      = array(
                                'post_type'      => 'guest_post',
                                'post_status'    => 'draftsd',
                                'posts_per_page' => 10,
                                'paged' => $paged,
                                'author' => $user_id
                            );
                $the_query = new WP_Query( $args ); //Query builder using WP_query
                if ( $the_query->have_posts() ) :
                    echo wp_sprintf( '<div class="row">' );
                    while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class("col-12 col-sm-12 col-md-6"); ?>>
                            <div class="single-post">
                                <div class="img-thumbnail">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php
                                        if ( has_post_thumbnail() ) :
                                            the_post_thumbnail('thumbnail', array('class' => 'img'));
                                        endif;
                                        ?>
                                    </a>
                                </div>
                                <div class="entry-content">
                                    <?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
                                    <span class="date"><?php the_date( ); ?></span>
                                    <p><?php echo wp_strip_all_tags( get_the_excerpt() ); ?></p>
                                    <a href="<?php esc_url(the_permalink()); ?>" class="more-btn"><?php echo __( 'Read more', 'guest-post' ); ?></a>
                                </div>
                                
                            </div>
                        </article>
                    <?php endwhile;

                    //Pagination str
                    echo wp_sprintf( '<div class="col-12 col-sm-12 col-md-12 text-center m-5">' );
                    echo paginate_links( array(
                        'base' => get_pagenum_link(1) . '%_%',
                        'format'  => '?paged=%#%',
                        'current' => max( 1, get_query_var( 'paged' ) ),
                        'total'   => $the_query->max_num_pages
                    ) );
                    echo wp_sprintf( '</div>' );
                    //Pagination end
                    wp_reset_postdata(); //Reset post data

                else :
                    return wp_sprintf( '<div class="alert alert-warning" role="alert">%s</div>', __( 'Sorry, no posts matched your criteria.', 'guest-post' ) ); //post not found the return data
                endif;
                $html = ob_get_contents(); 
                ob_end_clean(); 
                return $html;
            else:
                return  wp_sprintf( '<div class="alert alert-warning"> %s  <strong>%s</strong>.</div>', __( 'Please login with user role - ', 'guest-post' ), GP_ALLOW_ROLE ); //User not login with particular role then return this message
            endif;
        }
    }
endif; // class_exists check