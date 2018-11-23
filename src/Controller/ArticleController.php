<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class ArticleController{
    public function homepage(){
        return new Response("¡¡HOLA!! ¿Esto Marcha?");
    }

    public function show($idN){
        //$idN = 0;
        return new Response("Aquí iría la noticia ".$idN);
    }
}