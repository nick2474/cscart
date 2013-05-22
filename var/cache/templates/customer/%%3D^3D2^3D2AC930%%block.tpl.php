<?php /* Smarty version 2.6.18, created on 2013-05-22 17:50:31
         compiled from /var/www/marketplace_dev/skins/basic/customer/views/block_manager/render/block.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'unescape', '/var/www/marketplace_dev/skins/basic/customer/views/block_manager/render/block.tpl', 5, false),)), $this); ?>
<?php  ob_start();  ?><?php if ($this->_tpl_vars['block']['user_class'] || $this->_tpl_vars['content_alignment'] == 'RIGHT' || $this->_tpl_vars['content_alignment'] == 'LEFT'): ?>
	<div class="<?php if ($this->_tpl_vars['block']['user_class']): ?> <?php echo $this->_tpl_vars['block']['user_class']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['content_alignment'] == 'RIGHT'): ?> float-right<?php elseif ($this->_tpl_vars['content_alignment'] == 'LEFT'): ?>
	float-left<?php endif; ?>">
<?php endif; ?>
		<?php echo smarty_modifier_unescape($this->_tpl_vars['content']); ?>

<?php if ($this->_tpl_vars['block']['user_class'] || $this->_tpl_vars['content_alignment'] == 'RIGHT' || $this->_tpl_vars['content_alignment'] == 'LEFT'): ?>
	</div>
<?php endif; ?><?php  ob_end_flush();  ?>