<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Jacksunny\AuthInfo;

use Jacksunny\CommandSun\BaseActionResult;

/**
 *
 * @author 施朝阳
 * @date 2017-7-6 15:26:20
 */
interface RegisterInfoContract {

    function register(): BaseActionResult;

    function tryRegister(): BaseActionResult;
    //function __toString(): string;
}
