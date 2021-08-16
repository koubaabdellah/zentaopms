<?php
class mr extends control
{
    public function browse($objectID = 0, $orderBy = 'id_desc', $recTotal = 0, $recPerPage = 20, $pageID = 1)
    {
        $this->loadModel('repo');

        $repoList = $this->repo->getList(0, $orderBy);
        foreach($repoList as $id => $repo)
        {
            if(strtolower($repo->SCM) != 'gitlab') unset($repoList[$id]);
        }

        /* Pager. */
        $this->app->loadClass('pager', $static = true);
        $recTotal   = count($repoList);
        $pager      = new pager($recTotal, $recPerPage, $pageID);
        $repoList   = array_chunk($repoList, $pager->recPerPage);

        $this->view->title      = $this->lang->repo->common . $this->lang->colon . $this->lang->repo->browse;
        $this->view->position[] = $this->lang->repo->common;
        $this->view->position[] = $this->lang->repo->browse;

        $this->view->orderBy  = $orderBy;
        $this->view->objectID = $objectID;
        $this->view->pager    = $pager;
        $this->view->repoList = empty($repoList) ? $repoList: $repoList[$pageID - 1];;
        $this->view->products = $this->loadModel('product')->getPairs();

        $this->display();
    }

    public function list($repoID)
    {
        $gitlab = $this->mr->getGitlabProjectByRepo($repoID);
        $resp   = $this->mr->apiGetMRList($gitlab->gitlabID, $gitlab->projectID);
        a($resp);
        return $resp;
    }

    public function create()
    {
        $this->loadModel('repo');
        if($_POST)
        {
            $mrID = $this->mr->create();

            if(dao::isError()) return $this->send(array('result' => 'fail', 'message' => dao::getError()));

            if($this->viewType == 'json') return $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess, 'id' => $repoID));
            $link = helper::createLink('mr', 'browse', '', '', false);
            return $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess, 'locate' => $link));
        }

        $this->view->title       = $this->lang->mr->create;
        $this->view->gitlabHosts = $this->loadModel('gitlab')->getPairs();

        $this->display();
    }

    public function delete()
    {
    }

    public function update()
    {
    }
}

