<?php
/**
 * Этот файл является частью расширения модуля веб-приложения GearMagic.
 * 
 * Файл конфигурации установки расширения.
 * 
 * @link https://gearmagic.ru
 * @copyright Copyright (c) 2015 Веб-студия GearMagic
 * @license https://gearmagic.ru/license/
 */

return [
    'id'          => 'gm.be.references.folder_profiles',
    'moduleId'    => 'gm.be.references',
    'name'        => 'Media folder profiles',
    'description' => 'Media folder display settings profiles',
    'namespace'   => 'Gm\Backend\References\FolderProfiles',
    'path'        => '/gm/gm.be.references.folder_profiles',
    'route'       => 'folder-profiles',
    'locales'     => ['ru_RU', 'en_GB'],
    'permissions' => ['any', 'view', 'read', 'viewAudit', 'writeAudit', 'info'],
    'events'      => [],
    'required'    => [
        ['php', 'version' => '8.2'],
        ['app', 'code' => 'GM MS'],
        ['app', 'code' => 'GM CMS'],
        ['app', 'code' => 'GM CRM'],
        ['module', 'id' => 'gm.be.references'],
        ['extension', 'id' => 'gm.be.references.media_types']
    ]
];
