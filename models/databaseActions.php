<?php

class DatabaseActions
{

    private $dbc;

    public function __construct()
    {
        $dbh = DatabaseConnection::getInstance();
        $this->dbc = $dbh->getConnection();
    }

    // executes dynamic query
    public function executeQuery($sql)
    {
        $query = mysqli_query($this->dbc, $sql);
        if (!$query) {
            echo mysqli_error($this->dbc);
            die();
        }
        return $query;
    }

    // assoc array all rows
    public function selectAllGetAssoc()
    {
        $query = $this->executeQuery('SELECT * FROM `products`');
        $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
        mysqli_free_result($query);
        return $result;
    }

    // takes array of id's, deletes those rows
    public function deleteChecked(array $id_list, $table_name)
    {
        $id_list = implode(',', $id_list);
        $sql = "DELETE FROM $table_name WHERE id IN ($id_list)";
        $this->executeQuery($sql);
    }
}
