<?php get_header(); ?>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <main role="main">
                <?php
                    get_template_part('content', get_post_format());

                    if (comments_open() || get_comments_number()) {
                        comments_template();
                    }
                ?>
            </main>
        </div>
        <?php get_sidebar(); ?>
    </div>
</div>

<?php get_footer(); ?>
