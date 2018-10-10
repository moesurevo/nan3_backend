<?php 
	namespace App\Repositories\Subcategory;

	use Illuminate\Database\Eloquent\Model;

	use App\Model\Subcategory;

	class SubcategoryRepository implements SubcategoryInterface{
		// model property on class instances
	    protected $model;
	    // Constructor to bind model to repo
	    public function __construct(Subcategory $model)
	    {
	        $this->model = $model;
	    }

	    public function findOrThrowException($id)
	    {
	        if (! is_null(Subcategory::where('id',$id))) {
	           return Subcategory::find($id);
	        }

	        throw new GeneralException(trans('exceptions.backend.access.Subcategory.not_found'));
	    }

	    public function getAllSubcategory($order_by = 'created_at', $sort = 'asc')
	    {
	        return $this->model->orderBy($order_by, $sort)->get();
	    }

	    public function createSubcategory($input,$type)
	    {
	        $sub_category               	= new Subcategory;
	        $sub_category->serial_no        = $input['serial_no'];
	        $sub_category->category_id      = $input['category_id'];
	        $sub_category->title      		= $input['title'];
	        $sub_category->mm_title      	= $input['mm_title'];
	        $sub_category->save();
	        
	        if($sub_category->serial_no != 0){
	        	$sub_category->serial_no         = $input['serial_no'];
	        }else{
	        	$sub_category->serial_no         = $sub_category->id;
	        }
	        $sub_category->save();
	        return true;
	    }

	    public function update($id, $input)
	    {
	        $sub_category = $this->findOrThrowException($id);

	        if ($sub_category->update($input)) {
	          	$sub_category->serial_no         = $input['serial_no'];
		        $sub_category->category_id      = $input['category_id'];
		        $sub_category->title      		= $input['title'];
		        $sub_category->mm_title      	= $input['mm_title'];
	          	$sub_category->save();

	          	if($sub_category->serial_no != 0){
	          		$sub_category->serial_no         = $input['serial_no'];
	          	}else{
	        	$sub_category->serial_no         = $sub_category->id;
	        }



	          return true;
	        }

	        throw new GeneralException(trans('exceptions.backend.access.sub_category.update_error'));
	    }

	    public function destroySubcategory($id){
	    	$sub_category = $this->findOrThrowException($id);
	    	if ($sub_category->delete()) {
           		return true;
        	}
	    }
	}

?>