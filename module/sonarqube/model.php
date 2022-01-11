<?php
/**
 * The model file of sonarqube module of ZenTaoPMS.
 *
 * @copyright   Copyright 2009-2022 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Yanyi Cao <caoyanyi@easycorp.ltd>
 * @package     sonarqube
 * @version     $Id: $
 * @link        http://www.zentao.net
 */

class sonarqubeModel extends model
{

    /**
     * Get sonarqube list.
     *
     * @param  string $orderBy
     * @param  object $pager
     * @access public
     * @return array
     */
    public function getList($orderBy = 'id_desc', $pager = null)
    {
        $sonarqubeList = $this->loadModel('pipeline')->getList('sonarqube', $orderBy, $pager);

        return $sonarqubeList;
    }

    /**
     * check sonarqube valid
     *
     * @param string $host
     * @param string $token
     * @access public
     * @return array
     */
    public function apiValidate($host, $token)
    {
        $url    = rtrim($host, '/') . "/api/authentication/validate";
        $header = 'Authorization: Basic ' . $token;
        return json_decode(commonModel::http($url, null, array(), $header));
    }
}
