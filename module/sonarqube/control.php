<?php
/**
 * The control file of sonarqube module of ZenTaoPMS.
 *
 * @copyright   Copyright 2009-2022 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Yanyi Cao <caoyanyi@easycorp.ltd>
 * @package     sonarqube
 * @version     $Id: ${FILE_NAME} 5144 2022/1/11 8:55 上午 caoyanyi@easycorp.ltd $
 * @link        http://www.zentao.net
 */
class sonarqube extends control
{
    /**
     * Browse sonarqube.
     *
     * @param  string $orderBy
     * @param  int    $recTotal
     * @param  int    $recPerPage
     * @param  int    $pageID
     * @access public
     * @return void
     */
    public function browse($orderBy = 'id_desc', $recTotal = 0, $recPerPage = 20, $pageID = 1)
    {
        $this->app->loadClass('pager', $static = true);
        $pager = new pager($recTotal, $recPerPage, $pageID);

        $sonarqubeList = $this->sonarqube->getList($orderBy, $pager);

        $this->view->title         = $this->lang->sonarqube->common . $this->lang->colon . $this->lang->sonarqube->browse;
        $this->view->sonarqubeList = $sonarqubeList;
        $this->view->orderBy       = $orderBy;
        $this->view->pager         = $pager;

        $this->display();
    }

    /**
     * Ajax get project list.
     *
     * @param  int    $engine
     * @access public
     * @return void
     */
    public function ajaxGetProjectList($sonarqubeID)
    {
        $projectList  = $this->loadModel('sonarqube')->getList($sonarqubeID);
        $projectPairs = array(0 => '');
        foreach($projectList as $project)
        {
            $projectPairs[$project->id] = $project->name;
        }
        echo html::select('projectKey', $projectPairs, '', "class='form-control chosen' required");
    }
    
    /**
     * create a sonarqube.
     *
     * @access public
     * @return void
     */
    public function create()
    {
        if($_POST)
        {
            $this->checkToken();
            $sonarqubeID = $this->loadModel('pipeline')->create('sonarqube');

            if(dao::isError()) return $this->send(array('result' => 'fail', 'message' => dao::getError()));
            $actionID = $this->loadModel('action')->create('sonarqube', $sonarqubeID, 'created');
            return $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess, 'locate' => inlink('browse')));
        }

        $this->view->title = $this->lang->sonarqube->common . $this->lang->colon . $this->lang->sonarqube->createServer;

        $this->display();
    }

    /**
     * Check post info.
     *
     * @access protected
     * @return void
     */
    protected function checkToken()
    {
        $sonarqube = fixer::input('post')->get();
        $this->dao->update('sonarqube')->data($sonarqube)->batchCheck($this->config->sonarqube->create->requiredFields, 'notempty');
        if(dao::isError()) return $this->send(array('result' => 'fail', 'message' => dao::getError()));
        if(strpos($sonarqube->url, 'http') !== 0) return $this->send(array('result' => 'fail', 'message' => array('url' => array($this->lang->sonarqube->hostError))));

        /* Check name and url unique. */
        $isExist = $this->dao->select('*')->from(TABLE_PIPELINE)->where("name='{$sonarqube->name}' or url='{$sonarqube->url}'")->fetch();
        if($isExist) return $this->send(array('result' => 'fail', 'message' => $this->lang->sonarqube->repeatError));

        $token  = base64_encode("{$sonarqube->account}:{$sonarqube->password}");
        $result = $this->sonarqube->apiValidate($sonarqube->url, $token);

        if(!isset($result->valid) or !$result->valid) return $this->send(array('result' => 'fail', 'message' => array('token' => array($this->lang->sonarqube->validError))));
        $this->post->set('token', $token);
    }

    /**
     * Exec job.
     *
     * @param  int    $jobID
     * @access public
     * @return void
     */
    public function execJob($jobID)
    {
        echo $this->fetch('job', 'exec', "jobID=$jobID");
    }

    /**
     * Delete a sonarqube.
     *
     * @param  int    $sonarqubeID
     * @access public
     * @return void
     */
    public function delete($sonarqubeID, $confirm = 'no')
    {
        if($confirm != 'yes') die(js::confirm($this->lang->sonarqube->confirmDelete, inlink('delete', "id=$sonarqubeID&confirm=yes")));

        $oldSonarQube = $this->sonarqube->getByID($sonarqubeID);
        $this->loadModel('action');
        $this->sonarqube->delete(TABLE_PIPELINE, $sonarqubeID);

        $sonarQube = $this->sonarqube->getByID($sonarqubeID);
        $actionID  = $this->action->create('sonarqube', $sonarqubeID, 'deleted');
        $changes   = common::createChanges($oldSonarQube, $sonarQube);
        $this->action->logHistory($actionID, $changes);
        echo js::reload('parent');
    }
}
