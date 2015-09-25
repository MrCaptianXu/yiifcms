<?php
/**
 *  用户列表
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved.
 */

class IndexAction extends CAction
{	
	public function run(){
        $model = new User();
        
        //条件
        $criteria = new CDbCriteria();       
        $groupid  = intval( Yii::app()->request->getParam( 'groupid' ) );
        $username = trim( Yii::app()->request->getParam( 'username' ) );        
        $groupid > 0 && $criteria->addColumnCondition(array('groupid' => $groupid));
        $criteria->addSearchCondition('username', $username);
        $criteria->order = 'uid ASC';        
        $count = $model->count($criteria);
        
        //分页
        $pages = new CPagination($count);
        $pages->pageSize = 10;
        $pages->applyLimit($criteria);
        
        //查询
        $result = $model->findAll($criteria);
        $this->controller->render('index', array ('datalist' => $result , 'pagebar' => $pages ));
	}
}