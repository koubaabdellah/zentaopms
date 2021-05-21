<?php
/**
 * The action module vi file of ZenTaoPMS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license  ZPL (http://zpl.pub/page/zplv12.html)
 * @author   Nguyễn Quốc Nho <quocnho@gmail.com>
 * @package  action
 * @version  $Id: vi.php 4729 2013-05-03 07:53:55Z quocnho@gmail.com $
 * @link  http://www.zentao.net
 */
$lang->action->common     = 'Nhật ký';
$lang->action->product    = $lang->productCommon;
$lang->action->project    = 'Project';
$lang->action->execution  = $lang->executionCommon;
$lang->action->objectType = 'Loại đối tượng';
$lang->action->objectID   = 'ID';
$lang->action->objectName = 'Tên đối tượng';
$lang->action->actor      = 'Người dùng';
$lang->action->action     = 'Hành động';
$lang->action->actionID   = 'ID hành động';
$lang->action->date       = 'Ngày';
$lang->action->extra      = 'Extra';

$lang->action->trash       = 'Thùng rác';
$lang->action->undelete    = 'Khôi phục';
$lang->action->hideOne     = 'Ẩn';
$lang->action->hideAll     = 'Ẩn tất cả';
$lang->action->editComment = 'Sửa nhận xét';
$lang->action->create      = 'Thêm nhận xét';
$lang->action->comment     = 'Nhận xét';

$lang->action->trashTips      = 'Ghi chú: Xóa trong ZenTao là hợp lệ.';
$lang->action->textDiff       = 'Định dạng văn bản';
$lang->action->original       = 'Định dạng gốc';
$lang->action->confirmHideAll = 'Bạn có muốn ẩn tất cả ghi nhận này?';
$lang->action->needEdit       = '%s mà bạn muốn khôi phục. Vui lòng edit it.';
$lang->action->historyEdit    = 'Lịch sử người cập nhật không thể trống.';
$lang->action->noDynamic      = 'Không có lịch sử. ';

$lang->action->history = new stdclass();
$lang->action->history->action = 'Liên kết';
$lang->action->history->field  = 'Trường';
$lang->action->history->old    = 'Giá trị cũ';
$lang->action->history->new    = 'Giá trị mới';
$lang->action->history->diff   = 'So sánh';

$lang->action->dynamic = new stdclass();
$lang->action->dynamic->today      = 'Hôm nay';
$lang->action->dynamic->yesterday  = 'Hôm qua';
$lang->action->dynamic->twoDaysAgo = 'Hôm trước';
$lang->action->dynamic->thisWeek   = 'Tuần này';
$lang->action->dynamic->lastWeek   = 'Tuần trước';
$lang->action->dynamic->thisMonth  = 'Tháng này';
$lang->action->dynamic->lastMonth  = 'Tháng trước';
$lang->action->dynamic->all        = 'Tất cả';
$lang->action->dynamic->hidden     = 'Ẩn';
$lang->action->dynamic->search     = 'Tìm kiếm';

$lang->action->periods['all']       = $lang->action->dynamic->all;
$lang->action->periods['today']     = $lang->action->dynamic->today;
$lang->action->periods['yesterday'] = $lang->action->dynamic->yesterday;
$lang->action->periods['thisweek']  = $lang->action->dynamic->thisWeek;
$lang->action->periods['lastweek']  = $lang->action->dynamic->lastWeek;
$lang->action->periods['thismonth'] = $lang->action->dynamic->thisMonth;
$lang->action->periods['lastmonth'] = $lang->action->dynamic->lastMonth;

$lang->action->objectTypes['product']     = $lang->productCommon;
$lang->action->objectTypes['branch']      = 'Nhánh';
$lang->action->objectTypes['story']       = $lang->SRCommon;
$lang->action->objectTypes['design']      = 'Design';
$lang->action->objectTypes['productplan'] = 'Plan';
$lang->action->objectTypes['release']     = 'Phát hành';
$lang->action->objectTypes['program']     = 'Program';
$lang->action->objectTypes['project']     = 'Project';
$lang->action->objectTypes['execution']   = $lang->executionCommon;
$lang->action->objectTypes['task']        = 'Nhiệm vụ';
$lang->action->objectTypes['build']       = 'Bản dựng';
$lang->action->objectTypes['job']         = 'Job';
$lang->action->objectTypes['bug']         = 'Bug';
$lang->action->objectTypes['case']        = 'Tình huống';
$lang->action->objectTypes['caseresult']  = 'Kết quả tình huống';
$lang->action->objectTypes['stepresult']  = 'Các bước tình huống';
$lang->action->objectTypes['caselib']     = 'Thư viện';
$lang->action->objectTypes['testsuite']   = 'Suite';
$lang->action->objectTypes['testtask']    = 'Test bản dựng';
$lang->action->objectTypes['testreport']  = 'Báo cáo';
$lang->action->objectTypes['doc']         = 'Tài liệu';
$lang->action->objectTypes['doclib']      = 'Thư viện tài liệu';
$lang->action->objectTypes['todo']        = 'Việc làm';
$lang->action->objectTypes['risk']        = 'Risk';
$lang->action->objectTypes['issue']       = 'Issue';
$lang->action->objectTypes['module']      = 'Module';
$lang->action->objectTypes['user']        = 'Người dùng';
$lang->action->objectTypes['stakeholder'] = 'Stakeholder';
$lang->action->objectTypes['budget']      = 'Cost Estimate';
$lang->action->objectTypes['entry']       = 'Entry';
$lang->action->objectTypes['webhook']     = 'Webhook';
$lang->action->objectTypes['job']         = 'Job';
$lang->action->objectTypes['team']        = 'Team';
$lang->action->objectTypes['whitelist']   = 'Whitelist';

