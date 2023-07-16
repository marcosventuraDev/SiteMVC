<?php

namespace Core;

class ConfigController extends Config
{
    private string $url;
    private array $urlArray;
    private string $urlController;
    private string $urlParameter;
    private string $urlSlugController;
    private array $format;
    public function __construct()
    {
        //instanciando o metodo config
        $this->Config();
   
        if(!empty(filter_input(INPUT_GET, 'url', FILTER_DEFAULT))){
            $this->url = filter_input(INPUT_GET, 'url', FILTER_DEFAULT);
           

            $this->clearUrl();

            /*Usando o explode para separar os endereços separados por < / > */
            $this->urlArray = explode("/", $this->url);
       

            if(isset($this->urlArray[0])){
            
                $this->urlController = $this->slugController($this->urlArray[0]);
            }else{
                $this->urlController = $this->slugController(CONTROLLERERRO);
             
            }
        }else{
            echo "Acessar a página inicial <br>";
            $this->urlController =$this->slugController(CONTROLLER) ;
        }
        echo "Controller: {$this->urlController} <br>";

    }


    private function clearUrl(){

        //Elimina as tag
        $this->url = strip_tags($this->url);

        //Elimina espaços em branco
        $this->url = trim($this->url);

        //Eliminar a barra < / >no final da URL
        $this->url = rtrim($this->url, "/");

        //Eliminar caracteres especiais
        $this->format['a'] = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr"!@#$%&*()_-+={[}]?;:.,\\\'<>°ºª ';
        $this->format['b'] = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr-------------------------------------------------------------------------------------------------';
     
        $this->url = strtr(mb_convert_encoding($this->url, 'ISO-8859-1', 'UTF-8'), mb_convert_encoding($this->format['a'], 'ISO-8859-1', 'UTF-8'), $this->format['b']);

    }


    private function slugController($slugController){
        //converter tudo para minusculo
        $this->urlSlugController = strtolower($slugController);

        //converter < - > em espaço em branco
        $this->urlSlugController = str_replace('-',' ', $this->urlSlugController);

        //converter a primeira letra de cada palavra em maiusculo
        $this->urlSlugController = ucwords($this->urlSlugController);

        //retirar espaços em branco
        $this->urlSlugController = str_replace(' ', '', $this->urlSlugController);

        return $this->urlSlugController;
    }


    //
    public function loadPage()
    {
        $classLoad = "\\Sts\\Controllers\\". $this->urlController;

        $classPage = new $classLoad();
        $classPage->index();
    }
}