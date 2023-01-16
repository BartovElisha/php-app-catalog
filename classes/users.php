<?php

class User
{
    private $id, $username, $email, $avatar;

    public function set($cfg)
    {
        foreach ($cfg as $key => $value) {
            $this->$key = !empty($value) ? $value : '...';
        }
    }

    public function get($propery)
    {
        return isset($this->$propery) ? $this->$propery : '-';
    }
}