@if(isset($quiz_title))
    {!! Form::model($quiz_title, ['route' => ['quiz_title.update', $quiz_title->id],  'method' => 'PATCH']) !!}
@else
    {!! Form::open(array( 'url' => 'quiz_title')) !!} 
@endif

	<div class="box-body">
		<div class="form-group {!! $errors->has('title_no') ? 'has-error' : '' !!}">
			<label for="eng_title_no"><small class="label bg-blue">EN</small> Title No</label>
			<input type="number" class="form-control" id="exampleInputEmail1" placeholder="Enter Title No" name="title_no" value="{!! isset($quiz_title) ? $quiz_title['title_no'] : old('title_no')!!}">
			@if ($errors->has('title_no'))
            	<span class="help-block">{{ $errors->first('title_no') }}</span>
          	@endif
		</div>

		<div class="form-group {!! $errors->has('mm_title_no') ? 'has-error' : '' !!}">
			<label for="mm_title_no"><small class="label bg-green">MM</small> Title No</label>
			<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Title No" name="mm_title_no" value="{!! isset($quiz_title) ? $quiz_title['mm_title_no'] : old('mm_title_no')!!}">
			@if ($errors->has('mm_title_no'))
            	<span class="help-block">{{ $errors->first('mm_title_no') }}</span>
          	@endif
		</div>

		<div class="form-group {!! $errors->has('titleeng') ? 'has-error' : '' !!}">
			<label for="titleeng"><small class="label bg-blue">EN</small> Title</label>
			<textarea class="form-control" placeholder="Enter Title Eng" name="titleeng">{!! isset($quiz_title) ? $quiz_title['titleeng'] : old('titleeng')!!}</textarea>
			@if ($errors->has('titleeng'))
            	<span class="help-block">{{ $errors->first('titleeng') }}</span>
          	@endif
		</div>

		<div class="form-group {!! $errors->has('titlemm') ? 'has-error' : '' !!}">
			<label for="titlemm"><small class="label bg-green">MM</small> Title</label>
			<textarea class="form-control" placeholder="Enter Title MM" name="titlemm">{!! isset($quiz_title) ? $quiz_title['titlemm'] : old('titlemm')!!}</textarea>
			@if ($errors->has('titlemm'))
            	<span class="help-block">{{ $errors->first('titlemm') }}</span>
          	@endif
		</div>

	</div>
	<div class="box-footer">
	    <button type="submit" class="btn btn-primary">Submit</button>
	    <button type="button" class="btn btn-danger bg-red" onclick="goBack()"> Back</button>
	</div>
{!! Form::close() !!}