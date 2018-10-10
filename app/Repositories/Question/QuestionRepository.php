<?php 
	namespace App\Repositories\Question;

	use Illuminate\Database\Eloquent\Model;

	use App\Model\Question;

	class QuestionRepository implements QuestionInterface{
		// model property on class instances
	    protected $model;
	    // Constructor to bind model to repo
	    public function __construct(Question $model)
	    {
	        $this->model = $model;
	    }

	    public function findOrThrowException($id)
	    {
	        if (! is_null(Question::where('id',$id))) {
	           return Question::find($id);
	        }

	        throw new GeneralException(trans('exceptions.backend.access.Question.not_found'));
	    }

	    public function getAllQuestion($order_by = 'created_at', $sort = 'asc')
	    {
	        return $this->model->orderBy($order_by, $sort)->get();
	    }

	    public function createQuestion($input,$type)
	    {
	        $question               	= new Question;
	        $question->serial_no        = $input['serial_no'];
	        $question->quiztitleid      = $input['quiztitleid'];
	        $question->questioneng      		= $input['questioneng'];
	        $question->questionmm      	= $input['questionmm'];
	        $question->save();
	        
	        if($question->serial_no != 0){
	        	$question->serial_no         = $input['serial_no'];
	        }else{
	        	$question->serial_no         = $question->id;
	        }
	        $question->save();
	        return true;
	    }

	    public function update($id, $input)
	    {
	        $question = $this->findOrThrowException($id);

	        if ($question->update($input)) {
	          	$question->serial_no         = $input['serial_no'];
		        $question->quiztitleid      = $input['quiztitleid'];
		        $question->questioneng      = $input['questioneng'];
		        $question->questionmm      	= $input['questionmm'];
	          	$question->save();

	          	if($question->serial_no != 0){
	          		$question->serial_no         = $input['serial_no'];
	          	}else{
	        	$question->serial_no         = $question->id;
	        }



	          return true;
	        }

	        throw new GeneralException(trans('exceptions.backend.access.question.update_error'));
	    }

	    public function destroyQuestion($id){
	    	$question = $this->findOrThrowException($id);
	    	if ($question->delete()) {
           		return true;
        	}
	    }
	}

?>