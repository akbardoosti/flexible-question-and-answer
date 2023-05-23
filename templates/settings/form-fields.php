<?php 
// echo "<pre>";var_export($this->tab_list['form_fields']['data']);echo "</pre>";
if($this->tab_list['form_fields']) {
    $form_fields_data = $this->tab_list['form_fields']['data'];
}
?>
<button class="wpxd-btn wpxd-light-blue wpxd-flex-start" onclick="wpxdAddField()">
    <?php _e("Add field", "wpxd-qa-plugin");?>
</button>
<script>
    var wpxdFiledNumber = 1;
    function wpxdAddField() {
        wpxdFiledNumber++;

        const newDiv = document.createElement("div");
        newDiv.classList.add('wpxd-form-field__container');
        newDiv.classList.add('wpxd-field__' + wpxdFiledNumber);

        const trashBtn = document.createElement('a');
        trashBtn.classList.add('wpxd-form-field__delete');
        trashBtn.onclick = (event) => wpxdDeleteFormField(event);
        trashBtn.innerHTML = `<span>
            <svg width="16px" height="16px" viewBox="0 0 24 24" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <g id="Interface / Trash_Full">
                    <path id="Vector"
                        d="M14 10V17M10 10V17M6 6V17.8C6 18.9201 6 19.4798 6.21799 19.9076C6.40973 20.2839 6.71547 20.5905 7.0918 20.7822C7.5192 21 8.07899 21 9.19691 21H14.8031C15.921 21 16.48 21 16.9074 20.7822C17.2837 20.5905 17.5905 20.2839 17.7822 19.9076C18 19.4802 18 18.921 18 17.8031V6M6 6H8M6 6H4M8 6H16M8 6C8 5.06812 8 4.60241 8.15224 4.23486C8.35523 3.74481 8.74432 3.35523 9.23438 3.15224C9.60192 3 10.0681 3 11 3H13C13.9319 3 14.3978 3 14.7654 3.15224C15.2554 3.35523 15.6447 3.74481 15.8477 4.23486C15.9999 4.6024 16 5.06812 16 6M16 6H18M18 6H20"
                        stroke="#f54242" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </g>
            </svg>
        </span>`;

        const formContainer = document.querySelector('.wpxd-form-field__container');
        newDiv.innerHTML = (formContainer.innerHTML);
        
        newDiv.querySelector('.wpxd-form-container').classList.add('wpxd-hide');
        newDiv.querySelector('.wpxd-form-field__head').classList.add('wpxd-rotate__90');
        newDiv.querySelector('.wpxd-form-container').appendChild(trashBtn);
        const formHead = newDiv.querySelector('.wpxd-form-field__head');
        formHead.querySelector('span').innerText = '<?php echo __( "New field", "wpxd-qa-plugin" ); ?>';
        const formField = document.querySelector('.wpxd-form-field');
        formField.appendChild(newDiv);
        wpxdSetValidationMessageOnInput();
    }

    function wpxdTriggerFieldFormCollapse(event) {
        var parentNode = event.target.parentElement;
        var formContainer = parentNode.querySelector(".wpxd-form-container");

        while (!formContainer) {
            parentNode = parentNode.parentElement;
            formContainer = parentNode.querySelector(".wpxd-form-container");
        }
        wpxdSlide(formContainer);
    }
    function wpxdSlide(elem) {

        elem.classList.toggle('wpxd-hide');
        const formHead = elem.parentElement.querySelector('.wpxd-form-field__head');
        formHead.classList.toggle('wpxd-rotate__90');

    }

    function wpxdDeleteFormField(event) {
        var parentNode = event.target.parentElement;
        while ( ! parentNode.querySelector('.wpxd-form-container') ) {
            parentNode = parentNode.parentElement;
        }
        parentNode.remove();
    }

    function wpxdChangeTitle(event) {
        var parentNode = event.target.parentElement;
        while ( ! parentNode.querySelector('.wpxd-form-container') ) {
            parentNode = parentNode.parentElement;
        }
        const formHead = parentNode.querySelector('.wpxd-form-field__head');
        formHead.querySelector('span').innerText = event.target.value;
    }
