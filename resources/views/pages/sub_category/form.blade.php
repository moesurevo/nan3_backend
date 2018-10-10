@if(isset($sub_category))
    {!! Form::model($sub_category, ['route' => ['sub_category.update', $sub_category->id],  'method' => 'PATCH']) !!}
@else
    {!! Form::open(array( 'url' => 'sub_category')) !!} 
@endif

	<div class="box-body">

		<div class="form-group {!! $errors->has('serial_no') ? 'has-error' : '' !!}">
			<label for="eng_title_no"> Serial No</label>
			<input type="number" class="form-control" id="exampleInputEmail1" placeholder="Enter Serial No" name="serial_no" value="{!! isset($sub_category) ? $sub_category['serial_no'] : 0!!}" min="0">
		</div>

		<div class="form-group {!! $errors->has('category_id') ? 'has-error' : '' !!}">
			<label for="category_id"> Category </label>
			<select class="form-control" name="category_id">
				<option value="">--- Select State ---</option>
				@if(!empty($category_data))
				  	@foreach($category_data as $key)
				    	<option value="{{ $key->id }}" {!! isset($sub_category) && $sub_category->category_id == $key->id ? 'selected' : ''!!}>{{ $key->title }}</option>
				  	@endforeach
				@endif
			</select>
		</div>


		<div class="form-group {!! $errors->has('title') ? 'has-error' : '' !!}">
			<label for="eng_title"><small class="label bg-blue">EN</small> Title</label>
			<textarea class="form-control" placeholder="Enter Title" name="title">{!! isset($sub_category) ? $sub_category['title'] : old('title')!!}</textarea>
			@if ($errors->has('title'))
            	<span class="help-block">{{ $errors->first('title') }}</span>
          	@endif
		</div>

		<div class="form-group {!! $errors->has('mm_title') ? 'has-error' : '' !!}">
			<label for="mm_title"><small class="label bg-green">MM</small> Title</label>
			<textarea class="form-control" placeholder="Enter Title" name="mm_title">{!! isset($sub_category) ? $sub_category['mm_title'] : old('mm_title')!!}</textarea>
			@if ($errors->has('mm_title'))
            	<span class="help-block">{{ $errors->first('mm_title') }}</span>
          	@endif
		</div>

	</div>
	<div class="box-footer">
	    <button type="submit" class="btn btn-primary">Submit</button>
	    <button type="button" class="btn btn-danger bg-red" onclick="goBack()"> Back</button>
	</div>
{!! Form::close() !!}