<?php

    namespace app\details;

    use getinstance as instance;
    class detalle{
        use instance;
        private function __construct(public $nombre, public $edad){
        }
    }
?>