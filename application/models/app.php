<?php

/**
 * The app Model
 *
 * @author Faizan Ayubi
 */
class App extends Shared\Model {

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
    protected $_organization_id;

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
