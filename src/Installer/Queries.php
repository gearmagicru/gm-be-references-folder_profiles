<?php
/**
 * Этот файл является частью расширения модуля веб-приложения GearMagic.
 * 
 * Файл конфигурации Карты SQL-запросов.
 * 
 * @link https://gearmagic.ru
 * @copyright Copyright (c) 2015 Веб-студия GearMagic
 * @license https://gearmagic.ru/license/
 */

use Gm\Helper\Json;

/** @var bool $isSetup Если установщик приложения  */
$isSetup = $this->getParam('isSetup', false);
/** @var bool $isRu Если язык установки русский */
$isRu = $this->getParam('isRu', false);

return [
    'drop'   => ['{{reference_folder_profiles}}'],
    'create' => [
        '{{reference_folder_profiles}}' => function () {
            return "CREATE TABLE `{{reference_folder_profiles}}` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `type_id` int(11) unsigned DEFAULT NULL,
                `type` varchar(100) DEFAULT NULL,
                `name` varchar(255) DEFAULT NULL,
                `options` text DEFAULT NULL,
                `enabled` tinyint(1) unsigned DEFAULT 1,
                `_updated_date` datetime DEFAULT NULL,
                `_updated_user` int(11) unsigned DEFAULT NULL,
                `_created_date` datetime DEFAULT NULL,
                `_created_user` int(11) unsigned DEFAULT NULL,
                `_lock` tinyint(1) unsigned DEFAULT 0,
                PRIMARY KEY (`id`)
            ) ENGINE={engine} 
            DEFAULT CHARSET={charset} COLLATE {collate}";
        }
    ],

    'insert' => [
        '{{reference_folder_profiles}}' => [
            [
                'id'      => 1,
                'type_id' => 1, // file
                'type'    => 'file',
                'name'    => $isRu ? 'Общий' : 'Common',
                'enabled' => 1,
                'options' =>  Json::encode([
                    // разрешения
                    'canUpload'       => 1, // загружать файлы
                    'canDownload'     => 1, // скачивать файлы
                    'canDelete'       => 1, // удалять файлы / папки
                    'canCreateFile'   => 1, // создавать файлы
                    'canCreateFolder' => 1, // создавать папки
                    'canCompress'     => 1, // архивировать файлы / папки
                    'canExtract'      => 1, // разархивировать
                    'canRename'       => 1, // переименовывать файлы / папки
                    'canEditFile'     => 1, // редактировать файлы
                    'canViewFile'     => 1, // просматривать файлы 
                    'canEditPerms'    => 1, // изменять права доступа
                    'canViewAttr'     => 1, // просматривать атрибуты файлов / папок
                    // вид
                    'showDirs'           => 1, // показывать подпапки
                    'showUnreadableDirs' => 1, // показывать папки без доступа
                    'showVCSFiles'       => 1, // показывать файлы VCS
                    'showDotFiles'       => 1, // показывать файлы и папки с точкой
                    'showExtFiles'       => 0, // показывать файлы соответствующие папке
                    // загрузка
                    'checkFileExtension'    => 0, // проверять расширения файла
                    'checkMimeType'         => 0, // проверять MIME-тип
                    'allowedExtensions'     => '', // проверяемые расширения файлов
                    'transliterateFilename' => 0, // транслитерация имени файла
                    'uniqueFilename'        => 0, // формирование уникального имени файла
                    'escapeFilename'        => 1, // исключить спецсимволы
                    'lowercaseFilename'     => 0, // имя файла в нижнем регистре
                    'replaceFilenameChars'  => '-', // заменить спецсимволы на символ
                    'maxFilenameLength'     => 255, // максимальная длина имени файла
                    'pathTemplate'          => '', // шаблон папки
                    'createPath'            => 0 // создать папку и переместить туда файлы
                ])
            ],
            [
                'id'      => 2,
                'type_id' => 2, // image
                'type'    => 'image',
                'name'    => $isRu ? 'Общии изображения' : 'Common images',
                'enabled' => 1,
                'options' =>  Json::encode([
                    // разрешения
                    'canUpload'       => 1, // загружать файлы
                    'canDownload'     => 1, // скачивать файлы
                    'canDelete'       => 1, // удалять файлы / папки
                    'canCreateFile'   => 0, // создавать файлы
                    'canCreateFolder' => 0, // создавать папки
                    'canCompress'     => 0, // архивировать файлы / папки
                    'canExtract'      => 0, // разархивировать
                    'canRename'       => 1, // переименовывать файлы / папки
                    'canEditFile'     => 0, // редактировать файлы
                    'canViewFile'     => 1, // просматривать файлы 
                    'canEditPerms'    => 1, // изменять права доступа
                    'canViewAttr'     => 1, // просматривать атрибуты файлов / папок
                    // вид
                    'showDirs'           => 1, // показывать подпапки
                    'showUnreadableDirs' => 0, // показывать папки без доступа
                    'showVCSFiles'       => 0, // показывать файлы VCS
                    'showDotFiles'       => 0, // показывать файлы и папки с точкой
                    'showExtFiles'       => 1, // показывать файлы соответствующие папке
                    // загрузка
                    'checkFileExtension'    => 1, // проверять расширения файла
                    'checkMimeType'         => 1, // проверять MIME-тип
                    'allowedExtensions'     => 'jpg,jpeg,png,tif,gif,ico,svg', // проверяемые расширения файлов
                    'transliterateFilename' => 1, // транслитерация имени файла
                    'uniqueFilename'        => 0, // формирование уникального имени файла
                    'escapeFilename'        => 1, // исключить спецсимволы
                    'lowercaseFilename'     => 0, // имя файла в нижнем регистре
                    'replaceFilenameChars'  => '-', // заменить спецсимволы на символ
                    'maxFilenameLength'     => 255, // максимальная длина имени файла
                    'pathTemplate'        => '', // шаблон папки
                    'createPath'          => 0, // создать папку и переместить туда файлы
                    // загрузка - изображение
                    'thumbWidth'        => 150, // макс. ширина, пкс.
                    'thumbHeight'       => 150, // макс. высота, пкс.
                    'thumbSlug'         => 'thumb', // слаг
                    'thumbCrop'         => 0, // обрезать изображение по размеру
                    'thumbWatermark'    => 0, // водяной знак
                    'thumbCreate'       => 0, // создать
                    'mediumWidth'       => 300, // макс. ширина, пкс.
                    'mediumHeight'      => 300, // макс. высота, пкс.
                    'mediumSlug'        => 'medium', // слаг
                    'mediumCrop'        => 0, // обрезать изображение по размеру
                    'mediumWatermark'   => 0, // водяной знак
                    'mediumCreate'      => 0, // создать
                    'largeWidth'        => 1024, // макс. ширина, пкс.
                    'largeHeight'       => 1024, // макс. высота, пкс.
                    'largeSlug'         => 'large', // слаг
                    'largeCrop'         => 0, // обрезать изображение по размеру
                    'largeWatermark'    => 0, // водяной знак
                    'largeCreate'       => 0, // создать
                    'originalWidth'     => 1024, // макс. ширина, пкс.
                    'originalHeight'    => 1024, // макс. высота, пкс.
                    'originalCrop'      => 0, // обрезать изображение по размеру
                    'originalWatermark' => 0, // водяной знак
                    'originalApply'     => 0, // создать
                    'watermarkFile'     => '@published/uploads/img/watermark.png', // файл изображения водяного знака
                    'watermarkOpacity'  => 50, // прозрачность водяного знака
                    'watermarkPosition' => 'right|bottom', // положение водяного знака 
                    'watermarkOffsetX'  => 0, // cмещение водяного знака по горизонтали
                    'watermarkOffsetY'  => 0 // cмещение водяного знака по вертикали
                ])
            ],
            [
                'id'      => 3,
                'type_id' => 5, // document
                'type'    => 'document',
                'name'    => $isRu ? 'Общии документы' : 'Common documents',
                'enabled' => 1,
                'options' =>  Json::encode([
                    // разрешения
                    'canUpload'       => 1, // загружать файлы
                    'canDownload'     => 1, // скачивать файлы
                    'canDelete'       => 1, // удалять файлы / папки
                    'canCreateFile'   => 0, // создавать файлы
                    'canCreateFolder' => 0, // создавать папки
                    'canCompress'     => 0, // архивировать файлы / папки
                    'canExtract'      => 0, // разархивировать
                    'canRename'       => 1, // переименовывать файлы / папки
                    'canEditFile'     => 0, // редактировать файлы
                    'canViewFile'     => 0, // просматривать файлы 
                    'canEditPerms'    => 1, // изменять права доступа
                    'canViewAttr'     => 1, // просматривать атрибуты файлов / папок
                    // вид
                    'showDirs'           => 1, // показывать подпапки
                    'showUnreadableDirs' => 0, // показывать папки без доступа
                    'showVCSFiles'       => 0, // показывать файлы VCS
                    'showDotFiles'       => 0, // показывать файлы и папки с точкой
                    'showExtFiles'       => 1, // показывать файлы соответствующие папке
                    // загрузка
                    'checkFileExtension'    => 1, // проверять расширения файла
                    'checkMimeType'         => 1, // проверять MIME-тип
                    'allowedExtensions'     => 'doc,docx,pdf,ppt,pptx,xls,xlsx,rar,zip,7z', // проверяемые расширения файлов
                    'transliterateFilename' => 1, // транслитерация имени файла
                    'uniqueFilename'        => 0, // формирование уникального имени файла
                    'escapeFilename'        => 1, // исключить спецсимволы
                    'lowercaseFilename'     => 0, // имя файла в нижнем регистре
                    'replaceFilenameChars'  => '-', // заменить спецсимволы на символ
                    'maxFilenameLength'     => 255, // максимальная длина имени файла
                    'pathTemplate'          => '', // шаблон папки
                    'createPath'            => 0 // создать папку и переместить туда файлы
                ])
            ],
            [
                'id'      => 4,
                'type_id' => 2, // image
                'type'    => 'image',
                'name'    => $isRu ? 'Изображения материалов' : 'Article images',
                'enabled' => 1,
                'options' =>  Json::encode([
                    // разрешения
                    'canUpload'       => 1, // загружать файлы
                    'canDownload'     => 1, // скачивать файлы
                    'canDelete'       => 1, // удалять файлы / папки
                    'canCreateFile'   => 0, // создавать файлы
                    'canCreateFolder' => 0, // создавать папки
                    'canCompress'     => 0, // архивировать файлы / папки
                    'canExtract'      => 0, // разархивировать
                    'canRename'       => 0, // переименовывать файлы / папки
                    'canEditFile'     => 0, // редактировать файлы
                    'canViewFile'     => 1, // просматривать файлы 
                    'canEditPerms'    => 0, // изменять права доступа
                    'canViewAttr'     => 1, // просматривать атрибуты файлов / папок
                    // вид
                    'showDirs'           => 0, // показывать подпапки
                    'showFilesInDirs'    => 1, // показывать файлы подпапок
                    'showUnreadableDirs' => 0, // показывать папки без доступа
                    'showVCSFiles'       => 0, // показывать файлы VCS
                    'showDotFiles'       => 0, // показывать файлы и папки с точкой
                    'showExtFiles'       => 1, // показывать файлы соответствующие папке
                    // загрузка
                    'checkFileExtension'    => 1, // проверять расширения файла
                    'checkMimeType'         => 1, // проверять MIME-тип
                    'allowedExtensions'     => 'jpg,jpeg,png,tif,gif,ico,svg', // проверяемые расширения файлов
                    'transliterateFilename' => 1, // транслитерация имени файла
                    'uniqueFilename'        => 0, // формирование уникального имени файла
                    'escapeFilename'        => 1, // исключить спецсимволы
                    'lowercaseFilename'     => 0, // имя файла в нижнем регистре
                    'replaceFilenameChars'  => '-', // заменить спецсимволы на символ
                    'maxFilenameLength'     => 255, // максимальная длина имени файла
                    'pathTemplate'        => '{year}/{month}/{day}/{id}', // шаблон папки
                    'createPath'          => 1, // создать папку и переместить туда файлы
                    // загрузка - изображение
                    'thumbWidth'        => 150, // макс. ширина, пкс.
                    'thumbHeight'       => 150, // макс. высота, пкс.
                    'thumbSlug'         => 'thumb', // слаг
                    'thumbCrop'         => 0, // обрезать изображение по размеру
                    'thumbWatermark'    => 0, // водяной знак
                    'thumbCreate'       => 1, // создать
                    'mediumWidth'       => 300, // макс. ширина, пкс.
                    'mediumHeight'      => 300, // макс. высота, пкс.
                    'mediumSlug'        => 'medium', // слаг
                    'mediumCrop'        => 0, // обрезать изображение по размеру
                    'mediumWatermark'   => 0, // водяной знак
                    'mediumCreate'      => 1, // создать
                    'largeWidth'        => 1024, // макс. ширина, пкс.
                    'largeHeight'       => 1024, // макс. высота, пкс.
                    'largeSlug'         => 'large', // слаг
                    'largeCrop'         => 0, // обрезать изображение по размеру
                    'largeWatermark'    => 0, // водяной знак
                    'largeCreate'       => 1, // создать
                    'originalWidth'     => 1024, // макс. ширина, пкс.
                    'originalHeight'    => 1024, // макс. высота, пкс.
                    'originalCrop'      => 0, // обрезать изображение по размеру
                    'originalWatermark' => 0, // водяной знак
                    'originalApply'     => 0, // создать
                    'watermarkFile'     => '@published/uploads/img/watermark.png', // файл изображения водяного знака
                    'watermarkOpacity'  => 50, // прозрачность водяного знака
                    'watermarkPosition' => 'right|bottom', // положение водяного знака 
                    'watermarkOffsetX'  => 0, // cмещение водяного знака по горизонтали
                    'watermarkOffsetY'  => 0 // cмещение водяного знака по вертикали
                ])
            ],
            [
                'id'      => 5,
                'type_id' => 3, // video
                'type'    => 'video',
                'name'    => $isRu ? 'Видео материалов' : 'Article videos',
                'enabled' => 1,
                'options' =>  Json::encode([
                    // разрешения
                    'canUpload'       => 1, // загружать файлы
                    'canDownload'     => 1, // скачивать файлы
                    'canDelete'       => 1, // удалять файлы / папки
                    'canCreateFile'   => 0, // создавать файлы
                    'canCreateFolder' => 0, // создавать папки
                    'canCompress'     => 0, // архивировать файлы / папки
                    'canExtract'      => 0, // разархивировать
                    'canRename'       => 0, // переименовывать файлы / папки
                    'canEditFile'     => 0, // редактировать файлы
                    'canViewFile'     => 0, // просматривать файлы 
                    'canEditPerms'    => 0, // изменять права доступа
                    'canViewAttr'     => 1, // просматривать атрибуты файлов / папок
                    // вид
                    'showDirs'           => 0, // показывать подпапки
                    'showFilesInDirs'    => 0, // показывать файлы подпапок
                    'showUnreadableDirs' => 0, // показывать папки без доступа
                    'showVCSFiles'       => 0, // показывать файлы VCS
                    'showDotFiles'       => 0, // показывать файлы и папки с точкой
                    'showExtFiles'       => 1, // показывать файлы соответствующие папке
                    // загрузка
                    'checkFileExtension'    => 1, // проверять расширения файла
                    'checkMimeType'         => 1, // проверять MIME-тип
                    'allowedExtensions'     => 'mp4,mpeg,mkv,avi,ogv,webm,3gp,3g2', // проверяемые расширения файлов
                    'transliterateFilename' => 1, // транслитерация имени файла
                    'uniqueFilename'        => 0, // формирование уникального имени файла
                    'escapeFilename'        => 1, // исключить спецсимволы
                    'lowercaseFilename'     => 0, // имя файла в нижнем регистре
                    'replaceFilenameChars'  => '-', // заменить спецсимволы на символ
                    'maxFilenameLength'     => 255, // максимальная длина имени файла
                    'pathTemplate'          => '{year}/{month}/{day}/{id}', // шаблон папки
                    'createPath'            => 1 // создать папку и переместить туда файлы
                ])
            ],
            [
                'id'      => 6,
                'type_id' => 4, // audio
                'type'    => 'audio',
                'name'    => $isRu ? 'Аудио материалов' : 'Article audio',
                'enabled' => 1,
                'options' =>  Json::encode([
                    // разрешения
                    'canUpload'       => 1, // загружать файлы
                    'canDownload'     => 1, // скачивать файлы
                    'canDelete'       => 1, // удалять файлы / папки
                    'canCreateFile'   => 0, // создавать файлы
                    'canCreateFolder' => 0, // создавать папки
                    'canCompress'     => 0, // архивировать файлы / папки
                    'canExtract'      => 0, // разархивировать
                    'canRename'       => 0, // переименовывать файлы / папки
                    'canEditFile'     => 0, // редактировать файлы
                    'canViewFile'     => 0, // просматривать файлы 
                    'canEditPerms'    => 0, // изменять права доступа
                    'canViewAttr'     => 1, // просматривать атрибуты файлов / папок
                    // вид
                    'showDirs'           => 0, // показывать подпапки
                    'showUnreadableDirs' => 0, // показывать папки без доступа
                    'showVCSFiles'       => 0, // показывать файлы VCS
                    'showDotFiles'       => 0, // показывать файлы и папки с точкой
                    'showExtFiles'       => 1, // показывать файлы соответствующие папке
                    // загрузка
                    'checkFileExtension'    => 1, // проверять расширения файла
                    'checkMimeType'         => 1, // проверять MIME-тип
                    'allowedExtensions'     => 'aac,mp3,oga,opus,weba,3gp,3g2', // проверяемые расширения файлов
                    'transliterateFilename' => 1, // транслитерация имени файла
                    'uniqueFilename'        => 0, // формирование уникального имени файла
                    'escapeFilename'        => 1, // исключить спецсимволы
                    'lowercaseFilename'     => 0, // имя файла в нижнем регистре
                    'replaceFilenameChars'  => '-', // заменить спецсимволы на символ
                    'maxFilenameLength'     => 255, // максимальная длина имени файла
                    'pathTemplate'          => '{year}/{month}/{day}/{id}', // шаблон папки
                    'createPath'            => 1 // создать папку и переместить туда файлы
                ])
            ],
            [
                'id'      => 7,
                'type_id' => 5, // document
                'type'    => 'document',
                'name'    => $isRu ? 'Документы материалов' : 'Article documents',
                'enabled' => 1,
                'options' =>  Json::encode([
                    // разрешения
                    'canUpload'       => 1, // загружать файлы
                    'canDownload'     => 1, // скачивать файлы
                    'canDelete'       => 1, // удалять файлы / папки
                    'canCreateFile'   => 0, // создавать файлы
                    'canCreateFolder' => 0, // создавать папки
                    'canCompress'     => 0, // архивировать файлы / папки
                    'canExtract'      => 0, // разархивировать
                    'canRename'       => 0, // переименовывать файлы / папки
                    'canEditFile'     => 0, // редактировать файлы
                    'canViewFile'     => 0, // просматривать файлы 
                    'canEditPerms'    => 0, // изменять права доступа
                    'canViewAttr'     => 1, // просматривать атрибуты файлов / папок
                    // вид
                    'showDirs'           => 0, // показывать подпапки
                    'showUnreadableDirs' => 0, // показывать папки без доступа
                    'showVCSFiles'       => 0, // показывать файлы VCS
                    'showDotFiles'       => 0, // показывать файлы и папки с точкой
                    'showExtFiles'       => 1, // показывать файлы соответствующие папке
                    // загрузка
                    'checkFileExtension'    => 1, // проверять расширения файла
                    'checkMimeType'         => 1, // проверять MIME-тип
                    'allowedExtensions'     => 'doc,docx,pdf,ppt,pptx,xls,xlsx,rar,zip,7z', // проверяемые расширения файлов
                    'transliterateFilename' => 1, // транслитерация имени файла
                    'uniqueFilename'        => 0, // формирование уникального имени файла
                    'escapeFilename'        => 1, // исключить спецсимволы
                    'lowercaseFilename'     => 0, // имя файла в нижнем регистре
                    'replaceFilenameChars'  => '-', // заменить спецсимволы на символ
                    'maxFilenameLength'     => 255, // максимальная длина имени файла
                    'pathTemplate'          => '{year}/{month}/{day}/{id}', // шаблон папки
                    'createPath'            => 1 // создать папку и переместить туда файлы
                ])
            ],
            [
                'id'      => 8,
                'type_id' => 6, // archive
                'type'    => 'archive',
                'name'    => $isRu ? 'Архив' : 'Archive',
                'enabled' => 1,
                'options' =>  Json::encode([
                    // разрешения
                    'canUpload'       => 1, // загружать файлы
                    'canDownload'     => 1, // скачивать файлы
                    'canDelete'       => 1, // удалять файлы / папки
                    'canCreateFile'   => 0, // создавать файлы
                    'canCreateFolder' => 0, // создавать папки
                    'canCompress'     => 0, // архивировать файлы / папки
                    'canExtract'      => 0, // разархивировать
                    'canRename'       => 0, // переименовывать файлы / папки
                    'canEditFile'     => 0, // редактировать файлы
                    'canViewFile'     => 0, // просматривать файлы 
                    'canEditPerms'    => 0, // изменять права доступа
                    'canViewAttr'     => 1, // просматривать атрибуты файлов / папок
                    // вид
                    'showDirs'           => 0, // показывать подпапки
                    'showUnreadableDirs' => 0, // показывать папки без доступа
                    'showVCSFiles'       => 0, // показывать файлы VCS
                    'showDotFiles'       => 0, // показывать файлы и папки с точкой
                    'showExtFiles'       => 1, // показывать файлы соответствующие папке
                    // загрузка
                    'checkFileExtension'    => 1, // проверять расширения файла
                    'checkMimeType'         => 1, // проверять MIME-тип
                    'allowedExtensions'     => 'rar,zip,7z,jar,tgz,gz,bz2,bz,arc', // проверяемые расширения файлов
                    'transliterateFilename' => 1, // транслитерация имени файла
                    'uniqueFilename'        => 0, // формирование уникального имени файла
                    'escapeFilename'        => 1, // исключить спецсимволы
                    'lowercaseFilename'     => 0, // имя файла в нижнем регистре
                    'replaceFilenameChars'  => '-', // заменить спецсимволы на символ
                    'maxFilenameLength'     => 255, // максимальная длина имени файла
                    'pathTemplate'          => '', // шаблон папки
                    'createPath'            => 0 // создать папку и переместить туда файлы
                ])
            ]
        ]
    ],

    'run' => [
        'install'   => ['drop', 'create', 'insert'],
        'uninstall' => ['drop']
    ]
];