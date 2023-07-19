<?php

namespace Core;

//se houver a tentativa de acesso direto da página || irá direcionar para a página raiz ou irá mostar uma mensagem de erro!
if(!defined("M4RC05V3")){
    /*  header("location: /"); */
    die("Erro: página não encontrada!");
 }
 
/**
 * Recebe a URL e manipula 
 * Carrega a controller
 * 
 * @author joaom <marcosventura.dev@gmail.com>
 */
class ConfigController extends Config
{
    /** @var string $url Recebe a URL do .htaccess */
    private string $url;

    /** @var array $urlArray recebe a URL convertida para array */
    private array $urlArray;
    private string $urlController;

    /* private string $urlParameter; */
    private string $urlSlugController;
    private array $format;

    /**
     * Recebe a URL do .htaccess
     * Validar a URL
     */
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
            /* echo "Acessar a página inicial <br>"; */
            $this->urlController =$this->slugController(CONTROLLER) ;
        }
        /* echo "Controller: {$this->urlController} <br>"; */

    }


    /**
     * Método privado não pode ser iniciado fora da classe
     * Limpará a URL, elimina as TAG, os espaços em brancos, remove a barra no final da URL e retira os caracteres especiais
     *  @return void 
     */
    private function clearUrl(): void
    {

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

    /**
     * Converter o valor obtido da URL "sobre-empresa" e converter  no formato da classe "sobreEmpresa".
     * Utilizado as funções para converter tudo para minúsculo, converter o traço pelo espaço, converter cada letra da primeira palavra para maiúsculo, retirar os espaços em branco
     *
     * @param string $slugController  Nome da classe
     * @return string Retorna a controller "sobre-empresa" convertido para o nome da classe "SobreEmpresa"
     */
    private function slugController(string $slugController): string
    {
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

/**
 * Carregar as controllers
 * Instancias as Classes da controller e carregar o método index.
 * @return void
 */
    public function loadPage()
    {
        $classLoad = "\\Sts\\Controllers\\". $this->urlController;

        $classPage = new $classLoad();
        $classPage->index();
    }
}