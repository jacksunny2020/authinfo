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

/**
 * Description of CmdUserLoginNamePasswordCheckInput
 *
 * @author 施朝阳
 * @date 2017-7-6 15:22:11
 */
class CmdUserLoginMobilePasswordCheckInput extends CommandMonocase {

    protected $login_info;

    public function __construct(LoginInfoContract $login_info) {
        $this->login_info = $login_info;
        parent::__construct("检查输入账号密码");
    }

    protected function doAction(BaseActionResult $res = null, $data = null, $context = null, Closure $succ_closure = null, Closure $fail_closure = null, Closure $trans_input = null, Closure $trans_output = null) {
        $mobile = $this->login_info->getMobile();
        if (!isset($mobile)) {
            throw new CommandException($res, "请输入手机号");
        }
        $password = $this->login_info->getPassword();
        if (!isset($password)) {
            throw new CommandException($res, "请输入密码");
        }
        $this->login_info->hello();
        //var_dump($this->login_info);
        if (!isset($res)) {
            $res = new BaseActionResult(true);
        }
//        return $res;
        $result = clone $res;
        return $result;
    }

}
