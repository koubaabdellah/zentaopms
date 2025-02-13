#!/usr/bin/env php
<?php
include dirname(dirname(dirname(__FILE__))) . '/lib/init.php';
include dirname(dirname(dirname(__FILE__))) . '/class/user.class.php';
$db->switchDB();
su('admin');

/**

title=测试 userModel->createUser();
cid=1
pid=1

密码较弱的情况 >> 您的密码强度小于系统设定。
Visions为空的情况 >> 『版本类型』不能为空。
用户名为空的情况 >> 『用户名』不能为空。
用户名特殊的情况 >> 『用户名』只能是字母、数字或下划线的组合三位以上。
两次密码不相同的情况 >> 两次密码应该相同。
插入重复的用户名，返回报错信息 >> 『用户名』已经有『admin』这条记录了。如果您确定该记录已删除，请到后台-系统-数据-回收站还原。
正常插入用户，返回新插入的ID、真实姓名 >> 1001,新的测试用户
正常插入用户，返回新插入的真实姓名 >> 新的测试用户

*/

$user = new userTest();
$normalUser = array();
$normalUser['account']          = 'newtestuser';
$normalUser['realname']         = '新的测试用户';
$normalUser['password1']        = 'e10adc3949ba59abbe56e057f20f883e';
$normalUser['password2']        = 'e10adc3949ba59abbe56e057f20f883e';
$normalUser['type']             = 'inside';
$normalUser['passwordStrength'] = 1;
$normalUser['visions']          = 'rnd';

$weakPassword = $normalUser;
$weakPassword['passwordStrength'] = 0;

$emptyVisions = $normalUser;
unset($emptyVisions['visions']);

$emptyAccount = $normalUser;
unset($emptyAccount['account']);

$specialAccount = $normalUser;
$specialAccount['account'] = 'sa!@#asdf';

$differentPassword = $normalUser;
$differentPassword['password2'] = 'asfjhjkahf9012asd123';

$existUser = $normalUser;
$existUser['account'] = 'admin';

r($user->createUserTest($weakPassword))      && p('password1:0') && e('您的密码强度小于系统设定。');                                                                   //密码较弱的情况
r($user->createUserTest($emptyVisions))      && p('visions:0')   && e('『版本类型』不能为空。');                                                                       //Visions为空的情况
r($user->createUserTest($emptyAccount))      && p('account:0')   && e('『用户名』不能为空。');                                                                         //用户名为空的情况
r($user->createUserTest($specialAccount))    && p('account:0')   && e('『用户名』只能是字母、数字或下划线的组合三位以上。');                                           //用户名特殊的情况
r($user->createUserTest($differentPassword)) && p('password:0')  && e('两次密码应该相同。');                                                                           //两次密码不相同的情况
r($user->createUserTest($existUser))         && p('account:0')   && e('『用户名』已经有『admin』这条记录了。如果您确定该记录已删除，请到后台-系统-数据-回收站还原。'); //插入重复的用户名，返回报错信息
r($user->createUserTest($normalUser))        && p('id,realname') && e('1001,新的测试用户');                                                                            //正常插入用户，返回新插入的ID、真实姓名
r($user->createUserTest($normalUser))        && p('realname')    && e('新的测试用户');                                                                                 //正常插入用户，返回新插入的真实姓名
$db->restoreDB();