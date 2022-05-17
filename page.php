<?php get_header(); ?>

<div class="layout_3col_vertNav">
  <?php
  get_template_part( 'template-parts/content', 'aside_nav' );
   ?>
<div id="colContent" class="colContent centerContent">

  <main id="ccc_main_content" class="ccc_main_content">


    <?php






    // page content
    if (have_posts()) :
        while (have_posts()) : the_post();
            ?>
            <div class="ccc_topBlock">
              <h1><?php the_title(); ?><em><?php echo get_post_meta($post->ID, 'subtitle', true); ?></em></h1>
            </div>
            <?php

            the_content();

            ?>

            <?php
        endwhile;
    else :
    ?>
        <h2>No Posts Found</h2>
        <p>Sorry, there are no posts yet.</p>
    <?php
    endif;
    ?>
  </main>





</div>

<aside id="colAside" class="colAside">

<section class="ccc_topBlock"> </section>







</aside>


</div>
<button type="button" name="button" class="hamburgerButton" id='hamburger' onclick="hamburger()">
  <img src="<?php echo get_bloginfo( 'template_url' ); ?>/images/icons/icon-hamburger.svg" alt="" class="hamburgerIcon"  id='hamburgerImg'>
</button>

<section class="notesPop" id="notePop" aria-label="If you click on a note, the note appears here.">
  <div class="notesPopInner" id="notesPopInner"></div>
</section>


<script src="<?php echo get_bloginfo( 'template_url' ); ?>/js/hamburger-menu.js" charset="utf-8"></script>


<?php get_footer(); ?>
