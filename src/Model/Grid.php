<?php
/**
 * Этот файл является частью расширения модуля веб-приложения GearMagic.
 * 
 * @link https://gearmagic.ru
 * @copyright Copyright (c) 2015 Веб-студия GearMagic
 * @license https://gearmagic.ru/license/
 */

namespace Gm\Backend\References\FolderProfiles\Model;

use Gm\Db\Sql;
use Gm\Panel\Data\Model\GridModel;

/**
 * Модель данных профилей медиапапок.
 * 
 * @author Anton Tivonenko <anton.tivonenko@gmail.com>
 * @package Gm\Backend\References\FolderProfiles\Model
 * @since 1.0
 */
class Grid extends GridModel
{
    /**
     * {@inheritdoc}
     */
    public function getDataManagerConfig(): array
    {
        return [
            'useAudit'   => true,
            'tableName'  => '{{reference_folder_profiles}}',
            'primaryKey' => 'id',
            'order'      => ['name' => 'ASC'],
            'fields'     => [
                ['id'],
                ['name'], // название
                ['type_id', 'alias' => 'type'], // тип
                ['typeName', 'direct' => 'types.name'], // имя типа
                ['typeIcon'], // значок типа
                ['options'], // описание
                ['enabled'], // доступен
            ],
            'resetIncrements' => ['{{reference_folder_profiles}}']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function init(): void
    {
        parent::init();

        $this
            ->on(self::EVENT_AFTER_DELETE, function ($someRecords, $result, $message) {
                // всплывающие сообщение
                $this->response()
                    ->meta
                        ->cmdPopupMsg($message['message'], $message['title'], $message['type']);
                /** @var \Gm\Panel\Controller\GridController $controller */
                $controller = $this->controller();
                // обновить список
                $controller->cmdReloadGrid();
            });
    }

    /**
     * {@inheritdoc}
     */
    public function prepareRow(array &$row): void
    {
        // заголовок контекстного меню записи
        $row['popupMenuTitle'] = $row['name'];
    }

    /**
     * {@inheritdoc}
     */
    public function selectAll(string $tableName = null): array
    {
        /** @var \Gm\Db\Sql\Select $select */
        $select = new Sql\Select();
        $select
            ->from(['profiles' => $this->dataManager->tableName])
            ->columns(['*'], true)
            ->quantifier(new Sql\Expression('SQL_CALC_FOUND_ROWS'))
            ->join(
                ['types' => '{{reference_media_types}}'],
                'types.id = profiles.type_id',
                ['typeName' => 'name', 'typeIcon' => 'icon'],
                Sql\Select::JOIN_LEFT
            );

        /** @var \Gm\Db\Adapter\Driver\AbstractCommand $command */
        $command = $this->buildQuery($select);
        $this->beforeFetchRows();
        $rows = $this->fetchRows($command);
        $rows = $this->afterFetchRows($rows);
        return $this->afterSelect($rows, $command);
    }
}
