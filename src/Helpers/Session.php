<?php
namespace tt\Helpers;
class Session
{

    public  function start()
    {
        session_start();
    }

    /**
     * @param string $key
     * @param $value
     * @return void
     */
    public  function setData(string $key, $value): void
    {
        $_SESSION[$key] = $value;
    }

    /**
     * @param string $key
     * @param $value
     * @return void
     */
    public function addData(string $key, $value): void
    {
        $_SESSION[$key][] = $value;
    }
    /**
     * @param string $key
     * @return mixed|null
     */
    public  function getData(string $key)
    {
        return !empty($_SESSION[$key]) ? $_SESSION[$key] : null;
    }

    /**
     * @return void
     */
    public function save():void
    {
        session_write_close();
    }

    /**
     * @param string $key
     * @return void
     */
    public function flush(string $key)
    {
        $value = $this->getData($key);
        $this->unset($key);

        return $value;
    }

    private function unset(string $key): void
    {
        unset($_SESSION[$key]);
    }
}