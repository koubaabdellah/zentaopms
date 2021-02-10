<?php
/**
 * The model file of issue module of ZenTaoPMS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Yong Lei <leiyong@easycorp.ltd>
 * @package     issue
 * @version     $Id$
 * @link        http://www.zentao.net
 */
?>
<?php
class issueModel extends model
{
    /**
     * Create an issue.
     *
     * @access public
     * @return int
     */
    public function create()
    {
        $now   = helper::now();
        $issue = fixer::input('post')
            ->add('createdBy', $this->app->user->account)
            ->add('createdDate', $now)
            ->add('status', 'unconfirmed')
            ->add('PRJ', $this->session->PRJ)
            ->remove('labels,files')
            ->addIF($this->post->assignedTo, 'assignedBy', $this->app->user->account)
            ->addIF($this->post->assignedTo, 'assignedDate', $now)
            ->stripTags($this->config->issue->editor->create['id'], $this->config->allowedTags)
            ->get();

        $this->dao->insert(TABLE_ISSUE)->data($issue)->batchCheck($this->config->issue->create->requiredFields, 'notempty')->exec();
        $issueID = $this->dao->lastInsertID();
        $this->loadModel('file')->saveUpload('issue', $issueID);

        return $issueID;
    }

    /**
     * Get stakeholder issue list data.
     *
     * @param  string $owner
     * @param  string $activityID
     * @param  object $pager
     * @access public
     * @return object
     */
    public function getStakeholderIssue($owner = '', $activityID = 0, $pager = null)
    {
        $issueList = $this->dao->select('*')->from(TABLE_ISSUE)
            ->where('deleted')->eq('0')
            ->beginIF($owner)->andWhere('owner')->eq($owner)->fi()
            ->beginIF($activityID)->andWhere('activity')->eq($activityID)->fi()
            ->orderBy('id_desc')
            ->page($pager)
            ->fetchAll();

        return $issueList;
    }

    /**
     * Get a issue details.
     *
     * @param  int    $issueID
     * @access public
     * @return object|bool
     */
    public function getByID($issueID)
    {
        $issue = $this->dao->select('*')->from(TABLE_ISSUE)->where('id')->eq($issueID)->fetch();
        if(!$issue) return false;

        $issue->files = $this->loadModel('file')->getByObject('issue', $issue->id);
        return $issue;
    }

    /**
     * Get issue list data.
     *
     * @param  int       $projectID
     * @param  string    $browseType bySearch|open|assignTo|closed|suspended|canceled
     * @param  int       $queryID
     * @param  string    $orderBy
     * @param  object    $pager
     * @access public
     * @return object
     */
    public function getList($projectID = 0, $browseType = 'all', $queryID = 0, $orderBy = 'id_desc', $pager = null)
    {
        $issueQuery = '';
        if($browseType == 'bysearch')
        {
            $query = $queryID ? $this->loadModel('search')->getQuery($queryID) : '';
            if($query)
            {
                $this->session->set('issueQuery', $query->sql);
                $this->session->set('issueForm', $query->form);
            }
            if($this->session->issueQuery == false) $this->session->set('issueQuery', ' 1=1');
            $issueQuery = $this->session->issueQuery;
        }

        $issueList = $this->dao->select('*')->from(TABLE_ISSUE)
            ->where('deleted')->eq('0')
            ->beginIF($projectID)->andWhere('PRJ')->eq($projectID)->fi()
            ->beginIF($browseType == 'open')->andWhere('status')->eq('active')->fi()
            ->beginIF($browseType == 'assignto')->andWhere('assignedTo')->eq($this->app->user->account)->fi()
            ->beginIF($browseType == 'closed')->andWhere('status')->eq('closed')->fi()
            ->beginIF($browseType == 'suspended')->andWhere('status')->eq('suspended')->fi()
            ->beginIF($browseType == 'canceled')->andWhere('status')->eq('canceled')->fi()
            ->beginIF($browseType == 'bysearch')->andWhere($issueQuery)->fi()
            ->orderBy($orderBy)
            ->page($pager)
            ->fetchAll();

        return $issueList;
    }

