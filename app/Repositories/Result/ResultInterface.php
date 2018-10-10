<?php 
	namespace App\Repositories\Result;

	/**
 * Interface DashboardRepository
 * @package App\Repositories\Dashboard
 */

	interface ResultInterface
	{
	    // public function findOrThrowException($id); 
    	public function getAllResult($order_by = 'id', $sort = 'asc');
    	public function createResult($input,$type);
    	public function findOrThrowException($id);
    	public function destroyResult($id);
	}
?>