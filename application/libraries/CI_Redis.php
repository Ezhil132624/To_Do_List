<?php
class Redis
{

    private $redis;

    public function __construct()
    {
        $this->redis = new Redis();
    }
    public function get($key)
    {
        return $this->redis->get($key);
    }

    public function set($key, $value, $expire = 0)
    {
        return $this->redis->set($key, $value, $expire);
    }
    public function edit($key, $value)
    {
        return $this->redis->edit($key, $value);
    }

    public function delete($key)
    {
        return $this->redis->delete($key);
    }


}
