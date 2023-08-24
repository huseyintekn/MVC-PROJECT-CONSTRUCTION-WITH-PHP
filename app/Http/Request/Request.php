<?php

namespace App\Http\Request;

class Request
{
    /**
     * @var array
     */
    protected array $request = [];

    public function __construct()
    {
        $this->request = array_merge($_GET, $_POST);
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function get(string $key)
    {
        return strip_tags(htmlspecialchars(trim($this->request[$key])));
    }

    /**
     * @return array
     */
    public function all()
    {
        return $this->request;
    }

    /**
     * @return mixed
     *
     */
    public function method()
    {
        return $_SERVER["REQUEST_METHOD"];
    }

    public function referer()
    {
        header("Location:".$_SERVER['HTTP_REFERER']);;
    }

}