<?php
// Restrict Access to within Joomla
defined('_JEXEC') or die('Restricted access');

if(JRequest::getVar('task') == 'edit' || JRequest::getVar('layout') == 'form'){
	$styles .= '#main{width:100%; background:none;} #content{width:100%;} #sidebar1{display:none;} #sidebar2{display:none;}'.PHP_EOL;
	$this->document->addStyleDeclaration($styles);
}
 


class BuildHeader {
	// getHeader() displays logo as text/tagline or SEO optimized graphic
  static function getHeader($template) {
			$headertype			= $template->document->params->get( 'headertype', 'image' );
			$headline				= $template->document->params->get( 'headline', 'Onyx Template' );
			$tagline				= $template->document->params->get( 'tagline', 'for Joomla' );
			$item_spacing		= $template->document->params->get( 'item_spacing', '18' );
			$header_width		= $template->document->params->get( 'header_width', '244' );
			$header_height	= $template->document->params->get( 'header_height', '73' );
			$header_top_pad	= $template->document->params->get( 'header_top_pad', '15' );
			$header_bot_pad	= $template->document->params->get( 'header_bot_pad', '10' );
			$logo						= $template->document->params->get( 'logo', 'logo.png' );
			$style					= $template->document->params->get( 'style', 'blue' );


			if ($logo == 'template') {
			$background = JURI::base().'templates/'.$template->document->template.'/images/'.$style.'/logo.png';
			} else {
			$background = JURI::base().'images/'.$logo;
			}
			
			if ($headertype == "image") {
			echo "<h1 id=\"graphic\"><a style=\"width:".$header_width."px;height:".$header_height."px;\" href=\"".JURI::base()."\" title=\"".$tagline."\">".$headline."</a></h1>";
			$headerstyle = '#header {'
			        . 'height: '.$header_height.'px;'
			        . 'padding: '.$header_top_pad.'px 0px '.$header_bot_pad.'px 0px;'
			        . '}'
							. '#header span#graphic a,#header h1#graphic a {'
							. 'background: url('.$background.') no-repeat left center;'
							. '}';
			$template->document->addStyleDeclaration($headerstyle);
			}
			if ($headertype == "text") {
			echo "<div class=\"logotext\"><h1 id=\"text-header\"><a href=\"".JURI::base()."\" title=\"".$headline."\">".$headline."</a></h1>"."<h2 id=\"text-slogan\">".$tagline."</h2></div>";
			$headerstyle = '.logotext {'
			        . 'height: '.$header_height.'px;'
			        . 'width: '.$header_width.'px;float:left;'
			        . 'padding: '.$header_top_pad.'px 0px '.$header_bot_pad.'px 0px;'
							. '}';
			$template->document->addStyleDeclaration($headerstyle);
			}
		}
	// end getHeader function
	static function getMenu($template) {
		$item_spacing		= $template->document->params->get( 'item_spacing', '18' );
		$header_width		= $template->document->params->get( 'header_width', '244' );
		$menuposition	= $template->document->params->get( 'menuposition', 'right' );
		if ($menuposition == "right") {
		$menu_width		= 950 - $header_width;
		echo '<w:nav wrapclass="right" class="t" />';
		} elseif ($menuposition == "below") {
		$menu_width		= "950";
		echo '<w:nav wrapclass="below" class="t" />';
		}
		$menustyle = '#menu_wrap {width: '.$menu_width.'px;float:right;margin-right:5px;}#menu ul li a {padding: 0px '.$item_spacing.'px;}';
		$template->document->addStyleDeclaration($menustyle);
	}
}

