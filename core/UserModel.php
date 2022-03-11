<?php

namespace app\core;

use app\models\DbModel;

abstract class UserModel extends DbModel
{
    abstract public function getDisplayName();
}