    /**
     * Get the issue in the block.
     *
     * @param  int    $projectID
     * @param  string $browseType open|assignto|closed|suspended|canceled
     * @param  int    $limit
     * @param  string $orderBy
     * @access public
     * @return array
     */
    public function getBlockIssues($projectID = 0, $browseType = 'all', $limit = 15, $orderBy = 'id_desc')
    {
        $issueList = $this->dao->select('*')->from(TABLE_ISSUE)
            ->where('deleted')->eq('0')
            ->beginIF($projectID)->andWhere('PRJ')->eq($projectID)->fi()
            ->beginIF($browseType == 'open')->andWhere('status')->eq('active')->fi()
            ->beginIF($browseType == 'assignto')->andWhere('assignedTo')->eq($this->app->user->account)->fi()
            ->beginIF($browseType == 'closed')->andWhere('status')->eq('closed')->fi()
            ->beginIF($browseType == 'suspended')->andWhere('status')->eq('suspended')->fi()
            ->beginIF($browseType == 'canceled')->andWhere('status')->eq('canceled')->fi()
            ->orderBy($orderBy)
            ->limit($limit)
            ->fetchAll();

        return $issueList;
    }

    /**
     * Get user issues.
     *
     * @param  string $browseType open|assignto|closed|suspended|canceled
     * @param  string $account
     * @param  string $orderBy
     * @param  object $pager
     * @access public
     * @return array
     */
    public function getUserIssues($type = 'assignedTo', $account = '', $orderBy = 'id_desc', $pager)
    {
        if(empty($account)) $account = $this->app->user->account;

        $issueList = $this->dao->select('*')->from(TABLE_ISSUE)
            ->where('deleted')->eq('0')
            ->andWhere($type)->eq($account)->fi()
            ->beginIF($this->app->rawMethod == 'contribute')->andWhere("status")->in('resolved,canceled,closed')->fi()
            ->orderBy($orderBy)
            ->page($pager)
            ->fetchAll();

        return $issueList;
    }

    /**
     * Get activity list.
     *
     * @access public
     * @return object
     */
    public function getActivityPairs()
    {
        return $this->dao->select('id,name')->from(TABLE_ACTIVITY)->where('deleted')->eq('0')->orderBy('id_desc')->fetchPairs();
    }

    /**
     * Get issue pairs of a user.
     *
     * @param  string $account
     * @param  int    $limit
     * @param  string $status all|unconfirmed|active|suspended|resolved|closed|canceled
     * @param  array  $skipProjectIDList
     * @access public
     * @return array
     */
    public function getUserIssuePairs($account, $limit = 0, $status = 'all', $skipProjectIDList = array())
    {
        $stmt = $this->dao->select('t1.id, t1.title, t2.name as project')
            ->from(TABLE_ISSUE)->alias('t1')
            ->leftjoin(TABLE_PROJECT)->alias('t2')->on('t1.PRJ = t2.id')
            ->where('t1.assignedTo')->eq($account)
            ->andWhere('t1.deleted')->eq(0)
            ->beginIF($status != 'all')->andWhere('t1.status')->in($status)->fi()
            ->beginIF(!empty($skipProjectIDList))->andWhere('t1.PRJ')->notin($skipProjectIDList)->fi()
            ->beginIF($limit)->limit($limit)->fi()
            ->query();

        $issues = array();
        while($issue = $stmt->fetch())
        {
            $issues[$issue->id] = $issue->project . ' / ' . $issue->title;
        }
        return $issues;
    }

