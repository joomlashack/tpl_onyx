<?php
/**
 * @copyright	Copyright (C) 2005 - 2010 Joomlashack LLC
 * @author		Jeremy Wilken :: Joomlashack
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

// Include the framework
require(dirname(__FILE__).DS.'wright'.DS.'wright.php');

// Initialize the framework and
$tpl = Wright::getInstance();
$tpl->display();

/**
 * You are a brave soul for venturing into the land of code and programming.
 * We salute you. First, you need to know this template is just a little
 * different. In order to provide some extra features, we've altered a few
 * little things about how traditional Joomla templates work.
 *
 * Meet Wright, our new framework. It will be under regular development, so
 * expect to see different features come out over time as we find a need for
 * them. You can see the folder named wright in the template. Anything inside
 * of that folder shouldn't be altered unless you are really good with PHP.
 * Don't blame us if you alter something there and break your template, we told
 * you so. That said, there are plenty of ways to customize and use Wright,
 * which you can do easily without overwriting the default code.
 *
 * If you go into the administrator and edit this template, you will see a link
 * to some documentation and help. Start there and it will get you going.
 *
 * Thanks again for purchasing and we hope you enjoy working with our templates!
 */