<form>
    <div class="wpxd-row">
        <div class="wpxd-input-group">
            <label for="wpxd-shimmer-effect-checkbox" class="wpxd-label">
                <?php _e("Shimmer effect", "wpxd-qa-plugin");?>
            </label>
            <input type="checkbox"
                id="wpxd-shimmer-effect-checkbox"
            >
        </div>
        <div class="wpxd-input-group">
            <label for="wpxd-sms-checkbox" class="wpxd-label">
                <?php _e("SMS Enabled", "wpxd-qa-plugin");?>
            </label>
            <input type="checkbox"
                id="wpxd-sms-checkbox"
            >
        </div>
    </div>
    <div class="wpxd-row" style="margin-top: 1rem;">
        <div class="wpxd-input-group">
            <label for="wpxd-sms-token-checkbox" class="wpxd-label">
                <?php _e("SMS Token", "wpxd-qa-plugin");?>
            </label>
            <input type="text"
                id="wpxd-sms-token-checkbox"
            >
        </div>
        <div class="wpxd-inline-form-group">
            <div class="wpxd-input-group">
                <label for="wpxd-sms-token-checkbox" class="wpxd-label">
                    <?php _e("SMS Text", "wpxd-qa-plugin");?>
                </label>
                <input type="text"
                    id="wpxd-sms-token-checkbox"
                >
            </div>
            <button class="wpxd-btn wpxd-flex-end">
                <?php _e("Test", "wpxd-qa-plugin");?>
            </button>
        </div>
        
    </div>
</form>
<button class="wpxd-btn wpxd-blue wpxd-flex-end">
    <?php _e("Update", "wpxd-qa-plugin");?>
</button>