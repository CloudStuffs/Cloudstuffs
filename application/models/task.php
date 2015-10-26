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
    protected $_item_id;

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
     * @type text
     */
    protected $_description;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 32
     */
    protected $_status;

    /**
     * @column
     * @readwrite
     * @type datetime
     */
    protected $_deadline;

}
