<?php

/**
 * The service Model
 *
 * @author Faizan Ayubi
 */
class Service extends Shared\Model {

    /**
     * @column
     * @readwrite
     * @type integer
     * @index
     */
    protected $_user_id;

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
     */
    protected $_property_id;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 100
     */
    protected $_property;

    /**
     * @column
     * @readwrite
     * @type datetime
     */
    protected $_bill_id;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 32
     */
    protected $_type;

}
