<?php

/**
 * The invoice Model
 *
 * @author Faizan Ayubi
 */
class Comment extends Shared\Model {

    /**
     * @column
     * @readwrite
     * @type integer
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
     * @type text
     */
    protected $_details;    

}