    /**
     * Update an issue.
     *
     * @param  int    $issueID
     * @access public
     * @return array
     */
    public function update($issueID)
    {
        $oldIssue = $this->getByID($issueID);

        $now   = helper::now();
        $issue = fixer::input('post')
            ->add('editedBy', $this->app->user->account)
            ->add('editedDate', $now)
            ->remove('labels,files')
            ->addIF($this->post->assignedTo, 'assignedBy', $this->app->user->account)
            ->addIF($this->post->assignedTo, 'assignedDate', $now)
            ->stripTags($this->config->issue->editor->edit['id'], $this->config->allowedTags)
            ->get();

        $this->dao->update(TABLE_ISSUE)->data($issue)
            ->where('id')->eq($issueID)
            ->batchCheck($this->config->issue->edit->requiredFields, 'notempty')
            ->exec();

        $this->loadModel('file')->saveUpload('issue', $issueID);

        return common::createChanges($oldIssue, $issue);
    }

    /**
     * Update assignor.
     *
     * @param  int    $issueID
     * @access public
     * @return array
     */
    public function assignTo($issueID)
    {
        $oldIssue = $this->getByID($issueID);

        $now   = helper::now();
        $issue = fixer::input('post')
            ->add('assignedBy', $this->app->user->account)
            ->add('assignedDate', $now)
            ->add('editedBy', $this->app->user->account)
            ->add('editedDate', $now)
            ->get();

        $this->dao->update(TABLE_ISSUE)->data($issue)->where('id')->eq($issueID)->exec();

        return common::createChanges($oldIssue, $issue);
    }

    /**
     * Close an issue.
     *
     * @param  int    $issueID
     * @access public
     * @return array
     */
    public function close($issueID)
    {
        $oldIssue = $this->getByID($issueID);
        $issue    = fixer::input('post')
            ->add('closedBy', $this->app->user->account)
            ->add('status', 'closed')
            ->add('assignedTo', 'closed')
            ->add('editedBy', $this->app->user->account)
            ->add('editedDate', helper::now())
            ->get();

        $this->dao->update(TABLE_ISSUE)->data($issue)->where('id')->eq($issueID)->exec();

        return common::createChanges($oldIssue, $issue);
    }

    /**
     * Confirm an issue.
     *
     * @param  int    $issueID
     * @access public
     * @return array
     */
    public function confirm($issueID)
    {
        $oldIssue = $this->getByID($issueID);
        $issue    = fixer::input('post')
            ->add('status', 'confirmed')
            ->add('editedBy', $this->app->user->account)
            ->add('editedDate', helper::now())
            ->get();

        $this->dao->update(TABLE_ISSUE)->data($issue)->where('id')->eq($issueID)->exec();

        return common::createChanges($oldIssue, $issue);
    }

    /**
     * Cancel an issue.
     *
     * @param  int    $issueID
     * @access public
     * @return array
     */
    public function cancel($issueID)
    {
        $oldIssue = $this->getByID($issueID);
        $issue    = fixer::input('post')
            ->add('status', 'canceled')
            ->add('editedBy', $this->app->user->account)
            ->add('editedDate', helper::now())
            ->get();
        $this->dao->update(TABLE_ISSUE)->data($issue)->where('id')->eq($issueID)->exec();

        return common::createChanges($oldIssue, $issue);
    }

    /**
     * Activate an issue.
     *
     * @param  int    $issueID
     * @access public
     * @return array
     */
    public function activate($issueID)
    {
        $oldIssue = $this->getByID($issueID);

        $now   = helper::now();
        $issue = fixer::input('post')
            ->add('status', 'active')
            ->add('activateBy', $this->app->user->account)
            ->add('editedBy', $this->app->user->account)
            ->add('editedDate', $now)
            ->add('assignedBy', $this->app->user->account)
            ->add('assignedDate', $now)
            ->addIF($this->post->assignedTo == '', 'assignedTo', $this->app->user->account)
            ->get();

        $this->dao->update(TABLE_ISSUE)->data($issue)->where('id')->eq($issueID)->exec();

        return common::createChanges($oldIssue, $issue);
    }

