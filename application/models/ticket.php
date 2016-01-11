<?php

/**
 * Description of member
 *
 * @author Faizan Ayubi
 */
class Ticket extends Shared\Model {
    
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
    protected $_user_id;

    /**
     * @column
     * @readwrite
     * @type text
     */
    protected $_details;
}
