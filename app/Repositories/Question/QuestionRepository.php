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
	    	$multiple_select = 0;
	    	if(isset($input['multiple_select'])){
	        		$multiple_select = $input['multiple_select'];
	        }
	        $question               	= new Question;
	        $question->serial_no        = $input['serial_no'];
	        $question->quiztitleid      = $input['quiztitleid'];
	        $question->questioneng      		= $input['questioneng'];
	        $question->questionmm      	= $input['questionmm'];
	        $question->multiple_select  =$multiple_select;
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
	        $multiple_select = 0;
	        if ($question->update($input)) {
	        	if(isset($input['multiple_select'])){
	        		$multiple_select = $input['multiple_select'];
	        	}
	          	$question->serial_no         = $input['serial_no'];
		        $question->quiztitleid      = $input['quiztitleid'];
		        $question->questioneng      = $input['questioneng'];
		        $question->questionmm      	= $input['questionmm'];
		        $question->multiple_select  =$multiple_select;
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