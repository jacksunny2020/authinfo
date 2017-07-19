<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Jacksunny\AuthInfo;

use Jacksunny\AuthInfo\CmdUserLoginMobilePassword;
use Jacksunny\AuthInfo\LoginInfoContract;
use Jacksunny\CommandSun\BaseActionResult;
use Jacksunny\AuthInfo\RegisterInfoContract;
use Jacksunny\AuthInfo\EntityMobilePasswordContract;

/**
 * Description of LoginInfo
 *
 * @author 施朝阳
 * @date 2017-7-6 15:27:01
 */
class MobilePasswordLoginInfo implements LoginInfoContract, EntityMobilePasswordContract, RegisterInfoContract {

    protected $mobile;
    protected $password;
    protected $command_login;
    protected $trans_input;

    public function getMobile() {
        return $this->mobile;
    }

    public function setMobile($mobile) {
        $this->mobile = $mobile;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function __construct($mobile, $password) {
        $this->mobile = $mobile;
        $this->password = $password;
        $this->command_login = new CmdUserLoginMobilePassword($this);
        $this->command_register = new CmdUserRegisterMobilePassword($this);
        $this->trans_input = function($res, $data, $context) {
            return [
                'mobile' => $data->getMobile(),
                'password' => $data->getPassword(),
            ];
        };
    }

    public function login(): BaseActionResult {
        $res = null;
        $data = $this;
        $context = null;
        $succ_closure = null;
        $fail_closure = null;
        $trans_input = $this->trans_input;
        $trans_output = null;
        return $this->command_login->exec($res, $data, $context, $succ_closure, $fail_closure, $trans_input, $trans_output);
    }

    public function tryLogin(): BaseActionResult {
        $res = null;
        $data = $this;
        $context = null;
        $succ_closure = null;
        $fail_closure = null;
        $trans_input = $this->trans_input;
        $trans_output = null;
        return $this->command_login->tryExec($res, $data, $context, $succ_closure, $fail_closure, $trans_input, $trans_output);
    }

    public function __toString(): string {
        return "mobile:" . $this->mobile . "," . "password:" . $this->password;
    }
    
    public function hello(){
        var_dump(time());
    }

    public function register(): BaseActionResult {
        $res = null;
        $data = $this;
        $context = null;
        $succ_closure = null;
        $fail_closure = null;
        $trans_input = $this->trans_input;
        $trans_output = null;
        return $this->command_register->exec($res, $data, $context, $succ_closure, $fail_closure, $trans_input, $trans_output);
    }

    public function tryRegister(): BaseActionResult {
        $res = null;
        $data = $this;
        $context = null;
        $succ_closure = null;
        $fail_closure = null;
        $trans_input = $this->trans_input;
        $trans_output = null;
        return $this->command_register->tryExec($res, $data, $context, $succ_closure, $fail_closure, $trans_input, $trans_output);
    }

}