</script>
<form action="">
    <div class="wpxd-form-field">
        <?php if( count( $form_fields_data ) > 0 ):?>
            <?php foreach( $form_fields_data as $key => $data ): ?>
                <div class="wpxd-form-field__container">
                    <span class="wpxd-form-field__head " onclick="wpxdTriggerFieldFormCollapse(event)">
                        <i>
                            <svg width="11" height="5" viewBox="0 0 11 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M1.3004 0.868835L4.93908 3.86578C5.36881 4.21971 6.07199 4.21971 6.50171 3.86578L10.1404 0.868835"
                                    stroke="black" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </i>
                        <span>
                            <?php echo $data['title']; ?>
                        </span>
                    </span>
            
                    <div class="wpxd-form-container">
                        <div class="wpxd-input-group">
                            
                            <label class="wpxd-label">
                                <?php echo __( "Field type", "wpxd-qa-plugin" ); ?>
                            </label>
                            <select
                                class="wpxd-form-field__field_type"
                                data-error="<?php echo __( 'Please select one item.', 'wpxd-qa-plugin'); ?>" 
                                required 
                                >
                                <option
                                    value=""
                                >
                                    <?php echo __( "Select one item ...", "wpxd-qa-plugin" ); ?>
                                </option>
                                <option
                                    value="file"
                                    <?php echo 'file' == $data['type'] ? 'selected' : null; ?>
                                >
                                    <?php echo __( "File", "wpxd-qa-plugin" ); ?>
                                </option>
                                <option
                                    value="text"
                                    <?php echo 'text' == $data['type'] ? 'selected' : null; ?>
                                >
                                    <?php echo __( "Text", "wpxd-qa-plugin" ); ?>
                                </option>
                                <option
                                    value="text-area"
                                    <?php echo 'text-area' == $data['type'] ? 'selected' : null; ?>
                                >
                                    <?php echo __( "Text area", "wpxd-qa-plugin" ); ?>
                                </option>
                            </select>
                        </div>
                        <div class="wpxd-input-group">
                            <label class="wpxd-label">
                                <?php echo __( "Field name", "wpxd-qa-plugin" ); ?>
                            </label>
                            <input 
                                type="text"
                                class="wpxd-form-field__field_name"
                                data-error="<?php echo __( 'Field name can\'t be empty', 'wpxd-qa-plugin'); ?>" 
                                required 
                                value="<?php echo $data['name']; ?>"
                                >
                            
                        </div>
                        <div class="wpxd-input-group">
                            <label class="wpxd-label">
                                <?php echo __( "Field title", "wpxd-qa-plugin" ); ?>
                            </label>
                            
                            <input 
                                type="text" 
                                class="wpxd-form-field__field_title"
                                name="field_title" 
                                oninput="wpxdChangeTitle(event)"
                                data-error="<?php echo __( 'Field title can\'t be empty', 'wpxd-qa-plugin'); ?>" 
                                required 
                                value="<?php echo $data['title']; ?>"
                                />
                        </div>
                        <div class="wpxd-input-group">
                            <label class="wpxd-label">
                                <?php echo __( "Background color", "wpxd-qa-plugin" ); ?>
                            </label>
                            <input 
                                type="color"
                                class="wpxd-form-field__field_bg_color"
                                data-error="<?php echo __( 'Background color can\'t be empty', 'wpxd-qa-plugin'); ?>" 
                                required 
                                value="<?php echo $data['bgColor']; ?>"
                            >
                            
                        </div>
                        <div class="wpxd-input-group">
                            <label class="wpxd-label">
                                <?php echo __( "Text color", "wpxd-qa-plugin" ); ?>
                            </label>
                            <input 
                                type="color"
                                class="wpxd-form-field__field_text_color"
                                data-error="<?php echo __( 'Text color can\'t be empty', 'wpxd-qa-plugin'); ?>" 
                                required 
                                value="<?php echo $data['textColor']; ?>"
                            />
                            
                        </div>
                        <div class="wpxd-input-group">
                            <label class="wpxd-label">
                                <?php echo __( "Required", "wpxd-qa-plugin" ); ?>
                            </label>
                            <input 
                                type="checkbox"
                                class="wpxd-form-field__field_required"
                                <?php echo 'on' == $data['required'] ? 'checked':null; ?>
                                >
                        </div>
                        <div class="wpxd-input-group">
                            <label class="wpxd-label">
                                <?php echo __( "Validation error message", "wpxd-qa-plugin" ); ?>
                            </label>
                            <input 
                                type="text"
                                class="wpxd-form-field__field_validation_message"
                                value="<?php echo $data['validationMessage']; ?>"
                            >
                        </div>

                    </div>
                </div>
            <?php endforeach; ?>
        <?php else:?>
            <div class="wpxd-form-field__container">
                <span class="wpxd-form-field__head " onclick="wpxdTriggerFieldFormCollapse(event)">
                    <i>
                        <svg width="11" height="5" viewBox="0 0 11 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M1.3004 0.868835L4.93908 3.86578C5.36881 4.21971 6.07199 4.21971 6.50171 3.86578L10.1404 0.868835"
                                stroke="black" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </i>
                    <span>
                        <?php _e( 'New field', 'wpxd-qa-plugin'); ?>
                    </span>
                </span>
        
                <div class="wpxd-form-container">
                    <div class="wpxd-input-group">
                        
                        <label class="wpxd-label">
                            <?php echo __( "Field type", "wpxd-qa-plugin" ); ?>
                        </label>
                        <select
                            class="wpxd-form-field__field_type"
                            data-error="<?php echo __( 'Please select one item.', 'wpxd-qa-plugin'); ?>" 
                            required 
                            >
                            <option
                                value=""
                            >
                                <?php echo __( "Select one item ...", "wpxd-qa-plugin" ); ?>
                            </option>
                            <option
                                value="file"
                            >
                                <?php echo __( "File", "wpxd-qa-plugin" ); ?>
                            </option>
                            <option
                                value="text"
                            >
                                <?php echo __( "Text", "wpxd-qa-plugin" ); ?>
                            </option>
                            <option
                                value="text-area"
                            >
                                <?php echo __( "Text area", "wpxd-qa-plugin" ); ?>
                            </option>
                        </select>
                    </div>
                    <div class="wpxd-input-group">
                        <label class="wpxd-label">
                            <?php echo __( "Field name", "wpxd-qa-plugin" ); ?>
                        </label>
                        <input 
                            type="text"
                            class="wpxd-form-field__field_name"
                            data-error="<?php echo __( 'Field name can\'t be empty', 'wpxd-qa-plugin'); ?>" 
                            required 
                        />
                        
                    </div>
                    <div class="wpxd-input-group">
                        <label class="wpxd-label">
                            <?php echo __( "Field title", "wpxd-qa-plugin" ); ?>
                        </label>
                        
                        <input 
                            type="text" 
                            class="wpxd-form-field__field_title"
                            name="field_title" 
                            oninput="wpxdChangeTitle(event)"
                            data-error="<?php echo __( 'Field title can\'t be empty', 'wpxd-qa-plugin'); ?>" 
                            required 
                        />
                    </div>
                    <div class="wpxd-input-group">
                        <label class="wpxd-label">
                            <?php echo __( "Background color", "wpxd-qa-plugin" ); ?>
                        </label>
                        <input 
                            type="color"
                            class="wpxd-form-field__field_bg_color"
                            data-error="<?php echo __( 'Background color can\'t be empty', 'wpxd-qa-plugin'); ?>" 
                            required 
                        />
                        
                    </div>
                    <div class="wpxd-input-group">
                        <label class="wpxd-label">
                            <?php echo __( "Text color", "wpxd-qa-plugin" ); ?>
                        </label>
                        <input 
                            type="color"
                            class="wpxd-form-field__field_text_color"
                            data-error="<?php echo __( 'Text color can\'t be empty', 'wpxd-qa-plugin'); ?>" 
                            required 
                        />
                        
                    </div>
                    <div class="wpxd-input-group">
                        <label class="wpxd-label">
                            <?php echo __( "Required", "wpxd-qa-plugin" ); ?>
                        </label>
                        <input 
                            type="checkbox"
                            class="wpxd-form-field__field_required"
                            >
                    </div>
                    <div class="wpxd-input-group">
                        <label class="wpxd-label">
                            <?php echo __( "Validation error message", "wpxd-qa-plugin" ); ?>
                        </label>
                        <input 
                            type="text"
                            class="wpxd-form-field__field_validation_message"
                        >
                    </div>

                </div>
            </div>
        <?php endif;?>
    </div>
    
    
    <button 
        class="wpxd-btn wpxd-blue wpxd-flex-end"
        onclick="wpxdSaveFormFields(event)"
    >
        <?php _e("Update", "wpxd-qa-plugin");?>
    </button>
