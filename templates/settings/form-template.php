<button class="wpxd-btn wpxd-light-blue wpxd-flex-start">
    <?php _e("Add row", "wpxd-qa-plugin");?>
</button>
<div class="wpxd-number-modal">
    <input />
    <button class="wpxd-btn wpxd-verify-btn">
        <svg width="12" height="10" viewBox="0 0 12 10" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1.75 5.00001L4.58 7.83001L10.25 2.17001" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </button>
</div>
<div class="wpxd-form-template">

    <button class="wpxd-btn wpxd-add-col-btn">

        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M2 8H14M8 14V2" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>

    </button>
</div>

<script>
    jQuery('.wpxd-add-col-btn').click(function(e) {
        let rect = document.querySelector('.wpxd-add-col-btn').getClientRects()[0];
        document.querySelector('.wpxd-number-modal').style.top = (rect.top-50)+"px";
        document.querySelector('.wpxd-number-modal').style.left = rect.left+"px";
    });
</script>
<button class="wpxd-btn wpxd-blue wpxd-flex-end">
    <?php _e("Update", "wpxd-qa-plugin");?>
</button>