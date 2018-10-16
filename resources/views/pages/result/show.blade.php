@extends('layouts.master')
@section('content')
	<section class="content">
		<div class="row">
			<div class="col-xs-8">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Result Detail</h3>
					</div>
					<div class="box-body no-padding">
						<table class="table table-striped">
							<tr>
								<th> Quiz Title  </th>
								<td> {!!$result->quiztitle->titleeng!!}</td>
							</tr>
							<tr>
								<th> Min.point  </th>
								<td> {!!$result->pointminimum!!}</td>
							</tr>
							<tr>
								<th> Max.point  </th>
								<td> {!!$result->pointmaximum!!}</td>
							</tr>
							<tr>
								<th> Video Url  </th>
								<td> {!!$result->video_url!!}</td>
							</tr>
							<tr>
								<th> <small class="label bg-blue">EN</small> Result </th>
								<td> {!!$result->resulteng!!}</td>
							</tr>
							<tr>
								<th> <small class="label bg-green">MM</small> Result  </th>
								<td> {!!$result->resultmm!!}</td>
							</tr>
							
						</table>

						<div>
							<button type="button" class="btn bg-red btn-flat margin" onclick="goBack()"> Back</button>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</section>
@stop