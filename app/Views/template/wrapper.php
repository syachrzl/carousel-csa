<?php echo $this->include('layout/header'); ?>
<?php echo $this->renderSection('style'); ?>

<?php echo $this->include('layout/navbar'); ?>
<?php echo $this->include('layout/sidebar'); ?>
<?php echo $this->renderSection('content'); ?>

<?php echo $this->include('layout/footer'); ?>
<?php echo $this->renderSection('script'); ?>