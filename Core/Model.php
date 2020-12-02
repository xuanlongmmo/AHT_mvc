<?php

    namespace MVC\Core;

    class Model
    {
        function getPropeties() {
             return get_object_vars($this);
        }
    }
?>