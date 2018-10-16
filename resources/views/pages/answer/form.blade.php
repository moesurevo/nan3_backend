@if(isset($answer))
    {!! Form::model($answer, ['route' => ['answer.update', $answer->id],  'method' => 'PATCH']) !!}
@else
    {!! Form::open(array( 'url' => 'answer')) !!} 
@endif

	<div class="box-body">

		<div class="form-group {!! $errors->has('serial_no') ? 'has-error' : '' !!}">
			<label for="eng_title_no"> Serial No</label>
			<input type="number" class="form-control" id="exampleInputEmail1" placeholder="Enter Serial No" name="serial_no" value="{!! isset($answer) ? $answer['serial_no'] : 0!!}" min="0">
		</div>

		<div class="form-group {!! $errors->has('questionid') ? 'has-error' : '' !!}">
			<label for="questionid"> Question </label>
			<select class="form-control" name="questionid">
				<option value="">--- Select Question ---</option>
				@if(!empty($question_data))
				  	@foreach($question_data as $key)
				    	<option value="{{ $key->id }}" {!! isset($answer) && $answer->questionid == $key->id ? 'selected' : ''!!}>{{ $key->questioneng }}</option>
				  	@endforeach
				@endif
			</select>
		</div>


		<div class="form-group {!! $errors->has('answereng') ? 'has-error' : '' !!}">
			<label for="answereng"><small class="label bg-blue">EN</small> Answer</label>
			<textarea class="form-control" placeholder="Enter answereng" name="answereng">{!! isset($answer) ? $answer['answereng'] : old('answereng')!!}</textarea>
			@if ($errors->has('answereng'))
            	<span class="help-block">{{ $errors->first('answereng') }}</span>
          	@endif
		</div>

		<div class="form-group {!! $errors->has('answermm') ? 'has-error' : '' !!}">
			<label for="answermm"><small class="label bg-green">MM</small> Answer</label>
			<textarea class="form-control" placeholder="Enter Title" name="answermm">{!! isset($answer) ? $answer['answermm'] : old('answermm')!!}</textarea>
			@if ($errors->has('answermm'))
            	<span class="help-block">{{ $errors->first('answermm') }}</span>
          	@endif
		</div>

		<div class="form-group {!! $errors->has('point') ? 'has-error' : '' !!}">
			<label for="eng_title_no"> Point</label>
			<input type="number" class="form-control" id="exampleInputEmail1" placeholder="Enter Point" name="point" value="{!! isset($answer) ? $answer['point'] : 0!!}" min="0">
			@if ($errors->has('point'))
            	<span class="help-block">{{ $errors->first('point') }}</span>
          	@endif
		</div>

	</div>
	<div class="box-footer">
	    <button type="submit" class="btn btn-primary">Submit</button>
	    <button type="button" class="btn btn-danger bg-red" onclick="goBack()"> Back</button>
	</div>
{!! Form::close() !!}