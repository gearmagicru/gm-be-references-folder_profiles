<?php
/**
 * Этот файл является частью модуля веб-приложения GearMagic.
 * 
 * @link https://gearmagic.ru
 * @copyright Copyright (c) 2015 Веб-студия GearMagic
 * @license https://gearmagic.ru/license/
 */

 namespace Gm\Backend\References\FolderProfiles\Model;

/**
 * Трейт формата параметров медиапапки.
 * 
 * @author Anton Tivonenko <anton.tivonenko@gmail.com>
 * @package Gm\Backend\References\FolderProfiles\Model
 * @since 1.0
 */
trait FolderOptionsTrait
{
    /**
     * Возвращает формат параметров.
     * 
     * @return array
     */
    protected function getOptionsFormat(): array
    {
        return  [
            // вид
            ['showDirs', 'type' => 'int', 'default' => 0], // показывать подпапки
            ['showFilesInDirs', 'type' => 'int', 'default' => 0], // показывать файлы в подпапках
            ['showUnreadableDirs', 'type' => 'int', 'default' => 0], // показывать папки без доступа
            ['showVCSFiles', 'type' => 'int', 'default' => 0], // показывать файлы VCS
            ['showDotFiles', 'type' => 'int', 'default' => 0], // показывать файлы и папки с точкой
            ['showExtFiles', 'type' => 'int', 'default' => 0], // показывать файлы соответствующие папке
            // разрешения
            ['canUpload', 'type' => 'int', 'default' => 0], // загружать файлы
            ['canDownload', 'type' => 'int', 'default' => 0], // скачивать файлы
            ['canDelete', 'type' => 'int', 'default' => 0], // удалять файлы / папки
            ['canCreateFile', 'type' => 'int', 'default' => 0], // создавать файлы
            ['canCreateFolder', 'type' => 'int', 'default' => 0], // создавать папки
            ['canCompress', 'type' => 'int', 'default' => 0], // архивировать файлы / папки
            ['canExtract', 'type' => 'int', 'default' => 0], // разархивировать
            ['canRename', 'type' => 'int', 'default' => 0], // переименовывать файлы / папки
            ['canEditFile', 'type' => 'int', 'default' => 0], // редактировать файлы
            ['canViewFile', 'type' => 'int', 'default' => 0], // просматривать файлы 
            ['canEditPerms', 'type' => 'int', 'default' => 0], // изменять права доступа
            ['canViewAttr', 'type' => 'int', 'default' => 0], // просматривать атрибуты файлов / папок
            // загрузка
            ['checkFileExtension', 'type' => 'int', 'default' => 0], // проверять расширения файла
            ['checkMimeType', 'type' => 'int', 'default' => 0], // проверять MIME-тип
            ['allowedExtensions', 'type' => 'string', 'default' => ''], // проверяемые расширения файлов
            ['transliterateFilename', 'type' => 'int', 'default' => 0], // транслитерация имени файла
            ['uniqueFilename', 'type' => 'int', 'default' => 0], // формирование уникального имени файла
            ['escapeFilename', 'type' => 'int', 'default' => 0], // исключить спецсимволы
            ['lowercaseFilename', 'type' => 'int', 'default' => 0], // имя файла в нижнем регистре
            ['replaceFilenameChars', 'type' => 'string', 'default' => '-'], // заменить спецсимволы на символ
            ['maxFilenameLength', 'type' => 'int', 'default' => 255], // максимальная длина имени файла
            ['pathTemplate',  'type' => 'string', 'default' => ''], // шаблон папки
            ['createPath', 'type' => 'int', 'default' => 0], // создать папку и переместить туда файлы
            // изображение
            ['thumbWidth', 'type' => 'int', 'default' => 0], // макс. ширина, пкс.
            ['thumbHeight', 'type' => 'int', 'default' => 0], // макс. высота, пкс.
            ['thumbSlug', 'type' => 'string', 'default' => 'thumb'], // слаг
            ['thumbCrop', 'type' => 'int', 'default' => 0], // обрезать изображение по размеру
            ['thumbWatermark', 'type' => 'int', 'default' => 0], // водяной знак
            ['thumbCreate', 'type' => 'int', 'default' => 0], // создать
            ['mediumWidth', 'type' => 'int', 'default' => 0], // макс. ширина, пкс.
            ['mediumHeight', 'type' => 'int', 'default' => 0], // макс. высота, пкс.
            ['mediumSlug', 'type' => 'string', 'default' => 'medium'], // слаг
            ['mediumCrop', 'type' => 'int', 'default' => 0], // обрезать изображение по размеру
            ['mediumWatermark', 'type' => 'int', 'default' => 0], // водяной знак
            ['mediumCreate', 'type' => 'int', 'default' => 0], // создать
            ['largeWidth', 'type' => 'int', 'default' => 0], // макс. ширина, пкс.
            ['largeHeight', 'type' => 'int', 'default' => 0], // макс. высота, пкс.
            ['largeSlug', 'type' => 'string', 'default' => 'large'], // слаг
            ['largeCrop', 'type' => 'int', 'default' => 0], // обрезать изображение по размеру
            ['largeWatermark', 'type' => 'int', 'default' => 0], // водяной знак
            ['largeCreate', 'type' => 'int', 'default' => 0], // создать
            ['originalWidth', 'type' => 'int', 'default' => 0], // макс. ширина, пкс.
            ['originalHeight', 'type' => 'int', 'default' => 0], // макс. высота, пкс.
            ['originalCrop', 'type' => 'int', 'default' => 0], // обрезать изображение по размеру
            ['originalWatermark', 'type' => 'int', 'default' => 0], // водяной знак
            ['originalApply', 'type' => 'int', 'default' => 0], // создать
            ['watermarkFile', 'type' => 'string', 'default' => ''], // файл изображения водяного знака
            ['watermarkOpacity', 'type' => 'int', 'default' => 0], // прозрачность водяного знака
            ['watermarkPosition', 'type' => 'string', 'default' => ''], // положение водяного знака
            ['watermarkOffsetX', 'type' => 'int', 'default' => 0], // cмещение водяного знака по горизонтали
            ['watermarkOffsetY', 'type' => 'int', 'default' => 0] // cмещение водяного знака по вертикали
        ];
    }

    /**
     * Выполняет форматирование значений параметров в указанном формате.
     * 
     * @param array $format Формат параметров.
     * @param array $options Параметры в виде пар "ключ - значение".
     * 
     * @return array
     */
    protected function formatOptions(array $format, array $options): array
    {
        $result = [];
        foreach ($format as $param) {
            $name = $param[0];
            if (isset($options[$name])) {
                $value = $options[$name];
                $type  = $param['type'];
                settype($value, $type);
                $result[$name] = $value;
            } else
                $result[$name] = $param['default'];
        }
        return $result;
    }
}
