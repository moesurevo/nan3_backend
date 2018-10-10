@extends('layouts.master')
@section('content')
	<section class="content">
		<div class="row">
			<div class="col-xs-8">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Answer Detail</h3>
					</div>
					<div class="box-body no-padding">
						<table class="table table-striped">
							<tr>
								<th>  Serial No  </th>
								<td> {!!$answer->serial_no!!}</td>
							</tr>
							<tr>
								<th> Question  </th>
								<td> {!!$answer->question->questioneng!!}</td>
							</tr>
							<tr>
								<th> Point  </th>
								<td> {!!$answer->point!!}</td>
							</tr>
							<tr>
								<th> <small class="label bg-blue">EN</small> Answer </th>
								<td> {!!$answer->answereng!!}</td>
							</tr>
							<tr>
								<th> <small class="label bg-green">MM</small> Answer  </th>
								<td> {!!$answer->answermm!!}</td>
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