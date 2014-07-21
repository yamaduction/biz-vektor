<?php

/*-------------------------------------------*/
/*	Widget area setting
/*-------------------------------------------*/
/*	ChildPageList widget
/*-------------------------------------------*/
/*	Top PR widget
/*-------------------------------------------*/

/*-------------------------------------------*/
/*	Widget area setting
/*-------------------------------------------*/
function biz_vektor_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Homepage main content', 'biz-vektor' ),
		'id' => 'top-main-widget-area',
		'description' => __( 'This widget area appears on the front page main content area only.', 'biz-vektor' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );
	register_sidebar( array(
		'name' => __( 'Sidebar(Front page only)', 'biz-vektor' ),
		'id' => 'top-side-widget-area',
		'description' => __( 'This widget area appears on the front page only.', 'biz-vektor' ),
		'before_widget' => '<div class="sideWidget" id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="localHead">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Sidebar(Post content only)', 'biz-vektor' ),
		'id' => 'post-widget-area',
		'description' => __( 'This widget area appears only on the post content pages.', 'biz-vektor' ),
		'before_widget' => '<div class="sideWidget" id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="localHead">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Sidebar(Page content only)', 'biz-vektor' ),
		'id' => 'page-widget-area',
		'description' => __( 'This widget area appears only on the page content pages.', 'biz-vektor' ),
		'before_widget' => '<div class="sideWidget" id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="localHead">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Sidebar(Common top)', 'biz-vektor' ),
		'id' => 'common-side-top-widget-area',
		'description' => __( 'This widget area appears at top of sidebar.', 'biz-vektor' ),
		'before_widget' => '<div class="sideWidget" id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="localHead">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Sidebar(Common bottom)', 'biz-vektor' ),
		'id' => 'common-side-bottom-widget-area',
		'description' => __( 'This widget area appears at bottom of sidebar.', 'biz-vektor' ),
		'before_widget' => '<div class="sideWidget" id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="localHead">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'biz_vektor_widgets_init' );


/*-------------------------------------------*/
/*	ChildPageList widget
/*-------------------------------------------*/
class WP_Widget_ChildPageList extends WP_Widget {
	/** constructor */
	function WP_Widget_childPageList() {
		$widget_ops = array(
			'classname' => 'WP_Widget_childPageList',
			'description' => '表示している固定ページが属する階層のページリストを表示',
		);
		$widget_name = '固定ページ子ページリスト'.' ('.get_biz_vektor_name().')';
		$this->WP_Widget('childPageList', $widget_name, $widget_ops);
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance) {
		extract( $args );
		if(biz_vektor_childPageList()){
			echo $before_widget;
			biz_vektor_childPageList();
			echo $after_widget;
		}
	}

} // class WP_Widget_childPageList

// register WP_Widget_childPageList widget
add_action('widgets_init', create_function('', 'return register_widget("WP_Widget_childPageList");'));


/*-------------------------------------------*/
/*	Top PR widget
/*-------------------------------------------*/
class WP_Widget_topPR extends WP_Widget {
	/** constructor */
	function WP_Widget_topPR() {
		$widget_ops = array(
			'classname' => 'WP_Widget_topPR',
			'description' => 'トップページの３PRエリアウィジェットです。※サイドバーでは正しく表示されません。',
		);
		$widget_name = 'トップページ3PR'.' ('.get_biz_vektor_name().')';
		$this->WP_Widget('topPR', $widget_name, $widget_ops);
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance) {
		echo $before_widget;
		get_template_part( 'module_topPR' );
		echo $after_widget;
	}

} // class WP_Widget_topPR

// register WP_Widget_childPageList widget
add_action('widgets_init', create_function('', 'return register_widget("WP_Widget_topPR");'));