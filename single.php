<?php get_header(); ?>

<div class="layout_3col_vertNav fullHeight">
  <?php
  get_template_part( 'template-parts/content', 'aside_nav' );
   ?>
<div id="colContent" class="colContent centerContent">

  <main id="ccc_main_content" class="ccc_main_content">


    <?php

    $associativeArray = array();

    $pod1 = pods( 'vignette', get_the_id() );
    $related2 = $pod1->field( 'timeline_items' );
    //print_r($related2);
      foreach ( $related2 as $rel2 ) {
       $id2 = $rel2[ 'ID' ];
       $someField = get_post_meta( $id2, 'timeline_start_date', true );
       $associativeArray += [get_the_title( $id2 ) => date_format(date_create($someField),"Y")];

     }


     asort($associativeArray);
     $timeline = '<span id="ltTemp"><div class="timeline" id="timelineBlock"><div class="timeline_inner">';
     foreach($associativeArray as $x=>$x_value) {
        $timeline = $timeline.'<div class="timelineItem">';
        $timeline = $timeline.'<strong>'.$x_value.'</strong><br>';
        $timeline = $timeline.$x;
        $timeline = $timeline.'</div>';
        }
      $timeline = $timeline.'</div></div></span>';




    // page content
    if (have_posts()) :
        while (have_posts()) : the_post();
        $postId = get_the_ID();

            ?>
            <div class="ccc_topBlock">
              <h1><?php the_title(); ?><em> <?php echo get_post_meta($post->ID, 'subtitle', true); ?></em></h1>
            </div>
            <?php

            the_content();
            echo $timeline;

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

<h2>Related persons</h2>
<?php

$pod = pods( 'vignette', get_the_id() );
$related = $pod->field( 'vignettes_linked' );
  foreach ( $related as $rel ) {
   $id = $rel[ 'ID' ];
   echo '<a href="'.esc_url( get_permalink( $id ) ).'">'.get_the_title( $id ).'</a><br>';
 }

?>

<h2>Keywords</h2>
<ul class="cccNestedList">
<?php
  $post_categories = wp_get_post_categories( $postId, array(
    'fields'       => 'all',
    'parent'       => 0
  ) );

  if( $post_categories ){ // Always Check before loop!
      foreach($post_categories as $catt){
          echo '<li>'.$catt ->name.'<ul>';

          $post_sub_categories = wp_get_post_categories( $postId, array(
            'fields'       => 'all',
            'parent'       => $catt ->term_id
          ) );

          foreach($post_sub_categories as $subcatt){
            echo '<li>'.$subcatt ->name.'</li>';
          }

          echo '</ul></li>';




      }
  }

?>
</ul>



</aside>


</div>
<button type="button" name="button" class="hamburgerButton" id='hamburger' onclick="hamburger()">
  <img src="<?php echo get_bloginfo( 'template_url' ); ?>/images/icons/icon-hamburger.svg" alt="" class="hamburgerIcon"  id='hamburgerImg'>
</button>

<section class="notesPop" id="notePop" aria-label="If you click on a note, the note appears here.">
  <div class="notesPopInner" id="notesPopInner"></div>
</section>


<script src="<?php echo get_bloginfo( 'template_url' ); ?>/js/hamburger-menu.js" charset="utf-8"></script>
<script src="<?php echo get_bloginfo( 'template_url' ); ?>/js/header2Navigation.js" charset="utf-8"></script>
<script src="<?php echo get_bloginfo( 'template_url' ); ?>/js/notesPopup.js" charset="utf-8"></script>




<?php get_footer();

// $timeline = '<span id="ltTemp"><div class="timeline" id="timelineBlock"><div class="timeline_inner">';
// $pod1 = pods( 'vignette', get_the_id() );
// $related2 = $pod1->field( 'timeline_items' );
// //print_r($related2);
//   foreach ( $related2 as $rel2 ) {
//    $id2 = $rel2[ 'ID' ];
//    $timeline = $timeline.'<div class="timelineItem">';
//    $someField = get_post_meta( $id2, 'timeline_start_date', true );
//
//    $timeline = $timeline.'<strong>'.date_format(date_create($someField),"Y").'</strong><br>';
//    $timeline = $timeline.get_the_title( $id2 );
//    $timeline = $timeline.'</div>';
//  }
//  $timeline = $timeline.'</div></div></span>';
?>
