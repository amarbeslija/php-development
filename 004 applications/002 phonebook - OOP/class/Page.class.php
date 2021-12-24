<?php

class Page{
    public $page;
    public $header;
    public $footer;
    public $navbar;
    public $sidebar;

    /**
     * 
     * Loads page from the page folder
     * @param string $page_name Name of the page to be loaded, without extension (example: index, error, dashboard)
     * 
     */
    public function load($page_name){
        // Load page file from the page folder using page name "example: index.page.php)
        $this->page = File::require("page", $page_name);
        // This adds method chaining to the app, so the usage is clear and easier
        return $this;
    }

    /**
     * 
     * When we finish loading body of the page than we need to call this method to load modules around it (like header, footer, etc.) and finally return the whole page to the output
     * @param string $page_output Array or string which modules to include with the page body. Empty for nothing, "full" for everything, array for custom loading.
     * 
     */
    public function output($page_output = ""){

        // Take an array of modules to be included and include all modules we find familiar inside (from module folder, with name like header.module.php)
        // This also works like a white list, so there is no possibilty to load module, or anything else that doesn't exist or it's remote
        if(($page_output !== "") && (is_array($page_output))){
            for($i = 0; $i < count($page_output); $i++){
                switch($page_output[$i]){
                    case "header":
                        $this->header = File::require("module", "header");
                    break;
                    case "footer":
                        $this->footer = File::require("module", "footer");
                    break;
                    case "navbar":
                        $this->navbar = File::require("module", "navbar");
                    break;
                    case "sidebar":
                        $this->sidebar = File::require("module", "sidebar");
                    break;
                }
            }

        }else if ($page_output == "full"){
            // Include all modules defined here (we have flexibility to add or remove modules) if parameter is word "full"
            $this->header = File::require("module", "header");
            $this->footer = File::require("module", "footer");
            $this->navbar = File::require("module", "navbar");
            $this->sidebar = File::require("module", "sidebar");
            
        }else{
            // Don't include anything, we only need empty page
        }

    // Whatever is loaded, we are returning here to the output
    // Have in mind that if something (any field) is empty here that will not cause any change or problem (app will show nothing there)
    return $this->header  . $this->navbar  . $this->sidebar . $this->page . $this->footer;
    }
}