@extends('welcome')

@section('content')

		<div class="book">
			<h1> BOOK'S</h1>
                @foreach($products as $datas)
                  
                @if($datas['type']=="book") 
                <ul>
                <li>{{$datas['title']}}</li> 
                {{$datas['firstname']}} <br/>
                {{$datas['mainname']}} <br/>
                {{$datas['price']}}<br><br>
                <a href="/edit/{{$datas['id']}}">edit</a>
                <br>
                @endif
           </ul>
                @endforeach
        </div>
        <div class="cd">
        	<h1> CD'S</h1>
                @foreach($products as $datas)
                 
                @if($datas['type']=="cd") 
                 <ul>
                <li>{{$datas['title']}}</li> 
                {{$datas['firstname']}} <br/>
                {{$datas['mainname']}} <br/>
                {{$datas['price']}}<br><br>
                <a href="/edit/{{$datas['id']}}">edit</a>
                <br>
                @endif
           </ul>
                @endforeach
        </div>

<div class="form">
	<h1> ADD PRODUCT</h1>
	<form action="/adddata" method="post">
		@csrf
		

		<label for="producttype">Product Type:</label>
		<select id="producttype" name="producttype">
			<option value="cd">CD</option>          <!-- -->
			<option value="book">Book</option>
		

		</select> 
		<br>
		<br>
		
		<input type="text" id="fname" name="fname" placeholder="First Name" class="form-control">
		<br />
		
		<input type="text" id="sname" name="sname" placeholder="Main Name / Surname / Console:" class="form-control">
		<br />
		
		
		<input type="text" id="title" name="title" placeholder="title" class="form-control">
		<br />
		
		
		<input type="text" id="pages" name="pages" placeholder="Pages/Duration:" class="form-control">
		<br />
		
		
		<input type="text" id="price" name="price" placeholder="Price" class="form-control">
		<br />
		 
		<input type="submit" value="Submit" class="btn-class">
	</form> 

</div>

@endsection