<p class="product-review" itemprop="aggregateRating"
   itemscope itemtype="http://schema.org/AggregateRating">
	<?php $starRating = affilicious_get_product_star_rating($product); ?>

	<span class="product-review-rating" itemprop="reviewRating"
	      itemscope itemtype="http://schema.org/Rating">
            <meta itemprop="worstRating" content="0">
            <meta itemprop="bestRating" content="5">
            <meta itemprop="ratingValue" content="<?php echo $starRating; ?>">
		<?php for($i = 0; $i < 5; $i++): ?>
			<?php if ($starRating >= ($i + 1)): ?>
				<i class="fa fa-star fa-lg" aria-hidden="true"></i>
			<?php elseif($starRating >= ($i + 0.5)): ?>
				<i class="fa fa-star-half-o fa-lg" aria-hidden="true"></i>
			<?php else: ?>
				<i class="fa fa-star-o fa-lg" aria-hidden="true"></i>
			<?php endif; ?>
		<?php endfor; ?>
    </span>

	<?php if($numberOfRatings = affilicious_get_product_number_of_ratings($product)): ?>
		<span class="product-review-number-rating" itemprop="aggregateRating"
		      itemscope itemtype="http://schema.org/AggregateRating">
                <?php echo sprintf(_n(
                    'based on <span itemprop="reviewCount">%s</span> review',
                    'based on <span itemprop="reviewCount">%s</span> reviews',
                    $numberOfRatings, 'affilicious-theme'),
                    $numberOfRatings);
                ?>
        </span>
	<?php endif; ?>
</p>
