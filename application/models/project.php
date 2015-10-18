<?php

/**
 * The project Model
 *
 * @author Faizan Ayubi
 */
class Project extends Shared\Model {

    /**
     * @column
     * @readwrite
     * @type text
     * @length 255
     * 
     * @validate required, min(3), max(255)
     * @label title
     */
    protected $_title;

    /**
     * @column
     * @readwrite
     * @type text
     */
    protected $_details;

    /**
     * @column
     * @readwrite
     * @type integer
     */
    protected $_progress;

    /**
     * @column
     * @readwrite
     * @type datetime
     */
    protected $_deadline;

}
