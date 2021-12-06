<?php

namespace App\Interfaces\Db\Base;

interface IRead
{
    public function getAll(bool $status);
    public function get(int $id);
}
