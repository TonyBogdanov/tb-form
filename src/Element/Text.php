<?php
/**
 *  @package    TB Form
 *  @author     Tony Bogdanov <support@tonybogdanov.com>
 *  @license    MIT http://www.opensource.org/licenses/mit-license.php
 *  @copyright  Copyright (c) 2017. www.tonybogdanov.com. All Rights Reserved.
 */

namespace TB\Form\Element;

use Wa72\HtmlPageDom\HtmlPageCrawler;
use Zend\Filter;

class Text extends AbstractElement
{
    /**
     * @inheritDoc
     */
    protected function getDefaultSerializationFilters()
    {
        return array(
            $this->sm()->create('form.filter.string'),
            new Filter\ToInt()
        );
    }

    /**
     * @inheritDoc
     */
    protected function getDefaultDeserializationFilters()
    {
        return array(
            $this->sm()->create('form.filter.string')
        );
    }

    /**
     * @inheritDoc
     */
    public function render(array $parents = array())
    {
        $render = new HtmlPageCrawler();
        $render
            ->attr('type', 'text')
            ->attr('name', $this->getNameForRendering($parents))
            ->attr('value', $this->getSerializedData());

        return $this->decorate(__CLASS__, $render, $parents);
    }
}