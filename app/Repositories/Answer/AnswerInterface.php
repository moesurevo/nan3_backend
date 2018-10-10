<?php 
	namespace App\Repositories\Answer;

	/**
 * Interface DashboardRepository
 * @package App\Repositories\Dashboard
 */

	interface AnswerInterface
	{
	    // public function findOrThrowException($id); 
    	public function getAllAnswer($order_by = 'serial_no', $sort = 'asc');
    	public function createAnswer($input,$type);
    	public function findOrThrowException($id);
    	public function destroyAnswer($id);
	}
?>