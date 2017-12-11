<?php
get_header();

if (have_posts()) :
    while (have_posts()) : the_post();
        ?>
        <!-- banner-image -->
        <div class="banner-image">
            <?php the_post_thumbnail('banner-image'); ?>
        </div><!-- /banner-image -->
        
        <article class="post<?php if (has_post_thumbnail()) { ?> has-banner-image<?php } ?>">

            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

            <p class="post-info"><?php the_time('F jS, Y g:i a'); ?> | By <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a> | Posted in
                <?php
                $categories = get_the_category();
                $separator = ', ';
                $output = '';

                if ($categories) {

                    foreach ($categories as $category) {
                        $output .= '<a href="' . get_category_link($category) . '">'
                        . $category->cat_name . '</a>' . $separator;
                    }

                    echo trim($output, $separator);
                }
                ?>
            </p>

            <?php the_content(); ?>
        </article>
        <?php
    endwhile;
else :
    echo '<p>Nothing</p>';
endif;

get_footer();
