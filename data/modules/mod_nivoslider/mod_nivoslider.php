<?php
/**
 * @package     Nivo-Szaki Slider
 * @link        http://szathmari.hu
 * @version     0.2.4
 * @copyright   Copyright (C) 2010 szathmari.hu
 * @license     GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */
defined('_JEXEC') or die( 'Restricted access' );
require_once (dirname(__FILE__).DS.'helper.php');

$helper = new modNivoSliderHelper();

$html = $helper->render($params);

require(JModuleHelper::getLayoutPath('mod_nivoslider'));