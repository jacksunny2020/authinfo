<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Jacksunny\AuthInfo;

use Jacksunny\CommandSun\BaseActionResult;
use Closure;
use Jacksunny\CommandSun\CommandException;
use Jacksunny\CommandSun\CommandMonocase;
use Jacksunny\AuthInfo\RegisterInfoContract;

/**
 * Description of CmdUserRegisterNamePasswordLog
 *
 * @author 施朝阳
 * @date 2017-7-6 15:22:36
 */
class CmdUserRegisterMobilePasswordLog extends CommandMonocase {

    protected $register_info;

    public function __construct(RegisterInfoContract $register_info) {
        $this->register_info = $register_info;
        parent::__construct("记录日志");
    }

    protected function doAction(BaseActionResult $res = null, $data = null, $context = null, Closure $succ_closure = null, Closure $fail_closure = null, Closure $trans_input = null, Closure $trans_output = null) {
        Log::info("注册信息:" . $this->register_info->getMobile() . $this->register_info->getPassword());
//        return $res;
        $result = clone $res;
        return $result;
    }

}
