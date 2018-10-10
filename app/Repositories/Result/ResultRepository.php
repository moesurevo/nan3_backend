<?php 
	namespace App\Repositories\Result;

	use Illuminate\Database\Eloquent\Model;

	use App\Model\Result;

	class ResultRepository implements ResultInterface{
		// model property on class instances
	    protected $model;
	    // Constructor to bind model to repo
	    public function __construct(Result $model)
	    {
	        $this->model = $model;
	    }

	    public function findOrThrowException($id)
	    {
	        if (! is_null(Result::where('id',$id))) {
	           return Result::find($id);
	        }

	        throw new GeneralException(trans('exceptions.backend.access.Result.not_found'));
	    }

	    public function getAllResult($order_by = 'created_at', $sort = 'asc')
	    {
	        return $this->model->orderBy($order_by, $sort)->get();
	    }

	    public function createResult($input,$type)
	    {
	        $result               			= new Result;
	        $result->quizid      			= $input['quizid'];
	        $result->resulteng      		= $input['resulteng'];
	        $result->resultmm      			= $input['resultmm'];
	        $result->pointminimum      		= $input['pointminimum'];
	        $result->pointmaximum      		= $input['pointmaximum'];
	        $result->video_url      		= $input['video_url'];
	        $result->save();
	        return true;
	    }

	    public function update($id, $input)
	    {
	        $result = $this->findOrThrowException($id);

	        if ($result->update($input)) {
	          	$result->quizid      			= $input['quizid'];
		        $result->resulteng      		= $input['resulteng'];
		        $result->resultmm      			= $input['resultmm'];
		        $result->pointminimum      		= $input['pointminimum'];
		        $result->pointmaximum      		= $input['pointmaximum'];
		        $result->video_url      		= $input['video_url'];
	          	$result->save();



	          return true;
	        }

	        throw new GeneralException(trans('exceptions.backend.access.result.update_error'));
	    }

	    public function destroyResult($id){
	    	$result = $this->findOrThrowException($id);
	    	if ($result->delete()) {
           		return true;
        	}
	    }
	}

?>