/* Used to describe operation history. */
$lang->action->desc = new stdclass();
$lang->action->desc->common         = '$date, <strong>$action</strong> bởi <strong>$actor</strong>.' . "\n";
$lang->action->desc->extra          = '$date, <strong>$action</strong> như <strong>$extra</strong> bởi <strong>$actor</strong>.' . "\n";
$lang->action->desc->opened         = '$date, được tạo bởi <strong>$actor</strong> .' . "\n";
$lang->action->desc->openedbysystem = '$date, opened by system.' . "\n";
$lang->action->desc->created        = '$date, được tạo bởi  <strong>$actor</strong> .' . "\n";
$lang->action->desc->added          = '$date, thêm bởi  <strong>$actor</strong> .' . "\n";
$lang->action->desc->changed        = '$date, changed by <strong>$actor</strong> .' . "\n";
$lang->action->desc->edited         = '$date, edited by <strong>$actor</strong> .' . "\n";
$lang->action->desc->assigned       = '$date, <strong>$actor</strong> assigned to <strong>$extra</strong>.' . "\n";
$lang->action->desc->closed         = '$date, được đóng bởi <strong>$actor</strong> .' . "\n";
$lang->action->desc->closedbysystem = '$date, closed by system.' . "\n";
$lang->action->desc->deleted        = '$date, được xóa bởi <strong>$actor</strong> .' . "\n";
$lang->action->desc->deletedfile    = '$date, <strong>$actor</strong> đã xóa <strong><i>$extra</i></strong>.' . "\n";
$lang->action->desc->editfile       = '$date, <strong>$actor</strong> đã sửa <strong><i>$extra</i></strong>.' . "\n";
$lang->action->desc->erased         = '$date, được xóa bởi <strong>$actor</strong> .' . "\n";
$lang->action->desc->undeleted      = '$date, khôi phục bởi <strong>$actor</strong> .' . "\n";
$lang->action->desc->hidden         = '$date, ẩn bởi <strong>$actor</strong> .' . "\n";
$lang->action->desc->commented      = '$date, được thêm bởi <strong>$actor</strong>.' . "\n";
$lang->action->desc->activated      = '$date, kích hoạt bởi <strong>$actor</strong> .' . "\n";
$lang->action->desc->blocked        = '$date, blocked by <strong>$actor</strong> .' . "\n";
$lang->action->desc->moved          = '$date, chuyển bởi <strong>$actor</strong> , cái là "$extra".' . "\n";
$lang->action->desc->confirmed      = '$date, <strong>$actor</strong> confirmed the story change. The latest build is <strong>#$extra</strong>.' . "\n";
$lang->action->desc->caseconfirmed  = '$date, <strong>$actor</strong> confirmed the case change. The latest build is <strong>#$extra</strong>' . "\n";
$lang->action->desc->bugconfirmed   = '$date, <strong>$actor</strong> confirmed Bug.' . "\n";
$lang->action->desc->frombug        = '$date, converted from <strong>$actor</strong>. Its ID was <strong>$extra</strong>.';
$lang->action->desc->started        = '$date, started by <strong>$actor</strong>.' . "\n";
$lang->action->desc->restarted      = '$date, continued by <strong>$actor</strong>.' . "\n";
$lang->action->desc->delayed        = '$date, postponed by <strong>$actor</strong>.' . "\n";
$lang->action->desc->suspended      = '$date, suspended by <strong>$actor</strong>.' . "\n";
$lang->action->desc->recordestimate = '$date, ghi nhận bởi <strong>$actor</strong> and it cost <strong>$extra</strong> giờ.';
$lang->action->desc->editestimate   = '$date, <strong>$actor</strong> edited Hour.';
$lang->action->desc->deleteestimate = '$date, <strong>$actor</strong> deleted Hour.';
$lang->action->desc->canceled       = '$date, cancelled by <strong>$actor</strong>.' . "\n";
$lang->action->desc->svncommited    = '$date, <strong>$actor</strong> committed and the build is <strong>#$extra</strong>.' . "\n";
$lang->action->desc->gitcommited    = '$date, <strong>$actor</strong> committed and the build is <strong>#$extra</strong>.' . "\n";
$lang->action->desc->finished       = '$date, finished by <strong>$actor</strong>.' . "\n";
$lang->action->desc->paused         = '$date, paused by <strong>$actor</strong>.' . "\n";
$lang->action->desc->verified       = '$date, verified by <strong>$actor</strong>.' . "\n";
$lang->action->desc->diff1          = '<strong><i>%s</i></strong> is changed. It was "%s" and it is "%s".<br />' . "\n";
$lang->action->desc->diff2          = '<strong><i>%s</i></strong> is changed. The difference is ' . "\n" . "<blockquote class='textdiff'>%s</blockquote>" . "\n<blockquote class='original'>%s</blockquote>";
$lang->action->desc->diff3          = 'File Name %s was changed to %s .' . "\n";
$lang->action->desc->linked2bug     = '$date, liên kết tới <strong>$extra</strong> bởi <strong>$actor</strong>';
$lang->action->desc->resolved       = '$date, resolved by <strong>$actor</strong> ' . "\n";
$lang->action->desc->managed        = '$date, by <strong>$actor</strong> managed.' . "\n";
$lang->action->desc->estimated      = '$date, by <strong>$actor</strong> estimated。' . "\n";

