<?php 
	namespace App\Repositories\Quiz;

	/**
 * Interface DashboardRepository
 * @package App\Repositories\Dashboard
 */

	interface QuizInterface
	{
	    // public function findOrThrowException($id); 
    	public function getAllQuiz($order_by = 'id', $sort = 'asc');
    	public function createQuiz($input,$type);
    	public function findOrThrowException($id);
    	public function destroyQuiz($id);
	}
?>