<form accept-charset="utf-8" method="post" action="/users/login">
  <input type="hidden" name="_method" value="POST" />
  <div class="col-md-4">
    <div class="form-group">
      <label for="username">Username</label>
      <input type="text" class="form-control" id="UserUsername" name="data[User][username]" placeholder="Username" />
    </div>

    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" id="UserPassword" name="data[User][password]" placeholder="Password" />
    </div>

    <div class="form-group">
      <button type="submit" class="btn btn-default">Sign in</button>
      <a href="/signup">or register for an account</a>
    </div>
  </div>
</form>
