<?php
/**
 * @package     Onyx
 * @subpackage  Overrider
 *
 * @copyright   Copyright (C) 2005 - 2016 Joomlashack. Meritage Assets.  All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
// No direct access.
defined('_JEXEC') or die;

$app = JFactory::getApplication();

require_once JPATH_THEMES . '/' . $app->getTemplate() . '/wright/html/overrider.php';

$params = &$this->item->params;
$images = json_decode($this->item->images);


if ($images->image_intro != '')
{
	$this->item->wrightElementsStructure = Array(
        "div.article-image",
            "image",
        "/div",
        "div.article-content",
            "title",
            "icons",
            "article-info",
            "legendtop",
            "content",
            "legendbottom",
            "article-info-below",
            "article-info-split",
        "/div",
    );
}
else
{
	$this->item->wrightElementsStructure = Array(
		"image",
		"div.article-content",
			"title",
			"icons",
			"article-info",
			"legendtop",
			"content",
			"legendbottom",
			"article-info-below",
			"article-info-split",
		"/div"
	);
}

include Overrider::getOverride('com_content.featured', 'default_item');
