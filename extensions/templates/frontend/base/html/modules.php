<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.h5bptb
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * This is a file to add template specific chrome to module rendering.  To use it you would
 * set the style attribute for the given module(s) include in your template to use the style
 * for each given modChrome function.
 *
 * eg.  To render a module mod_test in the submenu style, you would use the following include:
 * <jdoc:include type="module" name="test" style="submenu" />
 *
 * This gives template designers ultimate control over how modules are rendered.
 *
 * NOTICE: All chrome wrapping methods should be named: modChrome_{STYLE} and take the same
 * two arguments.
 */

/*
 * Module chrome for rendering the module in a submenu
 */
function modChrome_no($module, &$params, &$attribs)
{
	if ($module->content)
	{
		echo $module->content;
	}
}

/*
 * bootstrap (chosen bootstrap tag and font header tags)
 */
function modChrome_bootstrap($module, &$params, &$attribs)
{
	$moduleTag      = $params->get('module_tag', 'div');
	$headerTag      = htmlspecialchars($params->get('header_tag', 'h3'));
	$bootstrapSize  = (int) $params->get('bootstrap_size', 0);
	$moduleClass    = $bootstrapSize != 0 ? ' col-md-' . $bootstrapSize : '';

	// Temporarily store header class in variable
	$headerClass    = $params->get('header_class');
	$headerClass    = !empty($headerClass) ? ' class="' . htmlspecialchars($headerClass) . '"' : '';

	if (!empty ($module->content)) : ?>
		<<?php echo $moduleTag; ?> class="moduletable<?php echo htmlspecialchars($params->get('moduleclass_sfx')) . $moduleClass; ?>">

		<?php if ((bool) $module->showtitle) :?>
			<<?php echo $headerTag . $headerClass . '>' . $module->title; ?></<?php echo $headerTag; ?>>
		<?php endif; ?>

			<?php echo $module->content; ?>

		</<?php echo $moduleTag; ?>>

	<?php endif;
}

function modChrome_well($module, &$params, &$attribs)
{
	if ($module->content)
	{
		echo "<div class=\"well " . htmlspecialchars($params->get('moduleclass_sfx')) . "\">";
		if ($module->showtitle)
		{
			echo "<h3 class=\"page-header\">" . $module->title . "</h3>";
		}
		echo $module->content;
		echo "</div>";
	}
}

function modChrome_navSearch($module, &$params, &$attribs)
{
	if ($module->content)
	{
		echo "<div class=\"navbar-form navbar-right\">";
		echo $module->content;
		echo "</div>";
	}
}
?>