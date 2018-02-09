<section id="content" class="content-section text-center">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 mx-auto">
        <h2>聯絡我們</h2>
        <?php echo validation_errors(); ?>
        <?php echo form_open('/contactspost#content');?>
        <fieldset>
          <div class="row">
            <label>Name *</label>
            <input type="text" class="form-control" name="name" value="<?php echo set_value('name'); ?>" aria-describedby="emailHelp" placeholder="Enter your name">
            <small id="emailHelp" class="form-text text-muted">填寫你的大名</small>
          </div>
          <div class="row">
            <label>Email *</label>
            <input type="text" class="form-control" name="email" value="<?php echo set_value('email'); ?>" aria-describedby="emailHelp" placeholder="Enter your email">
            <small id="emailHelp" class="form-text text-muted">填入能與你聯繫的郵件地址</small>
          </div>
          <div class="row">
            <label>Phone number</label>
            <input type="text" class="form-control" name="phonenum" value="<?php echo set_value('phonenum'); ?>" aria-describedby="emailHelp" placeholder="Enter your phone number">
            <small id="emailHelp" class="form-text text-muted">可以選擇性留下你的聯絡電話</small>
          </div>
          <div class="row">
            <label>Content *</label>
            <textarea class="form-control" name="content" rows="8" cols="80" placeholder="寫下你想對我們說的話和建議"><?php echo set_value('content'); ?></textarea>
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
