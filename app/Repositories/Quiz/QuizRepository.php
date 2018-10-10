<?php 
	namespace App\Repositories\Quiz;

	use Illuminate\Database\Eloquent\Model;

	use App\Model\Quiz;

	class QuizRepository implements QuizInterface{
		// model property on class instances
	    protected $model;
	    // Constructor to bind model to repo
	    public function __construct(Quiz $model)
	    {
	        $this->model = $model;
	    }

	    public function findOrThrowException($id)
	    {
	        if (! is_null(Quiz::where('id',$id))) {
	           return Quiz::find($id);
	        }

	        throw new GeneralException(trans('exceptions.backend.access.Quiz.not_found'));
	    }

	    public function getAllQuiz($order_by = 'created_at', $sort = 'asc')
	    {
	        return $this->model->orderBy($order_by, $sort)->get();
	    }

	    public function createQuiz($input,$type)
	    {
	        $quiz               		= new Quiz;
	        $quiz->serial_no        	= $input['serial_no'];
	        $quiz->sub_category_id      = $input['sub_category_id'];
	        $quiz->mm_content      		= $input['mm_content'];
	        $quiz->content      		= $input['content'];
	        $quiz->marks      			= $input['marks'];
	        $quiz->save();
	        
	        if($quiz->serial_no != 0){
	        	$quiz->serial_no         = $input['serial_no'];
	        }else{
	        	$quiz->serial_no         = $quiz->id;
	        }
	        $quiz->save();
	        return true;
	    }

	    public function update($id, $input)
	    {
	        $quiz = $this->findOrThrowException($id);

	        if ($quiz->update($input)) {

	          	$quiz->serial_no        	= $input['serial_no'];
		        $quiz->sub_category_id      = $input['sub_category_id'];
		        $quiz->mm_content      		= $input['mm_content'];
		        $quiz->content      		= $input['content'];
		        $quiz->marks      			= $input['marks'];
		        $quiz->save();
		        
		        if($quiz->serial_no != 0){
		        	$quiz->serial_no         = $input['serial_no'];
		        }else{
		        	$quiz->serial_no         = $quiz->id;
		        }
		        $quiz->save();

	          return true;
	        }

	        throw new GeneralException(trans('exceptions.backend.access.quiz.update_error'));
	    }

	    public function destroyQuiz($id){
	    	$category = $this->findOrThrowException($id);
	    	if ($category->delete()) {
           		return true;
        	}
	    }
	}

?>