<?php

namespace app\core;
use app\core\db\DbModel;

/**
 * @author AnilPulamiMagar
 * @Date 12/01/2022 10:25 pm
 * @Version 1.0
 *
 * Class UserModel
 *
 * @package app\core
 */

abstract class UserModel extends DbModel
{
    abstract public function getDisplayName(): string;
}