/* Used to describe the history of operations related to parent-child tasks. */
$lang->action->desc->createchildren     = '$date, <strong>$actor</strong> created a child task <strong>$extra</strong>。' . "\n";
$lang->action->desc->linkchildtask      = '$date, <strong>$actor</strong> linked a child task <strong>$extra</strong>。' . "\n";
$lang->action->desc->unlinkchildrentask = '$date, <strong>$actor</strong> unlinked a child task <strong>$extra</strong>。' . "\n";
$lang->action->desc->linkparenttask     = '$date, <strong>$actor</strong> liên kết tới a nhiệm vụ cha <strong>$extra</strong>。' . "\n";
$lang->action->desc->unlinkparenttask   = '$date, <strong>$actor</strong> unlinked a nhiệm vụ cha <strong>$extra</strong>。' . "\n";
$lang->action->desc->deletechildrentask = '$date, <strong>$actor</strong> deleted a child task <strong>$extra</strong>。' . "\n";

/* 用来描述和父子需求相关的操作历史记录。*/
$lang->action->desc->createchildrenstory = '$date, <strong>$actor</strong> created a child story <strong>$extra</strong>。' . "\n";
$lang->action->desc->linkchildstory      = '$date, <strong>$actor</strong> linked a child story <strong>$extra</strong>。' . "\n";
$lang->action->desc->unlinkchildrenstory = '$date, <strong>$actor</strong> unlinked a child story <strong>$extra</strong>。' . "\n";
$lang->action->desc->linkparentstory     = '$date, <strong>$actor</strong> liên kết tới a parent story <strong>$extra</strong>。' . "\n";
$lang->action->desc->unlinkparentstory   = '$date, <strong>$actor</strong> unlinked a parent story <strong>$extra</strong>。' . "\n";
$lang->action->desc->deletechildrenstory = '$date, <strong>$actor</strong> deleted a child story <strong>$extra</strong>。' . "\n";

/* Historical record of actions when associating and removing tình huống. */
$lang->action->desc->linkrelatedcase   = '$date, <strong>$actor</strong> linked a case <strong>$extra</strong>.' . "\n";
$lang->action->desc->unlinkrelatedcase = '$date, <strong>$actor</strong> unlinked a case <strong>$extra</strong>.' . "\n";

