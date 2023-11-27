<?php get_header(); ?>

    <!-- Home -->

    <div class="home">
      <div class="breadcrumbs_container">
        <div class="image_header">
          <div class="header_info">
            <?php
               $cat = get_the_category();
               $catslug = $cat[0]->slug;
               $catname = $cat[0]->cat_name;
            ?>
            <div><?php echo $catslug; ?></div>
            <div><?php echo $catname; ?></div>
          </div>
        </div>
      </div>
    </div>

    <!-- Course -->

    <div class="course">
      <div class="row content-body">
        <!-- Course -->
        <div class="col-lg-8">
          <!-- Course Tabs -->
          <div class="course_tabs_container">
            <div class="tab_panels">
              <!-- Description -->
              <div class="tab_panel">
                <div class="tab_panel_title"><?php echo $catname; ?></div>
                <div class="tab_panel_content">
                  <div class="tab_panel_text">
                    <!-- news loop from here-->
                    <?php if (have_posts()) : ?>
                       <?php while(have_posts()) : the_post(); ?>
                       <div class="news_posts_small">
                       <div class="row">
                         <div class="col-lg-2 col-md-2 col-sx-12">
                           <div class="calendar_news_border">
                             <div class="calendar_news_border_1">
                               <div class="calendar_month">
                                 <?php 
                                   if( is_category('event','graduates') ) :
                                     echo post_custom('month');
                                   else:
                                     echo get_post_time('F');
                                   endif;
                                  ?>
                               </div>
                               <div class="calendar_day">
                                 <span>
                                  <?php 
                                   if( is_category('event','graduates') ) :
                                     echo post_custom('day');
                                   else:
                                     echo get_the_date('d');
                                   endif;
                                  ?>
                                 </span>
                               </div>
                             </div>
                           </div>
                           <div class="calendar_hour"></div>
                         </div>
                         <div class="col-lg-10 col-md-10 col-sx-12">
                           <div class="news_post_small_title">
                             <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                           </div>
                           <div class="news_post_meta">
                             <ul>
                               <li>
                                 <?php echo wp_trim_words( get_the_content() , 100, '...'); ?>
                               </li>
                             </ul>
                           </div>
                           <div class="read_continue">
                           <button><a href="<?php the_permalink(); ?>" class="text-white">詳細を見る</a></button>
                           </div>
                         </div>
                       </div>
                       <hr />
                     </div>
                     <?php endwhile; ?>
                     <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Course Sidebar -->
        <div class="col-lg-4" style="background-color: #2b7b8e33">
          <!-- sidebar-main に切り出す -->
          <div class="sidebar">
            <div class="category">
              <div class="section_title_container category_title">
                <h2>CATEGORY</h2>
                <div class="section_subtitle">カテゴリー</div>
              </div>
              <div class="sidebar_categories">
                <ul>
                  <?php
                   $args = array(
                   'hide_empty' => 1, // 投稿記事があるカテゴリーのみ表示する
                   'title_li' => '',  // リストの外側に表示するタイトルと表示形式（''であれば何も表示しない）
                    );
                   wp_list_categories( $args ); 
                  ?>
                </ul>
              </div>
            </div>
            <div class="category">
              <div class="section_title_container category_title">
                <h2>Latest Post</h2>
                <div class="section_subtitle">最新記事</div>
              </div>
              <div class="sidebar_categories">
                <ul>
                 <?php
                   $args = array(
                   'posts_per_page' => 3 //表示件数の指定
                    );
                   $posts = get_posts( $args );
                   foreach ( $posts as $post ): //ループの開始
                   setup_postdata( $post ); //記事データのセット
                  ?>
                 <li>
                   <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                 </li>
                 <?php
                    endforeach;
                    wp_reset_postdata(); //今回作成したクエリをリセットする
                  ?>
                </ul>
              </div>
           </div>
          </div>
          <!-- sidebar-main ここまで -->

         
        </div>
      </div>
    </div>
<?php get_footer(); ?>