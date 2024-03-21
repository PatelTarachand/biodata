<?php
    if(!function_exists('p'))
    {
        function p($data){
            echo "<pre>";
            print_r($data);
            die;
        }
    }

    trait Logger{
        public function log($message){
            echo $message;
        }
    }

    class Post{
        use Logger;
        public function store(){
            $this->log('post created');
        }
    }

    class Comment{
        use Logger;
        public function store(){
            $this->log('Comment created');
        }
    }
?>