<?php
// Restrict Access to within Joomla
defined('_JEXEC') or die('Restricted access');

$onyxToolbarDisplayed = $this->params->get('onyx_toolbar_displayed', 'navbar-fixed-top');
$onyxToolbarCollapse = $this->params->get('onyx_toolbar_collapse', '0');