<?php
/**
 * Modified from original events manager plugin version: 5.6.6.1
 * @author Brad Payne
 * @package tlpd
 * @since 0.9
 * @license https://www.gnu.org/licenses/gpl.html GPLv3 or later
 *
 * Original:
 * @author Marcus Sykes
 * @copyright Copyright Marcus Sykes
 */

global $EM_Event;
/**
 * @var $EM_Event EM_Event
 */
$categories = EM_Categories::get(
	[
		'orderby'    => 'name',
		'hide_empty' => 0,
	]
);
?>
<?php if ( count( $categories ) > 0 ) : ?>
	<div class="event-categories">
		<!-- START Categories -->
		<label for="event_categories"><?php _e( 'Category:', 'events-manager' ); ?> </label>
		<select name="event_categories[]" multiple class="event-categories-select2" id="event_categories">
			<?php
			$selected = $EM_Event->get_categories()->get_ids();
			$walker   = new EM_Walker_CategoryMultiselect();
			$args_em  = [
				'hide_empty'   => 0,
				'name'         => 'event_categories[]',
				'hierarchical' => true,
				'id'           => EM_TAXONOMY_CATEGORY,
				'taxonomy'     => EM_TAXONOMY_CATEGORY,
				'selected'     => $selected,
				'walker'       => $walker,
			];
			echo walk_category_dropdown_tree( $categories, 0, $args_em );
			?>
		</select>
		<!-- END Categories -->
	</div>
<?php endif; ?>