/* Used to display dynamic information. */
$lang->action->label                        = new stdclass();
$lang->action->label->created               = 'created ';
$lang->action->label->opened                = 'opened ';
$lang->action->label->openedbysystem        = 'Opened by system ';
$lang->action->label->closedbysystem        = 'Closed by system ';
$lang->action->label->added                 = 'added';
$lang->action->label->changed               = 'changed ';
$lang->action->label->edited                = 'edited ';
$lang->action->label->assigned              = 'assigned ';
$lang->action->label->closed                = 'closed ';
$lang->action->label->deleted               = 'deleted ';
$lang->action->label->deletedfile           = 'deleted ';
$lang->action->label->editfile              = 'edited ';
$lang->action->label->erased                = 'erased ';
$lang->action->label->undeleted             = 'restored ';
$lang->action->label->hidden                = 'hid ';
$lang->action->label->commented             = 'commented ';
$lang->action->label->communicated          = 'communicated';
$lang->action->label->activated             = 'activated ';
$lang->action->label->blocked               = 'blocked ';
$lang->action->label->resolved              = 'resolved ';
$lang->action->label->reviewed              = 'reviewed ';
$lang->action->label->moved                 = 'moved ';
$lang->action->label->confirmed             = 'confirmed Story ';
$lang->action->label->bugconfirmed          = 'Đã xác nhận';
$lang->action->label->tostory               = 'converted tới Câu chuyện ';
$lang->action->label->frombug               = 'converted từ Bug ';
$lang->action->label->fromlib               = 'imported from Library ';
$lang->action->label->totask                = 'converted to Task ';
$lang->action->label->svncommited           = 'committed SVN ';
$lang->action->label->gitcommited           = 'committed Git ';
$lang->action->label->linked2plan           = 'linked cho kế hoạch ';
$lang->action->label->unlinkedfromplan      = 'unlinked from ';
$lang->action->label->changestatus          = 'changed status';
$lang->action->label->marked                = 'marked';
$lang->action->label->linked2execution      = "đã liên kết tới {$lang->executionCommon}";
$lang->action->label->unlinkedfromexecution = "hủy liên kết từ {$lang->executionCommon}";
$lang->action->label->linked2project        = "Link Project";
$lang->action->label->unlinkedfromproject   = "Unlink Project";
$lang->action->label->unlinkedfrombuild     = "hủy liên kết Bản dựng ";
$lang->action->label->linked2release        = "liên kết Phát hành ";
$lang->action->label->unlinkedfromrelease   = "hủy liên kết Release ";
$lang->action->label->linkrelatedbug        = "linked Bug ";
$lang->action->label->unlinkrelatedbug      = "hủy liên kết Bug ";
$lang->action->label->linkrelatedcase       = "linked Case ";
$lang->action->label->unlinkrelatedcase     = "hủy liên kết Case ";
$lang->action->label->linkrelatedstory      = "linked Story ";
$lang->action->label->unlinkrelatedstory    = "hủy liên kết Story ";
$lang->action->label->subdividestory        = "decomposed Story ";
$lang->action->label->unlinkchildstory      = "hủy liên kết Story ";
$lang->action->label->started               = 'started ';
$lang->action->label->restarted             = 'continued ';
$lang->action->label->recordestimate        = 'recorded ';
$lang->action->label->editestimate          = 'edited ';
$lang->action->label->canceled              = 'cancelled ';
$lang->action->label->finished              = 'finished ';
$lang->action->label->paused                = 'paused ';
$lang->action->label->verified              = 'verified ';
$lang->action->label->delayed               = 'delayed ';
$lang->action->label->suspended             = 'suspended ';
$lang->action->label->login                 = 'login';
$lang->action->label->logout                = "logout";
$lang->action->label->deleteestimate        = "deleted ";
$lang->action->label->linked2build          = "linked ";
$lang->action->label->linked2bug            = "linked ";
$lang->action->label->linked2testtask       = "linked";
$lang->action->label->unlinkedfromtesttask  = "unlinked";
$lang->action->label->linkchildtask         = "linked a child task";
$lang->action->label->unlinkchildrentask    = "hủy liên kết a child task";
$lang->action->label->linkparenttask        = "linked a nhiệm vụ cha";
$lang->action->label->unlinkparenttask      = "unlink from nhiệm vụ cha";
$lang->action->label->batchcreate           = "batch created tasks";
$lang->action->label->createchildren        = "create child tasks";
$lang->action->label->managed               = "managed";
$lang->action->label->managedteam           = "managed";
$lang->action->label->managedwhitelist      = "managed";
$lang->action->label->deletechildrentask    = "delete children task";
$lang->action->label->createchildrenstory   = "create child stories";
$lang->action->label->linkchildstory        = "linked a child story";
$lang->action->label->unlinkchildrenstory   = "hủy liên kết a child story";
$lang->action->label->linkparentstory       = "linked a parent story";
$lang->action->label->unlinkparentstory     = "unlink from parent story";
$lang->action->label->deletechildrenstory   = "delete children story";
$lang->action->label->tracked               = 'tracked';
$lang->action->label->hangup                = 'hangup';
$lang->action->label->run                   = 'run';
$lang->action->label->estimated             = 'estimated';
$lang->action->label->reviewclosed          = 'Review Failed';
$lang->action->label->passreviewed          = 'Pass';
$lang->action->label->clarifyreviewed       = 'Clarify';

/* Dynamic information is grouped by object. */
$lang->action->dynamicAction                    = new stdclass;
$lang->action->dynamicAction->todo['opened']    = 'Tạo việc làm';
$lang->action->dynamicAction->todo['edited']    = 'Sửa việc làm';
$lang->action->dynamicAction->todo['erased']    = 'Xóa việc làm';
$lang->action->dynamicAction->todo['finished']  = 'Kết thúc việc làm';
$lang->action->dynamicAction->todo['activated'] = 'Kích hoạt việc làm';
$lang->action->dynamicAction->todo['closed']    = 'Đóng việc làm';
$lang->action->dynamicAction->todo['assigned']  = 'Bàn giao việc làm';
$lang->action->dynamicAction->todo['undeleted'] = 'Khôi phục việc làm';
$lang->action->dynamicAction->todo['hidden']    = 'Ẩn việc làm';

$lang->action->dynamicAction->program['create']   = 'Create Program';
$lang->action->dynamicAction->program['edit']     = 'Edit Program';
$lang->action->dynamicAction->program['activate'] = 'Activate Program';
$lang->action->dynamicAction->program['delete']   = 'Delete Program';
$lang->action->dynamicAction->program['close']    = 'Close Program';

$lang->action->dynamicAction->project['create']   = 'Create Project';
$lang->action->dynamicAction->project['edit']     = 'Edit Project';
$lang->action->dynamicAction->project['start']    = 'Start Project';
$lang->action->dynamicAction->project['suspend']  = 'Suspend Project';
$lang->action->dynamicAction->project['activate'] = 'Activate Project';
$lang->action->dynamicAction->project['close']    = 'Close Project';

