<?php

    use app\info\informacion;
    use app\user\usuario;
    use app\facture\factura;
    use app\details\detalle;
    
    
    trait getinstance{
        static $getinstance;
        static function getInstance(){
            $arg = (array) func_get_args()[0];
            if (!self::$getinstance instanceof self) {
                try {
                    self::$getinstance = new self(...$arg);
                    return self::$getinstance;
                } catch (\Throwable $th) {
                    return $th->getMessage();
                };
                
            }
            return self::$getinstance;
        }
    }
    

    function autoload($clase){
        $fileclase = explode("\\", $clase);
        if ($fileclase[2] == "usuario" || $fileclase[2] == "informacion") {
            require_once dirname(__DIR__)."/scripts/clients/".$fileclase[2].".php";
        } else{
            require_once dirname(__DIR__)."/scripts/compra/".$fileclase[2].".php";
        }
    }

    spl_autoload_register('autoload');

    //$info = new informacion();
    //$user = new usuario();
    //$facture = new factura();
    //$detail = new detalle();

    $detail = detalle::getInstance(["nombre" => "jose", "edad" => 23]);
    print_r($detail);
?>