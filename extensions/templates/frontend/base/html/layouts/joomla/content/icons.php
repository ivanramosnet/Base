<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;

JHtml::_('bootstrap.framework');

$canEdit = $displayData['params']->get('access-edit');

?>

<div class="icons dropdown pull-right">
	<?php if (empty($displayData['print'])) : ?>

		<?php if ($canEdit || $displayData['params']->get('show_print_icon') || $displayData['params']->get('show_email_icon')) : ?>
			<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
				<span class="glyphicon glyphicon-cog"></span> <span class="caret"></span>
			</button>
			<?php // Note the actions class is deprecated. Use dropdown-menu instead. ?>
			<ul class="dropdown-menu">
				<?php if ($displayData['params']->get('show_print_icon')) : ?>
					<li class="print-icon"> <?php echo JHtml::_('icon.print_popup', $displayData['item'], $displayData['params']); ?> </li>
				<?php endif; ?>
				<?php if ($displayData['params']->get('show_email_icon')) : ?>
					<li class="email-icon"> <?php echo JHtml::_('icon.email', $displayData['item'], $displayData['params']); ?> </li>
				<?php endif; ?>
				<?php if ($canEdit) : ?>
					<li class="edit-icon"> <?php echo JHtml::_('icon.edit', $displayData['item'], $displayData['params']); ?> </li>
				<?php endif; ?>
			</ul>
		<?php endif; ?>

	<?php else : ?>

		<div class="pull-right">
			<?php echo JHtml::_('icon.print_screen', $displayData['item'], $displayData['params']); ?>
		</div>

	<?php endif; ?>
</div>
