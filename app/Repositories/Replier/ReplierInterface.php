<?php 
	namespace App\Repositories\Replier;

	/**
 * Interface DashboardRepository
 * @package App\Repositories\Dashboard
 */

	interface ReplierInterface
	{
	    // public function findOrThrowException($id); 
    	public function getAllRepliers($order_by = 'id', $sort = 'asc');
    	public function createReplier($name,$email,$phone_no);
	}
?>