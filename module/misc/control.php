<?php
/**
 * The control file of misc of ZenTaoPMS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     misc
 * @version     $Id: control.php 5128 2013-07-13 08:59:49Z chencongzhi520@gmail.com $
 * @link        http://www.zentao.net
 */
class misc extends control
{
    /**
     * Ping the server every 5 minutes to keep the session.
     * 
     * @access public
     * @return void
     */
    public function ping()
    {
        if(mt_rand(0, 1) == 1) $this->loadModel('setting')->setSN();
        die("<html><head><meta http-equiv='refresh' content='600' /></head><body></body></html>");
    }

    /**
     * Show php info.
     * 
     * @access public
     * @return void
     */
    public function phpinfo()
    {
        die(phpinfo());
    }

    /**
     * Show about info of zentao.
     * 
     * @access public
     * @return void
     */
    public function about()
    {
        die($this->display());
    }

    /**
     * Update nl.
     * 
     * @access public
     * @return void
     */
    public function updateNL()
    {
        $this->loadModel('upgrade')->updateNL();
    }

    /**
     * Check current version is latest or not.
     * 
     * @param  string    $sn 
     * @access public
     * @return void
     */
    public function checkUpdate($sn = '')
    {
        session_write_close();
        $link = $this->lang->misc->api . "/updater-getLatest-{$this->config->version}-zentao.html?lang=" . str_replace('-', '_', $this->app->getClientLang());
        $latestVersionList = common::http($link);
        $this->loadModel('setting')->setItem('system.common.global.latestVersionList', $latestVersionList);
    }

    /**
     * Check model extension logic
     * 
     * @access public
     * @return void
     */
    public function checkExtension()
    {
        echo $this->misc->hello();
        echo $this->misc->hello2();
    }

    /**
     * Down notify.
     * 
     * @access public
     * @return void
     */
    public function downNotify()
    {
        $notifyDir = $this->app->getBasePath() . 'tmp/cache/notify/';
        if(!is_dir($notifyDir))mkdir($notifyDir, 0755, true);

        $account     = $this->app->user->account;
        $packageFile = $notifyDir . $account . 'notify.zip';
        $loginFile   = $notifyDir . 'config.json';

        /* write login info into tmp file. */
        $loginInfo = new stdclass();
        $userInfo  = new stdclass();
        $userInfo->Account        = $account;
        $userInfo->Url            = common::getSysURL() . $this->config->webRoot;
        $userInfo->PassMd5        = '';
        $userInfo->Role           = $this->app->user->role;
        $userInfo->AutoSignIn     = true;
        $userInfo->Lang           = $this->cookie->lang;
        $loginInfo->User          = $userInfo;
        $loginInfo->LastLoginTime = time() / 86400 + 25569;
        $loginInfo = json_encode($loginInfo);

        file_put_contents($packageFile, file_get_contents("http://dl.cnezsoft.com/notify/newest/zentaonotify.win_32.zip"));
        file_put_contents($loginFile, $loginInfo);

        define('PCLZIP_TEMPORARY_DIR', $notifyDir);
        $this->app->loadClass('pclzip', true);

        /* remove the old config.json, add a new one. */
        $archive = new pclzip($packageFile);
        $result = $archive->delete(PCLZIP_OPT_BY_NAME, 'config.json');
        if($result == 0) die("Error : " . $archive->errorInfo(true));

        $result = $archive->add($loginFile, PCLZIP_OPT_REMOVE_ALL_PATH, PCLZIP_OPT_ADD_PATH, 'notify');
        if($result == 0) die("Error : " . $archive->errorInfo(true));
        
        $zipContent = file_get_contents($packageFile);
        unlink($loginFile);
        unlink($packageFile);
        $this->fetch('file', 'sendDownHeader', array('fileName' => 'notify.zip', 'zip', $zipContent));
    }

    /**
     * Create qrcode for mobile login.
     * 
     * @access public
     * @return void
     */
    public function qrCode()
    {
        $loginAPI = common::getSysURL() . $this->config->webRoot;
        $session  = $this->loadModel('user')->isLogon() ? '?' . $this->config->sessionVar . '=' . session_id() : '';

        if(!extension_loaded('gd'))
        {
            $this->view->noGDLib = sprintf($this->lang->misc->noGDLib, $loginAPI);
            die($this->display());
        }

        $this->app->loadClass('qrcode');
        QRcode::png($loginAPI . $session, false, 4, 9);
    }

    /**
     * Ajax ignore browser.
     * 
     * @access public
     * @return void
     */
    public function ajaxIgnoreBrowser()
    {
        $this->loadModel('setting')->setItem($this->app->user->account . '.common.global.browserNotice', 'true');
    }

    /**
     * Show version changelog
     * @access public
     * @return viod
     */
    public function changeLog($version = '')
    {
        if(empty($version)) $version  = key($this->lang->misc->feature->all);
        $this->view->version  = $version;
        $this->view->features = zget($this->lang->misc->feature->all, $version, '');

        $detailed      = '';
        $changeLogFile = $this->app->getBasePath() . 'doc' . DS . 'CHANGELOG';
        if(file_exists($changeLogFile))
        {
            $handle = fopen($changeLogFile, 'r');
            $tag    = false;
            while($line = fgets($handle))
            {
                $line = trim($line);
                if($tag and empty($line)) break;
                if($tag) $detailed .= $line . '<br />';

                if(preg_match("/{$version}$/", $line) > 0) $tag = true;
            }
            fclose($handle);
        }
        $this->view->detailed = $detailed;
        $this->display();
    }

    /**
     * Check net connect.
     * 
     * @access public
     * @return void
     */
    public function checkNetConnect()
    {
        $this->app->loadConfig('extension');
        $check = @fopen(dirname($this->config->extension->apiRoot), "r");
        die($check ? 'success' : 'fail');
    }

    /**
     * Ajax set unfoldID.
     * 
     * @param  int    $objectID 
     * @param  string $objectType 
     * @param  string $action       add|delete
     * @access public
     * @return void
     */
    public function ajaxSetUnfoldID($objectID, $objectType, $action = 'add')
    {
        $account = $this->app->user->account;
        if($objectType == 'project')
        {
            $condition   = "owner={$account}&module=project&section=task&key=unfoldTasks";
            $settingPath = $account . ".project.task.unfoldTasks";
        }
        else
        {
            $condition   = "owner={$account}&module=product&section=browse&key=unfoldStories";
            $settingPath = $account . ".product.browse.unfoldStories";
        }

        $this->loadModel('setting');
        $setting     = $this->setting->createDAO($this->setting->parseItemParam($condition), 'select')->fetch();
        $newUnfoldID = $this->post->newUnfoldID;
        if(empty($newUnfoldID)) die();

        $newUnfoldID  = json_decode($newUnfoldID);
        $unfoldIdList = $setting ? json_decode($setting->value, true) : array();
        foreach($newUnfoldID as $unfoldID)
        {
            unset($unfoldIdList[$objectID][$unfoldID]);
            if($action == 'add') $unfoldIdList[$objectID][$unfoldID] = $unfoldID;
        }

        if(empty($setting))
        {
            $this->setting->setItem($settingPath, json_encode($unfoldIdList));
        }
        else
        {
            $this->dao->update(TABLE_CONFIG)->set('value')->eq(json_encode($unfoldIdList))->where('id')->eq($setting->id)->exec();
        }
        die('success');
    }
}
