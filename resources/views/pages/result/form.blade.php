@if(isset($result))
    {!! Form::model($result, ['route' => ['result.update', $result->id],  'method' => 'PATCH']) !!}
@else
    {!! Form::open(array( 'url' => 'result')) !!} 
@endif

	<div class="box-body">

		<div class="form-group {!! $errors->has('quizid') ? 'has-error' : '' !!}">
			<label for="quizid"> Quiz Title </label>
			<select class="form-control" name="quizid">
				<option value="">--- Select Quiz Title ---</option>
				@if(!empty($quiz_title_data))
				  	@foreach($quiz_title_data as $key)
				    	<option value="{{ $key->id }}" {!! isset($result) && $result->quizid == $key->id ? 'selected' : ''!!}>{{ $key->titleeng }}</option>
				  	@endforeach
				@endif
			</select>
		</div>


		<div class="form-group {!! $errors->has('resulteng') ? 'has-error' : '' !!}">
			<label for="resulteng"><small class="label bg-blue">EN</small> Result</label>
			<textarea class="form-control" placeholder="Enter Result" name="resulteng">{!! isset($result) ? $result['resulteng'] : old('resulteng')!!}</textarea>
			@if ($errors->has('resulteng'))
            	<span class="help-block">{{ $errors->first('resulteng') }}</span>
          	@endif
		</div>

		<div class="form-group {!! $errors->has('resultmm') ? 'has-error' : '' !!}">
			<label for="resultmm"><small class="label bg-green">MM</small> Result</label>
			<textarea class="form-control" placeholder="Enter Result" name="resultmm">{!! isset($result) ? $result['resultmm'] : old('resultmm')!!}</textarea>
			@if ($errors->has('resultmm'))
            	<span class="help-block">{{ $errors->first('resultmm') }}</span>
          	@endif
		</div>

		<div class="form-group {!! $errors->has('pointminimum') ? 'has-error' : '' !!}">
			<label for="pointminimum"> Min.point</label>
			<input type="number" class="form-control" id="exampleInputEmail1" placeholder="Enter Min.point" name="pointminimum" value="{!! isset($result) ? $result['pointminimum'] : 0!!}" min="0">
		</div>


		<div class="form-group {!! $errors->has('pointmaximum') ? 'has-error' : '' !!}">
			<label for="pointmaximum"> Max.point</label>
			<input type="number" class="form-control" id="exampleInputEmail1" placeholder="Enter Max.point" name="pointmaximum" value="{!! isset($result) ? $result['pointmaximum'] : 0!!}" min="0">
		</div>

		<div class="form-group {!! $errors->has('video_url') ? 'has-error' : '' !!}">
			<label for="video_url"> Video Url</label>
			<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter video url " name="video_url" value="{!! isset($result) ? $result['video_url'] : old('video_url')!!}">
			@if ($errors->has('video_url'))
            	<span class="help-block">{{ $errors->first('video_url') }}</span>
          	@endif
		</div>

	</div>
	<div class="box-footer">
	    <button type="submit" class="btn btn-primary">Submit</button>
	    <button type="button" class="btn btn-danger bg-red" onclick="goBack()"> Back</button>
	</div>
{!! Form::close() !!}