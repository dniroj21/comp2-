@extends('welcome')

@section('content')

    <div class="form">
    <h1>EDIT PRODUCT</h1>
    @if(Session::get('success'))     <span>{{Session::get('success')}}</span>             @endif             @if(Session::get('fail'))                 <span>{{Session::get('fail')}}</span>             @endif       

      
    @foreach($products as $data)

    <form action="/update/{{$data['id']}}"  method="post">
    


        @csrf
        @method('put')
        @if(Session::get('success'))
                <span>{{Session::get('success')}}</span>
        @endif
        @if(Session::get('fail'))
                <span>{{Session::get('fail')}}</span>
        @endif
       
        <label for="producttype">Product Type:</label>
        <select id="producttype" name="producttype">
                     <option>{{ $data['type'] }}</option><!-- -->
            

        </select> 
        <br />
        
        <br/>
        
        <input class="form-control" type="text" id="fname" name="fname" placeholder="First Name" value="{{$data['firstname']}}"class="form-control">
        <br />

        
        <input type="text" id="sname" name="sname" placeholder="Main Name / Surname / Console:" value="{{$data['mainname']}}"class="form-control">
        <br />
        
        
        <input type="text" id="title" name="title" placeholder="title" value="{{$data['title']}}"class="form-control">
        <br />
        
        
        @if($data['type']=='book')
            <input type="text" name="pages" placeholder="pages/playlength" value="{{$data['numpages']}}"class="form-control">
            @else
            <input type="text" name="pages" placeholder="pages/playlength" value="{{$data['playlength']}}"class="form-control">
        @endif
        <br />
        
        
        <input type="text" id="price" name="price" placeholder="Price" value="{{$data['price']}}"class="form-control">
        <br />
         
        <input type="submit" value="UPDATE" class="btn-class">
        
    </form> 
    <form action="/delete/{{$data['id']}}" method="post">
        @csrf
        @method('delete')
        <input type="submit"  value="DELETE" class="btn-class">
        </form>
        @endforeach
</div>
 @endsection