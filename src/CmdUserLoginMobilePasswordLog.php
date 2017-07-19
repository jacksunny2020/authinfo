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
use Jacksunny\AuthInfo\LoginInfoContract;
use Illuminate\Support\Facades\Log;

/**
 * Description of CmdUserLoginNamePasswordLog
 *
 * @author 施朝阳
 * @date 2017-7-6 15:22:36
 */
class CmdUserLoginMobilePasswordLog extends CommandMonocase {

    protected $login_info;

    public function __construct(LoginInfoContract $login_info) {
        $this->login_info = $login_info;
        parent::__construct("记录日志");
    }

    protected function doAction(BaseActionResult $res = null, $data = null, $context = null, Closure $succ_closure = null, Closure $fail_closure = null, Closure $trans_input = null, Closure $trans_output = null) {
        Log::info("登录信息:" . $this->login_info->getMobile() . $this->login_info->getPassword());
        if (!isset($res)) {
            $res = new BaseActionResult(true);
        }
//        return $res;
        $result = clone $res;
        return $result;
    }

}
