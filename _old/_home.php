
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

</div>

<div class="temp2col">
  <div>
    <div class="tem3col" id="filteronList1"></div>
    <main id="main" class="cards">


            <?php
            query_posts( 'post_type=vignette&orderby=title&order=asc' );
            if (have_posts()) :
                while (have_posts()) : the_post();
                    ?>
                    <div class="tempcard">
                      <a href="<?php the_permalink(); ?>">
                      <?php
                      if ( has_post_thumbnail() ) {
                        echo get_the_post_thumbnail( $post_id, 'thumbnail' );
                    }  ?><br>
                      <?php the_title(); ?></a>
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








  </div>
<script src="<?php echo get_bloginfo( 'template_url' ); ?>/js/findTags.js" charset="utf-8"></script>




<?php get_footer(); ?>