    /**
     * Batch create issue.
     *
     * @access public
     * @return array
     */
    public function batchCreate()
    {
        $now  = helper::now();
        $data = fixer::input('post')->get();

        $issues = array();
        foreach($data->dataList as $index => $issue)
        {
            if(!trim($issue['title'])) continue;

            $issue['createdBy']   = $this->app->user->account;
            $issue['createdDate'] = $now;
            $issue['PRJ']         = $this->session->PRJ;
            $issue['status']      = 'unconfirmed';

            if($issue['assignedTo'])
            {
                $issue['assignedBy']   = $this->app->user->account;
                $issue['assignedDate'] = $now;
            }

            if(empty($issue['title']))    die(js::error(sprintf($this->lang->issue->titleEmpty, $index)));
            if(empty($issue['type']))     die(js::error(sprintf($this->lang->issue->typeEmpty, $index)));
            if(empty($issue['severity'])) die(js::error(sprintf($this->lang->issue->severityEmpty, $index)));

            $issues[] = $issue;
        }

        $issueIdList = array();
        foreach($issues as $issue)
        {
            $this->dao->insert(TABLE_ISSUE)->data($issue)->exec();
            $issueIdList[] = $this->dao->lastInsertId();
        }

        return $issueIdList;
    }

    /**
     * Resolve an issue.
     *
     * @param  int    $issueID
     * @param  object $data
     * @access public
     * @return void
     */
    public function resolve($issueID, $data)
    {
        $issue = new stdClass();
        $issue->resolution        = $data->resolution;
        $issue->resolutionComment = isset($data->resolutionComment) ? $data->resolutionComment : '';
        $issue->resolvedBy        = $data->resolvedBy;
        $issue->resolvedDate      = $data->resolvedDate;
        $issue->status            = 'resolved';
        $issue->editedBy          = $this->app->user->account;
        $issue->editedDate        = helper::now();

        $this->dao->update(TABLE_ISSUE)->data($issue)->where('id')->eq($issueID)->exec();
    }

    /**
     * Create an task.
     *
     * @access public
     * @return object
     */
    public function createTask()
    {
        $projectID = $this->post->project;
        $tasks     = $this->loadModel('task')->create($projectID);
        if(dao::isError()) return false;

        $task = current($tasks);
        return $task['id'];
    }

    /**
     * Create a story.
     *
     * @access public
     * @return int
     */
    public function createStory()
    {
        $storyResult = $this->loadModel('story')->create();
        if(dao::isError()) return false;
        return $storyResult['id'];
    }

    /**
     * Create a bug.
     *
     * @access public
     * @return int
     */
    public function createBug()
    {
        $bugResult = $this->loadModel('bug')->create();
        if(dao::isError()) return false;
        return $bugResult['id'];
    }

    /**
     * Create a risk.
     *
     * @access public
     * @return int
     */
    public function createRisk()
    {
        $riskID = $this->loadModel('risk')->create();
        if(dao::isError()) return false;
        return $riskID;
    }

   /**
     * Build issue search form.
     *
     * @param  string $actionURL
     * @param  int    $queryID
     * @access public
     * @return void
     */
    public function buildSearchForm($actionURL, $queryID)
    {
        $this->config->issue->search['actionURL'] = $actionURL;
        $this->config->issue->search['queryID']   = $queryID;

        $this->loadModel('search')->setSearchParams($this->config->issue->search);
    }

    /**
     * Adjust the action is clickable.
     *
     * @param  object  $issue
     * @param  string  $action
     *
     * @access public
     * @return bool
     */
    public static function isClickable($issue, $action)
    {
        $action = strtolower($action);

        if($action == 'confirm')  return $issue->status == 'unconfirmed';
        if($action == 'resolve')  return $issue->status == 'active' || $issue->status == 'confirmed';
        if($action == 'close')    return $issue->status != 'closed';
        if($action == 'activate') return $issue->status == 'closed';
        if($action == 'cancel')   return $issue->status != 'canceled' && $issue->status != 'closed';
        if($action == 'assignto') return $issue->status != 'closed';

        return true;
    }
}
