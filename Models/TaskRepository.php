<?php
    namespace MVC\Models;

    use MVC\Models\TaskResource;
    
    class TaskRepository
    {

        private $taskResource;

        public function __construct()
        {
            $this->taskResource = new TaskResource();
        }

        public function getAll()
        {
            return $this->taskResource->getAll();
        }

        public function find($id)
        {
            return $this->taskResource->find($id);
        }

        public function delete($id)
        {
            return $this->taskResource->delete($id);
        }

        public function save($model)
        {
            return $this->taskResource->save($model);
        }
    }
?>