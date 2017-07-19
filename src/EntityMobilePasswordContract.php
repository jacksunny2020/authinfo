<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Jacksunny\AuthInfo;

/**
 *
 * @author 施朝阳
 * @date 2017-7-7 15:36:52
 */
interface EntityMobilePasswordContract {

    function getMobile();

    function setMobile($mobile);

    function getPassword();

    function setPassword($password);
}
