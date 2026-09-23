<?php get_header(); ?>
    <main>
      <div class="container">
        <?php  if (have_posts()) : ?>
          <?php while (have_posts()) : the_post(); ?>
            <?php if (has_post_thumbnail()) : ?>
              <div class="detail-img">
                <?php the_post_thumbnail('full'); ?>
              </div>
            <?php else : ?>
              <div class="detail-img">
                <img src="<?php echo get_template_directory_uri(); ?>assets/images/bicycle2.png" alt="<?php the_title(); ?>" />
              </div>
            <?php endif; ?>
            <article class="detail">
              <h1 class="detail-title"><?php the_title(); ?></h1>
              <p class="detail-text">
                <?php the_content(); ?>
              </p>
              <div class="back-btn">
                <a href="<?php echo home_url('/'); ?>" class="btn">トップに戻る</a>
              </div>
            </article>
          <?php endwhile; ?>
        <?php endif; ?>
      </div>
    </main>
    <?php get_footer(); ?>
