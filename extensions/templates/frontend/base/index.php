<?php

/**
 * @package		Joomla.Site
 * @subpackage	Templates.base
 * @copyright	Copyright (C) 2015 Iván Ramos Jiménez. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * 
 */

defined('_JEXEC') or die;

// check modules
$showRightColumn	= ($this->countModules('position-3') or $this->countModules('position-6') or $this->countModules('position-8'));
$showbottom			= ($this->countModules('position-9') or $this->countModules('position-10') or $this->countModules('position-11'));
$showLeftColumn		= ($this->countModules('position-4') or $this->countModules('position-7') or $this->countModules('position-5'));

if ($showRightColumn==0 and $showLeftColumn==0) $showNoColumns = 1;
else $showNoColumns = 0;

/* The following line gets the application object for things like displaying the site name */
$app = JFactory::getApplication();

$document = JFactory::getDocument();

?>

<!doctype html>
	<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
	<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
	<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
	<!--[if gt IE 8]><!--> <html class="no-js" lang="<?php echo $this->language; ?>"> <!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		
		<jdoc:include type="head" />
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link rel="apple-touch-icon" sizes="57x57" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/favicons/apple-touch-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/favicons/apple-touch-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/favicons/apple-touch-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/favicons/apple-touch-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/favicons/apple-touch-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/favicons/apple-touch-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/favicons/apple-touch-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/favicons/apple-touch-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/favicons/apple-touch-icon-180x180.png">
		<link rel="icon" type="image/png" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/favicons/favicon-32x32.png" sizes="32x32">
		<link rel="icon" type="image/png" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/favicons/favicon-194x194.png" sizes="194x194">
		<link rel="icon" type="image/png" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/favicons/favicon-96x96.png" sizes="96x96">
		<link rel="icon" type="image/png" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/favicons/android-chrome-192x192.png" sizes="192x192">
		<link rel="icon" type="image/png" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/favicons/favicon-16x16.png" sizes="16x16">
		<link rel="manifest" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/favicons/manifest.json">
		<meta name="msapplication-TileColor" content="#2b5797">
		<meta name="msapplication-TileImage" content="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/favicons/mstile-144x144.png">
		<meta name="theme-color" content="#ffffff">
		
		<?php $document->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/style.min.css'); ?>
		
		<script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/jui/modernizr-2.8.3-respond-1.4.2.min.js"></script>
	</head>
	<body>
		<!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
		
			<nav class="navbar navbar-default" role="navigation">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#"><?php echo $app->getCfg('sitename'); ?></a>
					</div>
					<div class="collapse navbar-collapse">
						<jdoc:include type="modules" name="position-1" style="none"/>
						<jdoc:include type="modules" name="position-0" style="navSearch"/>
					</div><!--/.nav-collapse -->
				</div>
			</nav>
		
		
		<div class="container">
					<div class="row">
						<?php if($showLeftColumn) : ?>
							<aside class="col-md-3">
								<jdoc:include type="modules" name="position-7" style="bootstrap"/>
								<jdoc:include type="modules" name="position-4" style="bootstrap"/>
								<jdoc:include type="modules" name="position-5" style="bootstrap"/>
							</aside>
						<?php endif; ?>
						<section class="<?php echo ($showNoColumns ? 'col-md-12' : (($showLeftColumn==0 or $showRightColumn==0) ? 'col-md-9':'col-md-6')); ?>">
							<?php if ($this->countModules('position-12')): ?>
								<div id="top">
									<jdoc:include type="modules" name="position-12" style="bootstrap"/>
								</div>
							<?php endif; ?>
							<div>
								<jdoc:include type="message" />
								<jdoc:include type="component" />
								<jdoc:include type="modules" name="position-2" style="bootstrap" />
							</div>
						</section>
						<?php if($showRightColumn) : ?>
							<aside class="col-md-3">
								<jdoc:include type="modules" name="position-6" style="bootstrap"/>
								<jdoc:include type="modules" name="position-8" style="bootstrap"/>
								<jdoc:include type="modules" name="position-3" style="bootstrap"/>
							</aside>
						<?php endif; ?>
					</div>
				
			<?php if ($showbottom) : ?>
				<div class="row">
					<div class="col-md-4">
						<jdoc:include type="modules" name="position-9" style="bootstrap"/>
					</div>
					<div class="col-md-4">
						<jdoc:include type="modules" name="position-10" style="bootstrap"/>
					</div>
					<div class="col-md-4">
						<jdoc:include type="modules" name="position-11" style="bootstrap"/>
					</div>
				</div>
			<?php endif ; ?>
			
			<hr>
			
			<footer>
				<div class="row">
					<div class="col-md-3">
						<p>
							<?php echo JText::_('TPL_BASE_POWERED_BY');?> <a href="http://www.joomla.org/">Joomla!&#174;</a>
						</p>
						
					</div>
					<div class="col-md-3 offset4">
						<jdoc:include type="modules" name="position-14" style="bootstrap"/>
					</div>
				</div>
			</footer>
		</div>
		
		<jdoc:include type="modules" name="debug" />
		
		<?php JHtml::_('bootstrap.framework'); ?>
		
		<?php $document->addScript($this->baseurl . '/templates/' . $this->template . '/js/script.js'); ?>
		
	</body>
</html>