<?php get_header(); ?>

<main class="ojHeroText">
  <span>
    <?php query_posts( 'pagename=homepage&post_type=page' ); ?>
    <?php while ( have_posts() ) : the_post(); ?>
      <?php the_content(); ?>
    <?php endwhile; ?>
  </span>

  <div class="ojJoin">
    <div class="joinBox">
      <a href="/index.php/contact/">Join openjournals.nl</a>
    </div>
  </div>

</main>

<div class="ojContentHome ojsLayout3Col">

  <section class="ojNews topLine">
    <h2><?php transl( 'News', 'Nieuws'); ?></h2>
    <ul class="itemsList">

      <?php query_posts( 'post_type=post' ); ?>
      <?php while ( have_posts() ) : the_post(); ?>

        <?php get_template_part( 'template-parts/content', 'list-news-item' ); ?>

      <?php endwhile; ?>

    </ul>
  </section>





  <section class="ojJournals topLine">
    <h2><?php transl( 'Our journals', 'Onze journals'); ?></h2>
    <ul class="itemsList">

      <li class="journalItem incCard">
        <div class="thumb">
            <img src="<?php bloginfo('template_url'); ?>/images/logo-openjournals-square-color-DIAP-white.png" alt="">
        </div>
        <div class="text">
          <h3><a href="/index.php/journals">All journals</a></h3>
          <p>Openjournals hosts a diverse set of high-quality academic journals. Check out all of them.</p>

          <div>
      </li>


      <?php query_posts( 'post_type=journal&category_name=featured' ); ?>
      <?php while ( have_posts() ) : the_post(); ?>


        <li class="journalItem incCard">
          <div class="thumb">
            <?php
            if ( has_post_thumbnail() ) {
              echo get_the_post_thumbnail( $post_id, 'medium' );
          }  ?>
          </div>
          <div class="text">
            <h3><a href="<?php echo get_post_meta($post->ID, 'journal_url', true); ?>">New journal</a></h3>
            <?php the_content(); ?>

            <div>
        </li>

      <?php endwhile; ?>

    </ul>
  </section>

  <section class="ojRightBar">
    <div class="topLine" style="height:780px;">
      <h2>Twitter</h2>
      <a class="twitter-timeline" data-height="700" href="https://twitter.com/openjournalsnl?ref_src=twsrc%5Etfw">Tweets by openjournalsnl</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    </div>
    <div class="topLine">
      <h2><?php transl( 'Newsletter', 'Nieuwsbrief') ?></h2>
      <?php wp_reset_query(); query_posts( 'pagename=newsletter_subscribtion&post_type=page' ); ?>
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; ?>
    </div>
    <div class="topLine">
      <h2>Partners</h2>
      <a href="https://knaw.nl/"><img src="<?php bloginfo('template_url'); ?>/images/logo-KNAW.jpg" alt="Partner KNAW" class="ojLogoWide"></a>
      <a href="https://www.nwo.nl/"><img src="<?php bloginfo('template_url'); ?>/images/logo-nwo.jpg" alt="Partner NWO" class="ojLogoPortait"></a>
      <a href="https://oapus.nl/"><img src="<?php bloginfo('template_url'); ?>/images/logo-oapus.png" alt="Partner OPUS Foundation" class="ojLogoWide noMarg"></a>
    </div>
  </section>

</div>









  </div>

  <div class="ojColorBar"> </div>
</div>




<?php get_footer(); ?>
