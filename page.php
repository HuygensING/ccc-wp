<?php get_header(); ?>


  <div id="subNavigationDiv">
    <strong>Colonial <br>Children <br>Connected<br><br><br><br></strong>
    <nav>
              <?php

                $cleanMenu = wp_nav_menu( array(
                  //'theme_location' => 'top-menu',
                  'echo' => false,
                  'depth'=> 2,
                ) );
                //echo strip_tags($cleanMenu, "<a><ul><li>");
                echo $cleanMenu;

              ?>
            </nav>

    <em>Page content</em>
    <nav id="subNavigation"></nav>
  </div>

  <div class="temp2col">
    <div id="content">
      <a href="/">back</a>

      <?php
      if (have_posts()) :
          while (have_posts()) : the_post();
              ?>
              <h1><?php the_title(); ?></h1>
              <?php the_content(); ?>

              <?php
          endwhile;
      else :
      ?>
          <h2>No Posts Found</h2>
          <p>Sorry, there are no posts yet.</p>
      <?php
      endif;
      ?>



    </div>


    <aside>


    </aside>

  </div>












<script src="<?php echo get_bloginfo( 'template_url' ); ?>/js/header-to-links.js" charset="utf-8"></script>


<?php get_footer(); ?>
