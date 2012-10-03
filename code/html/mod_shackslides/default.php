<?php
/**
 * @version   1.x
 * @package   ShackSlides
 * @copyright (C) 2010 Joomlashack / Meritage Assets Corp
 * @license   GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */

defined('_JEXEC') or die('Direct access to files is not permitted');

// This can be used in an override to change default settings. User can override
// settings in the module settings page still.
$defaults = array(
	'width' => '500', // width of container
	'height' => '250', // height of container
	'autoplay' => '5', // number of seconds per slide on autoplay, 0 to disable
	'pause' => 'yes', // pauses the autoplay on hover over slider
	'description' => 'yes', // displays image discription box
	'description_background' => 'ffffff', // description background color hex code
	'description_opacity' => '0.5', // description background opacity
	'description_height' => '50', // description height if position is top/bottom
	'description_width' => '50', // description width if position is right/left
	'description_position' => 'bottom', // top,button,right,left are options
	'buttons' => 'no', // displays the next/prev buttons
	'buttons_opacity' => '1', // buttons opacity
	'buttons_prev_label' => '<', // previous button label
	'buttons_next_label' => '>', // next button label
	'navigation' => 'yes', // displays the navigation
	'navigation_buttons' => 'yes', // displays next/prev buttons in navigation bar
	'navigation_container' => 'sliderNav', // id for the slider navigation container
	'navigation_label' => 'yes', // shows the numbers for navigation
	'mousewheel' => 'no', // can use mousewheel for navigation
	'container' => 'slider', // id for the slider container
);

// Adding the javascript and css files to the document
$doc = JFactory::getDocument();
$app = JFactory::getApplication();
$doc->addScript(JURI::base() . 'modules/mod_shackslides/assets/sliderman.js');
ob_start();
include(JPATH_ROOT.'/templates/'.$app->getTemplate().'/html/mod_shackslides/css/sliderman.css.php');
$styles = ob_get_contents();
ob_end_clean();

$doc->addStyleDeclaration($styles);

?>

<div class="shackSlider">

	<div id="<?php echo $params->get('container', $defaults['container']) ?>">
<?php for ($i = 0; $i < count($images); $i++) : ?>
<?php if ($images[$i] === false) continue; ?>
<?php if ($links[$i]) : ?><a href="<?php echo $links[$i]; ?>"><?php endif; ?>
					<img src="<?php echo $base.$images[$i] ?>" title="<?php echo strip_tags($titles[$i]) ?>" />
		<?php if ($links[$i]) : ?></a><?php endif; ?>
		<?php if ($titles[$i]) : ?>
				<div class="slideTitle">
			<?php echo $titles[$i]; ?>
			</div>
<?php endif; ?>
			<?php endfor; ?>

	</div>
	<div id="<?php echo $params->get('navigation_container', $defaults['navigation_container']) ?>"></div>

<?php require(JPATH_BASE.'/'.'modules'.'/'.'mod_shackslides'.'/'.'assets'.'/'.'script.js.php') ?>

</div>
