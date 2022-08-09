#!/usr/bin/env php
<?php
include dirname(dirname(dirname(__FILE__))) . '/lib/init.php';
include dirname(dirname(dirname(__FILE__))) . '/class/cron.class.php';
$db->switchDB();
su('admin');

/**

title=测试 cronModel->create();
cid=1
pid=1

命令为空时候返回值 >> 『命令』不能为空
添加之后对比添加数据信息 >> test comand,zentao
添加之后对比添加数据信息 >> 55,23,30,12,6

*/

$cron           = new cronTest();
$cron1          = new stdClass();
$cron1->m       = '55';
$cron1->h       = '23';
$cron1->dom     = '30';
$cron1->mon     = '12';
$cron1->dow     = '6';
$cron1->remark  = '';
$cron1->type    = 'zentao' ;
$cron1->command = '';
$result1        = $cron->createTest($cron1);

$cron1->command = 'test comand';
$result2        = $cron->createTest($cron1);

r($result1[0]) && p()                  && e('『命令』不能为空');  //命令为空时候返回值
r($result2)    && p('command,type')    && e('test comand,zentao');//添加之后对比添加数据信息
r($result2)    && p('m,h,dom,mon,dow') && e('55,23,30,12,6');  //添加之后对比添加数据信息

$db->restoreDB();