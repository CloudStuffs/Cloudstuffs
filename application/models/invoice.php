<?php

/**
 * The invoice Model
 *
 * @author Faizan Ayubi
 */
use Framework\Registry as Registry;

class Invoice extends Shared\Model {

    /**
     * @column
     * @readwrite
     * @type integer
     * @index
     */
    protected $_organization_id;

    /**
     * @column
     * @readwrite
     * @type integer
     * @index
     */
    protected $_item_id;

    /**
     * @column
     * @readwrite
     * @type integer
     * @index
     */
    protected $_bill_id;

    /**
     * @column
     * @readwrite
     * @type integer
     */
    protected $_amount;

    /**
     * @column
     * @readwrite
     * @type integer
     */
    protected $_mode;
}
