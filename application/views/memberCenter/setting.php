<header class="masthead">

  <section id="content" class="content-section text-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>修改個人資料</h2>
          <p><?php if(null !== $this->session->flashdata('msg')){
             echo('** '.$this->session->flashdata('msg')).' **';
           } ?></p>
          <?php echo validation_errors(); ?>
          <?php echo form_open('memberCenter/settingupdate');?>
          <fieldset>
            <div class="row">
              <label>Email *</label>
              <input type="text" class="form-control" name="email" value="<?php echo ($echo_value === true) ? $member['m_email'] : set_value('email'); ?>" aria-describedby="emailHelp" placeholder="Enter your email">
              <input type="hidden" class="form-control" name="old_email" value="<?php echo ($echo_value === true) ? $member['m_email'] : set_value('old_email'); ?>">
              <small id="emailHelp" class="form-text text-muted">This is your account number.</small>
            </div>
            <div class="row">
              <label>Password *</label>
              <input type="text" class="form-control" name="password" value="<?php echo ($echo_value === true) ? $member['m_password'] : set_value('password'); ?>" aria-describedby="emailHelp" placeholder="Enter your password">
              <small id="emailHelp" class="form-text text-muted">This is your password.</small>
            </div>
            <div class="row">
              <label>Password Confirmation *</label>
              <input type="text" class="form-control" name="passconf" value="" aria-describedby="emailHelp" placeholder="Enter your password again">
              <small id="emailHelp" class="form-text text-muted">This is your password check.</small>
            </div>
            <div class="row">
              <label>Name *</label>
              <input type="text" class="form-control" name="name" value="<?php echo ($echo_value === true) ? $member['m_name'] : set_value('name'); ?>" aria-describedby="emailHelp" placeholder="Enter your name">
            </div>
            <div class="row">
              <label>Phone number *</label>
              <input type="text" class="form-control" name="phonenum" value="<?php echo ($echo_value === true) ? $member['m_phonenum'] : set_value('phonenum'); ?>" aria-describedby="emailHelp" placeholder="Enter your phone number">
            </div>
            <div class="row">
              <label>Birth</label>
              <input type="date" class="form-control" name="birth" value="<?php echo ($echo_value === true) ? $member['m_birth'] : set_value('birth'); ?>" aria-describedby="emailHelp">
            </div>
            <div class="row">
              <label>Address</label>
              <input type="test" class="form-control" name="address" value="<?php echo ($echo_value === true) ? $member['m_address'] : set_value('address'); ?>" aria-describedby="emailHelp">
            </div>
            <br>
            <div class="container">
              <button type="submit" class="btn btn-secondary">更新</button>　
              <?php if($_SESSION['user_Admin'] === 'admin'){ ?>
                <a href="<?= base_url() ?>admin/index" class="btn btn-secondary">返回</a>
              <?php }else{ ?>
                <a href="<?= base_url() ?>memberCenter/index" class="btn btn-secondary">返回</a>
              <?php } ?>
            </div>

          </fieldset>
          </form>
        </div>
      </div>
    </div>
  </section>

</header>
