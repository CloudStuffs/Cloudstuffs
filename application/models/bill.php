<?php

/**
 * The invoice Model
 *
 * @author Faizan Ayubi
 */
class Bill extends Shared\Model {

    /**
     * @column
     * @readwrite
     * @type integer
     * @index
     */
    protected $_service_id;

    /**
     * @column
     * @readwrite
     * @type integer
     */
    protected $_amount;

    /**
     * @column
     * @readwrite
     * @type datetime
     */
    protected $_duedate;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 32
     */
    protected $_type;

}
