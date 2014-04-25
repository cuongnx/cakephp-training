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
  <div id="overlay"></div>
  <div class="alert alert-danger info-message" id="warning-message"></div>
  <div class="alert alert-success info-message" id="success-message"></div>
  <?php echo $this->element('header'); ?>
  <div class="container top-container">
    <?php echo $this->Session->flash(); ?>
    <?php echo $this->fetch('content'); ?>
  </div>
</body>
</html>
