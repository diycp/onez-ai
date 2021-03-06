<?php

/* ========================================================================
 * $Id: rndcode.php 652 2016-09-05 10:03:54Z onez $
 * http://ai.onez.cn/
 * Email: www@onez.cn
 * QQ: 6200103
 * ========================================================================
 * Copyright 2016-2016 佳蓝科技.
 * 
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * 
 *     http://www.apache.org/licenses/LICENSE-2.0
 * 
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * ======================================================================== */


!defined('IN_ONEZ') && exit('Access Denied');
#程式代号rndcode
class onezphp_rndcode extends onezphp{
  function showpic(){
    include_once(dirname(__FILE__).'/ValidateCode.class.php');
    $_vc = new ValidateCode();
    $_vc->doimg();
    onez('scookie')->call('rndcode',$_vc->getCode());
    exit();
  }
  function check($key){
    $mycode=strtolower(onez()->gp($key));
    $rcode=onez('scookie')->call('rndcode');
    onez('scookie')->call('rndcode','del');
    return $mycode==$rcode;
  }
  function pic(){
    return $this->view('showpic').'" onclick="this.src=\''.$this->view('showpic').'&t=\'+Math.random()';
  }
}