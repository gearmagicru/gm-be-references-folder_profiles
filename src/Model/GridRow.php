<?php
/**
 * Этот файл является частью расширения модуля веб-приложения GearMagic.
 * 
 * @link https://gearmagic.ru
 * @copyright Copyright (c) 2015 Веб-студия GearMagic
 * @license https://gearmagic.ru/license/
 */

namespace Gm\Backend\References\FolderProfiles\Model;

use Gm\Panel\Data\Model\FormModel;

/**
 * Модель данных профиля папки.
 * 
 * @author Anton Tivonenko <anton.tivonenko@gmail.com>
 * @package Gm\Backend\References\FolderProfiles\Model
 * @since 1.0
 */
class GridRow extends FormModel
{
     /**
     * {@inheritdoc}
     */
    public function getDataManagerConfig(): array
    {
        return [
            'tableName'  => '{{reference_folder_profiles}}',
            'primaryKey' => 'id',
            'fields'     => [
                ['id'],
                ['name'], // название
                ['enabled'] // доступен
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function init(): void
    {
        parent::init();

        $this
            ->on(self::EVENT_AFTER_SAVE, function ($isInsert, $columns, $result, $message) {
                if ($message['success']) {
                    $enabled = (int) $this->enabled;
                    $message['message'] = $this->module->t('Folder profile «{0}» - ' . ($enabled > 0 ? 'enabled' : 'disabled'), [$this->name]);
                    $message['title']   = $this->t($enabled > 0 ? 'Enabled' : 'Disabled');
                }
                // всплывающие сообщение
                $this->response()
                    ->meta
                        ->cmdPopupMsg($message['message'], $message['title'], $message['type']);
            });
    }
}
