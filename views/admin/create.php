<div class="one_full">
	<section class="title">
		<h4>Create a Testimonial</h4>
	</section>
	<section class="item">
		<div class="content">
			<?php  echo form_open(); ?>
                <div class="form_inputs">
                    <fieldset>
                        <ul>
                            <li>
                                <label for="testimonial-name">Name of Client or Company <span>*</span>
                                    
                                </label>
                                <div class="input">
                                    <input type="text" name="name" placeholder="Client Name" value=""></input>
                                </div>
                            </li>
                            <li>
                                <label for="testimonial-url">Website URL
                                    <small>Provide a website address to the clients website if one is provided. (optional)</small></label>
                                <div class="input">
                                    <input id="testimonial-url" type="text" name="website_url" placeholder="http://example.com" value=""></input>
                                </div>
                            </li>
                            <li class="editor">
                                <label for="testimonial-bio">Bio</label><br>
                                <small>A short bio of the client or description of the company giving the testimonial. (Optional)</small><br>
                                <div class="input small-side">
                                    <?php echo form_dropdown('type', array(
                                        'html' => 'html',
                                        'markdown' => 'markdown',
                                        'wysiwyg-simple' => 'wysiwyg-simple',
                                        'wysiwyg-advanced' => 'wysiwyg-advanced',
                                    ), 'wysiwyg-simple') ?>
                                </div>
                
                                <div class="edit-content">
                                    <?php echo form_textarea(array('id' => 'testimonial-bio', 'name' => 'testimonial_bio', 'value' => '', 'rows' => 30, 'class' => 'wysiwyg-simple')) ?>
                                </div>
                            </li>
                            <li class="editor">
                                <label for="body">Testimonial <span>*</span>
                                    
                                </label><br>
                                <small>The testimonial that your client gave you.</small><br>
                                <div class="input small-side">
                                    <?php echo form_dropdown('type', array(
                                        'html' => 'html',
                                        'markdown' => 'markdown',
                                        'wysiwyg-simple' => 'wysiwyg-simple',
                                        'wysiwyg-advanced' => 'wysiwyg-advanced',
                                    ), 'wysiwyg-simple') ?>
                                </div>
                
                                <div class="edit-content">
                                    <?php echo form_textarea(array('id' => 'testimonial-text', 'name' => 'testimonial_text', 'value' => '', 'rows' => 30, 'class' => 'wysiwyg-simple')) ?>
                                </div>
                            </li>
                            <li>
                                <label for="status">Status</label>
                                <div class="input"><?php echo form_dropdown('status', array('0' => 'Draft', '1' => 'Live'), 0, 'id="status"') ?></div>
                            </li>
                        </ul>
                    </fieldset>
                    <div class="buttons">
                        <button type="submit" name="btn_action" value="save" class="btn blue">
                            <span>Create</span>
                        </button>
                        <button type="submit" name="btn_action" value="save_exit" class="btn blue">
                            <span>Create &amp; Exit</span>
                        </button>
                        <a href="admin/testimonials" class="gray btn cancel">Cancel</a>
                    </div>
                </div>
            <?php echo form_close(); ?>
		</div>
	</section>
</div>