<?php
/**
* @copyright Copyright (C) 2010 Joomlashack LLC. All rights reserved.
*/
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
?>
<doctype>
<html>
<head>
<w:head />
</head>
<body>

	<?php if (($this->countModules('user3')) || ($this->countModules('user4'))) : ?>
	<!-- BEGIN TOOLBAR -->
	<div id="toolbar">
		<div class="container_12 clearfix">
			<?php if ($this->countModules('user3')) : ?>
			<div id="topmenu" class="grid_8">
				<w:module type="single" name="user3" chrome="none" />
			</div>
			<?php endif; ?>
			<?php if ($this->countModules('user4')) : ?>
			<div id="search" class="grid_4">
				<w:module type="single" name="user4" chrome="none" />
			</div>
			<?php endif; ?>
			<div class="clear"></div>
		</div>
	</div>
	<!-- END TOOLBAR -->
	<?php endif; ?>
	<!-- BEGIN HEADER -->
	<header id="header" class="container_12 clearfix">
		<?php // displays the logo
		BuildHeader::getHeader();
		BuildHeader::getMenu();		
		?>		
		<div class="clear"></div>
	</header>
	<!-- END HEADER -->
	<!-- BEGIN CONTAINER -->
	<div id="container">

	<?php if($this->countModules('user1')) : ?>
	<!-- BEGIN USER1 MODULES -->
	<div id="leader">
	<div class="container_12 clearfix">
			<w:module type="grid" name="user1" chrome="wrightflexgrid" />
			<div class="clear"></div>
	</div>
	</div>
	<?php endif; ?>

	<div class="container_12 clearfix">
		<section id="main">
		<?php if ($this->countModules('breadcrumbs') && (JRequest::getVar('view') != 'frontpage')) : ?>
		<div id="breadcrumbs">
			<w:module type="single" name="breadcrumbs" chrome="none" />
		</div>
		<?php endif; ?>
		<w:module type="single" name="above-content" chrome="wrightCSS3" />
			<jdoc:include type="message" />
			<w:content above="false" below="false"/>
		<w:module type="single" name="below-content" chrome="wrightCSS3" />
		</section>
		<aside id="sidebar1">
			<w:module name="sidebar1" chrome="wrightCSS3" />
		</aside>
		<aside id="sidebar2">
			<w:module name="sidebar2" chrome="wrightCSS3" />
		</aside>
		<div class="clear">&nbsp;</div>
	</div>
	
</div>
<?php if($this->countModules('user7')) : ?>
<!-- BEGIN BOTTOM ELEMENTS -->
<div class="elements-bot">
	<div class="container_12 clearfix">
		<w:module type="grid" name="user7" chrome="wrightflexgrid" />
		<div class="clear">&nbsp;</div>
	</div>
</div>
<?php endif; ?>

<?php if (($this->countModules('user8')) || ($this->countModules('footer'))) : ?>
<div id="footer" class="container_12 clearfix">
		<?php if ($this->countModules('user8')) : ?>
		<div id="link" class="grid_8">
			<w:module type="single" name="user8" chrome="none" />
		</div>
		<?php endif; ?>
			<w:footer />
		<div class="clear"></div>
</div>
<?php endif; ?>
<?php echo $this->params->get("footerscript",""); ?>
</body>
</html>