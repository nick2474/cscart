<?php /* Smarty version 2.6.18, created on 2013-05-22 17:50:32
         compiled from /var/www/marketplace_dev/skins/basic/customer/blocks/html_block.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'unescape', '/var/www/marketplace_dev/skins/basic/customer/blocks/html_block.tpl', 1, false),)), $this); ?>
<?php  ob_start();  ?><div class="wysiwyg-content"><?php echo smarty_modifier_unescape($this->_tpl_vars['content']); ?>
</div><?php  ob_end_flush();  ?>