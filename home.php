
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









<div class="layout_3col_vertNav">
  <?php 
  get_template_part( 'template-parts/content', 'aside_nav' );
   ?>
<div id="colContentWide" class="colContentWide centerContent">
<main class="ccc_main_content">
  <section class="ccc_topBlock" aria-label="introduction to the site">
    <span><h1 class="h1top">Colonial Children Connected</h1>
      The <strong>Colonial Children Connected</strong> project shows the lives of (post)colonial children. These microhistories each follow the life of a child involved in (post)colonial child separation practices. The website presents the lives of the children in the form of vignettes. This project is part of the <strong>COAC</strong> project.
      <small>Please <a href="">read the disclaimer</a> concerning the use of personal data.</small>
    </span>
  </section>
</main>
<div class="ccc_filterbox">

  <section class="ccc_filterbox_vis"  aria-label="filters for selecting a vignette">
    <div>
      <img src="<?php bloginfo('template_url'); ?>/images/icon_filter.png" alt="">
        <strong>Filters </strong>
        <div></div>
      </div>

    <button type="button" name="button" onclick="handleFilterbox()"><img src="<?php bloginfo('template_url'); ?>/images/icon_arrow_down.png" alt="" id="rotateIcon" aria-label="Show or hide the filters"></button>
  </section>

  <section id="optionBox" class="ccc_filterbox_lists"  aria-label="Select a filter">
    <div>
      <strong>Keywords</strong>
      <ul>
        <li class="ccc_filterbox_checkbox"><input type="checkbox"  aria-label="select filter Colonial exploration" name="Colonial exploration" > <label for="Colonial exploration">Colonial exploration</label></li>
        <li class="ccc_filterbox_checkbox"><input type="checkbox"  aria-label="select filter Disease" name="Disease" > <label for="Disease">Disease</label></li>
        <li class="ccc_filterbox_checkbox"><input type="checkbox"  aria-label="select filter Guide" name="Guide" > <label for="Guide">Guide</label></li>
        <li class="ccc_filterbox_checkbox"><input type="checkbox"  aria-label="select filter Medicine" name="Medicine" > <label for="Medicine">Medicine</label></li>
        <li class="ccc_filterbox_checkbox"><input type="checkbox"  aria-label="select filter Missionaries" name="Missionaries" > <label for="Missionaries">Missionaries</label></li>
        <li class="ccc_filterbox_checkbox"><input type="checkbox"  aria-label="select filter Extinction trope" name="Extinction trope" > <label for="Extinction trope">Extinction trope</label></li>
        <li class="ccc_filterbox_checkbox"><input type="checkbox"  aria-label="select filter Families" name="Families" > <label for="Families">Families</label></li>
      </ul>
    </div>



    <div>
      <strong>Keywords</strong>
      <ul>
        <li class="ccc_filterbox_checkbox"><input type="checkbox"  aria-label="select filter Colonial exploration" name="Colonial exploration" > <label for="Colonial exploration">Colonial exploration</label></li>
        <li class="ccc_filterbox_checkbox"><input type="checkbox"  aria-label="select filter Disease" name="Disease" > <label for="Disease">Disease</label></li>
        <li class="ccc_filterbox_checkbox"><input type="checkbox"  aria-label="select filter Guide" name="Guide" > <label for="Guide">Guide</label></li>
        <li class="ccc_filterbox_checkbox"><input type="checkbox"  aria-label="select filter Medicine" name="Medicine" > <label for="Medicine">Medicine</label></li>
        <li class="ccc_filterbox_checkbox"><input type="checkbox"  aria-label="select filter Missionaries" name="Missionaries" > <label for="Missionaries">Missionaries</label></li>
        <li class="ccc_filterbox_checkbox"><input type="checkbox"  aria-label="select filter Extinction trope" name="Extinction trope" > <label for="Extinction trope">Extinction trope</label></li>
        <li class="ccc_filterbox_checkbox"><input type="checkbox"  aria-label="select filter Families" name="Families" > <label for="Families">Families</label></li>
      </ul>
    </div>


    <div>
      <strong>Keywords</strong>
      <ul>
        <li class="ccc_filterbox_checkbox"><input type="checkbox"  aria-label="select filter Colonial exploration" name="Colonial exploration" > <label for="Colonial exploration">Colonial exploration</label></li>
        <li class="ccc_filterbox_checkbox"><input type="checkbox"  aria-label="select filter Disease" name="Disease" > <label for="Disease">Disease</label></li>
        <li class="ccc_filterbox_checkbox"><input type="checkbox"  aria-label="select filter Guide" name="Guide" > <label for="Guide">Guide</label></li>
        <li class="ccc_filterbox_checkbox"><input type="checkbox"  aria-label="select filter Medicine" name="Medicine" > <label for="Medicine">Medicine</label></li>
        <li class="ccc_filterbox_checkbox"><input type="checkbox"  aria-label="select filter Missionaries" name="Missionaries" > <label for="Missionaries">Missionaries</label></li>
        <li class="ccc_filterbox_checkbox"><input type="checkbox"  aria-label="select filter Extinction trope" name="Extinction trope" > <label for="Extinction trope">Extinction trope</label></li>
        <li class="ccc_filterbox_checkbox"><input type="checkbox"  aria-label="select filter Families" name="Families" > <label for="Families">Families</label></li>
      </ul>
    </div>

  </section>

</div>
<section class="ccc_vignette_cards"  aria-label="overview of the vignettes">



  <div class="incCard ccc_card">
    <div class="ccc_card_thumb">
    <img src="images/Raden-Roro-Moerjan.jpg" alt="">
    </div>
    <div class="ccc_card_text">
      <h2><a href="ccc_detail.html">Raden Roro Moerjan</a></h2>
    </div>
  </div>


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
