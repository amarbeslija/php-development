<?php

class Database
{
    public $connection;
    public $results;



    /**
     * 
     * This constructor uses global $connection which is defined and included inside the configuration.php file.
     * If we don't have $connection inside the global scope, this class will not function and therefor nor will whole application.
     * 
     */
    public function __construct()
    {
        global $connection;
        $this->connection = $connection;
    }



    /**
     * 
     * Method for getting single or multiple column data from the database (from any table).
     * You can get multiple rows if you ask for something without the limit.
     * With limit you can get one or any number of rows you need.
     * 
     * @param string $table Name of the table from which we need to select/get data
     * @param string $columns Name of the column to get its data from
     * @param string $field_name Field which we can use to create WHERE clause (filter for the data)
     * @param string $field_value Data which we use for filtering with the $field_name parameter
     * @param string $limit Limit number of rows to be returned from the database
     * 
     */
    public function select($table, $columns, $field_name = "", $field_value = "", $limit = "")
    {

        if ($limit !== "") {
            $limit = " LIMIT " . $limit;
        }

        $where = "";
        if ($field_name !== "" && $field_value !== "") {
            $where = "WHERE {$field_name} = '{$field_value}'";
        }

        $select_columns = "";
        if (is_array($columns)) {
            foreach ($columns as $column) {
                $select_columns .= $column . ", ";
            }

            $select_columns = rtrim($select_columns, ", ");
        } else {
            $select_columns = $columns;
        }

        $query = "SELECT {$select_columns} FROM {$table} {$where} {$limit}";
        #return $query;
        if ($this->query($query)) {
            return $this;
        }

        return false;
    }



    /**
     * 
     * Method for selecting data using WHERE and LIKE inside the SQL.
     * @param string $table The name of the table where we will conduct search
     * @param array|string $columns Array of columns to be retrived from the database or string with "*" to get them all.
     * @param array $like_columns Array of columns names which will be used inside WHERE part with LIKE
     * @param array $like_values Array of values which will be used with array of columns names inside WHERE part with LIKE
     * @param string $type Optional parameter in which we can provide AND or OR if we have multiple columns inside the LIKE part
     * @param string $limit Optional parameter we can provide if we want to LIMIT number of rows we get from the table
     * @return object It returns this object to allow for method chaining
     * 
     */
    public function like($table, $columns, $like_columns, $like_values, $type = "AND", $limit = ""){
        if ($limit !== "") {
            $limit = " LIMIT " . $limit;
        }

        $select_columns = "";
        if (is_array($columns)) {
            foreach ($columns as $column) {
                $select_columns .= $column . ", ";
            }

            $select_columns = rtrim($select_columns, ", ");
        } else {
            $select_columns = $columns;
        }

        $where = "WHERE ";
        if(is_array($like_columns) && is_array($like_values)){
            for($i = 0; $i < count($like_columns); $i++){
                $where .= $like_columns[$i] . " LIKE '%" . $like_values[$i] . "%' " . $type . " ";
            }
            $where = rtrim($where, " $type ");
        }

        $query = "SELECT {$select_columns} FROM {$table} {$where} {$limit}";
        #return $query;
        if ($this->query($query)) {
            return $this;
        }

        return false;
    }
    
    

    /**
     * 
     * Method for inserting new row inside the database (in any table).
     * @param string $table Name of the table in which we want to insert data
     * @param array $columns Array of columns of the table in which we want to insert data (order them any way you like and add any column you need)
     * @param array $values Array of values which will match the array of columns (these two arrays need to have same length)
     * @param bool|string $last_id Returns last inserted id 
     * @return bool|string It returns true on success, otherwise it return sql error for now.
     * 
     */
    public function insert($table, $columns, $values, $last_id = false)
    {

        $insert_columns = "";
        if (is_array($columns) && !empty($columns)) {
            foreach ($columns as $column) {
                $insert_columns .= "`{$column}`, ";
            }

            $insert_columns = rtrim($insert_columns, ", ");
        }

        $insert_data = "";
        if (is_array($values) && !empty($values)) {
            foreach ($values as $value) {
                $insert_data .= "'{$value}', ";
            }

            $insert_data = rtrim($insert_data, ", ");
        }

        $query = "INSERT INTO {$table} ({$insert_columns}) VALUES ({$insert_data})";
        if ($last_id == false) {
            $execute = $this->query($query);
        }else{
            $execute = $this->query($query, $last_id);
        }
        return $execute;
    }



