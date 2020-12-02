<?php

    namespace MVC\Core;

    use MVC\Config\Database;
    use MVC\Core\ResourceInterface;
    use MVC\Core\Model;
    use PDO;

    class Resource implements ResourceInterface
    {
        private $id;
        private $table;
        private $model;

        public function _init($id, $table, $model)
        {
            $this->id = $id;
            $this->table = $table;
            $this->model = $model;
        }

        
        public function save($model)
        {
            $propeties = $model->getPropeties();
            $strKeys = '';
            $strValues = '';
            if($model->getId() == null)
            {
                foreach($propeties as $key => $value)
                {
                    $strKeys = $strKeys . $key . ', ';
                    $strValues = $strValues . ':' . $key . ', ';
                }
                $strKeys = trim($strKeys,', ');
                $strValues = trim($strValues,', ');
                $sql = "INSERT INTO $this->table ($strKeys) VALUES ($strValues)";
            }
            else
            {
                foreach($propeties as $key => $value)
                {
                    $strValues = $strValues . $key .' = :'. $key . ', ';
                }
                $strValues = trim($strValues,', ');
                $sql = "UPDATE $this->table SET " . $strValues . " WHERE $this->id = :id";
            }
            $req = Database::getBdd()->prepare($sql);
            return $req->execute($propeties);
        }

        public function getAll()
        {
            $sql = "SELECT * FROM $this->table";
            $req = Database::getBdd()->prepare($sql);
            $req->execute();
            // return $req->fetchAll(PDO::FETCH_OBJ);
            return $req->fetchAll();
        }

        public function find($id)
        {
            $sql = "SELECT * FROM $this->table WHERE id = $id";
            $req = Database::getBdd()->prepare($sql);
            $req->execute();
            return $req->fetch();
        }

        public function delete($id)
        {
            $sql = "DELETE FROM $this->table WHERE id = $id";
            $req = Database::getBdd()->prepare($sql);
            return $req->execute();
        }
    }
?>