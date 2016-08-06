<article id="product-<?php the_ID(); ?>" <?php post_class('product'); ?>>
    <header class="product-header box">
        <h1 class="product-title"><?php the_title(); ?></h1>

        <div class="row">
            <div class="col-md-5">
            <div class="product-thumbnail">
                <?php if (has_post_thumbnail()): ?>
                    <?php the_post_thumbnail(); ?>
                <?php endif; ?>
            </div>
            </div>

            <div class="col-md-7">
            <?php $fields = affilicious_get_product_details(); ?>
            <?php if(!empty($fields)): ?>
                <table class="product-table table table-striped">
                    <tbody>
                    <?php foreach ($fields as $field): ?>
                        <tr>
                            <td><?php echo $field['label']; ?></td>
                            <td><?php echo esc_html($field['value']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
            </div>
        </div>
    </header>

    <section class="product-body box">
        <?php the_content(); ?>
    </section>

    <!--<footer class="product-footer box"></footer>-->
</article>