</form>


<script defer>
    function wpxdSaveFormFields(event) {
        event.preventDefault();
        const fields = [];
        const fieldContainers = document.querySelectorAll('.wpxd-form-field__container');
        fieldContainers.forEach( (item, index) => {
            
            const type = item.querySelector('.wpxd-form-field__field_type').value;
            const name = item.querySelector('.wpxd-form-field__field_name').value;
            const title = item.querySelector('.wpxd-form-field__field_title').value;
            const validationMessage = item.querySelector('.wpxd-form-field__field_validation_message').value;
            const required = item.querySelector('.wpxd-form-field__field_required').value;
            const bgColor = item.querySelector('.wpxd-form-field__field_bg_color').value;
            const textColor = item.querySelector('.wpxd-form-field__field_text_color').value;
            const formField = {
                type,
                name,
                title,
                validationMessage,
                required,
                bgColor,
                textColor
            };
            fields.push( formField );
        });
        jQuery.ajax({
            url: "<?php echo admin_url('admin-ajax.php'); ?>",
            type: 'post',
            dataType: 'json',
            data: {
                action: "wpxd_save_form_fields",
                nonce: '<?php echo wp_create_nonce("update_form_field"); ?>',
                fields
            },
            success: function( respData ) {

            }
        })
    }
    wpxdSetValidationMessageOnInput();
    function wpxdSetValidationMessageOnInput() {
        document.addEventListener("DOMContentLoaded", function() {
            var elements = document.getElementsByTagName("select");
            for (var i = 0; i < elements.length; i++) {
                elements[i].oninvalid = function(event) {
                    event.target.setCustomValidity("");
                    if ( ! event.target.validity.valid ) {
                        // event.target.setCustomValidity(event.target.dataset.error);
                        const span = document.createElement('span');
                        span.classList.add('wpxd-error-message');
                        
                        if ( ! event.target.parentElement.querySelector('.wpxd-error-message') ) {
                            setTimeout(() => {
                                console.log(event.target);
                                span.innerText = event.target.dataset.error;
                                event.target.parentElement.appendChild(span);
                                span.style.color = "#ff2500"
                            }, 200);
                            
                            setTimeout( () => {
                                
                                span.remove();
                            }, 8000 );
                        }
                    }
                };
                elements[i].oninput = function(e) {
                    e.target.setCustomValidity("");
                };
            }
        });

        let svg_danger = ` <img src="<?php echo plugin_dir_url(dirname(dirname(__FILE__))) ?>public/images/danger.svg"
            width="25px" height="25px"
            > `;
        document.addEventListener("DOMContentLoaded", function() {
            var elements = document.getElementsByTagName("input");
            for (var i = 0; i < elements.length; i++) {
                elements[i].oninvalid = function(event) {
                    event.target.setCustomValidity("");
                    
                    if ( ! event.target.validity.valid ) {
                        if ( 
                            typeof event.target.dataset.error != undefined 
                            && event.target.dataset.error != null 
                        ) {
                            event.target.setCustomValidity(event.target.dataset.error);
                            
                            const span = document.createElement('span');
                            span.classList.add('wpxd-error-message');
                            console.log(event.target.parentElement);
                            if ( ! event.target.parentElement.querySelector('.wpxd-error-message') ) {
                                setTimeout(() => {
                                    span.innerText = event.target.dataset.error;
                                    event.target.parentElement.appendChild(span);
                                    span.style.color = "#ff2500"
                                }, 200);
                                
                                setTimeout( () => {
                                    
                                    span.remove();
                                }, 8000 );
                            }
                            
                        }
                    }
                };
                elements[i].oninput = function(e) {
                    e.target.setCustomValidity("");
                };
            }
        });
    }
    
</script>


