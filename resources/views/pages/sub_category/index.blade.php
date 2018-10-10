@extends('layouts.master')
@section('content')
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
    					<h3 class="box-title">Subcategory List</h3>
		                <div class="box-tools pull-right">
		                        <a href="{!! url('sub_category/create') !!}" class="btn btn-md btn-info">Create</a>
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
					                <th> Title </th>
					                <th> Action </th>
			        			</tr>
			        		</thead>
			        		<tbody>
			        			<?php $i= 0 ?>
			        			@foreach ($sub_category_data as $row)
				        			<tr>
				        				<td>{!! ++$i!!}</td>
				        				<td> {!! $row->serial_no !!} </td>
	                    				<td> {!! $row->title !!} </td>
	                    				<td>
	                    					<a class="btn btn-xs bg-orange" href="{{url('sub_category/'.$row->id)}}"><i class="fa fa-eye"></i> Detail</a>
	                    					<a class="btn btn-xs btn-info" href="{{url('sub_category/'.$row->id.'/edit')}}"><i class="fa fa-edit"></i> Edit</a>
				    						<a data-href="{{ url('sub_category/delete/'.$row->id) }}" class="btn btn-xs bg-maroon" onclick="confirm($(this))" data-delete-content='sub_category'><i class="fa fa-trash"></i> Delete</a>
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