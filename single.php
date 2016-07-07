<?php get_header(); ?>

<main role="main">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?php
                    get_template_part('content', get_post_format());

                    if (comments_open() || get_comments_number()) {
                        comments_template();
                    }
                ?>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>
