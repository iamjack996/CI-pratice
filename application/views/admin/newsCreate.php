
    <!-- About Section -->
    <section id="content" class="content-section text-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <?php if(null !== $this->session->flashdata('msg')){
               echo('<p>** '.$this->session->flashdata('msg')).' **</p>';
             } ?>
            <h2>發布消息</h2>
            <?php echo validation_errors(); ?>
            <?php echo form_open('/admin/newsPost');?>
            <fieldset>
              <div class="row">
                <label>標題 *</label>
                <input type="text" class="form-control" name="title" value="<?php echo set_value('title'); ?>">
                <small id="emailHelp" class="form-text text-muted">推薦英文不含有符號</small>
              </div>
              <div class="row">
                <label>內容 *</label>
                <textarea class="form-control" name="content" rows="8"><?php echo set_value('content'); ?></textarea>
                <small id="emailHelp" class="form-text text-muted"></small>
              </div>
              <br>
              <div class="container">
                <button type="submit" class="btn btn-secondary">發布</button>
              </div>

            </fieldset>
            </form>
          </div>
        </div>
      </div>
    </section>
