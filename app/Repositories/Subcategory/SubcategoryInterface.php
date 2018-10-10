<?php 
	namespace App\Repositories\Subcategory;

	/**
 * Interface DashboardRepository
 * @package App\Repositories\Dashboard
 */

	interface SubcategoryInterface
	{
	    // public function findOrThrowException($id); 
    	public function getAllSubcategory($order_by = 'id', $sort = 'asc');
    	public function createSubcategory($input,$type);
    	public function findOrThrowException($id);
    	public function destroySubcategory($id);
	}
?>