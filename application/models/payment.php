<?php

/**
 * The payment Model
 *
 * @author Faizan Ayubi
 */
class Payment extends Shared\Model {

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
     * @index
     */
    protected $_bill_id;

    /**
     * @column
     * @readwrite
     * @type integer
     */
    protected $_amount;

}
