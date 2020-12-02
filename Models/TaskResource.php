<?php
    namespace MVC\Models;

    use MVC\Core\Resource;
    use MVC\Models\Task;
    
    class TaskResource extends Resource 
    {
        public function __construct()
        {
            $this->_init('id','tasks',new Task);
        }

    }
?>