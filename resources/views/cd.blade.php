@extends('layout.app')

@section('content')
<div class="cd">
	<h1>CD'S</h1>
	<ul ">

		@foreach($alldata as $datas)
		
			@if($datas['type']=="cd") 
			 
				<li>{{$datas['title']}} <br/></li>
				<li>{{$datas['firstname']}} <br/></li>
				<li>{{$datas['mainname']}} <br/></li>
				<li>{{$datas['price']}}<br><br></li>
			
			
			@endif


		@endforeach
	</ul>
</div>
@endsection