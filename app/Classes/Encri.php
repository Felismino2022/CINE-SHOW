<?php
    
    namespace App\Classes;
    
    Class Encri{

        public function encriptar($valor){

            return base64_encode($valor);
        }

        public function desencriptar($valor_encriptado){

            //verificar se a has é valida
            return base64_decode($valor_encriptado);
        }
    }