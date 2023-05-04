<div class="wpxd-settings-container">
    <ul class="settings-tab">
        <?php foreach ($this->tab_list as $key => $value):?>
            <li class="tab-item">
                <a 
                    class="tab-link <?php echo $value['active'] ? 'active':'';?>" 
                    data-target="#<?php echo $value['template']; ?>"
                    onclick="wpxdChangeTab(event)"
                    >
                    <?php echo $value['title']; ?>
                </a>
            </li>
        <?php endforeach;?>
    </ul>
    <div class="wpxd-tab-content">
        <?php foreach ($this->tab_list as $key => $value):?>
            <div  class="wpxd-inner-tab <?php echo $value['active'] ? 'active':'';?>" id = "<?php echo $value['template']; ?>">
                <?php require_once plugin_dir_path(dirname(__FILE__)) . 'settings/'.$value['template'].'.php';?>
            </div>
        <?php endforeach;?>
    </div>
</div>
<script>
    function wpxdChangeTab(e) {
    
        let tabs = document.querySelectorAll('.wpxd-inner-tab');
        tabs.forEach((item, index) => {
            item.style.display = "none";
        });
        let id = e.target.dataset.target.replace( "#", "" ); 
        console.log(document.querySelector('.tab-link.active'));
        document.querySelector('.tab-link.active').classList.remove('active');
        e.target.classList.add('active');
        
        document.querySelector(`#${id}`).style.display = 'flex'; 
    }

    function wpxdInitTabs() {
        let tabs = document.querySelectorAll('.wpxd-inner-tab');
        tabs.forEach((item, index) => {
            item.style.display = "none";
        });
        document.querySelector('.wpxd-inner-tab.active').style.display = 'block';
    }
    wpxdInitTabs();
</script>