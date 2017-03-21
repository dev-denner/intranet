<?php

/**
 * @copyright   2015 Grupo MPE
 * @license     New BSD License; see LICENSE
 * @link        http://www.grupompe.com.br
 * @author      Denner Fernandes <denner.fernandes@grupompe.com.br>
 * */

namespace App\Modules\Nucleo\Models;

use App\Shared\Models\ModelBase;
use App\Shared\Models\beforeCreate;
use App\Shared\Models\beforeUpdate;

class BasePerfils extends ModelBase
{

    use beforeCreate;

    use beforeUpdate;

    /**
     *
     * @var integer
     */
    protected $id;

    /**
     *
     * @var integer
     */
    protected $module;

    /**
     *
     * @var integer
     */
    protected $controller;

    /**
     *
     * @var integer
     */
    protected $action;

    /**
     *
     * @var string
     */
    protected $sdel;

    /**
     *
     * @var string
     */
    protected $createBy;

    /**
     *
     * @var string
     */
    protected $createIn;

    /**
     *
     * @var string
     */
    protected $updateBy;

    /**
     *
     * @var string
     */
    protected $updateIn;

    /**
     * Method to set the value of field id
     *
     * @param integer $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Method to set the value of field module
     *
     * @param integer $module
     * @return $this
     */
    public function setModule($module)
    {
        $this->module = $module;

        return $this;
    }

    /**
     * Method to set the value of field controller
     *
     * @param integer $controller
     * @return $this
     */
    public function setController($controller)
    {
        $this->controller = $controller;

        return $this;
    }

    /**
     * Method to set the value of field action
     *
     * @param integer $action
     * @return $this
     */
    public function setAction($action)
    {
        $this->action = $action;

        return $this;
    }

    /**
     * Method to set the value of field sdel
     *
     * @param string $sdel
     * @return $this
     */
    public function setSdel($sdel)
    {
        $this->sdel = $sdel;

        return $this;
    }

    /**
     * Method to set the value of field createBy
     *
     * @param string $createBy
     * @return $this
     */
    public function setCreateBy($createBy)
    {
        $this->createBy = $createBy;

        return $this;
    }

    /**
     * Method to set the value of field createIn
     *
     * @param string $createIn
     * @return $this
     */
    public function setCreateIn($createIn)
    {
        $this->createIn = $createIn;

        return $this;
    }

    /**
     * Method to set the value of field updateBy
     *
     * @param string $updateBy
     * @return $this
     */
    public function setUpdateBy($updateBy)
    {
        $this->updateBy = $updateBy;

        return $this;
    }

    /**
     * Method to set the value of field updateIn
     *
     * @param string $updateIn
     * @return $this
     */
    public function setUpdateIn($updateIn)
    {
        $this->updateIn = $updateIn;

        return $this;
    }

    /**
     * Returns the value of field id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns the value of field module
     *
     * @return integer
     */
    public function getModule()
    {
        return $this->module;
    }

    /**
     * Returns the value of field controller
     *
     * @return integer
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * Returns the value of field action
     *
     * @return integer
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Returns the value of field sdel
     *
     * @return string
     */
    public function getSdel()
    {
        return $this->sdel;
    }

    /**
     * Returns the value of field createBy
     *
     * @return string
     */
    public function getCreateBy()
    {
        return $this->createBy;
    }

    /**
     * Returns the value of field createIn
     *
     * @return string
     */
    public function getCreateIn()
    {
        return $this->createIn;
    }

    /**
     * Returns the value of field updateBy
     *
     * @return string
     */
    public function getUpdateBy()
    {
        return $this->updateBy;
    }

    /**
     * Returns the value of field updateIn
     *
     * @return string
     */
    public function getUpdateIn()
    {
        return $this->updateIn;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {

        parent::initialize();

        $this->belongsTo('module', __NAMESPACE__ . '\Modules', 'id', ['alias' => 'Modules']);
        $this->belongsTo('controller', __NAMESPACE__ . '\Controllers', 'id', ['alias' => 'Controllers']);
        $this->belongsTo('action', __NAMESPACE__ . '\Actions', 'id', ['alias' => 'Actions']);

        $this->addBehavior(new \Phalcon\Mvc\Model\Behavior\SoftDelete([
            'field' => 'sdel',
            'value' => '*'
        ]));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'BASE_PERFIL';
    }

    /**
     * Independent Column Mapping.
     * Keys are the real names in the table and the values their names in the application
     *
     * @return array
     */
    public static function columnMap()
    {
        return array(
            'ID_BASE_PERFIL' => 'id',
            'CD_MODULO' => 'module',
            'CD_CONTROLADOR' => 'controller',
            'CD_ACAO' => 'action',
            'SDEL' => 'sdel',
            'CREATEBY' => 'createBy',
            'CREATEIN' => 'createIn',
            'UPDATEBY' => 'updateBy',
            'UPDATEIN' => 'updateIn'
        );
    }

    public static function getDeleted()
    {
        return 'sdel';
    }

}