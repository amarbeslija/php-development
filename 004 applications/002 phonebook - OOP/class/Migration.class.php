<?php

/**
 * Class for creating MySQL/MariaDB migrations.
 * It supports method chaining.
 */
class Migration{

    public $table;
    public $check;
    public $file;
    public $fields;
    public $add_column_after;
    public $output;
    
    /**
     * 
     * Method for creating table inside the query.
     * Method use IF NOT EXISTS so that we can't override table and we don't get errors that table exists from the database.
     * @param string $table_name Provide table name which will be created (used inside the query)
     * @return object It returns this objec to allow method chaining.
     * 
     */
    public function create($table_name){
        $this->table = "CREATE TABLE IF NOT EXISTS " . $table_name . " ";
        $this->file = "create_table_" . $table_name;
        $this->check = false;
        return $this;
    }

    /**
     * TEMPORARY DOCS
     * Method for altering existing table (it requires table name)
     * @param string $table_name Table name to be altered inside the database
     */
    public function alter($table_name){
        $this->table = "ALTER TABLE " . $table_name . " ";
        $this->file = "alter_table_" . $table_name;
        $this->check = true;
        return $this;
    }

    /**
     * TEMPORARY DOCS
     * Method for deleting existing table (it requires table name)
     */
    public function drop($table_name){
        $this->table = "DROP TABLE IF EXISTS " . $table_name . " ";
        $this->file = "drop_table_" . $table_name;
        $this->check = true;
        return $this;
    }

    /** 
     * TEMPORARY DOCS
     * Method for creating new column which is primary key
     */
    public function primary($field_name, $field_type = "INT", $field_length = "11"){

        // Create column with primary key and auto increment and add it to the $fields field of the class
        $this->fields .= $field_name . " " . strtoupper($field_type) . "(" . $field_length . ") AUTO_INCREMENT PRIMARY KEY, ";

        return $this;
    }

    /** 
     * TEMPORARY DOCS
     * Method for creating new column inside the table
     */
    public function add($field_name, $field_type = "VARCHAR", $field_length = "100", $field_null = "NOT NULL", $field_increment = "", $field_primary = ""){
        if(strtolower($field_increment) == "auto" ){
            $field_increment = "AUTO_INCREMENT";
        }

        if(strtolower($field_primary) == "primary"){
            $field_primary = "PRIMARY KEY";
        }

        if($this->check !== false){
            $add_column = "ADD COLUMN ";
        }else{
            $add_column = "";
        }
        $this->fields .= $add_column . $field_name . " " . strtoupper($field_type) . "(" . $field_length . ") " . $field_null . " " . $field_increment . " " . $field_primary. ", ";

        return $this;
    }

    /**
     * TEMPORARY DOCS
     * Method for changing column name and field type inside the database
     * @param string $column_name Old column name which needs to exists in the database so we can change it
     * @param string $new_name New column name which will replace old column name
     * @param string $
     */
    public function edit($column_name, $new_name, $field_type = "", $field_value = ""){
        if($field_type == "" && empty($field_type)){
            $field_type = "varchar";
            $field_value = "255";
        }
        $this->fields = "CHANGE COLUMN IF EXISTS {$column_name} {$new_name} {$field_type}({$field_value}), ";
        return $this;

    }

    public function delete(){
        return $this;
    }

    /**
     * TEMPORARY DOCS
     * Method for adding foreign key while creating or altering database
     * @param string $field_name Field name in the current table which will hold foreign to another table's column
     * @param string $table_name Name of the table to which we connect foreign key
     * @param string $table_field Name of the field inside other table to which we connect foreign key
     */
    public function foreign($field_name, $table_name, $table_field){
        $this->fields .= "ADD FOREIGN KEY ({$field_name}) REFERENCES {$table_name}({$table_field})";
        return $this;
    }

    /**
     * TEMPORARY DOCS
     * Method for defining where will new columns be added when doing table alter and adding new columns (alter()->add()->after())
     */
    public function after($column_name){
        $this->add_column_after = " AFTER " . $column_name;
        return $this;
    }

    /** 
     * TEMPORARY DOCS
     * Add NULL OR NOT NULL to any field inside the database
     */
    public function null($value = True){
        if($value){
            $value = "NOT NULL";
        }else{
            $value = "NULL";
        }

        $this->fields = rtrim($this->fields, ", ");
        $this->fields .= " NOT NULL, ";
        return $this;
    }



    /**
     * TEMPORARY DOCS
     * Method for returning new migration code to the screen
     */
    public function return(){

        if($this->check !== false){
            $table_name = $this->table;
            $prefix = "";
            $sufix = "";
        }else{
            $table_name = $this->table;
            $prefix = "(";
            $sufix = ")";
        }

        $this->fields = rtrim($this->fields, ", ");
        return $table_name . $prefix . $this->fields . $this->add_column_after . $sufix;
    }

    /**
     * TEMPORARY DOCS
     * Method for creating new migration file, adding new migration to all migrations file and calling migration file
     */
    public function save(){

        if($this->check !== false){
            $prefix = "";
            $sufix = "";
        }else{
            $prefix = "(";
            $sufix = ")";
        }

        // Remove comma from the last line of the query together with the whitespace
        $this->fields = rtrim($this->fields, ", ");

        // Create code with content for the new migration file
        $this->output = "<?php \n" .
        "\$database = new Database(); \n" .
        "if(\$database->query(\"" . $this->table . $prefix . $this->fields . $this->add_column_after . $sufix ."\"" . ")){ \n" .
        " echo 'Query is success!'; \n" .
        "}else{ \n" .
        " echo 'Query failed!'; \n" .
        "} \n" . 
        "?> \n";

        // Create new migration file and insert code in it
        File::set("migration", $this->file, $this->output);

        // Save call to new migration file into migrations.php where we have all migration files
        $all_migrations = File::get_custom("migrations.php", "migration/");
        $migration= "require '" . $this->file . ".migration.php'; \n";

        if(!str_contains($all_migrations, $migration)){
            $all_migrations .= $migration;
        }

        File::set_custom("migrations.php", "migration/", $all_migrations);

        // Take global database connection and call newly created migration file
        global $connection;
        require $this->file . ".migration.php";

        // Empty all variables to allow multiple method chaining at once
        $this->table = "";
        $this->check = "";
        $this->file = "";
        $this->fields = "";
        $this->add_column_after = "";
        $this->output = "";
        
    }

}
