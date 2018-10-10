<?php 
	namespace App\Repositories\User;

	/**
 * Interface DashboardRepository
 * @package App\Repositories\Dashboard
 */

	interface UserInterface
	{
	    // public function findOrThrowException($id);
    	public function getAllUser($order_by = 'id', $sort = 'asc');
	}
?>