$lang->action->dynamicAction->product['opened']    = 'Tạo ' . $lang->productCommon;
$lang->action->dynamicAction->product['edited']    = 'Sửa ' . $lang->productCommon;
$lang->action->dynamicAction->product['deleted']   = 'Xóa ' . $lang->productCommon;
$lang->action->dynamicAction->product['closed']    = 'Đóng ' . $lang->productCommon;
$lang->action->dynamicAction->product['undeleted'] = 'Phục hổi ' . $lang->productCommon;
$lang->action->dynamicAction->product['hidden']    = 'Ẩn ' . $lang->productCommon;

$lang->action->dynamicAction->productplan['opened'] = 'Tạo kế hoạch';
$lang->action->dynamicAction->productplan['edited'] = 'Sửa kế hoạch';

$lang->action->dynamicAction->release['opened']       = 'Tạo phát hành';
$lang->action->dynamicAction->release['edited']       = 'Sửa phát hành';
$lang->action->dynamicAction->release['changestatus'] = 'Thay đổi Tình trạng Phát hành';
$lang->action->dynamicAction->release['undeleted']    = 'Khôi phục phát hành';
$lang->action->dynamicAction->release['hidden']       = 'Ẩn phát hành';

$lang->action->dynamicAction->story['opened']                = 'Tạo câu chuyện';
$lang->action->dynamicAction->story['edited']                = 'Sửa câu chuyện';
$lang->action->dynamicAction->story['activated']             = 'Kích hoạt câu chuyện';
$lang->action->dynamicAction->story['reviewed']              = 'Duyệt câu chuyện';
$lang->action->dynamicAction->story['closed']                = 'Đóng câu chuyện';
$lang->action->dynamicAction->story['assigned']              = 'Bàn giao câu chuyện';
$lang->action->dynamicAction->story['changed']               = 'Thay đổi câu chuyện';
$lang->action->dynamicAction->story['linked2plan']           = 'Liên kết Story to kế hoạch';
$lang->action->dynamicAction->story['unlinkedfromplan']      = 'Hủy liên kết Story from kế hoạch';
$lang->action->dynamicAction->story['linked2release']        = 'Liên kết Story to phát hành';
$lang->action->dynamicAction->story['unlinkedfromrelease']   = 'Hủy liên kết Story from kế hoạch';
$lang->action->dynamicAction->story['linked2build']          = 'Liên kết Story to bản dựng';
$lang->action->dynamicAction->story['unlinkedfrombuild']     = 'Hủy liên kết Story from bản dựng';
$lang->action->dynamicAction->story['unlinkedfromproject']   = 'Hủy liên kết Project';
$lang->action->dynamicAction->story['undeleted']             = 'Khôi phục câu chuyện';
$lang->action->dynamicAction->story['hidden']                = 'Ẩn câu chuyện';
$lang->action->dynamicAction->story['linked2execution']      = "Link Story";
$lang->action->dynamicAction->story['unlinkedfromexecution'] = "Unlink Story";
$lang->action->dynamicAction->story['estimated']             = "Estimate $lang->SRCommon";

$lang->action->dynamicAction->execution['opened']    = 'Tạo ' . $lang->executionCommon;
$lang->action->dynamicAction->execution['edited']    = 'Sửa ' . $lang->executionCommon;
$lang->action->dynamicAction->execution['deleted']   = 'Xóa ' . $lang->executionCommon;
$lang->action->dynamicAction->execution['started']   = 'Bắt đầu ' . $lang->executionCommon;
$lang->action->dynamicAction->execution['delayed']   = 'Tạm ngưng ' . $lang->executionCommon;
$lang->action->dynamicAction->execution['suspended'] = 'Đình chỉ ' . $lang->executionCommon;
$lang->action->dynamicAction->execution['activated'] = 'Kích hoạt ' . $lang->executionCommon;
$lang->action->dynamicAction->execution['closed']    = 'Đóng ' . $lang->executionCommon;
$lang->action->dynamicAction->execution['managed']   = 'Quản lý ' . $lang->executionCommon;
$lang->action->dynamicAction->execution['undeleted'] = 'Phục hổi ' . $lang->executionCommon;
$lang->action->dynamicAction->execution['hidden']    = 'Ẩn ' . $lang->executionCommon;
$lang->action->dynamicAction->execution['moved']     = 'Nhập nhiệm vụ';

$lang->action->dynamicAction->team['managedTeam'] = 'Manage Team';

