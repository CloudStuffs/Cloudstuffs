<?php

/**
 * Scheduler Class which executes daily and perfoms the initiated job
 * 
 * @author Faizan Ayubi
 */

class CRON extends Auth {

    public function __construct($options = array()) {
        parent::__construct($options);
        $this->willRenderLayoutView = false;
        $this->willRenderActionView = false;
    }

    public function index() {
        
    }

    /**
     * Generates New Bill at the end of period
     * @return none none
     */
    protected function generateBills() {
    	$now = strftime("%Y-%m-%d %H:%M:%S", strtotime('now'));
    	$services = Service::all(array("live = ?" => true));

    	foreach ($services as $service) {
    		$period = date_diff(date_create($now), date_create($service->created));
    		$timeline = date_diff(date_create($now), date_create($service->created));
    		if ($timeline < $service->timeline) {
    			if ($period == $service->period) {
	    			$oldBill = Bill::first(array("id = ?" => $service->bill_id));
	    			$bill = new Bill(array(
	    				"service_id" => $service->id,
	    				"amount" => $oldBill->amount,
	    				"duedate" => date('Y-m-d', strtotime($now. ' + 15 days')),
	    				"type" => $oldBill->type
	    			));
	    			$bill->save();

	    			//send notification
	    			
	    		}
    		}
    	}
    }

    /**
     * Send Notifications for any comment
     * @return none none
     */
    protected function comment() {
    	
    }

}
