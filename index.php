<?php get_header(); ?>

    <main>
      <div class="keyvisual"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/keyvisual.jpg" alt="キービジュアル画像" /></div>

      <section class="about" id="about">
        <div class="container">
          <h2 class="section-title"><span>About</span></h2>
          <div class="profile">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/profile.png" alt="プロフィール画像" />
            <div class="profile-text">
              <p class="profile-name">KAKERU MIYAICHI</p>
              <p>
                テキストテキストテキストテキストテキストテキストテキスト<br />テキストテキストテキストテキストテキストテキストテキスト<br />テキストテキストテキストテキストテキストテキストテキスト
              </p>
            </div>
          </div>
        </div>
      </section>

      <section class="bicycle" id="bicycle">
        <div class="container">
          <h2 class="section-title"><span>Bicycle</span></h2>
          <?php if(have_posts()) : ?>
          <ul class="bicycle-list">
            <?php while (have_posts()) : the_post(); ?>
            <li class="bicycle-item">
              <a href="<?php the_permalink(); ?>">
              <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('full', array('alt' => get_the_title())); ?>
              <?php else : ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/no-image.png" alt="<?php the_title(); ?>" />
              <?php endif; ?>
              <p class="bicycle-title"><?php the_title(); ?></p>
              <p class="bicycle-text"><?php the_excerpt(); ?></p>
              </a>
            </li>
            <?php endwhile; ?>
          </ul>
          <?php else : ?>
            <p>記事がありません</p>
          <?php endif; ?>
        </div>
      </section>
    </main>
    <?php get_footer(); ?>