    /**
     * 
     * Method for updating data in one row in selected database (in any table).
     * Be advised: if you don't use $field_name and $field_value you will NOT overwrite whole table!
     * @param string $table Name of the table in which we want to update data
     * @param array $columns Array of columns of the table which we will change data for (order them any way you like and add any column you need)
     * @param array $values Array of values which will be changed, matching array of columns (these two arrays need to have same length)
     * @param string $field_name Field which will tell us which row to change in combination with $field_value (where to search for the value, in which column)
     * @param string $field_value Value of the column we are searching for to get to row and change the data inside
     * @return bool|string It returns true on sucess, otherwise it returns mysql error for now
     * 
     */
    public function update($table, $columns, $values, $field_name, $field_value)
    {

        $update_data = "";
        if (is_array($columns) && !empty($columns) && is_array($values) && !empty($values)) {
            for ($i = 0; $i < count($columns); $i++) {
                $update_data .= $columns[$i] . "= '" . $values[$i] . "', ";
            }

            $update_data = rtrim($update_data, ", ");

            if (!empty($field_name) && !empty($field_value)) {
                $query = "UPDATE {$table} SET {$update_data} WHERE {$field_name} = {$field_value}";
                $execute = $this->query($query);
                return $execute;
            }
        }
        return false;
    }



    /**
     * 
     * Method for deleting data in row in selected table inside the database.
     * Be advised: You CANNOT delete whole row or everything inside the table with this method.
     * @param string table Table in which we will delete data from one row.
     * @param string $field_name Column to search for 
     * @param string $field_value
     * @return bool It returns true on success, false otherwise.
     */
    public function delete($table, $field_name, $field_value)
    {

        $where = "";
        if ($field_name !== "" && $field_value !== "") {
            $where = "WHERE {$field_name} = {$field_value}";

            $query = "DELETE FROM {$table} {$where}";
            $execute = $this->query($query);
            return $execute;
        }

        return false;
    }


    /**
     * 
     * Method for executing any query from this class or from the outside if needed.
     * Be advised that this method doesn't fetch any data it just executes query!
     * Use output method to fetch data!
     * @param string $query Method expect already formed query to execute it!
     * @param bool $last_id If true it return last inserted id otherwise just returns true
     * @return bool|string It return true on success, otherwise it returns error.
     * 
     */
    public function query($query, $last_id = false)
    {
        if ($last_id == false) {
            if ($this->results = $this->connection->query($query)) {
                return true;
            } else {
                return $this->connection->error;
            }
        }else{
            if ($this->results = $this->connection->query($query)) {
                return $this->connection->insert_id;
            } else {
                return $this->connection->error;
            }
        }
    }


    public function output()
    {
        if ($this->results->num_rows > 0) {

            $output_array = array();

            $i = 0;
            while ($row = $this->results->fetch_assoc()) {
                $output_array[$i] = $row;
                $i++;
            }

            return $output_array;
        } else {
            echo false;
        }
    }

    /**
     * 
     * Method for deleting all rows inside one table and setting auto_increment to 1 automatically
     * @param string $table Table in which we will delete all rows and set auto_increment to 1
     * @return bool|string On sucess it returns true, otherwiser it returns mysql error or false for now
     * 
     */
    public function empty($table)
    {

        if (!empty($table)) {
            $query = "TRUNCATE TABLE {$table}";
            $execute = $this->query($query);
            return $execute;
        }

        return false;
    }
}
