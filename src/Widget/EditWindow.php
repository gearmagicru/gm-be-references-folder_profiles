<?php
/**
 * Этот файл является частью расширения модуля веб-приложения GearMagic.
 * 
 * @link https://gearmagic.ru
 * @copyright Copyright (c) 2015 Веб-студия GearMagic
 * @license https://gearmagic.ru/license/
 */

namespace Gm\Backend\References\FolderProfiles\Widget;

use Gm;
use Gm\Config\Mimes;

/**
 * Виджет для формирования интерфейса окна редактирования записи.
 * 
 * @author Anton Tivonenko <anton.tivonenko@gmail.com>
 * @package Gm\Backend\References\FolderProfiles\Widget
 * @since 1.0
 */
class EditWindow extends \Gm\Panel\Widget\EditWindow
{
    /**
     * Тип медиаданных.
     * 
     * @var array
     */
    protected array $mediaType = [];

    /**
     * {@inheritdoc}
     */
    public array $passParams = ['mediaType'];

    /**
     * {@inheritdoc}
     */
    protected function init(): void
    {
        parent::init();

        // панель формы (Gm.view.form.Panel GmJS)
        $this->form->autoScroll = true;
        $this->form->router->route = $this->creator->route('/form');
        if ($this->mediaType) {
            $this->form->loadJSONFile('/' . $this->mediaType['type'] . '-form', 'items', [
                '@mimes'  => $this->getMimes()->toList(),
                '@typeId' => $this->mediaType['id'],
                '@type'   => $this->mediaType['type']
            ]);
        }

        // окно компонента (Ext.window.Window Sencha ExtJS)
        $this->title = $this->creator->t('{form.title}', [$this->mediaType['name']]);
        $this->width = 600;
        $this->height = 800;
        /** @var int $rowId Идентификатор редактируемой записи */
        // если редактирование
        if ($rowId = $this->getRowID()) {
            $this->tools = [
                [
                    'type'            => 'pin',
                    'callback'        => 'windowModalRemove',
                    'tooltip'         => '#Remove window modality',
                    'msgNotification' => '#The window modality has already been removed'
                ]
            ];
            // для уникальности идентификаторов окна и формы
            $this->viewIDPrefix = $rowId;
            $this->form->viewIDPrefix = $rowId;
        }

        $this->responsiveConfig = [
            'height < 800' => ['height' => '99%'],
            'width < 700' => ['height' => '99%'],
        ];
        $this->layout = 'fit';
        $this
            ->addCss('/form.css');
    }

    /**
     * @see EditWindow::getMimes()
     * 
     * @var Mimes
     */
    protected Mimes $mimes;

    /**
     * Возвращает определитель MIME-тип содержимого файла.
     *
     * @return Mimes
     */
    public function getMimes(): Mimes
    {
        if (!isset($this->mimes)) {
            $this->mimes = Gm::$services->getAs('mimes');
        }
        return $this->mimes;
    }
}
