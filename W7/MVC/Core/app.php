<?php 
    class app {
        protected $controller = "Home";
        protected $action = "get_data";
        protected $param = [];

        function __construct () {
            echo 'Wellcome APP';
        }
    }
?>