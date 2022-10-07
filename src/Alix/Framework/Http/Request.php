<?php

namespace Framework\Http;

class Request
{
    /**
     * @return array
     */
    public function all (): array
    {
        return $_POST;
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function only (string $key): mixed
    {
        return $_POST[$key];
    }
}