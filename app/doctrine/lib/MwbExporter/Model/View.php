<?php

/*
 * The MIT License
 *
 * Copyright (c) 2010 Johannes Mueller <circus2(at)web.de>
 * Copyright (c) 2012 Toha <tohenk@yahoo.com>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

namespace MwbExporter\Model;

use MwbExporter\Helper\Pluralizer;

class View extends Base
{
    /**
     * @var \MwbExporter\Model\Columns
     */
    protected $columns;

    protected function init()
    {
        $elems = $this->node->xpath("value[@key='columns']");
        $this->columns = $this->getDocument()->getFormatter()->createColumns($this, $elems[0]);
        // iterate on column configuration
        foreach ($this->node->value as $key => $node) {
            $attributes = $node->attributes();
            $this->parameters->get((string) $attributes['key'], (string) $node[0]);
        }
    }

    public function getRawTableName()
    {
        return $this->parameters->get('name');
    }

    public function getModelName()
    {
        return ucfirst(preg_replace('@\_(\w)@e', 'ucfirst("$1")', $this->getRawTableName()));
    }

    public function getModelNameInPlural()
    {
        return Pluralizer::pluralize($this->getModelName());
    }
}