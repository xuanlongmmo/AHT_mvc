<?php
    namespace MVC\Core;

    interface ResourceInterface 
    {
        public function _init($id,$table,$model);
        public function save($model);
        public function delete($id);
    }
?>