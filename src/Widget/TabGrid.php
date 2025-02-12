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
use Gm\Panel\Helper\ExtGrid;
use Gm\Panel\Helper\HtmlGrid;
use Gm\Panel\Helper\HtmlNavigator as HtmlNav;

/**
 * Виджет для формирования интерфейса вкладки с сеткой данных.
 * 
 * @author Anton Tivonenko <anton.tivonenko@gmail.com>
 * @package Gm\Backend\References\FolderProfiles\Model
 * @since 1.0
 */
class TabGrid extends \Gm\Panel\Widget\TabGrid
{
    /**
     * {@inheritdoc}
     */
    protected function init(): void
    {
        parent::init();

        // столбцы (Gm.view.grid.Grid.columns GmJS)
        $this->grid->columns = [
            ExtGrid::columnNumberer(),
            ExtGrid::columnAction(),
            [
                'text'      => ExtGrid::columnInfoIcon($this->creator->t('Name')),
                'dataIndex' => 'name',
                'cellTip'   => HtmlGrid::tags([
                    HtmlGrid::header('{name}'),
                    HtmlGrid::fieldLabel($this->creator->t('Enabled'), HtmlGrid::tplChecked('enabled')),
                ]),
                'filter'    => ['type' => 'string'],
                'sortable'  => true,
                'width'     => 250
            ],
            [
                'xtype'     => 'templatecolumn',
                'text'      => '#Type',
                'dataIndex' => 'typeName',
                'tooltip'   => '#Media type',
                'cellTip'   => '{typeName}',
                'tpl' => HtmlGrid::tplIf(
                    'typeIcon', '<img src="{typeIcon}" width="16px" height="16px" align="absmiddle"> ', ''
                ) . '{typeName}',
                'filter'    => ['type' => 'string'],
                'sortable'  => true,
                'width'     => 180
            ],
            [
                'text'        => ExtGrid::columnIcon('g-icon-m_visible', 'svg'),
                'tooltip'     => '#Enabled',
                'xtype'       => 'g-gridcolumn-switch',
                'collectData' => ['name'],
                'dataIndex'   => 'enabled',
                'filter'    => ['type' => 'boolean']
            ]
        ];

        // панель инструментов (Gm.view.grid.Grid.tbar GmJS)
        $this->grid->tbar = [
            'padding' => 1,
            'items'   => ExtGrid::buttonGroups([
                'edit' => [
                    'items' => [
                        // инструмент "Добавить"
                        'add' => $this->addButton(),
                        'delete',
                        'cleanup',
                        '-',
                        'edit',
                        'select',
                        '-',
                        'refresh'
                    ]
                ],
                'columns',
                'search'
            ], [
                'route' =>  Gm::alias('@route')
            ])
        ];

        // контекстное меню записи (Gm.view.grid.Grid.popupMenu GmJS)
        $this->grid->popupMenu = [
            'cls'        => 'g-gridcolumn-popupmenu',
            'titleAlign' => 'center',
            'width'      => 150,
            'items'      => [
                [
                    'text'        => '#Edit record',
                    'iconCls'     => 'g-icon-svg g-icon-m_edit g-icon-m_color_default',
                    'handlerArgs' => [
                        'route'   => Gm::alias('@route', '/form/view/{id}?type={type}'),
                        'pattern' => 'grid.popupMenu.activeRecord'
                    ],
                    'handler' => 'loadWidget'
                ]
            ]
        ];

        // 2-й клик по строке сетки
        $this->grid->rowDblClickConfig = [
            'allow' => true,
            'route' => $this->creator->route('/form/view/{id}?type={type}')
        ];
        // количество строк в сетке
        $this->grid->store->pageSize = 50;
        // поле аудита записи
        $this->grid->logField = 'name';
        // плагины сетки
        $this->grid->plugins = 'gridfilters';
        // класс CSS применяемый к элементу body сетки
        $this->grid->bodyCls = 'g-grid_background';

        // панель навигации (Gm.view.navigator.Info GmJS)
        $this->navigator->info['tpl'] = HtmlNav::tags([
            HtmlNav::header('{name}'),
            HtmlNav::fieldLabel($this->creator->t('Type'), '{typeName}'),
            HtmlNav::fieldLabel(
                ExtGrid::columnIcon('g-icon-m_visible', 'svg') . ' ' . $this->creator->t('Enabled'), 
                HtmlNav::tplChecked('enabled')
            ),
            HtmlNav::widgetButton(
                $this->creator->t('Edit record'),
                ['route' => $this->creator->route('/form/view/{id}'), 'long' => true],
                ['title' => $this->creator->t('Edit record')]
            )
        ]);

        $this
            ->addCss('/grid.css')
            ->addRequire('Gm.view.grid.column.Switch');
    }

    /**
     * Возвращает конфигурацию кнопки "Добавить" (Gm.view.grid.button.Split GmJS).
     * 
     * @return array<string, mixed>
     */
    protected function addButton(): array
    {
        $items = [];

        /** @var \Gm\Backend\References\MediaTypes\Model\MediaType|null $mediaType */
        $mediaType = Gm::$app->extensions->getModel('MediaType', 'gm.be.references.media_types');
        if ($mediaType) {
            $rows = $mediaType->fetchAll();
            foreach ($rows as $row) {
                $items[] = [
                    'text'        => $this->creator->t('Media type "{0}"', [$row['name']]),
                    'icon'        => $row['icon'] ?: null,
                    'handler'     => 'loadWidget',
                    'handlerArgs' => [
                        'route' => Gm::alias('@route', '/form/view?type=' . $row['id'])
                    ]
                ];
            }
        }
        return [
            'xtype'       => 'g-gridbutton-split',
            'text'        => '#Add',
            'tooltip'     => '#Adding a folder profile',
            'iconCls'     => 'g-icon-svg g-icon_grid-add',
            'handlerArgs' => $items[0]['handlerArgs'] ?? [],
            'menu'        => ['items' => $items]
        ];
    }
}
