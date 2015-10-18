<?php

/**
 * The quotation Model
 *
 * @author Faizan Ayubi
 */
class Bug extends Shared\Model {

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
     */
    protected $_project_id;

    /**
     * @column
     * @readwrite
     * @type text
     */
    protected $_details;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 32
     */
    protected $_status;

}
