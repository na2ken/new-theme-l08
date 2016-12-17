<?php
/* Template Name: index.php */
get_header(); ?>
<div class="container">
	<div class="row">
    <section>

        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <h1><?php the_title(); ?><h1>
                <p><?php the_content(); ?><p>
            <?php endwhile; ?>
        <?php else : ?>
            <p>コンテンツがありません。</p>
        <?php endif; ?>

        </section>
    </div>
</div>
<?php
get_footer(); ?>
