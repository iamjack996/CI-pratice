
    <!-- About Section -->
    <section id="content" class="content-section text-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <h2>產品上架</h2>
            <?php echo validation_errors(); ?>
            <?php echo $error;?>
            <?php echo form_open_multipart('admin/productUploadPost');?>
            <fieldset>
              <div class="row">
                <label>產品名稱 *</label>
                <input type="text" class="form-control" name="title" value="<?php echo set_value('title'); ?>">
              </div>
              <div class="row">
                <label>Slug *</label>
                <input type="text" class="form-control" name="slug" value="<?php echo set_value('slug'); ?>">
                <small id="emailHelp" class="form-text text-muted">This is your product URL.</small>
              </div>
              <div class="row">
                <label>產品類別 *</label>
                <input type="text" class="form-control" name="kind" value="<?php echo set_value('kind'); ?>">
              </div>
              <div class="row">
                <label>售價 *</label>
                <input type="text" class="form-control" name="price" value="<?php echo set_value('price'); ?>">
              </div>
              <div class="row">
                <label>描述 *</label>
                <textarea class="form-control" name="description" rows="8" cols="80" placeholder="產品頁面顯示描述產品特性及其注意事項"><?php echo set_value('description'); ?></textarea>
              </div>
              <div class="row">
                <label>圖片 *</label>
                <input type="file" class="form-control" name="userfile" value="<?php echo set_value('userfile'); ?>">
              </div>
              <br>
              <div class="container">
                <button type="submit" class="btn btn-secondary">上傳</button>
              </div>

            </fieldset>
            </form>
          </div>
        </div>
      </div>
    </section>
