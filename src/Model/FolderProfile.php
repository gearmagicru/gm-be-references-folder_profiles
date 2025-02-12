<?php
/**
 * Этот файл является частью модуля веб-приложения GearMagic.
 * 
 * @link https://gearmagic.ru
 * @copyright Copyright (c) 2015 Веб-студия GearMagic
 * @license https://gearmagic.ru/license/
 */

namespace Gm\Backend\References\FolderProfiles\Model;

use Gm\Helper\Json;
use Gm\Db\ActiveRecord;
use Gm\Stdlib\Collection;

/**
 * Активная запись профиля медиапапки.
 * 
 * @author Anton Tivonenko <anton.tivonenko@gmail.com>
 * @package  Gm\Backend\References\FolderProfiles\Model
 * @since 1.0
 */
class FolderProfile extends ActiveRecord
{
    use FolderOptionsTrait;

    /**
     * {@inheritdoc}
     */
    public function primaryKey(): string
    {
        return 'id';
    }

    /**
     * {@inheritdoc}
     */
    public function tableName(): string
    {
        return '{{reference_folder_profiles}}';
    }

    /**
     * {@inheritdoc}
     */
    public function maskedAttributes(): array
    {
        return [
            'id'      => 'id',
            'typeId'  => 'type_id', // идент. типа медиаданных
            'type'    => 'type', // тип медиаданных: image, file, document...
            'name'    => 'name', // название
            'options' => 'options', // параметры
            'enabled' => 'enabled' // доступен
        ];
    }

    /**
     * Проверяет, доступен ли профиль папки.
     *
     * @return bool
     */
    public function isEnabled(): bool
    {
        return boolval($this->enabled);
    }

    /**
     * Возвращает запись по указанному значению первичного ключа.
     * 
     * @see ActiveRecord::selectByPk()
     * 
     * @param mixed $identifier Идентификатор записи.
     * 
     * @return FolderProfile|null Активная запись при успешном запросе, иначе `null`.
     */
    public function get(mixed $identifier): ?self
    {
        return $this->selectByPk($identifier);
    }

    /**
     * Возращает значение для сохранения в поле "options".
     * 
     * @return string
     */
    public function unOptions(): string
    {
        /** @var null|string|array $options */
        $options = $this->options;
        if ($options) {
            if (is_array($options)) {
                // allowedExtensions
                if (!empty($options['allowedExtensions'])) {
                    $value = json_decode($options['allowedExtensions']);
                    $options['allowedExtensions'] = implode(',', $value);
                }
            }
            return Json::encode($options);
        }
        return '';
    }

    /**
     * @var Collection
     */
    protected Collection $_options;

    /**
     * Возвращает параметры профиля медиапапки.
     * 
     * @return Collection
     */
    public function getOptions(): Collection
    {
        if (isset($this->_options)) {
            return $this->_options;
        }

        /** @var null|string|array $options */
        $options = $this->getAttribute('options') ?: [];
        if ($options) {
            if (is_string($options))
                $options = Json::decode($options, true);
            else
                $options = (array) $this->options;
            $options = $this->formatOptions($this->getOptionsFormat(), $options ?: []);
        }
        return $this->_options = Collection::createInstance($options);
    }

    /**
     * Проверяет указанное разрешение для профиля медиапапки.
     * 
     * @param string $permission Разрешение, например: 'upload', 'download', 'delete', 
     *     'createFile', 'createFolder', 'compress', 'extract', 'rename', 'editFile', 
     *     'viewFile', 'editPerms', 'viewAttr'.
     * 
     * @return bool
     */
    public function can(string $permission): bool
    {
        return $this->getOptions()->getValue('can' . ucfirst($permission), false);
    }
}
