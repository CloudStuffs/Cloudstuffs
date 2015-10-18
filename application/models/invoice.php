<?php

/**
 * The invoice Model
 *
 * @author Faizan Ayubi
 */
class Invoice extends Shared\Model {

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
    protected $_paid;

    /**
     * @column
     * @readwrite
     * @type integer
     */
    protected $_unpaid;

    /**
     * @column
     * @readwrite
     * @type datetime
     */
    protected $_duedate;

}
