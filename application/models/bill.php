<?php

/**
 * The billing Model
 *
 * @author Faizan Ayubi
 */
use Framework\Registry as Registry;

class Bill extends Shared\Model {

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
    protected $_service_id;

    /**
     * @column
     * @readwrite
     * @type integer
     */
    protected $_amount;

    /**
     * @column
     * @readwrite
     * @type datetime
     */
    protected $_duedate;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 32
     */
    protected $_type;

    public static function convertCurrency($from="USD", $to="INR", $amount=1) {
        $session = Registry::get("session");
        $url = "http://www.google.com/finance/converter?a=$amount&from=$from&to=$to"; 
        $request = curl_init(); 
        $timeOut = 0;
        curl_setopt ($request, CURLOPT_URL, $url);
        curl_setopt ($request, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ($request, CURLOPT_USERAGENT,"Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)"); 
        curl_setopt ($request, CURLOPT_CONNECTTIMEOUT, $timeOut);
        $response = curl_exec($request); 
        curl_close($request);

        $regularExpression     = '#\<span class=bld\>(.+?)\<\/span\>#s';
        preg_match($regularExpression, $response, $finalData);
        
        $currency = explode(" ", strip_tags($finalData[0]));
        $session->set("currency", $currency);
    }

}
