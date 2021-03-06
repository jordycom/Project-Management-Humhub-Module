<?php

namespace humhub\modules\project_management\models;

use Yii;
use humhub\modules\user\models\User;
use humhub\modules\content\components\ContentActiveRecord;

/**
 * This is the model class for table "project_management_tasks".
 *
 * The followings are the available columns in table 'project_management_tasks':
 * @property integer $id
 * @property string $title
 * @property string $deadline
 * @property enum $priority
 * @property integer $project_id
 * @property string $created_at
 * @property integer $created_by
 **/
class Tasks extends ContentActiveRecord implements \humhub\modules\search\interfaces\Searchable
{

    public $ownerGuid = "";

    public static function tableName()
    {
        return 'project_management_tasks';
    }

    public function rules()
    {
        
        return array(
            array(['id'], 'required')
        );
    }

    public function formName()
    {
        return 'Tasks';
    }
    
    public function getUrl()
    {
        return $this->content->container->createUrl('/project_management/views/tasks', array('id' => $this->id));
    }

    /**
     * @inheritdoc
     */
    public function getContentName()
    {
        return Yii::t('ProjectManagementModule.models_Tasks', 'Tasks');
    }

    /**
     * @inheritdoc
     */
    public function getContentDescription()
    {
        return $this->title;
    }

    /**
     * @inheritdoc
     */
    public function getSearchAttributes()
    {
        return array(
            'id' => $this->id,
        );
    }

}
