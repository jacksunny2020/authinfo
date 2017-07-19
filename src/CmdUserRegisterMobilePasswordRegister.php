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
 * Description of CmdUserRegisterNamePasswordRegister
 *
 * @author 施朝阳
 * @date 2017-7-6 15:22:18
 */
class CmdUserRegisterMobilePasswordRegister extends CommandMonocase {

    protected $register_info;

    public function __construct(RegisterInfoContract $register_info) {
        $this->register_info = $register_info;
        parent::__construct("进行用户注册");
    }

    protected function doAction(BaseActionResult $res = null, $data = null, $context = null, Closure $succ_closure = null, Closure $fail_closure = null, Closure $trans_input = null, Closure $trans_output = null) {
        $user = User::where('mobile', $this->register_info->getMobile())->first();
        if (isset($user)) {
            throw new CommandException($res,"用户已存在");
        } else {
            $user = User::create([
                        'mobile' => $this->register_info->getMobile(),
                        'password' => bcrypt($this->register_info->getPassword()),
            ]);
        }
//        return $res;
        $result = clone $res;
        $result->setSuccess(true);
        return $result;
    }

}
