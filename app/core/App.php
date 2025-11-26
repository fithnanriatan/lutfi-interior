<?php
class App
{
    // default [~3]
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseURL();

        // controller
        if($url == NULL)
        {
			$url = [$this->controller];
		}
        if (file_exists('../app/controllers/' . $url[0] . '.php')) {
            $this->controller = $url[0]; // mengganti controller default
            unset($url[0]);
        }

        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        // method
        if ( isset($url[1]) ) {
            if ( method_exists($this->controller, $url[1]) ) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // params
        if ( !empty($url) ) {
            $this->params = array_values($url);
        }

        // jalankan controller dan method serta kirimkan params jika ada
        call_user_func_array([$this->controller, $this->method], $this->params);

    }

    public function parseURL()
    {
        if (isset($_GET['url'])) {
            $url = $_GET['url']; // mengambil url setelah 'public/' (lihat .htaccess)
            $url = rtrim($url, '/'); // menghapus '/' di akhir url
            $url = filter_var($url, FILTER_SANITIZE_URL); // menghapus karakter aneh di url
            $url = explode('/', $url); // memisah dan mengambil string yang dipisah oleh '/'
            return $url;
        }
    }
}