$lang->action->dynamicAction->task['opened']              = 'Tạo nhiệm vụ';
$lang->action->dynamicAction->task['edited']              = 'Sửa nhiệm vụ';
$lang->action->dynamicAction->task['commented']           = 'Task nhận xét';
$lang->action->dynamicAction->task['assigned']            = 'Bàn giao nhiệm vụ';
$lang->action->dynamicAction->task['confirmed']           = 'Xác nhận nhiệm vụ';
$lang->action->dynamicAction->task['started']             = 'Bắt đầu nhiệm vụ';
$lang->action->dynamicAction->task['finished']            = 'Nhiệm vụ hoàn thành';
$lang->action->dynamicAction->task['recordestimate']      = 'Thêm dự tính';
$lang->action->dynamicAction->task['editestimate']        = 'Sửa dự tính';
$lang->action->dynamicAction->task['deleteestimate']      = 'Xóa dự tính';
$lang->action->dynamicAction->task['paused']              = 'Pause nhiệm vụ';
$lang->action->dynamicAction->task['closed']              = 'Đóng nhiệm vụ';
$lang->action->dynamicAction->task['canceled']            = 'Hủy nhiệm vụ';
$lang->action->dynamicAction->task['activated']           = 'Kích hoạt nhiệm vụ';
$lang->action->dynamicAction->task['createchildren']      = 'Tạo Nhiệm vụ con';
$lang->action->dynamicAction->task['unlinkparenttask']    = 'Hủy liên kết Nhiệm vụ mẹ';
$lang->action->dynamicAction->task['deletechildrentask']  = 'Xóa children nhiệm vụ';
$lang->action->dynamicAction->task['linkparenttask']      = 'Liên kết Nhiệm vụ mẹ';
$lang->action->dynamicAction->task['linkchildtask']       = 'Liên kết Nhiệm vụ con';
$lang->action->dynamicAction->task['createchildrenstory'] = 'Tạo Câu chuyện con';
$lang->action->dynamicAction->task['unlinkparentstory']   = 'Hủy liên kết Parent câu chuyện';
$lang->action->dynamicAction->task['deletechildrenstory'] = 'Xóa children story';
$lang->action->dynamicAction->task['linkparentstory']     = 'Liên kết Parent câu chuyện';
$lang->action->dynamicAction->task['linkchildstory']      = 'Liên kết Câu chuyện con';
$lang->action->dynamicAction->task['undeleted']           = 'Khôi phục nhiệm vụ';
$lang->action->dynamicAction->task['hidden']              = 'Ẩn nhiệm vụ';
$lang->action->dynamicAction->task['svncommited']         = 'SVN Commit';
$lang->action->dynamicAction->task['gitcommited']         = 'GIT Commit';

$lang->action->dynamicAction->build['opened']  = 'Tạo bản dựng';
$lang->action->dynamicAction->build['edited']  = 'Sửa bản dựng';
$lang->action->dynamicAction->build['deleted'] = 'Delete Build';

$lang->action->dynamicAction->bug['opened']              = 'Báo cáo Bug';
$lang->action->dynamicAction->bug['edited']              = 'Sửa Bug';
$lang->action->dynamicAction->bug['activated']           = 'Kích hoạt Bug';
$lang->action->dynamicAction->bug['assigned']            = 'Bàn giao Bug';
$lang->action->dynamicAction->bug['closed']              = 'Đóng Bug';
$lang->action->dynamicAction->bug['bugconfirmed']        = 'Xác nhận Bug';
$lang->action->dynamicAction->bug['resolved']            = 'Giải quyết Bug';
$lang->action->dynamicAction->bug['undeleted']           = 'Khôi phục Bug';
$lang->action->dynamicAction->bug['hidden']              = 'Ẩn Bug';
$lang->action->dynamicAction->bug['deleted']             = 'Xóa tìBug';
$lang->action->dynamicAction->bug['confirmed']           = 'Xác nhận thay đổi câu chuyện';
$lang->action->dynamicAction->bug['tostory']             = 'Chuyển thành câu chuyện';
$lang->action->dynamicAction->bug['totask']              = 'Chuyển thành nhiệm vụ';
$lang->action->dynamicAction->bug['linked2plan']         = 'Liên kết kế hoạch';
$lang->action->dynamicAction->bug['unlinkedfromplan']    = 'Hủy liên kết kế hoạch';
$lang->action->dynamicAction->bug['linked2release']      = 'Liên kết phát hành';
$lang->action->dynamicAction->bug['unlinkedfromrelease'] = 'Hủy liên kết kế hoạch';
$lang->action->dynamicAction->bug['linked2bug']          = 'Liên kết bản dựng';
$lang->action->dynamicAction->bug['unlinkedfrombuild']   = 'Hủy liên kết bản dựng';

$lang->action->dynamicAction->testtask['opened']    = 'Tạo Yêu cầu Test';
$lang->action->dynamicAction->testtask['edited']    = 'Sửa Yêu cầu Test';
$lang->action->dynamicAction->testtask['started']   = 'Bắt đầu Yêu cầu Test';
$lang->action->dynamicAction->testtask['activated'] = 'Kích hoạt Yêu cầu Test';
$lang->action->dynamicAction->testtask['closed']    = 'Đóng Yêu cầu Test';
$lang->action->dynamicAction->testtask['blocked']   = 'Blocked Yêu cầu Test';

$lang->action->dynamicAction->case['opened']    = 'Tạo tình huống';
$lang->action->dynamicAction->case['edited']    = 'Sửa tình huống';
$lang->action->dynamicAction->case['deleted']   = 'Xóa tình huống';
$lang->action->dynamicAction->case['undeleted'] = 'Khôi phục tình huống';
$lang->action->dynamicAction->case['hidden']    = 'Ẩn tình huống';
$lang->action->dynamicAction->case['reviewed']  = 'Thêm Review kết quả';
$lang->action->dynamicAction->case['confirmed'] = 'Xác nhận tình huống';
$lang->action->dynamicAction->case['fromlib']   = 'Nhập from Case Lib';

