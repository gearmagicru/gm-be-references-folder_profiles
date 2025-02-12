<?php
/**
 * Этот файл является частью модуля веб-приложения GearMagic.
 * 
 * @link https://gearmagic.ru
 * @copyright Copyright (c) 2015 Веб-студия GearMagic
 * @license https://gearmagic.ru/license/
 */

namespace Gm\Backend\References\FolderProfiles\Model;

use Gm\Db\Sql;
use Gm\Panel\Data\Model\Combo\ComboModel;

/**
 * Модель данных выпадающего списк профилей папок.
 * 
 * @author Anton Tivonenko <anton.tivonenko@gmail.com>
 * @package Gm\Backend\References\FolderProfiles\Model
 * @since 1.0
 */
class FolderProfileCombo extends ComboModel
{
    /**
     * {@inheritdoc}
     */
    public function getDataManagerConfig(): array
    {
        return [
            'tableName'  => '{{reference_folder_profiles}}',
            'primaryKey' => 'id',
            'searchBy'   => 'name',
            'order'      => ['name' => 'ASC'],
            'fields'     => [
                ['id'],
                ['name']
            ]
        ];
    }

   /**
     * {@inheritdoc}
     */
    public function buildFilter(Sql\AbstractSql $operator): void
    {
        // только доступные профили папок
        $operator->where(['enabled' => 1]);

        parent::buildFilter($operator);
    }
}