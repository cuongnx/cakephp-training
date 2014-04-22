<?php $this->Session->flash(); ?>

<form>
  <div class="col-md-4">
    <div class="form-group">
      <label for="username">Username</label>
      <input type="text" class="form-control" id="username" placeholder="Username" />
    </div>

    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" id="password" placeholder="Password" />
    </div>

    <div class="form-group">
      <button type="submit" class="btn btn-default">Sign in</button>
      <a href="/signup">or register for an account</a>
    </div>
  </div>
</form>
