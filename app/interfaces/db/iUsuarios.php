<?php

namespace App\Interfaces\Db;

use App\Interfaces\Db\Base\ICreate;
use App\Interfaces\Db\Base\IRead;
use App\Interfaces\Db\Base\IRemove;
use App\Interfaces\Db\Base\IUpdate;

interface IUsuarios extends IRead,ICreate,IUpdate,IRemove
{
    public function usuario(string $email);
}