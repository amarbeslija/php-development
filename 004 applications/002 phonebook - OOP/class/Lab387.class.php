<?php

class Lab387{

    public $object_name;

    /**
     * 
     * Method for preparing the class object to work with choosen entity (entity - table name inside the datbase).
     * We don't have return here because this method doesn't do anything except saving entity name inside the class.
     * @param string $object_name  The name of the object which is the same as the table name inside the database
     * 
     */
    public function prepare($object_name){
        $this->object_name = $object_name;
    }



    /**
     * 
     * Method for getting the data from the selected table for the entity
     * @param array $columns Array of columns we want to get from the table or "*" if want them all
     * @param string $field_name Name of the field we need to use if we want WHERE part inside the SQL
     * @param string $field_value Value of the field we need to use if we want WHERE part inside the SQL
     * @param string $limit If we need to limit number of results then we need to provide number
     * @return array|bool It returns array of data on sucess, false otherwise.
     * 
     */
    public function get($columns, $field_name = "", $field_value = "", $limit = ""){
        $database = new Database();
        $data = $database->select($this->object_name, $columns, $field_name, $field_value, $limit)->output();

        if(is_array($data) && !empty($data)){
            return $data;
        }

        return false;

    }



    /**
     * 
     * Method for setting the data inside the selected table for the entity.
     * Note: Length of columns array and values array needs to be the same for this work properly!
     * @param array $columns Array of columns for which we will provide data.
     * @param array $values Array of values which will match the columns provided in the first parameter. 
     * @return bool It returns true on sucess, false otherwise.
     * 
     */
    public function set($columns, $values){
        $database = new Database();
        $result = $database->insert($this->object_name, $columns, $values);

        if($result){
            return true;
        }

        return false;
    }



    /**
     * 
     * Method for editing/updating data inside the selected table for the entity.
     * Note: Length of columns array and values array needs to be the same for this to work propelry!
     * @param array $columns Array of columns for which we will provide new/replacement data.
     * @param array $values Array of values which will match the columns provided in the first parameter.
     * @param string $field_name The name of column which we will use inside the WHERE clause inside the SQL.
     * @param string $field_value The value of the field which we will use inside the WHERE caluse inside the SQL.
     * @return bool It returns true on sucess, false otherwise.
     * 
     */
    public function edit($columns, $values, $field_name, $field_value){
        $database = new Database();
        $result = $database->update($this->object_name, $columns, $values, $field_name, $field_value);

        if($result){
            return true;
        }

        return false;
    }



    /**
     * 
     * Method for deleting data inside the selected table for the entity.
     * Note: We can't delete whole table with this because we must provide data for the WHERE clause.
     * @param string $field_name The name of column which we will use inside the WHERE clause inside the SQL.
     * @param string $field_value The value we we will search for inside the the WHERE clause inside the SQL.
     * @return bool It returns true on sucess, false otherwise.
     * 
     */
    public function delete($field_name, $field_value){
        $database = new Database();
        $result = $database->delete($this->object_name, $field_name, $field_value);

        if($result){
            return true;
        }

        return false;
    }



    /**
     * 
     * Method for searching data inside the selected table for the entity.
     * Note: $like_columns array and $like_values array need to have same legnth for this to work properly.
     * @param array $columns Array of columns to be retrieved from the table if query is sucess
     * @param array $like_columns Array of column's names which will be used inside the LIKE part
     * @param array $like_values Array of column's values which will match array of column's names and will be usde inside the LIKE part.
     * @param string $type Optional parameter we can provide to use AND or OR inside multiple LIKE statements
     * @param string $limit Optional parameter we can provide to limit the number of rows we get from the table.
     * @return array|string It returns array of data on sucess, false otherwise.
     * 
     */
    public function search($columns, $like_columns, $like_values, $type = "AND", $limit = ""){
        $database = new Database();
        $data = $database->like($this->object_name, $columns, $like_columns, $like_values, $type, $limit)->output();

        if(is_array($data) && !empty($data)){
            return $data;
        }

        return false;
    }

    /**
     * 
     * Method for getting file or files from "file" table using data from the selected entity.
     * We only need provide data for the WHERE clause, and after that we get info on all files we need to get from the "file" table.
     * Then, this method gets all data for the files, if they exists inside the "file" table.
     * @param string $field_name Name of the column inside entity table where we will conduct search.
     * @param string $field_value Value which we will search inside the selected column.
     * @param string $limit Optional parameter with which we can limit number of rows we get in the search.
     * @return array|bool It return array of data for searched files on success, false otherwise.
     * 
     */
    public function file($field_name = "", $field_value = "", $limit = ""){
        $database = new Database();
        $data = $database->select($this->object_name, "file_id", $field_name, $field_value, $limit)->output();

        if(is_array($data) && !empty($data)){
            $return_array = array();

            foreach($data as $file){
                $return_array[] = $database->select("file", "*", "id", $file['file_id'], $limit)->output()[0];
            }

            return $return_array;
        }

        return false;

    }

    /**
     * 
     * Method for getting image or images from "image" table using data from the selected entity.
     * We only need provide data for the WHERE clause, and after that we get info on all images we need to get from the "image" table.
     * Then, this method gets all data for the images, if they exists inside the "image" table.
     * @param string $field_name Name of the column inside entity table where we will conduct search.
     * @param string $field_value Value which we will search inside the selected column.
     * @param string $limit Optional parameter with which we can limit number of rows we get in the search.
     * @return array|bool It return array of data for searched images on success, false otherwise.
     * 
     */
    public function image($field_name = "", $field_value = "", $limit = ""){
        $database = new Database();
        $data = $database->select($this->object_name, "image_id", $field_name, $field_value, $limit)->output();

        if(is_array($data) && !empty($data)){
            $return_array = array();

            foreach($data as $image){
                $return_array[] = $database->select("image", "*", "id", $image['image_id'], $limit)->output()[0];
            }

            return $return_array;
        }

        return false;

    }

}

/* Class Testing 
require "../configuration.php";
$lab387 = new Lab387();
$lab387->prepare("user");
var_dump($lab387->get("*"));
var_dump($lab387->search(["*"], ["email"], ["web@amarbeslija.com"]));
*/

/**
 * 
 * NOTES
 * @status FINISHED FOR NOW, READY FOR INHERITANCE
 * @note We need to have image and file tables inside the application if need to use image() and file() methods.
 * Inside the entity table we need to use "image_id" column name and "file_id" column name if we need to connect images or files to the entity.
 * 
 */