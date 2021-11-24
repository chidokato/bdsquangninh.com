@extends('admin.layout.index')
@section('news')
class="active"
@endsection
@section('content')


<div id="content" class="span12" style="min-height: 1000px;">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i> <a href="admin/dashboard">Dashboard</a> <i class="icon-angle-right"></i> 
		</li>
		<li>
			<a href="admin/news/list">News</a>
		</li>
		
	</ul>
	@if(session('Alerts'))
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<strong>
			{{session('Alerts')}} !
			</strong>
		</div>
	@endif
	<p><a href="admin/news/add"><button class="btn btn-primary"><i class="icon-plus"></i> Add</button></a></p>
	<div class="row-fluid">		
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon white user"></i><span class="break"></span>News list</h2>
			</div>
			<div class="box-content">
				<table class="table table-striped table-bordered bootstrap-datatable datatable">
				  <thead>
					  <tr>
						<th>ID</th>
						<th></th>
						<th>Name</th>
						<th>Category</th>
						<th>Hot</th>
						<th>Status</th>
						<th>date</th>
						<th>date up</th>
						<th>Actions</th>
				  </tr>
				  </thead>   
				  <tbody>
					@foreach($news as $val)
					<tr>
						<td>{{$val->id}}</td>
						<td><img style="height: 50px;width: 70px;object-fit: cover;" src="{{$val->img}}"/></td>
						<td>{{$val->name}}</td>
						<td><?php if(isset($val->Category->name)){echo $val->Category->name;} ?></td>
						<td class="center">
							<?php
								if($val['hot']==1) echo "Hot";
							?>
						</td>
						<td class="center">
							<?php
								if($val['status']==1) echo "Public";
							?>
						</td>
						<td class="center">{{$val->date}}</td>
						<td class="center">{{$val->date_up}}</td>
						
						<td class="center">
							<a class="btn btn-info" href="admin/news/edit/{{$val->id}}">
								<i class="halflings-icon white edit"></i>  
							</a>
							<a class="btn btn-danger" href="admin/news/delete/{{$val->id}}">
								<i class="halflings-icon white trash"></i> 
							</a>
						</td>
					</tr>
					@endforeach
				  </tbody>
			  </table>
			</div>
		</div><!--/span-->
	</div><!--/row-->
</div>
@endsection