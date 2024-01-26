<?php

namespace Vkrsmart\Sdk\Models;

use Exception;
use PhpParser\Error;
use Vkrsmart\Sdk\clients\Client;

class Report extends Model
{
    protected string $prefix = 'report';


    /**
     * Получить report по id
     * @param int $id
     * @return bool
     * @throws Exception
     */
    public function get(int $id):bool
    {
        if ($id) {
            $apiMethod = "/".$this->prefix."/{$id}";
        }
        else{
            return false;
        }
        do{
            $this->response = $this->getClient()->makeRequest($apiMethod);
        }
        while(!$this->getValue('success'));
        return $this->getValue('success');
    }

    /**
     * @return false|mixed
     */
    public function getReport(): mixed
    {
        return $this->getValue('report');
    }
}
