@if(isset($question))
    {!! Form::model($question, ['route' => ['question.update', $question->id],  'method' => 'PATCH']) !!}
@else
    {!! Form::open(array( 'url' => 'question')) !!} 
@endif

	<div class="box-body">

		<div class="form-group {!! $errors->has('serial_no') ? 'has-error' : '' !!}">
			<label for="eng_title_no"> Serial No</label>
			<input type="number" class="form-control" id="exampleInputEmail1" placeholder="Enter Serial No" name="serial_no" value="{!! isset($question) ? $question['serial_no'] : 0!!}" min="0">
		</div>

		<div class="form-group {!! $errors->has('quiztitleid') ? 'has-error' : '' !!}">
			<label for="quiztitleid"> Category </label>
			<select class="form-control" name="quiztitleid">
				<option value="">--- Select State ---</option>
				@if(!empty($category_data))
				  	@foreach($category_data as $key)
				    	<option value="{{ $key->id }}" {!! isset($question) && $question->quiztitleid == $key->id ? 'selected' : ''!!}>{{ $key->title }}</option>
				  	@endforeach
				@endif
			</select>
		</div>


		<div class="form-group {!! $errors->has('questioneng') ? 'has-error' : '' !!}">
			<label for="questioneng"><small class="label bg-blue">EN</small> Question</label>
			<textarea class="form-control" placeholder="Enter Question" name="questioneng">{!! isset($question) ? $question['questioneng'] : old('questioneng')!!}</textarea>
			@if ($errors->has('questioneng'))
            	<span class="help-block">{{ $errors->first('questioneng') }}</span>
          	@endif
		</div>

		<div class="form-group {!! $errors->has('questionmm') ? 'has-error' : '' !!}">
			<label for="questionmm"><small class="label bg-green">MM</small> Question</label>
			<textarea class="form-control" placeholder="Enter Question" name="questionmm">{!! isset($question) ? $question['questionmm'] : old('questionmm')!!}</textarea>
			@if ($errors->has('questionmm'))
            	<span class="help-block">{{ $errors->first('questionmm') }}</span>
          	@endif
		</div>

	</div>
	<div class="box-footer">
	    <button type="submit" class="btn btn-primary">Submit</button>
	    <button type="button" class="btn btn-danger bg-red" onclick="goBack()"> Back</button>
	</div>
{!! Form::close() !!}