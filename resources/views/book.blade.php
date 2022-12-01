@extends('index')

@section('title','BOOKS')

@section('content')
	<div class="fullcontent">
		<h1>BOOK'S</h1>
		<ul style="text-align: center;text-decoration: none;">

		@foreach($products as $datas)

			@if($datas['type']=="book")  
				{{$datas['title']}} <br/>
				{{$datas['firstname']}} <br/>
				{{$datas['mainname']}} <br/>
				{{$datas['price']}}<br><br>
			
				
			@endif
			<a href="/edit/{{ $datas['id'] }}">Select</a>
		
		@endforeach
	</ul>
	
	
	
	</div>


@endsection