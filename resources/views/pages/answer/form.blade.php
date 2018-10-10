@if(isset($quiz))
    {!! Form::model($quiz, ['route' => ['quiz.update', $quiz->id],  'method' => 'PATCH']) !!}
@else
    {!! Form::open(array( 'url' => 'quiz')) !!} 
@endif

	<div class="box-body">

		<div class="form-group {!! $errors->has('serial_no') ? 'has-error' : '' !!}">
			<label for="eng_title_no"> Serial No</label>
			<input type="number" class="form-control" id="exampleInputEmail1" placeholder="Enter Serial No" name="serial_no" value="{!! isset($quiz) ? $quiz['serial_no'] : 0!!}" min="0">
		</div>

		<div class="form-group {!! $errors->has('sub_category_id') ? 'has-error' : '' !!}">
			<label for="sub_category_id"> Sub Category </label>
			<select class="form-control" name="sub_category_id">
				<option value="">--- Select State ---</option>
				@if(!empty($sub_category_data))
				  	@foreach($sub_category_data as $key)
				    	<option value="{{ $key->id }}" {!! isset($quiz) && $quiz->sub_category_id == $key->id ? 'selected' : ''!!}>{{ $key->title }}</option>
				  	@endforeach
				@endif
			</select>
		</div>


		<div class="form-group {!! $errors->has('content') ? 'has-error' : '' !!}">
			<label for="eng_content"><small class="label bg-blue">EN</small> Content</label>
			<textarea class="form-control" placeholder="Enter content" name="content">{!! isset($quiz) ? $quiz['content'] : old('content')!!}</textarea>
			@if ($errors->has('content'))
            	<span class="help-block">{{ $errors->first('content') }}</span>
          	@endif
		</div>

		<div class="form-group {!! $errors->has('mm_content') ? 'has-error' : '' !!}">
			<label for="mm_content"><small class="label bg-green">MM</small> Title</label>
			<textarea class="form-control" placeholder="Enter Title" name="mm_content">{!! isset($quiz) ? $quiz['mm_content'] : old('mm_content')!!}</textarea>
			@if ($errors->has('mm_content'))
            	<span class="help-block">{{ $errors->first('mm_content') }}</span>
          	@endif
		</div>

		<div class="form-group {!! $errors->has('marks') ? 'has-error' : '' !!}">
			<label for="eng_title_no"> Marks</label>
			<input type="number" class="form-control" id="exampleInputEmail1" placeholder="Enter Serial No" name="marks" value="{!! isset($quiz) ? $quiz['marks'] : 1!!}" min="1">
			@if ($errors->has('marks'))
            	<span class="help-block">{{ $errors->first('marks') }}</span>
          	@endif
		</div>

	</div>
	<div class="box-footer">
	    <button type="submit" class="btn btn-primary">Submit</button>
	    <button type="button" class="btn btn-danger bg-red" onclick="goBack()"> Back</button>
	</div>
{!! Form::close() !!}