$lang->action->dynamicAction->testreport['opened']    = 'Tạo Test báo cáo';
$lang->action->dynamicAction->testreport['edited']    = 'Sửa Test báo cáo';
$lang->action->dynamicAction->testreport['deleted']   = 'Xóa Test báo cáo';
$lang->action->dynamicAction->testreport['undeleted'] = 'Khôi phục Test báo cáo';
$lang->action->dynamicAction->testreport['hidden']    = 'Ẩn Test báo cáo';

$lang->action->dynamicAction->testsuite['opened']    = 'Tạo Test Suite';
$lang->action->dynamicAction->testsuite['edited']    = 'Sửa Test Suite';
$lang->action->dynamicAction->testsuite['deleted']   = 'Xóa Test Suite';
$lang->action->dynamicAction->testsuite['undeleted'] = 'Khôi phục Test Suite';
$lang->action->dynamicAction->testsuite['hidden']    = 'Ẩn Test Suite';

$lang->action->dynamicAction->caselib['opened']    = 'Tạo Case Lib';
$lang->action->dynamicAction->caselib['edited']    = 'Sửa Case Lib';
$lang->action->dynamicAction->caselib['deleted']   = 'Xóa Case Lib';
$lang->action->dynamicAction->caselib['undeleted'] = 'Khôi phục Case Lib';
$lang->action->dynamicAction->caselib['hidden']    = 'Ẩn Case Lib';

$lang->action->dynamicAction->doclib['created'] = 'Tạo Doc thư viện';
$lang->action->dynamicAction->doclib['edited']  = 'Sửa Doc thư viện';
$lang->action->dynamicAction->doclib['deleted'] = 'Delete Doc Library';

$lang->action->dynamicAction->doc['created']   = 'Tạo tài liệu';
$lang->action->dynamicAction->doc['edited']    = 'Sửa tài liệu';
$lang->action->dynamicAction->doc['commented'] = 'Comment tài liệu';
$lang->action->dynamicAction->doc['deleted']   = 'Xóa tài liệu';
$lang->action->dynamicAction->doc['undeleted'] = 'Khôi phục tài liệu';
$lang->action->dynamicAction->doc['hidden']    = 'Ẩn tài liệu';

$lang->action->dynamicAction->user['created']       = 'Tạo người dùng';
$lang->action->dynamicAction->user['edited']        = 'Sửa người dùng';
$lang->action->dynamicAction->user['login']         = 'Đăng nhập';
$lang->action->dynamicAction->user['logout']        = 'Thoát';
$lang->action->dynamicAction->user['undeleted']     = 'Khôi phục người dùng';
$lang->action->dynamicAction->user['hidden']        = 'Ẩn người dùng';
$lang->action->dynamicAction->user['loginxuanxuan'] = 'Login Desktop';

$lang->action->dynamicAction->entry['created'] = 'Thêm ứng dụng';
$lang->action->dynamicAction->entry['edited']  = 'Sửa ứng dụng';

/* Generate the corresponding object link. */
global $config;
$lang->action->label->product     = $lang->productCommon . '|product|view|productID=%s';
$lang->action->label->productplan = 'Kế hoạch|productplan|view|productID=%s';
$lang->action->label->release     = 'Phát hành|release|view|productID=%s';
$lang->action->label->story       = 'Câu chuyện|story|view|storyID=%s';
$lang->action->label->program     = "Program|program|pgmproduct|programID=%s";
$lang->action->label->project     = "Project|program|index|projectID=%s";
if($config->systemMode == 'new')
{
    $lang->action->label->execution = "Execution|execution|task|executionID=%s";
}
else
{
    $lang->action->label->execution = "$lang->executionCommon|execution|task|executionID=%s";
}
$lang->action->label->task        = 'Nhiệm vụ|task|view|taskID=%s';
$lang->action->label->build       = 'Bản dựng|build|view|buildID=%s';
$lang->action->label->bug         = 'Bug|bug|view|bugID=%s';
$lang->action->label->case        = 'Tình huống|testcase|view|caseID=%s';
$lang->action->label->testtask    = 'Yêu cầu|testtask|view|caseID=%s';
$lang->action->label->testsuite   = 'Test Suite|testsuite|view|suiteID=%s';
$lang->action->label->caselib     = 'Thư viện tình huống|caselib|view|libID=%s';
$lang->action->label->todo        = 'Việc làm|todo|view|todoID=%s';
$lang->action->label->doclib      = 'Doc Library|doc|browse|libID=%s';
$lang->action->label->doc         = 'Tài liệu|doc|view|docID=%s';
$lang->action->label->user        = 'Người dùng|user|view|account=%s';
$lang->action->label->testreport  = 'Báo cáo|testreport|view|report=%s';
$lang->action->label->entry       = 'Ứng dụng|entry|browse|';
$lang->action->label->webhook     = 'Webhook|webhook|browse|';
$lang->action->label->space       = ' ';
$lang->action->label->risk        = 'Risk|risk|view|riskID%s';
$lang->action->label->issue       = 'Issue|issue|view|issueID=%s';
$lang->action->label->design      = 'Design|design|view|designID=%s';
$lang->action->label->stakeholder = 'Stakeholder|stakeholder|view|userID=%s';

