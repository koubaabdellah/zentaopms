#!/usr/bin/env php
<?php
include dirname(dirname(dirname(__FILE__))) . '/lib/init.php';
include dirname(dirname(dirname(__FILE__))) . '/class/api.class.php';
su('admin');

/**

title=测试 apiModel->getStructByQuery();
cid=1
pid=1

*/

$api = new apiTest();

r($api->getStructByQueryTest()) && p() && e();