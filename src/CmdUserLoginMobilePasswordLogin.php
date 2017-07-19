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
use App\User;

/**
 * Description of CmdUserLoginNamePasswordLogin
 *
 * @author 施朝阳
 * @date 2017-7-6 15:22:18
 */
class CmdUserLoginMobilePasswordLogin extends CommandMonocase {

    protected $login_info;

    public function __construct(LoginInfoContract $login_info) {
        $this->login_info = $login_info;
        parent::__construct("检查是否注册");
    }

    protected function doAction(BaseActionResult $res = null, $data = null, $context = null, Closure $succ_closure = null, Closure $fail_closure = null, Closure $trans_input = null, Closure $trans_output = null) {
        $user = User::where('mobile', $this->login_info->getMobile())->first();
        if (!isset($user) || !(app('hash')->check($this->login_info->getPassword(), $user->password))) {
            throw new CommandException($res, "账号或密码错误");
        }
//        //$res = new BaseActionResult(true);
//        if (!isset($res)) {
//            $res = new BaseActionResult(true);
//        }
//        return $res;
        //return new BaseActionResult(true);
        $result = clone $res;
        $result->setSuccess(true);
        return $result;
    }

}
