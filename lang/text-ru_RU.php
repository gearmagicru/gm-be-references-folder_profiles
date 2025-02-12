<?php
/**
 * Этот файл является частью расширения модуля веб-приложения GearMagic.
 * 
 * Пакет русской локализации.
 * 
 * @link https://gearmagic.ru
 * @copyright Copyright (c) 2015 Веб-студия GearMagic
 * @license https://gearmagic.ru/license/
 */

return [
    '{name}'        => 'Профили медиапапок',
    '{description}' => 'Профили настроек отображения медиапапок',
    '{permissions}' => [
        'any'  => ['Полный доступ', 'Просмотр и внесение в профили медиапапок'],
        'view' => ['Просмотр', 'Просмотр профилей медиапапок'],
        'read' => ['Чтение', 'Чтение профилей медиапапок']
    ],

    // Grid: панель инструментов
    'Add' => 'Добавить',
    'Adding a folder profile' => 'Добавление профиля папки',
    'Media type "{0}"' => 'Тип медиаданных "{0}"',
    // Grid: контекстное меню записи
    'Edit record' => 'Редактировать',
    // Grid: столбцы
    'Name' => 'Название',
    'Type' => 'Тип',
    'Media type' => 'Тип медиаданных',
    // Grid: всплывающие сообщения / заголовок
    'Enabled' => 'Доступен',
    'Disabled' => 'Не доступен',
    'Folder profile «{0}» - enabled' => 'Профиль папки «{0}» - <b>доступен</b>.',
    'Folder profile «{0}» - disabled' => 'Профиль папки «{0}» - <b>не доступен</b>.',

    // Form
    '{form.title}' => 'Добавление профиля папки "{0}"',
    '{form.titleTpl}' => 'Изменение профиля папки "{name}"',
    'Remove window modality' => 'Убрать модальность окна',
    'The window modality has already been removed' => 'Модальность окна уже убрана',
    // Form: вкладки
    'Common' => 'Общее',
    'Permissions' => 'Разрешения',
    'View' => 'Вид',
    'Folder and file display options' => 'Параметры отображения папок и файлов для текущего профиля папки.',
    'Upload' => 'Загрузка',
    'File upload options' => 'Параметры загрузки файлов для текущего профиля папки',
    'In the file upload parameters, you specify the rules by which a new file name will be generated in the media folder' 
        => 'В параметрах загрузки файла указывают правила по которым будет сформировано новое название файла в медиапапке.',
    'After downloading, not only the name of the downloaded file may change, but also the name of the folder' 
        => 'После загрузки может измениться не только имя загружаемого файла но и имя папки куда загружается файла.',
    'Image' => 'Изображение',
    'Thumbnails, images with medium and large sizes will be created after uploading, only if the сreate checkbox is selected' 
        => 'Будут созданы миниатюры, изображения со средним и крупными размерами после загрузки, только в том случае, если выставлен флажок "Создать".',
    // Form: вкладка "разрешения" / поля
    'Upload files' => 'Загружать файлы',
    'Download files' => 'Скачивать файлы',
    'Delete files / folders' => 'Удалять файлы / папки',
    'Create files' => 'Создавать файлы',
    'Create folders' => 'Создавать папки',
    'Compress files / folders' => 'Архивировать файлы / папки',
    'Uncompress files' => 'Разархивировать',
    'Rename files / folders' => 'Переименовывать файлы / папки',
    'Edit files' => 'Редактировать файлы',
    'View files' => 'Просматривать файлы',
    'Edit permissions' => 'Изменять права доступа',
    'View attrbiutes files / folders' => 'Просматривать атрибуты файлов / папок',
    // Form: вкладка "вид" / поля
    'Show folders' => 'Показывать подпапки',
    'Show files in subfolders' => 'Показывать файлы подпапок',
    'Show folders without access' => 'Показывать папки без доступа',
    'Show VCS files' => 'Показывать файлы VCS',
    'Show files and folders with a dot' => 'Показывать файлы и папки с точкой',
    'Show files corresponding to a folder' => 'Показывать файлы соответствующие папке',
    // Form: вкладка "загрузка" / поля
    'File upload rules' => 'Правила загрузки файла',
    'Check file extension' => 'Проверять расширение файла',
    'Check MIME type of file contents' => 'Проверять MIME-тип содержимого файла',
    'No rules for user roles' => 'Без правил для ролей пользователей',
    'Checked file extensions' => 'Проверяемые расширения файлов',
    'New file name after downloading it' => 'Новое имя файла после загрузки',
    'File name transliteration' => 'Транслитерация имени файла',
    'Creating a unique file name' => 'Формирование уникального имени файла',
    'Exclude special characters' => 'Исключить специальные символы',
    'Lowercase file name' => 'Имя файла в нижнем регистре',
    'Replace special characters with' => 'Заменить специальные символы на',
    'Maximum file name length' => 'Максимальная длина имени файла',
    'Template' => 'Шаблон',
    'Template for creating a folder of downloaded files' => 'Шаблон создания папки загруженных файлов',
    'Create a folder and move files there' => 'Создать папку и переместить туда файлы',
    'Symbol in template' => 'Символы в шаблоне:<br>',
    '{Year} - year number, 2 digits' => '<b>{Year}</b> - номер года, 2 цифры;<br>',
    '{year} - full numeric representation of the year, at least 4 digits' 
        => '<b>{year}</b> - полное числовое представление года, не менее 4 цифр;<br>',
    '{Month} - serial number of the month without a leading zero' 
        => '<b>{Month}</b> - порядковый номер месяца без ведущего нуля (например, <em>от 1 до 12</em> );<br>',
    '{month} - serial number of the month with a leading zero' 
        => '<b>{month}</b> - порядковый номер месяца с ведущим нулём (например, <em>от 01 до 12</em> );<br>',
    '{Day} - day of the month without a leading zero' 
        => '<b>{Day}</b> - день месяца без ведущего нуля (например, <em>от 1 до 31</em> );<br>',
    '{day} - day of the month, 2 digits with leading zero' 
        => '<b>{day}</b> - день месяца, 2 цифры с ведущим нулём (например, <em>от 01 до 31</em> );<br>',
    '{ID} - identifier of the object to which the file belongs' 
        => '<b>{id}</b> - идентификатор объекта (например, материала), которому принадлежит файл.',

    // Form: вкладка "изображение" / поля
    'Thumbnail size' => 'Размер миниатюры',
    'Medium size' => 'Средний размер',
    'Large size' => 'Крупный размер',
    'Large size' => 'Крупный размер',
    'Original size' => 'Оригинальный размер',
    'Max. width' => 'Максимальная ширина, пкс',
    'Maximum width in pixels' => 'Максимальная ширина в пикселях',
    'Max. height' => 'Максимальная высота, пкс',
    'Maximum height in pixels' => 'Максимальная высота в пикселях',
    'Add a watermark' => 'Добавить водяной знак',
    'Create' => 'Создать',
    'Apply' => 'Применить',
    'Slug' => 'Слаг',
    'A slug is a unique identifier string inserted into the name of a file or folder' 
        => 'Слаг - это уникальная строка-идентификатор, подставляемая в название файла или папки',
    'Crop image to size' => 'Обрезать изображение по размеру',
    'Watermark' => 'Водяной знак',
    'Filename' => 'Файл',
    'Filename watermak' => 'Файл изображения водяного знака',
    'Opacity' => 'Прозрачность',
    'Position' => 'Положение',
    'Offset X' => 'Смещение по горизонтали, пкс.',
    'Offset Y' => 'Смещение по вертикали, пкс.',
    'Right bottom' => 'Справа снизу',
    'Right center' => 'Справа по центру',
    'Right top' => 'Справа сверху',
    'Left center' => 'Слева по центру',
    'Left top' => 'Слева сверху',
    'Left bottom' => 'Слева снизу',
    'Bottom center' => 'Снизу по центру',
    'Center' => 'По центру',
    'Top center' => 'Сверху по центру'
];