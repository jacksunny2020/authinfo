<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Jacksunny\AuthInfo;

use Jacksunny\CommandSun\CommandMonocase;
use Jacksunny\AuthInfo\LoginInfoContract;
use Jacksunny\CommandSun\CommandCollection;
use Jacksunny\CommandSun\CommandFormula;
use Jacksunny\CommandSun\CommandTrue;
use Jacksunny\CommandSun\CommandFalse;

/**
 * Description of CmdUserLogin
 *
 * @author 施朝阳
 * @date 2017-7-6 15:17:49
 */
class CmdUserLoginMobilePassword extends CommandMonocase {

    public function __construct(LoginInfoContract $login_info) {
        $command_check_input = new CmdUserLoginMobilePasswordCheckInput($login_info);
        $command_check_output = null;
//        $command_do_action = new CmdUserLoginMobilePasswordLogin($login_info);
        $command_do_action = new CommandFormula(
                new CommandFormula(new CommandFalse(), null, CMD_CONNECTOR_NOT), new CmdUserLoginMobilePasswordLogin($login_info), CMD_CONNECTOR_AND);
        $command_post_success_action = new CommandCollection([
            new CmdUserLoginMobilePasswordSession($login_info),
        ]);
//        $command_post_success_action = new CmdUserLoginMobilePasswordSession($login_info);
        $command_post_fail_action = new CmdUserLoginMobilePasswordLog($login_info);
        parent::__construct("账号密码登录命令", $command_check_input, $command_check_output, $command_do_action, $command_post_success_action, $command_post_fail_action);
    }

}
