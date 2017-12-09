<?php
get_header();

if (have_posts()) :
    while (have_posts()) : the_post();
        ?>
        <article class="post page">

            <?php
            if (has_children() OR $post->post_parent > 0) :
                ?>
                <nav class="site-nav children-links clearfix">

                    <?php $top_ancestor_id = get_top_ancestor_id(); ?>
                    <span class="parent-link"><a href="<?php echo get_the_permalink($top_ancestor_id) ?>"><?php echo get_the_title($top_ancestor_id); ?></a></span>

                    <ul>
                        <?php
                        $args = array(
                            'child_of' => $top_ancestor_id,
                            'title_li' => ''
                        );
                        ?>

                        <?php wp_list_pages($args); ?>
                    </ul>
                </nav>

                <?php
            endif;
            ?>
            <h2><?php the_title(); ?></h2>
            <?php the_content(); ?>
        </article>
        <?php
    endwhile;
else :
    echo '<p>Nothing</p>';
endif;

get_footer();
?>