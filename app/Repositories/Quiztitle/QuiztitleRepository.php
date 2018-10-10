<?php 
	namespace App\Repositories\Quiztitle;

	use Illuminate\Database\Eloquent\Model;

	use App\Model\Quiztitle;

	class QuiztitleRepository implements QuiztitleInterface{
		// model property on class instances
	    protected $model;
	    // Constructor to bind model to repo
	    public function __construct(Quiztitle $model)
	    {
	        $this->model = $model;
	    }

	    public function findOrThrowException($id)
	    {
	        if (! is_null(Quiztitle::where('id',$id))) {
	           return Quiztitle::find($id);
	        }

	        throw new GeneralException(trans('exceptions.backend.access.Quiztitle.not_found'));
	    }

	    public function getAllQuiztitle($order_by = 'created_at', $sort = 'asc')
	    {
	        return $this->model->orderBy($order_by, $sort)->get();
	    }

	    public function createQuiztitle($input,$type)
	    {
	        $quiz_title               	= new Quiztitle;
	        $quiz_title->title_no         = $input['title_no'];
	        $quiz_title->mm_title_no      = $input['mm_title_no'];
	        $quiz_title->titlemm  		= $input['titlemm'];
	        $quiz_title->titleeng      	= $input['titleeng'];
	        $quiz_title->save();
	        return true;
	    }

	    public function update($id, $input)
	    {
	        $quiz_title = $this->findOrThrowException($id);

	        if ($quiz_title->update($input)) {

	          	$quiz_title->title_no         = $input['title_no'];
		        $quiz_title->mm_title_no      = $input['mm_title_no'];
		        $quiz_title->titleeng      		= $input['titleeng'];
		        $quiz_title->titlemm      	= $input['titlemm'];
	          	$quiz_title->save();

	          return true;
	        }

	        throw new GeneralException(trans('exceptions.backend.access.quiz_title.update_error'));
	    }

	    public function destroyQuiztitle($id){
	    	$quiz_title = $this->findOrThrowException($id);
	    	if ($quiz_title->delete()) {
           		return true;
        	}
	    }
	}

?>