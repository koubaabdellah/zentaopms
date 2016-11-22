<?php
/**
 * The bug view file of dashboard module of ZenTaoPMS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     dashboard
 * @version     $Id: bug.html.php 5107 2013-07-12 01:46:12Z chencongzhi520@gmail.com $
 * @link        http://www.zentao.net
 */
?>
<?php include '../../common/view/header.html.php';?>
<div id='featurebar'>
  <ul class='nav'>
    <?php
    echo "<li id='assignedToTab'>"  . html::a(inlink('bug', "type=assignedTo"),  $lang->bug->assignToMe)    . "</li>";
    echo "<li id='openedByTab'>"    . html::a(inlink('bug', "type=openedBy"),    $lang->bug->openedByMe)    . "</li>";
    echo "<li id='resolvedByTab'>"  . html::a(inlink('bug', "type=resolvedBy"),  $lang->bug->resolvedByMe)  . "</li>";
    echo "<li id='closedByTab'>"    . html::a(inlink('bug', "type=closedBy"),    $lang->bug->closedByMe)    . "</li>";
    ?>
  </ul>
</div>
<form method='post' action='<?php echo $this->createLink('bug', 'batchEdit', "productID=0");?>'>
  <table class='table table-condensed table-hover table-striped tablesorter table-fixed' id='bugList'>
    <?php $vars = "type=$type&orderBy=%s&recTotal=$recTotal&recPerPage=$recPerPage&pageID=$pageID"; ?>
    <thead>
    <tr class='text-center'>
      <th class='w-id'>        <?php common::printOrderLink('id',         $orderBy, $vars, $lang->idAB);?></th>
      <th class='w-severity'>  <?php common::printOrderLink('severity',   $orderBy, $vars, $lang->bug->severityAB);?></th>
      <th class='w-pri'>       <?php common::printOrderLink('pri',        $orderBy, $vars, $lang->priAB);?></th>
      <th class='w-type'>      <?php common::printOrderLink('type',       $orderBy, $vars, $lang->typeAB);?></th>
      <th>                     <?php common::printOrderLink('title',      $orderBy, $vars, $lang->bug->title);?></th>
      <th class='w-user'>      <?php common::printOrderLink('openedBy',   $orderBy, $vars, $lang->openedByAB);?></th>
      <th class='w-user'>      <?php common::printOrderLink('assignedTo', $orderBy, $vars, $lang->bug->assignedTo);?></th>
      <th class='w-user'>      <?php common::printOrderLink('resolvedBy', $orderBy, $vars, $lang->bug->resolvedByAB);?></th>
      <th class='w-resolution'><?php common::printOrderLink('resolution', $orderBy, $vars, $lang->bug->resolutionAB);?></th>
      <th class='w-140px'><?php echo $lang->actions;?></th>
    </tr>
    </thead>
    <tbody>
    <?php $canBatchEdit  = common::hasPriv('bug', 'batchEdit');?>
    <?php foreach($bugs as $bug):?>
    <tr class='text-center'>
      <td class='text-left'>
        <?php if($canBatchEdit):?><input type='checkbox' name='bugIDList[]' value='<?php echo $bug->id;?>' /><?php endif;?>
        <?php echo html::a($this->createLink('bug', 'view', "bugID=$bug->id"), sprintf('%03d', $bug->id), '_blank');?>
      </td>
      <td><span class='<?php echo 'severity' . zget($lang->bug->severityList, $bug->severity, $bug->severity)?>'><?php echo zget($lang->bug->severityList, $bug->severity, $bug->severity);?></span></td>
      <td><span class='<?php echo 'pri' . zget($lang->bug->priList, $bug->pri, $bug->pri)?>'><?php echo zget($lang->bug->priList, $bug->pri, $bug->pri)?></span></td>
      <td><?php echo $lang->bug->typeList[$bug->type]?></td>
      <td class='text-left nobr'><?php echo html::a($this->createLink('bug', 'view', "bugID=$bug->id"), $bug->title, null, "style='color: $bug->color'");?></td>
      <td><?php echo $users[$bug->openedBy];?></td>
      <td><?php echo $users[$bug->assignedTo];?></td>
      <td><?php echo $users[$bug->resolvedBy];?></td>
      <td><?php echo $lang->bug->resolutionList[$bug->resolution];?></td>
      <td class='text-right'>
        <?php
        $params = "bugID=$bug->id";
        common::printIcon('bug', 'confirmBug', $params, $bug, 'list', 'search', '', 'iframe', true);
        common::printIcon('bug', 'assignTo',   $params, '', 'list', 'hand-right', '', 'iframe', true);
        common::printIcon('bug', 'resolve',    $params, $bug, 'list', 'ok-sign', '', 'iframe', true);
        common::printIcon('bug', 'close',      $params, $bug, 'list', 'off', '', 'iframe', true);
        common::printIcon('bug', 'edit',       $params, '', 'list', 'pencil');
        ?>
      </td>
    </tr>
    <?php endforeach;?>
    </tbody>
    <tfoot>
      <tr>
        <td colspan='10'>
        <?php if($bugs):?>
        <div class='table-actions clearfix'>
          <?php echo html::selectButton();?>
          <div class='btn-group dropup'>
            <?php
            $actionLink = $this->createLink('bug', 'batchEdit');
            $misc       = common::hasPriv('bug', 'batchEdit') ? "onclick=\"setFormAction('$actionLink')\"" : "disabled='disabled'";
            echo html::commonButton($lang->edit, $misc);
            ?>
            <button type='button' class='btn dropdown-toggle' data-toggle='dropdown'><span class='caret'></span></button>
            <ul class='dropdown-menu'>
              <?php
              $class = "class='disabled'";
              $actionLink = $this->createLink('bug', 'batchConfirm');
              $misc = common::hasPriv('bug', 'batchConfirm') ? "onclick=\"setFormAction('$actionLink','hiddenwin')\"" : $class;
              if($misc) echo "<li>" . html::a('javascript:;', $lang->bug->confirmBug, '', $misc) . "</li>";

              $actionLink = $this->createLink('bug', 'batchClose');
              $misc = common::hasPriv('bug', 'batchClose') ? "onclick=\"setFormAction('$actionLink','hiddenwin')\"" : $class;
              if($misc) echo "<li>" . html::a('javascript:;', $lang->bug->close, '', $misc) . "</li>";

              $canBatchAssignTo = common::hasPriv('bug', 'batchAssignTo');
              if($canBatchAssignTo && count($bugs))
              {
                  $withSearch = count($memberPairs) > 10;
                  $actionLink = $this->createLink('bug', 'batchAssignTo', "productID=0&type=my");
                  echo html::select('assignedTo', $memberPairs, '', 'class="hidden"');
                  echo "<li class='dropdown-submenu'>";
                  echo html::a('javascript::', $lang->bug->assignedTo, 'id="assignItem"');
                  echo "<div class='dropdown-menu" . ($withSearch ? ' with-search':'') . "'>";
                  echo "<ul  class='dropdown-list'>";
                  foreach ($memberPairs as $key => $value)
                  {
                      if(empty($key)) continue;
                      echo "<li class='option' data-key='$key'>" . html::a("javascript:$(\".table-actions #assignedTo\").val(\"$key\");setFormAction(\"$actionLink\")", $value, '', '') . '</li>';
                  }
                  echo "</ul>";
                  if($withSearch) echo "<div class='menu-search'><div class='input-group input-group-sm'><input type='text' class='form-control' placeholder=''><span class='input-group-addon'><i class='icon-search'></i></span></div></div>";
                  echo "</div></li>";
              }
              else
              {
                  echo "<li>" . html::a('javascript:;', $lang->bug->assignedTo,  '', $class);
              }
              ?>
            </ul>
          </div>
        </div>
        <?php endif;?>
        <?php $pager->show();?>
        </td>
      </tr>
    </tfoot>
  </table>
</form>
<?php js::set('listName', 'bugList')?>
<script language='javascript'>$("#<?php echo $type;?>Tab").addClass('active');</script>
<?php include '../../common/view/footer.html.php';?>
