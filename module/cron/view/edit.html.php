<?php
/**
 * The edit view file of cron module of ZenTaoPMS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     cron
 * @version     $Id$
 * @link        http://www.zentao.net
 */
?>
<?php include '../../common/view/header.html.php';?>
<div id='mainContent' class='main-content'>
  <div class='center-block mw-700px'>
    <div class='main-header'>
      <h2>
        <?php echo $lang->cron->common?>
        <small class'text-muted'> <?php echo $lang->cron->edit?></small>
      <h2>
    </div>
    <form method='post' id='dataform' target='hiddenwin'>
      <table class='table table-form'>
        <tr>
          <th class='rowhead w-80px'><?php echo $lang->cron->m;?></th>
          <td class='w-p20'><?php echo html::input('m', $cron->m, "class='form-control' autocomplete='off'")?></td>
          <td><?php echo $lang->cron->notice->m;?></td>
        </tr>
        <tr>
          <th><?php echo $lang->cron->h;?></th>
          <td><?php echo html::input('h', $cron->h, "class='form-control' autocomplete='off'")?></td>
          <td><?php echo $lang->cron->notice->h;?></td>
        </tr>
        <tr>
          <th><?php echo $lang->cron->dom;?></th>
          <td><?php echo html::input('dom', $cron->dom, "class='form-control' autocomplete='off'")?></td>
          <td><?php echo $lang->cron->notice->dom;?></td>
        </tr>
        <tr>
          <th><?php echo $lang->cron->mon;?></th>
          <td><?php echo html::input('mon', $cron->mon, "class='form-control' autocomplete='off'")?></td>
          <td><?php echo $lang->cron->notice->mon;?></td>
        </tr>
        <tr>
          <th><?php echo $lang->cron->dow;?></th>
          <td><?php echo html::input('dow', $cron->dow, "class='form-control' autocomplete='off'")?></td>
          <td><?php echo $lang->cron->notice->dow;?></td>
        </tr>
        <tr>
          <th><?php echo $lang->cron->command;?></th>
          <td colspan='2'><?php echo html::input('command', str_replace("'", "&#039;", $cron->command), "class='form-control' autocomplete='off'")?></td>
        </tr>
        <tr>
          <th><?php echo $lang->cron->remark;?></th>
          <td colspan='2'><?php echo html::input('remark', $cron->remark, "class='form-control' autocomplete='off'")?></td>
        </tr>
        <tr>
          <th><?php echo $lang->cron->type;?></th>
          <td><?php echo html::select('type', $lang->cron->typeList, $cron->type, "class='form-control'")?></td>
        </tr>
        <tr>
          <th></th>
          <td><?php echo html::submitButton()?></td>
        </tr>
      </table>
    </form>
  </div>
</div>
<?php include '../../common/view/footer.html.php';?>
