<?php 
	namespace App\Repositories\Question;

	/**
 * Interface DashboardRepository
 * @package App\Repositories\Dashboard
 */

	interface QuestionInterface
	{
	    // public function findOrThrowException($id); 
    	public function getAllQuestion($order_by = 'serial_no', $sort = 'asc');
    	public function createQuestion($input,$type);
    	public function findOrThrowException($id);
    	public function destroyQuestion($id);
	}
?>