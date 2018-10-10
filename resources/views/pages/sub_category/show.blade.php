@extends('layouts.master')
@section('content')
	<section class="content">
		<div class="row">
			<div class="col-xs-8">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Subcategory Detail</h3>
					</div>
					<div class="box-body no-padding">
						<table class="table table-striped">
							<tr>
								<th>  Serial No  </th>
								<td> {!!$sub_category->serial_no!!}</td>
							</tr>
							<tr>
								<th> Category  </th>
								<td> {!!$sub_category->category->title!!}</td>
							</tr>
							<tr>
								<th> <small class="label bg-blue">EN</small> Title </th>
								<td> {!!$sub_category->title!!}</td>
							</tr>
							<tr>
								<th> <small class="label bg-green">MM</small> Title  </th>
								<td> {!!$sub_category->mm_title!!}</td>
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