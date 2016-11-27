<?php $shops = aff_get_product_shops(); ?>

<?php echo $args['before_title'] . $instance['title'] . $args['after_title'] ?>
<div class="panel-body">
    <?php get_template_part('partials/content-product-details'); ?>
</div>
