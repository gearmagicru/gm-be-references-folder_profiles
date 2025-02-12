<?php
/**
 * Этот файл является частью расширения модуля веб-приложения GearMagic.
 * 
 * Пакет английской (британской) локализации.
 * 
 * @link https://gearmagic.ru
 * @copyright Copyright (c) 2015 Веб-студия GearMagic
 * @license https://gearmagic.ru/license/
 */

return [
    '{name}'        => 'Media folder profiles',
    '{description}' => 'Media folder display settings profiles',
    '{permissions}' => [
        'any'  => ['Full access', 'Viewing and making changes to media folder profiles'],
        'view' => ['View', 'Viewing media folder profiles'],
        'read' => ['Read', 'Reading media folder profiles']
    ],

    // Grid: панель инструментов
    'Add' => 'Add',
    'Adding a folder profile' => 'Adding a folder profile',
    'Media type "{0}"' => 'Media type "{0}"',
    // Grid: контекстное меню записи
    'Edit record' => 'Edit record',
    // Grid: столбцы
    'Name' => 'Name',
    'Type' => 'Type',
    'Media type' => 'Media type',
    // Grid: всплывающие сообщения / заголовок
    'Enabled' => 'Enabled',
    'Disabled' => 'Disabled',
    'Folder profile «{0}» - enabled' => 'Folder profile «{0}» - <b>enabled</b>.',
    'Folder profile «{0}» - disabled' => 'Folder profile «{0}» - <b>disabled/b>.',

    // Form
    '{form.title}' => 'Add folder profile "{0}"',
    '{form.titleTpl}' => 'Edit folder profile "{name}"',
    // Form: вкладки
    'Common' => 'Common',
    'View' => 'View',
    'Folder and file display options' => 'Folder and file display options.',
    'Upload' => 'Upload',
    'File upload options' => 'File upload options',
    'In the file upload parameters, you specify the rules by which a new file name will be generated in the media folder' 
        => 'In the file upload parameters, you specify the rules by which a new file name will be generated in the media folder.',
    'After downloading, not only the name of the downloaded file may change, but also the name of the folder' 
        => 'After downloading, not only the name of the downloaded file may change, but also the name of the folder.',
    'Image' => 'Image',
    'Thumbnails, images with medium and large sizes will be created after uploading, only if the сreate checkbox is selected' 
        => 'Thumbnails, images with medium and large sizes will be created after uploading, only if the сreate checkbox is selected.',
    // Form: вкладка "вид" / поля
    'Show folders' => 'Show folders',
    'Show files in subfolders' => 'Show files in subfolders',
    'Show folders without access' => 'Show folders without access',
    'Show VCS files' => 'Show VCS files',
    'Show files and folders with a dot' => 'Show files and folders with a dot',
    'Show files corresponding to a folder' => 'Show files corresponding to a folder',
    // Form: вкладка "загрузка" / поля
    'File upload rules' => 'File upload rules',
    'Check file extension' => 'Check file extension',
    'Check MIME type of file contents' => 'Check MIME type of file contents',
    'No rules for user roles' => 'No rules for user roles',
    'Checked file extensions' => 'Checked file extensions',
    'New file name after downloading it' => 'New file name after downloading it',
    'File name transliteration' => 'File name transliteration',
    'Creating a unique file name' => 'Creating a unique file name',
    'Exclude special characters' => 'Exclude special characters',
    'Lowercase file name' => 'Lowercase file name',
    'Replace special characters with' => 'Replace special characters with',
    'Maximum file name length' => 'Maximum file name length',
    'Template' => 'Template',
    'Template for creating a folder of downloaded files' => 'Template for creating a folder of downloaded files',
    'Create a folder and move files there' => 'Create a folder and move files there',
    'Symbol in template' => 'Symbol in template:<br>',
    '{Year} - year number, 2 digits' => '<b>{Year}</b> - year number, 2 digits;<br>',
    '{year} - full numeric representation of the year, at least 4 digits' 
        => '<b>{year}</b> - full numeric representation of the year, at least 4 digits;<br>',
    '{Month} - serial number of the month without a leading zero' 
        => '<b>{Month}</b> - serial number of the month without a leading zero;<br>',
    '{month} - serial number of the month with a leading zero' 
        => '<b>{month}</b> - serial number of the month with a leading zero;<br>',
    '{Day} - day of the month without a leading zero' 
        => '<b>{Day}</b> - day of the month without a leading zero;<br>',
    '{day} - day of the month, 2 digits with leading zero' 
        => '<b>{day}</b> - day of the month, 2 digits with leading zero;<br>',
    '{ID} - identifier of the object to which the file belongs' 
        => '<b>{id}</b> - identifier of the object to which the file belongs.',
    // Form: вкладка "изображение" / поля
    'Thumbnail size' => 'Thumbnail size',
    'Medium size' => 'Medium size',
    'Large size' => 'Large size',
    'Large size' => 'Large size',
    'Original size' => 'Original size',
    'Max. width' => 'Max. width',
    'Maximum width in pixels' => 'Maximum width in pixels',
    'Max. height' => 'Max. height',
    'Maximum height in pixels' => 'Maximum height in pixels',
    'Add a watermark' => 'Add a watermark',
    'Create' => 'Create',
    'Apply' => 'Apply',
    'Slug' => 'Slug',
    'A slug is a unique identifier string inserted into the name of a file or folder' 
        => 'A slug is a unique identifier string inserted into the name of a file or folder',
    'Crop image to size' => 'Crop image to size',
    'Watermark' => 'Watermark',
    'Filename' => 'Filename',
    'Filename watermak' => 'Filename watermak',
    'Opacity' => 'Opacity',
    'Position' => 'Position',
    'Offset X' => 'Offset x',
    'Offset Y' => 'Offset y',
    'Right bottom' => 'Right bottom',
    'Right center' => 'Right center',
    'Right top' => 'Right top',
    'Left center' => 'Left center',
    'Left top' => 'Left top',
    'Left bottom' => 'Left bottom',
    'Bottom center' => 'Bottom center',
    'Center' => 'Center',
    'Top center' => 'Top center'
];
