@extends('index')

@section('content')
<div>
	<center>
<br>
			<h1>Add Product</h1>
	
	<form method="post" action="/adddata">
		@csrf
	<br>
	<select id="producttype" name="producttype">
	<option value="cd">CD</option>
	<option value="book">Book</option>
	<select><br>
	<textarea name="title"class="Title" placeholder="Title"></textarea><br>
	<textarea name="fName" placeholder="first name"></textarea><br>
	<textarea name="sName" placeholder="surname/Band"></textarea><br>
	<textarea name="price" placeholder="price"></textarea><br>
	<textarea name="page" placeholder="pages/length/"></textarea><br>
	<button type="SUBMIT" method="post" class="button">Add New</button>

	</form>
	
	</center>
</div>
@endsection


