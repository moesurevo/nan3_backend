@extends('layouts.master')
@section('content')
	<section class="content">
		<div class="row">
			<div class="col-md-6">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Create Question</h3>
					</div>
					@include('pages.question.form')
				</div>
			</div>
		</div>
	</section>
@stop