<!DOCTYPE html>
<html>
<head>
  <title>
    <?php echo $title_for_layout; ?>
  </title>
  <?php echo $this->Html->css("bootstrap"); ?>
  <?php echo $this->Html->css("custom"); ?>
  <?php echo $this->Html->script("jquery-2.1.0.min.js"); ?>
  <?php echo $this->Html->script("bootstrap"); ?>
</head>
<body>
  <?php echo $this->element('header'); ?>
  <div class="container top-container">
    <?php echo $this->Session->flash(); ?>
    <?php echo $this->fetch('content'); ?>
  </div>
  <?php debug($this->request); ?>
  <?php debug($this->Session->read('Auth')); ?>
  <?php debug($var); ?>
  <?php echo $this->element('sql_dump'); ?>
</body>
</html>
