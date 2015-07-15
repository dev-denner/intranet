<?php

/**
 *
 * @author      Denner Fernandes <denners777@hotmail.com>
 * @since       10/07/2015 16:15:34
 *
 */
use Phalcon\Db\Column;
use Phalcon\Db\Index;
use Phalcon\Db\Reference;
use Tools\Builder\Mvc\Model\Migration;

class AppsMigration_1001 extends Migration {

  public function up() {
    $this->morphTable(
            'apps', array(
        'columns' => array(
            new Column('ID', array(
                'type' => Column::TYPE_INTEGER,
                'unsigned' => true,
                'notNull' => true,
                'autoIncrement' => true,
                'size' => 11,
                'first' => true
                    )
            ),
            new Column('CONTROLLER', array(
                'type' => Column::TYPE_VARCHAR,
                'notNull' => true,
                'size' => 20,
                'after' => 'ID'
                    )
            ),
            new Column('NAME', array(
                'type' => Column::TYPE_VARCHAR,
                'size' => 45,
                'after' => 'CONTROLLER'
                    )
            ),
            new Column('MODULE', array(
                'type' => Column::TYPE_INTEGER,
                'unsigned' => true,
                'notNull' => true,
                'size' => 11,
                'after' => 'NAME'
                    )
            ),
            new Column('SOFTDEL', array(
                'type' => Column::TYPE_VARCHAR,
                'size' => 1,
                'after' => 'MODULE'
                    )
            ),
            new Column('USERCREATE', array(
                'type' => Column::TYPE_INTEGER,
                'unsigned' => true,
                'size' => 11,
                'after' => 'SOFTDEL'
                    )
            ),
            new Column('DATECREATE', array(
                'type' => Column::TYPE_DATETIME,
                'size' => 6,
                'after' => 'USERCREATE'
                    )
            ),
            new Column('USERUPDATE', array(
                'type' => Column::TYPE_INTEGER,
                'unsigned' => true,
                'size' => 11,
                'after' => 'DATECREATE'
                    )
            ),
            new Column('DATEUPDATE', array(
                'type' => Column::TYPE_DATETIME,
                'size' => 6,
                'after' => 'USERUPDATE'
                    )
            )
        ),
        'indexes' => array(
            new Index('PRIMARY', array('ID')),
            new Index('APPS_MODULES', array('MODULE')),
            new Index('APPS_USERS1_IDX', array('USERCREATE')),
            new Index('APPS_USERS2_IDX', array('USERUPDATE'))
        ),
        'references' => array(
            new Reference('APPS_MODULES', array(
                'referencedSchema' => 'mpeapi',
                'referencedTable' => 'modules',
                'columns' => array('MODULE'),
                'referencedColumns' => array('ID')
                    )),
            new Reference('APPS_USERS1', array(
                'referencedSchema' => 'mpeapi',
                'referencedTable' => 'users',
                'columns' => array('USERCREATE'),
                'referencedColumns' => array('ID')
                    )),
            new Reference('APPS_USERS2', array(
                'referencedSchema' => 'mpeapi',
                'referencedTable' => 'users',
                'columns' => array('USERUPDATE'),
                'referencedColumns' => array('ID')
                    ))
        ),
        'options' => array(
            'TABLE_TYPE' => 'BASE TABLE',
            'AUTO_INCREMENT' => '1',
            'ENGINE' => 'InnoDB',
            'TABLE_COLLATION' => 'utf8_general_ci'
        )
            )
    );
  }

}
