
<?php get_header(); ?>

<?php
$categoriesParentList = get_categories( array(
     'hide_empty'    => 1
));
  echo '<script>let facetData = [';
  foreach( $categoriesParentList as $category ) {
    echo '{';
    echo 'id: '.$category->term_id.', ';
    echo 'name: "'.$category->name.'", ';
    echo 'parentId: '.$category->parent;
    echo '}, ';

 };
 echo '{}]</script>';
?>





<div class="layout_3col_vertNav fullHeight">
  <?php
  get_template_part( 'template-parts/content', 'aside_nav' );
   ?>
<div id="colContentWide" class="colContentWide centerContent">
<main class="ccc_main_content">
  <section class="ccc_topBlock" aria-label="introduction to the site">
    <span><h1 class="h1top">Colonial Children Connected</h1>

      <?php query_posts( 'name=homepage&posts_per_page=1&post_type=page' ); ?>
        <?php while ( have_posts() ) : the_post(); ?>
              <?php the_content(); ?>
        <?php endwhile; ?>


    </span>
  </section>
</main>
<div class="ccc_filterbox">

  <section class="ccc_filterbox_vis"  aria-label="filters for selecting a vignette">
    <div class="ccc_filterbox_vL">
      <img src="<?php bloginfo('template_url'); ?>/images/icon_filter.png" alt="">
        <strong>Filters </strong>
        <div></div>
    </div>
    <div class="ccc_filterbox_vR">
      <button type="button" name="button" onclick="clearList('ccc_vignette_cards')">Clear&nbsp;filters</button>
      <button type="button" name="button" onclick="handleFilterbox()"><img src="<?php bloginfo('template_url'); ?>/images/icon_arrow_down.png" alt="" id="rotateIcon" aria-label="Show or hide the filters"></button>
    </div>


  </section>

  <section id="optionBox" class="ccc_filterbox_lists"  aria-label="Select a filter"></section>

</div>
<section class="ccc_vignette_cards"  aria-label="overview of the vignettes" id="ccc_vignette_cards">



  <?php
  query_posts( 'post_type=vignette&orderby=title&order=asc' );
  if (have_posts()) :
      while (have_posts()) : the_post();
          get_template_part( 'template-parts/content', 'vignette' );
      endwhile;
  else :
  ?>
      <h2>No Posts Found</h2>
      <p>Sorry, there are no posts yet.</p>
  <?php
  endif;
  ?>




</section>

</div>



</div>
<button type="button" name="button" class="hamburgerButton" id='hamburger' onclick="hamburger()">
  <img src="<?php bloginfo('template_url'); ?>/images/icons/icon-hamburger.svg" alt="" class="hamburgerIcon"  id='hamburgerImg'>
</button>



<script src="<?php bloginfo('template_url'); ?>/js/hamburger-menu.js" charset="utf-8"></script>
<script src="<?php bloginfo('template_url'); ?>/js/filterBox.js" charset="utf-8"></script>












<script src="<?php echo get_bloginfo( 'template_url' ); ?>/js/findTags.js" charset="utf-8"></script>
<?php get_footer(); ?>
