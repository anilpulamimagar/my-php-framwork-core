<?php

namespace anmoli\phpmvc;
use anmoli\phpmvc\db\DbModel;

/**
 * @author AnilPulamiMagar
 * @Date 12/01/2022 10:25 pm
 * @Version 1.0
 *
 * Class UserModel
 *
 * @package anmoli\phpmvc
 */

abstract class UserModel extends DbModel
{
    abstract public function getDisplayName(): string;
}