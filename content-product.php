<?php $product = ap_get_product(); ?>

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
            <?php $detailGroups = ap_get_product_detail_groups($product); ?>
            <?php foreach ($detailGroups as $detailGroup): ?>
                <table class="product-table table table-striped">
                    <tbody>
                        <?php foreach ($detailGroup->getDetails() as $details): ?>
                            <tr>
                                <td><?php echo $details->getLabel(); ?></td>
                                <td><?php echo $details->getValue(); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endforeach; ?>
            </div>
        </div>
    </header>

    <section class="product-body box">
        <?php the_content(); ?>
    </section>

    <!--<footer class="product-footer box"></footer>-->
</article>
