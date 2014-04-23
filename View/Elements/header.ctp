<?php $user = $this->Session->read("Auth.User"); ?>

<nav class="navbar navbar-fixed-top navbar-inverse">
  <div class="container">
    <a href="/" class="navbar-brand">ChatChit</a>
    <ul class="nav navbar-nav pull-right">
      <?php if ($user): ?>
      <li><a href="#">Hello <?php echo $user['username']; ?></a></li>
      <?php endif; ?>

      <li><a href="/">Home</a></li>

      <?php if (!$user): ?>
      <li><a href="/signup">Sign up</a></li>
      <?php else: ?>
      <li><a href="/signout">Sign out</a></li>
      <?php endif; ?>
    </ul>
  </div>
</nav>
