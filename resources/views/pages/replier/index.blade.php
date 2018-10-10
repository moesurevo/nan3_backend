@extends('layouts.master')
@section('content')
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
    					<h3 class="box-title">Replier List</h3>
			        </div>
			        <div class="box-body">

			        	<table id="example1" class="table table-bordered table-striped">
			        		<thead>
			        			<tr>
			        				<th>No.</th>
			        				<th>Name</th>
					                <th>Email</th>
					                <th>Phone</th>
			        			</tr>
			        		</thead>
			        		<tbody>
			        			<?php $i= 0 ?>
			        			@foreach ($replier_data as $row)
				        			<tr>
				        				<td>{!! ++$i!!}</td>
				        				<td> {!! $row->name !!} </td>
	                    				<td> {!! $row->email !!} </td>
	                    				<td> {!! $row->phone_no !!} </td>
				        				
				        			</tr>
			        			@endforeach
			        		</tbody>
			        	</table>
			        </div>
				</div>
			</div>
		</div>
	</section>
@stop