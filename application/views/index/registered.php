
    <!-- About Section -->
    <section id="content" class="content-section text-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <h2>註冊會員</h2>
            <?php echo validation_errors(); ?>
            <?php echo form_open('/registeredpost');?>
            <fieldset>
              <div class="row">
                <label>Email *</label>
                <input type="text" class="form-control" name="email" value="<?php echo set_value('email'); ?>" aria-describedby="emailHelp" placeholder="Enter your email">
                <small id="emailHelp" class="form-text text-muted">This is your account number.</small>
              </div>
              <div class="row">
                <label>Password *</label>
                <input type="text" class="form-control" name="password" value="<?php echo set_value('password'); ?>" aria-describedby="emailHelp" placeholder="Enter your password">
                <small id="emailHelp" class="form-text text-muted">This is your password.</small>
              </div>
              <div class="row">
                <label>Password Confirmation *</label>
                <input type="text" class="form-control" name="passconf" value="<?php echo set_value('password'); ?>" aria-describedby="emailHelp" placeholder="Enter your password again">
                <small id="emailHelp" class="form-text text-muted">This is your password check.</small>
              </div>
              <div class="row">
                <label>Name *</label>
                <input type="text" class="form-control" name="name" value="<?php echo set_value('name'); ?>" aria-describedby="emailHelp" placeholder="Enter your name">
              </div>
              <div class="row">
                <label>Phone number *</label>
                <input type="text" class="form-control" name="phonenum" value="<?php echo set_value('phonenum'); ?>" aria-describedby="emailHelp" placeholder="Enter your phone number">
              </div>
              <div class="row">
                <label>Birth</label>
                <input type="date" class="form-control" name="birth" value="<?php echo set_value('birth'); ?>" aria-describedby="emailHelp">
              </div>
              <div class="row">
                <label>Address</label>
                <input type="test" class="form-control" name="address" value="<?php echo set_value('address'); ?>" aria-describedby="emailHelp">
              </div>
              <br>
              <div class="container">
                <button type="submit" class="btn btn-secondary">Submit</button>
              </div>

            </fieldset>
            </form>
          </div>
        </div>
      </div>
    </section>

    
