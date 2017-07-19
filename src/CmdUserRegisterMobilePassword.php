<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Jacksunny\AuthInfo;

use Jacksunny\CommandSun\CommandMonocase;
use Jacksunny\AuthInfo\RegisterInfoContract;
use Jacksunny\CommandSun\CommandCollection;

/**
 * Description of CmdUserRegister
 *
 * @author 施朝阳
 * @date 2017-7-6 15:17:49
 */
class CmdUserRegisterMobilePassword extends CommandMonocase {

    public function __construct(RegisterInfoContract $register_info) {
        $command_check_input = new CmdUserLoginMobilePasswordCheckInput($register_info);
        $command_check_output = null;
        //试着调用该类实现了其他接口后，通过$register_info调用其他接口，尽管$register_info被传入该函数时是以RegisterInfoContract接口参数类型的，不知道可以成功
        //可以的，说明类对象作为某种接口的参数传入到方法中，但是仍然可以使用该类对象已有的方法，不受限于只能调用指定参数接口类型中的几个方法，太棒了
        var_dump($register_info->getMobile());
        $command_do_action = new CmdUserRegisterMobilePasswordRegister($register_info);
        $command_post_success_action = new CmdUserLoginMobilePassword($register_info);
        $command_post_fail_action = new CmdUserRegisterMobilePasswordLog($register_info);
        parent::__construct("账号密码注册命令", $command_check_input, $command_check_output, $command_do_action, $command_post_success_action, $command_post_fail_action);
    }

}
