<?php
/**
* @package     Nivo-Szaki Slider
* @link        http://szathmari.hu
* @version     0.2.4
* @copyright   Copyright (C) 2010 szathmari.hu
* @license     GNU/GPL http://www.gnu.org/copyleft/gpl.html
*/
defined('_JEXEC') or die('Restricted access');

class modNivoSliderHelper
{
	var $controlNavThumbsReplace;
	var $dirs;
	
	function render(& $params)
	{
		global $mainframe;
		$customStyle = '';
		$document = & JFactory :: getDocument();
		$URLOriginal = modNivoSliderHelper :: getOverrideURL();
		$module_base = $URLOriginal . 'modules/mod_nivoslider/assets/';
		if ($params->get('jQuery', '1'))
			JHTML :: script('jquery.js', $module_base);
		JHTML :: script('jquery.nivo.slider.js', $module_base);
		$moduleclassSfx = 'ShackSlider';
		if ($params->get('moduleclassSfx', ''))
			$moduleclassSfx = $params->get('moduleclassSfx', '');
		$imagesDir = rtrim($params->get('imagesDir', 'images/banners/'), '/\\');
		$subDir = $params->get('subDir', 0);
		if ($params->get('style', 'enhanced') == 'enhanced')
			$document->addStyleSheet($module_base . 'nivo-slider-enhanced.css', 'text/css', 'screen');
		else
			$document->addStyleSheet($module_base . 'nivo-slider.css', 'text/css', 'screen');
		if ($params->get('customStyle'))
		{
			$customStyle = trim($params->get('customStyle'));
		}
		$effect = $params->get('effect', 'random');
		$slices = $params->get('slices', '15');
		$animSpeed = $params->get('animSpeed', 500);
		$pauseTime = $params->get('pauseTime', 3000);
		$startSlide = $params->get('startSlide', 0);
		$imagesAttributes = $params->get('imagesAttributes', 'Image1|Nivo-Szaki Slider|http://szathmari.hu');
		$target = $params->get('target', '_self');
		$directionNav = $params->get('directionNav', 1);
		$directionNavHide = $params->get('controlNav', 1);
		$controlNav = $params->get('controlNav', 1);
		$controlNavThumbs = $params->get('controlNavThumbs', 1);
		$controlNavThumbsSearch = $params->get('controlNavThumbsSearch', '.jpg');
		$this->controlNavThumbsReplace = $params->get('controlNavThumbsReplace', '_thumb.jpg');
		$keyboardNav = $params->get('keyboardNav', 1);
		$pauseOnHover = $params->get('pauseOnHover', 1);
		$manualAdvance = $params->get('manualAdvance', 0);
		$captionOpacity = $params->get('captionOpacity', '0.8');
		$display = true;
		$document->addScriptDeclaration("
            jQuery.noConflict();
            (function($) {
                $(window).load(function(){
                    $('.$moduleclassSfx .nivoSlider').nivoSlider({
                    effect:'$effect',
                    slices:$slices,
                    animSpeed:$animSpeed,
                    pauseTime:$pauseTime,
                    startSlide:$startSlide,
                    directionNav:$directionNav,
                    directionNavHide:$directionNavHide,
                    controlNav:$controlNav,
                    controlNavThumbs:$controlNavThumbs,
                    controlNavThumbsFromRel:false,
                    controlNavThumbsSearch: '$controlNavThumbsSearch',
                    controlNavThumbsReplace: '$this->controlNavThumbsReplace',
                    keyboardNav:$keyboardNav,
                    pauseOnHover:$pauseOnHover,
                    manualAdvance:$manualAdvance,
                    captionOpacity:$captionOpacity
                    });
                });
            })(jQuery);
        ");
		$html = "<div class='$moduleclassSfx'><div class='nivoSlider'>\n";
		
		if ($subDir)
		{
			$this->dirs = array();
			modNivoSliderHelper :: subdirs($imagesDir);
			$imagesDir = $this->dirs;
		} 
			else
				$imagesDir = array($imagesDir);

		$images = modNivoSliderHelper :: getImages($imagesDir);
		if (!$images)
			return false;
		list($width, $height, $type, $attr) = getimagesize($images[0]);
		$customStyle .= ".$moduleclassSfx .nivoSlider {width:".
			$width."px;height:".$height."px;}\n".$customStyle;
		$document->addStyleDeclaration($customStyle);
		
		if ($target != '_self')
			$target=" target='$target'"; 
			else
				$target='';
		$i = 0;
		$p[] = '@\0|\t|\x0B| {2}@i';
		$r[] = '';
		$p[] = '@ +\||\| +@i';
		$r[] = '|';
		$imagesAttributes = htmlspecialchars(preg_replace($p, $r, $imagesAttributes));
		$imagesAttributes = explode("\n", $imagesAttributes);
		$imgAtt = array();
		foreach ($imagesAttributes as $t)
		{
			$imgAtt[] = explode("|", $t);
		}
		foreach ($images as $image)
		{
			$nimg = '';
			if (isset($imgAtt[$i][2]))
				$nimg = "<a href=\"" . $imgAtt[$i][2] . "\"$target>";
			$nimg .= "<img src='$URLOriginal" . str_replace("%2F", "/", rawurlencode($images[$i])) . "'";
			if (isset($imgAtt[$i][0]))
				$nimg .= " alt='" . $imgAtt[$i][0] . "'";
			if (isset($imgAtt[$i][1]))
				$nimg .= " title='" . $imgAtt[$i][1] . "'";
			$nimg .= " />";
			if (isset($imgAtt[$i][2]))
				$nimg .= "</a>";
			$html .= $nimg . "\n";
			$i++;
		}
		$html .= '</div></div>';
		if ($display == true)
			echo $html;
		else
			echo '&nbsp;';
	}

	function subdirs($dir)
	{
		foreach(glob($dir, GLOB_ONLYDIR) as $i=>$k)
		{
			$this->dirs[] = $k;
			modNivoSliderHelper :: subdirs($k.'/*');
		}
	}  
	
	function getImages($dir)
	{
		foreach ($dir as $i=>$k){


			foreach (array_merge(
				(array)glob("$k/*.jpg"),
				(array)glob("$k/*.png"),
				(array)glob("$k/*.gif")) as $filename)
			{
				if ($filename && !preg_match("/$this->controlNavThumbsReplace/", $filename))
					$files[] = $filename;
			}
		}
		return $files;
	}

	function getOverrideURL()
	{
		$pathURL = array();
		$uri = & JURI :: getInstance();
		$pathURL['prefix'] = $uri->toString(array('scheme', 'host', 'port'));
		$pathURL['path'] = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');
		return $pathURL['prefix'] . $pathURL['path'] . '/';
	}

}