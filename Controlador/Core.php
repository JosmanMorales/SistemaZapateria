<?php 
class Core {
    protected $controladorActual = 'Ver';
    protected $metodoActual = 'aux';
    protected $parametros = [];

    public function __construct() {
        $url = $this->ObtenerUrl();

        if (isset($url[0]) && $url[0] != "") {
            $this->controladorActual = ucwords($url[0]);
            unset($url[0]);
        }

        if (!@include_once($this->controladorActual . '.php')) {
            header("Location: http://localhost/Proyecto_zapateria/ver/error");
            exit();
        } else {
            require_once $this->controladorActual . '.php';
            $this->controladorActual = new $this->controladorActual;

            if (isset($url[1])) {
                if (method_exists($this->controladorActual, $url[1])) {
                    $this->metodoActual = $url[1];
                    unset($url[1]);
                } else {
                    header("Location: http://localhost/Proyecto_zapateria/ver/error");
                    exit();
                }
            }

            $this->parametros = $url ? array_values($url) : [];
            call_user_func_array([$this->controladorActual, $this->metodoActual], $this->parametros);
        }
    }

    public function ObtenerUrl() {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
        return []; // Devuelve un array vacío si no hay parámetro 'url'
    }
}
?>
