<button class="wpxd-btn wpxd-light-blue wpxd-flex-start">
    <?php _e("Add font", "wpxd-qa-plugin");?>
</button>

<form method="post" enctype="multipart/form-data">
    <span class="wpxd-fonts-header">
        <i >
            <svg width="11" height="5" viewBox="0 0 11 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1.3004 0.868835L4.93908 3.86578C5.36881 4.21971 6.07199 4.21971 6.50171 3.86578L10.1404 0.868835" stroke="black" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </i>
        <div class="wpxd-row wpxd-form-group-container">
            <div class="wpxd-inline-form-group">
                <label>
                    <?php _e("Font name", "wpxd-qa-plugin");?>
                </label>
                <input type="text">
            </div>
            <div class="wpxd-inline-form-group">
                <label>
                    <?php _e("Font wight", "wpxd-qa-plugin");?>
                </label>
                <input type="number" step="100" min="0" max="900">
            </div>
            <div class="wpxd-inline-form-group">
                <label>
                    <?php _e("Font style", "wpxd-qa-plugin");?>
                </label>
                <select>
                    <option> 
                        <?php _e("Choose one item...", "wpxd-qa-plugin");?>
                    </option>
                    <option> 
                        <?php _e("Italic", "wpxd-qa-plugin");?>
                    </option>
                    <option> 
                        <?php _e("Underline", "wpxd-qa-plugin");?>
                    </option>
                </select>
            </div>
        </div>
        
    </span>
    <div class="wpxd-form-container wpxd-flc">
        <div class="wpxd-row">
            <div class="wpxd-input-group">
                <label class="wpxd-label" for="font-name">
                    <?php echo __("WOFF File","wpxd-qa-plugin"); ?>:
                </label>
                
            </div>

            <div class="wpxd-input-group">
                <label class="wpxd-label" for="font-file">
                    <?php echo __("Font File","wpxd-qa-plugin"); ?>:
                </label>
                <input type="file" name="font-file" id="font-file" required>
            </div>
            <input
                class="wpxd-btn"
                type="submit" 
                name="submit" 
                value="<?php echo __("Upload","wpxd-qa-plugin"); ?>"
            />
        </div>
        <div class="wpxd-row">
            <div class="wpxd-input-group">
                <label class="wpxd-label" for="font-name">
                    <?php echo __("WOFF2 File","wpxd-qa-plugin"); ?>:
                </label>
                
            </div>

            <div class="wpxd-input-group">
                <label class="wpxd-label" for="font-file">
                    <?php echo __("Font File","wpxd-qa-plugin"); ?>:
                </label>
                <input type="file" name="font-file" id="font-file" required>
            </div>
            <input
                class="wpxd-btn"
                type="submit" 
                name="submit" 
                value="<?php echo __("Upload","wpxd-qa-plugin"); ?>"
            />
        </div>
        <div class="wpxd-row">
            <div class="wpxd-input-group">
                <label class="wpxd-label" for="font-name">
                    <?php echo __("WOFF File","wpxd-qa-plugin"); ?>:
                </label>
                
            </div>

            <div class="wpxd-input-group">
                <label class="wpxd-label" for="font-file">
                    <?php echo __("Font File","wpxd-qa-plugin"); ?>:
                </label>
                <input type="file" name="font-file" id="font-file" required>
            </div>
            <input
                class="wpxd-btn"
                type="submit" 
                name="submit" 
                value="<?php echo __("Upload","wpxd-qa-plugin"); ?>"
            />
        </div>
        <div class="wpxd-row">
            <div class="wpxd-input-group">
                <label class="wpxd-label" for="font-name">
                    <?php echo __("WOFF File","wpxd-qa-plugin"); ?>:
                </label>
                
            </div>

            <div class="wpxd-input-group">
                <label class="wpxd-label" for="font-file">
                    <?php echo __("Font File","wpxd-qa-plugin"); ?>:
                </label>
                <input type="file" name="font-file" id="font-file" required>
            </div>
            <input
                class="wpxd-btn"
                type="submit" 
                name="submit" 
                value="<?php echo __("Upload","wpxd-qa-plugin"); ?>"
            />
        </div>
        <div class="wpxd-row">
            <div class="wpxd-input-group">
                <label class="wpxd-label" for="font-name">
                    <?php echo __("WOFF File","wpxd-qa-plugin"); ?>:
                </label>
                
            </div>

            <div class="wpxd-input-group">
                <label class="wpxd-label" for="font-file">
                    <?php echo __("Font File","wpxd-qa-plugin"); ?>:
                </label>
                <input type="file" name="font-file" id="font-file" required>
            </div>
            <input
                class="wpxd-btn"
                type="submit" 
                name="submit" 
                value="<?php echo __("Upload","wpxd-qa-plugin"); ?>"
            />
        </div>
        <div class="wpxd-row">
            <div class="wpxd-input-group">
                <label class="wpxd-label" for="font-name">
                    <?php echo __("WOFF File","wpxd-qa-plugin"); ?>:
                </label>
                
            </div>

            <div class="wpxd-input-group">
                <label class="wpxd-label" for="font-file">
                    <?php echo __("Font File","wpxd-qa-plugin"); ?>:
                </label>
                <input type="file" name="font-file" id="font-file" required>
            </div>
            <input
                class="wpxd-btn"
                type="submit" 
                name="submit" 
                value="<?php echo __("Upload","wpxd-qa-plugin"); ?>"
            />
        </div>
    </div>
</form>

<button class="wpxd-btn wpxd-blue wpxd-flex-end">
    <?php _e("Update", "wpxd-qa-plugin");?>
</button>