<?php
namespace tt\Helpers;
//
class Request
{
    /**
     * @return array
     */
    public  function getPost():array
    {
        $post = $_POST;
        return $post;
    }
    /**
     * @param string $name
     * @return mixed
     */
    public function  getPostValue(string $name)
    {
        return $this->getPost([$name]);
    }
}