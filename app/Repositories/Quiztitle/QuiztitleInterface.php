<?php 
	namespace App\Repositories\Quiztitle;

	/**
 * Interface DashboardRepository
 * @package App\Repositories\Dashboard
 */

	interface QuiztitleInterface
	{
	    // public function findOrThrowException($id); 
    	public function getAllQuiztitle($order_by = 'id', $sort = 'asc');
    	public function createQuiztitle($input,$type);
    	public function findOrThrowException($id);
    	public function destroyQuiztitle($id);
	}
?>