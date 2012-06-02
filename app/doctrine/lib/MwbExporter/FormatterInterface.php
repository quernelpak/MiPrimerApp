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

namespace MwbExporter;

use MwbExporter\Model\Base;

interface FormatterInterface {

    const CFG_INDENTATION            = 'indentation';
    const CFG_FILENAME               = 'filename';
    const CFG_SKIP_PLURAL            = 'skipPluralNameChecking';
    const CFG_BACKUP_FILE            = 'backupExistingFile';
    const CFG_USE_LOGGED_STORAGE     = 'useLoggedStorage';
    const CFG_ENHANCE_M2M_DETECTION  = 'enhanceManyToManyDetection';

    /**
     * Get the registry object.
     *
     * @return \MwbExporter\Registry
     */
    public function getRegistry();

    /**
     * Get the data type converter.
     *
     * @return \MwbExporter\DatatypeConverterInterface
     */
    public function getDatatypeConverter();

    /**
     * Get all configurations.
     *
     * @return array
     */
    public function getConfigurations();

    /**
     * Setup formatter.
     *
     * @param array $configurations
     */
    public function setup($configurations = array());

    /**
     * Create catalog model.
     *
     * @param \MbwExporter\Model\Base $parent  The object parent
     * @param \SimpleXMLElement $node  The model data
     * @return \MwbExporter\Model\Catalog
     */
    public function createCatalog(Base $parent = null, $node);

    /**
     * Create schemas model.
     *
     * @param \MbwExporter\Model\Base $parent  The object parent
     * @param \SimpleXMLElement $node  The model data
     * @return \MwbExporter\Model\Schemas
     */
    public function createSchemas(Base $parent = null, $node);

    /**
     * Create schema model.
     *
     * @param \MbwExporter\Model\Base $parent  The object parent
     * @param \SimpleXMLElement $node  The model data
     * @return \MwbExporter\Model\Schema
     */
    public function createSchema(Base $parent = null, $node);

    /**
     * Create tables model.
     *
     * @param \MbwExporter\Model\Base $parent  The object parent
     * @param \SimpleXMLElement $node  The model data
     * @return \MwbExporter\Model\Tables
     */
    public function createTables(Base $parent = null, $node);

    /**
     * Create catalog model.
     *
     * @param \MbwExporter\Model\Base $parent  The object parent
     * @param \SimpleXMLElement $node  The model data
     * @return \MwbExporter\Model\Table
     */
    public function createTable(Base $parent = null, $node);

    /**
     * Create foreign keys model.
     *
     * @param \MbwExporter\Model\Base $parent  The object parent
     * @param \SimpleXMLElement $node  The model data
     * @return \MwbExporter\Model\ForeignKeys
     */
    public function createForeignKeys(Base $parent = null, $node);

    /**
     * Create foreign key model.
     *
     * @param \MbwExporter\Model\Base $parent  The object parent
     * @param \SimpleXMLElement $node  The model data
     * @return \MwbExporter\Model\ForeignKey
     */
    public function createForeignKey(Base $parent = null, $node);

    /**
     * Create indices model.
     *
     * @param \MbwExporter\Model\Base $parent  The object parent
     * @param \SimpleXMLElement $node  The model data
     * @return \MwbExporter\Model\Indices
     */
    public function createIndices(Base $parent = null, $node);

    /**
     * Create index model.
     *
     * @param \MbwExporter\Model\Base $parent  The object parent
     * @param \SimpleXMLElement $node  The model data
     * @return \MwbExporter\Model\Index
     */
    public function createIndex(Base $parent = null, $node);

    /**
     * Create columns model.
     *
     * @param \MbwExporter\Model\Base $parent  The object parent
     * @param \SimpleXMLElement $node  The model data
     * @return \MwbExporter\Model\Columns
     */
    public function createColumns(Base $parent = null, $node);

    /**
     * Create column model.
     *
     * @param \MbwExporter\Model\Base $parent  The object parent
     * @param \SimpleXMLElement $node  The model data
     * @return \MwbExporter\Model\Column
     */
    public function createColumn(Base $parent = null, $node);

    /**
     * Create views model.
     *
     * @param \MbwExporter\Model\Base $parent  The object parent
     * @param \SimpleXMLElement $node  The model data
     * @return \MwbExporter\Model\Views
     */
    public function createViews(Base $parent = null, $node);

    /**
     * Create view model.
     *
     * @param \MbwExporter\Model\Base $parent  The object parent
     * @param \SimpleXMLElement $node  The model data
     * @return \MwbExporter\Model\View
     */
    public function createView(Base $parent = null, $node);

    /**
     * Get formatter title.
     *
     * @return string
     */
    public function getTitle();

    /**
     * Get file extension for generated code.
     *
     * @return string
     */
    public function getFileExtension();

    /**
     * Get preferred write to be used.
     *
     * @return string
     */
    public function getPreferredWriter();
}