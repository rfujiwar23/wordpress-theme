<?php

/**
 * Template Name: Test Template #1
 */

get_header(); ?>

<p><?php the_title(); ?></p>


<div class="container">
  <?php if( have_rows('content') ): ?>

  <?php while (have_rows('content')): the_row(); ?>

  <?php if (get_row_layout() == 'column_section'):
      $columns = get_sub_field('columns');
    ?>

  <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
    <?php foreach($columns as $column):
        ?>
    <div class="col">
      <div class="card h-100">
        <div class="card-img-top">
          <img src="<?php echo $column['content_image'];?>" alt="" class="img-fluid">
        </div>
        <div class="card-body">
          <h4 class="card-title"><?php echo $column['title'];?></h4>
          <p><?php echo $column['content'];?></p>
        </div>
        <div class="card-footer">
          <?php if($column['link']):?>
          <a href="<?php echo $column['link']['url']?>">Check for More</a>
          <?php endif;?>
        </div>
      </div>
    </div>
    <?php endforeach;?>
  </div>
  <?php endif;?>


  <?php if (get_row_layout() == 'inner_links'):
      $innerLinks = get_sub_field('inner-link');
    ?>

    <div class="row d-flex justify-content-center">
      <?php foreach($innerLinks as $link):
      ?>

      <div class="col-md-4 col-6">
        <div class="nav-card">
          <div class="text">
            <h3><?php echo $link['go_to_text'];?></h3>
            <p><?php echo $link['go_to_text_jp'];?></p>
          </div>

          <div class="img">
            <img src="<?php echo $link['go_to_image'];?>" alt="" class="img-fluid">
            <div class="inner-link">
              <a href="<?php echo $link['link']['url'];?>">もっと見る</a>
            </div>
            <?php if($link['ext_link']):?>
            <div class="ext-link">
              <a href="<?php echo $link['ext_link'];?>"><?php echo $link['link_text'];?></a>
            </div>
            <?php endif;?>
          </div>
        </div>

      </div>

      <?php endforeach;?>
    </div>

  <?php endif;?>


  <?php if(get_row_layout() == 'textarea_with_image'):
      $title = get_sub_field('title');
      $content = get_sub_field('content');
      $image = get_sub_field('image');
      $picture = $image['sizes']['large'];
      $side = get_sub_field('image_side');
    ?>

  <div class="row my-5">
    <?php if($side == 'left'): ?>
    <div class="col-lg-6"><img src="<?php echo $picture; ?>" alt="<?php echo $title; ?>" class="img-fluid"></div>
    <div class="col-lg-6">
      <h4><?php echo $title; ?></h4>
      <?php echo $content; ?>
    </div>
    <?php else:?>
    <div class="col-lg-6">
      <h4><?php echo $title; ?></h4>
      <?php echo $content; ?>
    </div>
    <div class="col-lg-6"><img src="<?php echo $picture; ?>" alt="<?php echo $title; ?>" class="img-fluid"></div>
    <?php endif; ?>
  </div>
  <?php endif;?>

  <?php if(get_row_layout() == 'linking_button_read_more'):
      $linkText = get_sub_field('link_text');
      $linkUrl = get_sub_field('link_url');
      $color = get_sub_field('button_color');
    ?>
  <a href="<?php echo $linkUrl; ?>" style="text-decoration:none;">
    <div class="link-button <?php echo $color; ?>">
      <?php echo $linkText; ?>
    </div>
  </a>

  <?php endif;?>

  <?php if(get_row_layout() == 'brand_and_items'):
    $brandText = get_sub_field('type');
    $description = get_sub_field('description');
    $items = get_sub_field('items');
  ?>

    <div class="brand_and_items <?php echo $brandText;?>">
      <div class="top-text">
        <h4><span><em><?php echo $brandText;?></em> Series</span></h4>
        <p><?php echo $description;?></p>
      </div>


      <div class="row d-flex justify-content-center">
        <?php foreach($items as $item):?>
          <div class="col-sm-4 col-6 inkarami-items">
            <img src="<?php echo $item['product_image'];?>" alt="<?php echo $item['name'];?>" class="img-fluid">
            <h4><?php echo $item['name'];?><br><span><?php echo $item['jp_name'];?></span></h4>
            <hr>
            <h5><?php echo $item['size'];?></h5>
            <?php if($item['true_or_false'] = 1):?>
              <p>900mlサイズ有</p>
            <?php endif; ?>
          </div>
        <?php endforeach; ?>
      </div>

    </div>




  <?php endif;?>

  <?php endwhile;?>

  <?php endif; ?>






</div>


<?php get_footer(); ?>
