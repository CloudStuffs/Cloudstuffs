<?php

/**
 * Description of manage
 *
 * @author Faizan Ayubi
 */
class Manage extends Shared\Model {
    
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
     * @length 32
     */
    protected $_designation;
}
