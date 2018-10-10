<?php 
	namespace App\Repositories\Replier;

	use Illuminate\Database\Eloquent\Model;

	use App\Model\Replier;

	class ReplierRepository implements ReplierInterface{
		// model property on class instances
	    protected $model;
	    // Constructor to bind model to repo
	    public function __construct(Replier $model)
	    {
	        $this->model = $model;
	    }

	    public function getAllRepliers($order_by = 'created_at', $sort = 'asc')
	    {
	        return $this->model->orderBy($order_by, $sort)->get();
	    }

	}

?>