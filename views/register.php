<h1>Create An Account</h1>
<form action="" method="post">
  <div class="row">
    <div class="col">
      <div class="form-group">
        <label>FirstName</label>
        <input type="text" name="firstname" value="<?php echo $model->firstname ?? '' ?>" class="form-control<?php echo $model->hasError("firstname") ? 'is-invalid' : '' ?>">
      </div>
    </div>
    <div class="col">
      <div class="form-group">
        <label>LastName</label>
        <input type="text" name="lastname" class="form-control">
      </div>
    </div>
  </div>
  <div class="form-group">
    <label>Email</label>
    <input type="text" name="email" class="form-control">
  </div>
  <div class="form-group">
    <label>Password</label>
    <input type="password" name="password" class="form-control">
  </div>
  <div class="form-group">
    <label>Confirm Password</label>
    <input type="password" name="confirmpassword" class="form-control">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>