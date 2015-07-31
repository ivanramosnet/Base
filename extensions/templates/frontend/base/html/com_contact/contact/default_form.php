<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_contact
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::_('behavior.keepalive');
JHtml::_('behavior.formvalidator');

if (isset($this->error)) : ?>
	<div class="contact-error">
		<?php echo $this->error; ?>
	</div>
<?php endif; ?>

<div class="contact-form">
	<form id="contact-form" action="<?php echo JRoute::_('index.php'); ?>" method="post" class="form-validate">
		<fieldset>
			<legend><?php echo JText::_('COM_CONTACT_FORM_LABEL'); ?></legend>
			<div class="form-group">
				<?php echo $this->form->getLabel('contact_name'); ?>
				<?php $this->form->setFieldAttribute('contact_name', 'class', $this->form->getFieldAttribute('contact_name', 'class') . ' form-control'); ?>
				<?php echo $this->form->getInput('contact_name'); ?>
			</div>
			<div class="form-group">
				<?php echo $this->form->getLabel('contact_email'); ?>
				<?php $this->form->setFieldAttribute('contact_email', 'class', $this->form->getFieldAttribute('contact_email', 'class') . ' form-control'); ?>
				<?php echo $this->form->getInput('contact_email'); ?>
			</div>
			<div class="form-group">
				<?php echo $this->form->getLabel('contact_subject'); ?>
				<?php $this->form->setFieldAttribute('contact_subject', 'class', $this->form->getFieldAttribute('contact_subject', 'class') . ' form-control'); ?>
				<?php echo $this->form->getInput('contact_subject'); ?>
			</div>
			<div class="form-group">
				<?php echo $this->form->getLabel('contact_message'); ?>
				<?php $this->form->setFieldAttribute('contact_message', 'class', $this->form->getFieldAttribute('contact_message', 'class') . ' form-control'); ?>
				<?php echo $this->form->getInput('contact_message'); ?>
			</div>
			<?php if ($this->params->get('show_email_copy')) : ?>
				<div class="checkbox">
					<label>
						<?php echo $this->form->getInput('contact_email_copy'); ?> <?php echo $this->form->getLabel('contact_email_copy'); ?>
					</label>
				</div>
			<?php endif; ?>
			<?php // Dynamically load any additional fields from plugins. ?>
			<?php foreach ($this->form->getFieldsets() as $fieldset) : ?>
				<?php if ($fieldset->name != 'contact') : ?>
					<?php $fields = $this->form->getFieldset($fieldset->name); ?>
					<?php foreach ($fields as $field) : ?>
						<div class="form-group">
							<?php if ($field->hidden) : ?>
								<div class="form-control">
									<?php echo $field->input; ?>
								</div>
							<?php else: ?>
								<?php echo $field->label; ?>
								<?php if (!$field->required && $field->type != "Spacer") : ?>
									<span class="optional"><?php echo JText::_('COM_CONTACT_OPTIONAL'); ?></span>
								<?php endif; ?>
								<div class="form-control"><?php echo $field->input; ?></div>
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
			<?php endforeach; ?>
			<button class="btn btn-primary validate" type="submit"><?php echo JText::_('COM_CONTACT_CONTACT_SEND'); ?></button>
			<input type="hidden" name="option" value="com_contact" />
			<input type="hidden" name="task" value="contact.submit" />
			<input type="hidden" name="return" value="<?php echo $this->return_page; ?>" />
			<input type="hidden" name="id" value="<?php echo $this->contact->slug; ?>" />
			<?php echo JHtml::_('form.token'); ?>
		</fieldset>
	</form>
</div>
