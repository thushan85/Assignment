@extends('layouts.default')
@section('content')

<style type="text/css">
.search-wrap{
    margin-top:100px;
}
.search-filters-wrap{
    margin-bottom:50px;
}
</style>
<div class="container search-wrap">
	<div class="row">
        <div class="col-md-9 search-filters-wrap">
            <form action="/search" method="get">
                <div class="input-group col-md-9">
                    <label class="control-label col-sm-6">Search hotels by city:</label>
                    <div class="col-sm-8">
                        <select id="city_id" name="city_id" class="form-control selectpicker" data-live-search="true" >
                            <option value="">All</option>
                             @foreach ($cities as $key => $city)
                                 <option value="{{{$key}}}" <?= $key == $selected_city_id ? 'selected="selected"' : ''?>>{{{$city}}}</option>
                             @endforeach
                        </select>
                    </div>
                    
                    <div class="col-sm-1">
                        <button type="submit" class="btn-primary btn">Search</button>
                    </div>
                </div>
            </form>
        </div><br/>
        
		<div class="col-md-9">
    	 <table class="table table-list-search">
                    <thead>
                        <tr>
                            <th>Hotel Name</th>
                            <th>City</th>
                            <th>Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($result as $key => $row)
                        <tr>
                            <td>{{{$row->name}}}</td>
                            <td>{{{$row->city->name}}}</td>
                            <td>{{{$row->address}}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>   
		</div>
	</div>
</div>



@stop
