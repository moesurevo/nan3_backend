<?php 
	namespace App\Repositories\Answer;

	use Illuminate\Database\Eloquent\Model;

	use App\Model\Answer;

	class AnswerRepository implements AnswerInterface{
		// model property on class instances
	    protected $model;
	    // Constructor to bind model to repo
	    public function __construct(Answer $model)
	    {
	        $this->model = $model;
	    }

	    public function findOrThrowException($id)
	    {
	        if (! is_null(Answer::where('id',$id))) {
	           return Answer::find($id);
	        }

	        throw new GeneralException(trans('exceptions.backend.access.Answer.not_found'));
	    }

	    public function getAllAnswer($order_by = 'created_at', $sort = 'asc')
	    {
	        return $this->model->orderBy($order_by, $sort)->get();
	    }

	    public function createAnswer($input,$type)
	    {
	        $answer               			= new Answer;
	        $answer->serial_no        		= $input['serial_no'];
	        $answer->questionid      		= $input['questionid'];
	        $answer->answermm      			= $input['answermm'];
	        $answer->answereng      		= $input['answereng'];
	        $answer->point      			= $input['point'];
	        $answer->save();
	        
	        if($answer->serial_no != 0){
	        	$answer->serial_no         = $input['serial_no'];
	        }else{
	        	$answer->serial_no         = $answer->id;
	        }
	        $answer->save();
	        return true;
	    }

	    public function update($id, $input)
	    {
	        $answer = $this->findOrThrowException($id);

	        if ($answer->update($input)) {

	          	$answer->serial_no        		= $input['serial_no'];
		        $answer->questionid     		= $input['questionid'];
		        $answer->answermm      			= $input['answermm'];
		        $answer->answereng      		= $input['answereng'];
		        $answer->point      			= $input['point'];
		        $answer->save();
		        
		        if($answer->serial_no != 0){
		        	$answer->serial_no         = $input['serial_no'];
		        }else{
		        	$answer->serial_no         = $answer->id;
		        }
		        $answer->save();

	          return true;
	        }

	        throw new GeneralException(trans('exceptions.backend.access.answer.update_error'));
	    }

	    public function destroyAnswer($id){
	    	$answer = $this->findOrThrowException($id);
	    	if ($answer->delete()) {
           		return true;
        	}
	    }
	}

?>