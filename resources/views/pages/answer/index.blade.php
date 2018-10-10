@extends('layouts.master')
@section('content')
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
    					<h3 class="box-title">Answer List</h3>
		                <div class="box-tools pull-right">
		                        <a href="{!! url('answer/create') !!}" class="btn btn-md btn-info">Create</a>
		                </div>
			        </div>
			        <div class="box-body">
			        	@if (session('status'))
			        		<div class="alert alert-success alert-dismissible">
				                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				                {{ session('status') }}
			             	</div>
						@endif

						

			        	<table id="example1" class="table table-bordered table-striped">
			        		<thead>
			        			<tr>
			        				<th>No.</th>
			        				<th> Serial No.</th>
					                <th> Point </th>
					                <th> Action </th>
			        			</tr>
			        		</thead>
			        		<tbody>
			        			<?php $i= 0 ?>
			        			@foreach ($answer_data as $row)
				        			<tr>
				        				<td>{!! ++$i!!}</td>
				        				<td> {!! $row->serial_no !!} </td>
	                    				<td> {!! $row->point !!} </td>
	                    				<td>
	                    					<a class="btn btn-xs bg-orange" href="{{url('answer/'.$row->id)}}"><i class="fa fa-eye"></i> Detail</a>
	                    					<a class="btn btn-xs btn-info" href="{{url('answer/'.$row->id.'/edit')}}"><i class="fa fa-edit"></i> Edit</a>
				    						{{ Form::open(array('method' => 'DELETE', 'route' => array('answer.destroy', $row->id), 'style'=>'display: inline')) }}
				                    		<button type="button" class="btn btn-xs bg-maroon delete" value="x" data-placement="top" data-original-title="Delete"><i class="fa fa-trash-o icon-white"></i> Delete </button>
				                    		{{ Form::close() }}
	                    				</td>
				        				
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