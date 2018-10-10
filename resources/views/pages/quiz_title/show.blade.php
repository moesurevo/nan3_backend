@extends('layouts.master')
@section('content')
	<section class="content">
		<div class="row">
			<div class="col-xs-6">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Quiz Title Detail</h3>
					</div>
					<div class="box-body no-padding">
						<table class="table table-striped">
							<tr>
								<th> <small class="label bg-blue">EN</small> Title No  </th>
								<td> {!!$category->title_no!!}</td>
							</tr>
							<tr>
								<th> <small class="label bg-green">MM</small> Title No  </th>
								<td> {!!$category->mm_title_no!!}</td>
							</tr>
							<tr>
								<th> <small class="label bg-blue">EN</small> Title </th>
								<td> {!!$category->titleeng!!}</td>
							</tr>
							<tr>
								<th> <small class="label bg-green">MM</small> Title  </th>
								<td> {!!$category->titlemm!!}</td>
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