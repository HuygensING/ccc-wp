<div class="incCard ccc_card">
  <div class="ccc_card_thumb">
    <?php
    if ( has_post_thumbnail() ) {
      echo get_the_post_thumbnail( $post_id, 'thumbnail' );
  }  ?>
  </div>
  <div class="ccc_card_text">
    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
  </div>
  <div class="hide">
    <?php
    $allcats = wp_get_post_categories(get_the_ID());

    foreach ($allcats as  &$value) {
      //echo $value;
        echo '<span class="tag">'.get_the_category_by_ID(  $value ).'</span> ';
    }
     ?>

  </div>
</div>
