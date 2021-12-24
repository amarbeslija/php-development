<?php

class Router
{

    /**
     * 
     * Method for loading pages inside the application with check for user type/status.
     * @param string $page_name The name of the page which should be loaded inside the application.
     * @return string It returns requested page's content if page is found, otherwise it returns content of the index page.
     * Be aware that all PHP code will be executed before returning the content of the page.
     * 
     */
    public function load(string $page_name)
    {

        //Declare page class
        $page = new Page();

        # If page empty return index
        if ($page_name === '') {
            $page->load("index")->output("full");
            return;
        }

        //Array of all pages by status
        $list_array = File::get("file", "pages", "php", true);

        // Here we have a whitelist for all pages non-logged in user can access (basically all outer pages which don't require started session)
        //Create a new array with non important pages $key for the array 0
        $whitelist_for_external = $list_array[0];

        if (in_array($page_name, $whitelist_for_external, true) == true) {
            $page_conent = $page->load($page_name)->output("full");
            echo $page_conent;
        } else {
            $page_conent = $page->load("index")->output("full");
            echo $page_conent;
        }
    
    }

}
