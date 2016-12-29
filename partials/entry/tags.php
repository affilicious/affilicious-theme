<?php if(has_tag()): ?>
    <?php $tags = get_the_tags(get_the_ID()); ?>
    <?php foreach($tags as $tag): ?>
        <a href="<?php get_tag_link($tag->term_id); ?>" rel="tag" class="tag"><?php esc_html_e($tag->name); ?></a>
    <?php endforeach; ?>
<?php endif; ?>
