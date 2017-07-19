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
use Illuminate\Support\Facades\Session;
use Jacksunny\AuthInfo\LoginInfoContract;

/**
 * Description of CmdUserLoginNamePasswordSession
 *
 * @author 施朝阳
 * @date 2017-7-6 15:22:30
 */
class CmdUserLoginMobilePasswordSession extends CommandMonocase {

    protected $login_info;

    public function __construct(LoginInfoContract $login_info) {
        $this->login_info = $login_info;
        parent::__construct("记入会话");
    }

    protected function doAction(BaseActionResult $res = null, $data = null, $context = null, Closure $succ_closure = null, Closure $fail_closure = null, Closure $trans_input = null, Closure $trans_output = null) {
        $user = User::where('mobile', $this->login_info->getMobile())->first();
        if (!isset($user)) {
            throw new CommandException($res,"指定用户不存在");
        }
        Session::put('current_user', $user);
        if (!isset($res)) {
            $res = new BaseActionResult(true);
        }
//        return $res;
        $result = clone $res;
        return $result;
    }

}
