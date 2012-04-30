<?php

/*
 * You can change this to a normal override. This is just in place to help manage
 * the default set of overrides we have in our template framework. 
 */

$app = JFactory::getApplication();

require_once(JPATH_THEMES.DS.$app->getTemplate().DS.'wright'.DS.'html'.DS.'overrider.php');

// Specific override.  The support for form.php was dropped since 1.6, so it's redirected to default.php.  Augusto Alvarez.  Apr 2012
$version = Overrider::getVersion();
if ($version[0] <= "1" && $version[1] <= "5") {
	include(Overrider::getOverride('com_content.article', 'form'));
}
else {
	include(JPATH_THEMES.DS.$app->getTemplate().DS.'html'.DS.'com_content'.DS.'article'.DS.'default.php');
}
