<?php

    namespace MVC\Controllers;

    use MVC\Models\Task;
    use MVC\Core\Controller;
    use MVC\Config\Database;
    use MVC\Models\TaskRepository;

    class TasksController extends Controller
    {
        function index()
        {
            $tasks = new TaskRepository();
            $d['tasks'] = $tasks->getAll();
            $this->set($d);
            $this->render("index");
        }

        function edit($id)
        {
            $task= new TaskRepository();
            $d["task"] = $task->find($id);
            if (isset($_POST["title"]))
            {
                $model = new Task();
                $model->setId($id);
                $model->setTitle($_POST['title']); 
                $model->setDescription($_POST['description']); 
                $model->setUpdated(date('Y-m-d H:m:s'));
                if ($task->save($model))
                {
                    header("Location: " . WEBROOT . "tasks/index");
                }
            }
            $this->set($d);
            $this->render("edit");
        }

        function create()
        {
            if (isset($_POST["title"]))
            {
                $task= new TaskRepository();
                $model = new Task();
                $model->setTitle($_POST['title']); 
                $model->setDescription($_POST['description']); 
                $model->setCreated(date('Y-m-d H:m:s'));
                if ($task->save($model))
                {
                    header("Location: " . WEBROOT . "tasks/index");
                }
            }
            $this->render("create");
        }

        function delete($id)
        {
            $task = new TaskRepository();
            if ($task->delete($id))
            {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }
    }
?>