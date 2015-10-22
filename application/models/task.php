<?php

/**
 * The task Model
 *
 * @author Faizan Ayubi
 */
class Task extends Shared\Model {

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
    protected $_app_id;

    /**
     * @column
     * @readwrite
     * @type text
     */
    protected $_description;

    /**
     * @column
     * @readwrite
     * @type datetime
     */
    protected $_startdate;

    /**
     * @column
     * @readwrite
     * @type datetime
     */
    protected $_enddate;

}
