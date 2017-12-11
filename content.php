<article class="post<?php if (has_post_thumbnail()) : ?> has-thumbnail<?php endif; ?>">

    <!-- post-thumbnail -->
    <div class="post-thumbnail">
        <?php the_post_thumbnail('small-thumbnail'); ?>
    </div><!-- /post-thumbnail -->

    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

    <p class="post-info"><?php the_time('F jS, Y g:i a'); ?> | By <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a> | Posted in
        <?php
        $categories = get_the_category();
        $separator = ', ';
        $output = '';

        if ($categories) :
            foreach ($categories as $category) :
                $output .= '<a href="' . get_category_link($category) . '">'
                . $category->cat_name . '</a>' . $separator;
            endforeach;
            echo trim($output, $separator);
        endif;
        ?>
    </p>

    <?php
    if (is_search() or is_archive()) :
        ?>
        <p>
            <?php echo get_the_excerpt(); ?>
            <a href="<?php the_permalink(); ?>">Read More&raquo;</a>
        </p>
        <?php
    else :
        // always display the excerpt.
        if (TRUE OR $post->post_excerpt) :
            ?>
            <p>
                <?php echo get_the_excerpt(); ?>
                <a href="<?php the_permalink(); ?>">Read More&raquo;</a>
            </p>
            <?php
        else :
            the_content();
        endif;
    endif;
    ?>

</article>