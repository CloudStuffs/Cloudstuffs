<?php

/**
 * The quotation Model
 *
 * @author Faizan Ayubi
 */
class Quotation extends Shared\Model {

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
    protected $_amount;

}