/* Object type. */
$lang->action->search = new stdclass();
$lang->action->search->objectTypeList['']            = '';
$lang->action->search->objectTypeList['product']     = $lang->productCommon;
$lang->action->search->objectTypeList['program']     = 'Program';
$lang->action->search->objectTypeList['project']     = 'Project';
$lang->action->search->objectTypeList['execution']   = 'Execution';
$lang->action->search->objectTypeList['bug']         = 'Bug';
$lang->action->search->objectTypeList['case']        = 'Tình huống';
$lang->action->search->objectTypeList['caseresult']  = 'Kết quả tình huống';
$lang->action->search->objectTypeList['stepresult']  = 'Các bước tình huống';
$lang->action->search->objectTypeList['story']       = "$lang->SRCommon/$lang->URCommon";
$lang->action->search->objectTypeList['task']        = 'Nhiệm vụ';
$lang->action->search->objectTypeList['testtask']    = 'Yêu cầu';
$lang->action->search->objectTypeList['user']        = 'Người dùng';
$lang->action->search->objectTypeList['doc']         = 'Tài liệu';
$lang->action->search->objectTypeList['doclib']      = 'Doc Lib';
$lang->action->search->objectTypeList['todo']        = 'Việc làm';
$lang->action->search->objectTypeList['build']       = 'Bản dựng';
$lang->action->search->objectTypeList['release']     = 'Phát hành';
$lang->action->search->objectTypeList['productplan'] = 'Kế hoạch';
$lang->action->search->objectTypeList['branch']      = 'Nhánh';
$lang->action->search->objectTypeList['testsuite']   = 'Suite';
$lang->action->search->objectTypeList['caselib']     = 'Thư viện';
$lang->action->search->objectTypeList['testreport']  = 'Báo cáo';

/* Used to display actions in dynamic method. */
$lang->action->search->label['']                      = '';
$lang->action->search->label['created']               = $lang->action->label->created;
$lang->action->search->label['opened']                = $lang->action->label->opened;
$lang->action->search->label['changed']               = $lang->action->label->changed;
$lang->action->search->label['edited']                = $lang->action->label->edited;
$lang->action->search->label['assigned']              = $lang->action->label->assigned;
$lang->action->search->label['closed']                = $lang->action->label->closed;
$lang->action->search->label['deleted']               = $lang->action->label->deleted;
$lang->action->search->label['deletedfile']           = $lang->action->label->deletedfile;
$lang->action->search->label['editfile']              = $lang->action->label->editfile;
$lang->action->search->label['erased']                = $lang->action->label->erased;
$lang->action->search->label['undeleted']             = $lang->action->label->undeleted;
$lang->action->search->label['hidden']                = $lang->action->label->hidden;
$lang->action->search->label['commented']             = $lang->action->label->commented;
$lang->action->search->label['activated']             = $lang->action->label->activated;
$lang->action->search->label['blocked']               = $lang->action->label->blocked;
$lang->action->search->label['resolved']              = $lang->action->label->resolved;
$lang->action->search->label['reviewed']              = $lang->action->label->reviewed;
$lang->action->search->label['moved']                 = $lang->action->label->moved;
$lang->action->search->label['confirmed']             = $lang->action->label->confirmed;
$lang->action->search->label['bugconfirmed']          = $lang->action->label->bugconfirmed;
$lang->action->search->label['tostory']               = $lang->action->label->tostory;
$lang->action->search->label['frombug']               = $lang->action->label->frombug;
$lang->action->search->label['totask']                = $lang->action->label->totask;
$lang->action->search->label['svncommited']           = $lang->action->label->svncommited;
$lang->action->search->label['gitcommited']           = $lang->action->label->gitcommited;
$lang->action->search->label['linked2plan']           = $lang->action->label->linked2plan;
$lang->action->search->label['unlinkedfromplan']      = $lang->action->label->unlinkedfromplan;
$lang->action->search->label['changestatus']          = $lang->action->label->changestatus;
$lang->action->search->label['marked']                = $lang->action->label->marked;
$lang->action->search->label['linked2project']        = $lang->action->label->linked2project;
$lang->action->search->label['unlinkedfromproject']   = $lang->action->label->unlinkedfromproject;
$lang->action->search->label['linked2execution']      = $lang->action->label->linked2execution;
$lang->action->search->label['unlinkedfromexecution'] = $lang->action->label->unlinkedfromexecution;
$lang->action->search->label['started']               = $lang->action->label->started;
$lang->action->search->label['restarted']             = $lang->action->label->restarted;
$lang->action->search->label['recordestimate']        = $lang->action->label->recordestimate;
$lang->action->search->label['editestimate']          = $lang->action->label->editestimate;
$lang->action->search->label['canceled']              = $lang->action->label->canceled;
$lang->action->search->label['finished']              = $lang->action->label->finished;
$lang->action->search->label['paused']                = $lang->action->label->paused;
$lang->action->search->label['verified']              = $lang->action->label->verified;
$lang->action->search->label['login']                 = $lang->action->label->login;
$lang->action->search->label['logout']                = $lang->action->label->logout;
