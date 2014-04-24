<?php echo $this->Html->script("signup_validate"); ?>
<form method="post" action="/users/signup" role="form">
  <div class="col-md-4">
    <div class="form-group">
      <label for="username">Username</label>
      <input type="text" class="form-control" id="username" name="username" required placeholder="Username" />
    </div>

    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" id="password" name="password" required placeholder="Password" />
    </div>

    <div class="form-group">
      <label for="password_confirmation">Password Confirmation</label>
      <input type="password" class="form-control" id="password_confirmation" required name="password_confirmation" placeholder="Password confirmation" />
      <br>
      <div id="pass_match_warning" class="alert alert-danger"></div>
    </div>

    <div class="form-group">
      <button type="submit" id="submit-signup" class="btn btn-default">Sign up</button>
    </div>
  </div>
</form>
