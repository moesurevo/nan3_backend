<?php 
	namespace App\Repositories\User;

	use Illuminate\Database\Eloquent\Model;

	use App\User;

	class UserRepository implements UserInterface{
		// model property on class instances
	    protected $model;
	    // Constructor to bind model to repo
	    public function __construct(User $model)
	    {
	        $this->model = $model;
	    }

	    public function getAllUser($order_by = 'created_at', $sort = 'asc')
	    {
	        return $this->model->orderBy($order_by, $sort)->get();
	    }
	}

?>