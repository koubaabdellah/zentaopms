<?php
include dirname(dirname(dirname(__FILE__))) . '/lib/init.php';
include dirname(dirname(dirname(__FILE__))) . '/class/story.class.php';
su('admin');

/**

title=测试 storyModel->batchChangePlan();
cid=1
pid=1

*/

$story       = new storyTest();
$storyIdList = array(1, 2, 3, 4, 5, 6);
$stories1    = $story->batchChangePlanTest($storyIdList, 1366);
$stories2    = $story->batchChangePlanTest($storyIdList, 1400, 1366);

r(count($stories1)) && p()         && e('6');            // 批量修改6个需求的计划，查看被修改计划的需求数量
r(count($stories2)) && p()         && e('6');            // 批量修改6个需求的计划，查看被修改计划的需求数量
r($stories1)        && p('1:plan') && e(',1366');        // 批量修改6个需求的计划，查看需求1修改后的计划ID
r($stories1)        && p('2:plan') && e(',1366');        // 批量修改6个需求的计划，查看需求2修改后的计划ID
r($stories1)        && p('3:plan') && e(',1366');        // 批量修改6个需求的计划，查看需求3修改后的计划ID
r($stories1)        && p('4:plan') && e(',1366');        // 批量修改6个需求的计划，查看需求4修改后的计划ID
r($stories1)        && p('5:plan') && e(',1366');        // 批量修改6个需求的计划，查看需求5修改后的计划ID
r($stories1)        && p('6:plan') && e(',1366');        // 批量修改6个需求的计划，查看需求6修改后的计划ID
r($stories2)        && p('1:plan') && e(',1366,1400');   // 批量修改6个需求的计划，查看需求1修改后的计划ID
r($stories2)        && p('2:plan') && e(',1366,1400');   // 批量修改6个需求的计划，查看需求2修改后的计划ID
r($stories2)        && p('3:plan') && e(',1366,1400');   // 批量修改6个需求的计划，查看需求3修改后的计划ID
r($stories2)        && p('4:plan') && e(',1366,1400');   // 批量修改6个需求的计划，查看需求4修改后的计划ID
r($stories2)        && p('5:plan') && e(',1366,1400');   // 批量修改6个需求的计划，查看需求5修改后的计划ID
r($stories2)        && p('6:plan') && e(',1366,1400');   // 批量修改6个需求的计划，查看需求6修改后的计划ID
system("../../ztest init");
