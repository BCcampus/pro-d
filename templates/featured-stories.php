<?php
/**
 * Early-Years Theme: Featured Stories
 *
 * Modified from original header template in cbox theme
 *
 * @author Brad Payne
 * @package tlpd
 * @since 0.9
 * @license http://www.gnu.org/licenses/gpl.html GPLv3 or later
 */
global $post;
$args    = [
	'posts_per_page' => 3,
	'category_name'  => 'Homepage',
	'post_status'    => 'publish',
	'order'          => 'DESC',
	'post__in'       => get_option( 'sticky_posts' ),
];
$myposts = get_posts( $args );

foreach ( $myposts as $post ) :
	setup_postdata( $post );
	$child_theme_uri = get_stylesheet_directory_uri();
	?>
	<article class="col-sm-4">
		<p>
			<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
				<?php
				if ( ! has_post_thumbnail() ) {
					echo "<img src='{$child_theme_uri}/dist/images/noteworthy.jpg' alt='new and noteworthy' />";
				} else {
					the_post_thumbnail( 'featured-size' );
				}
				?>
			</a>
		</p>
		<h4>
			<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
		</h4>
		<p><?php the_excerpt(); ?></p>
	</article>
<?php endforeach;


wp_reset_postdata(); ?>
