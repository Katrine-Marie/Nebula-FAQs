<?php $loop = new WP_Query(array('post_type' => 'nebula-faq', 'posts_per_page' => -1)); ?>

<?php if ($loop->have_posts()) : ?>
	<ul>
	<?php
			while ($loop->have_posts()) : $loop->the_post();
	?>
		<li class="FAQ-Questionlink">
			<a href="<?php the_permalink($loop->ID); ?>"><?php the_title(); ?></a>
		</li>

	<?php endwhile; ?>
</ul>

<?php else: ?>
<h2>No FAQ'S available!</h2>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
