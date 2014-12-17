<?php

class HotelController extends BaseController {
    
    public function index()
    {
        $cities = City::orderBy('name', 'ASC')->get();
        
        $data['cities'] = array();
        foreach($cities as $city) {
            $data['cities'][$city->id] = $city->name;        
        }
       
        return View::make('hotel/index', $data);
    }

	public function save()
	{
       $response = array();
       
       $input = Input::all();
       
       $validation = \Validator::make(
            array(
                'name' => $input['hotel_name'],
                'city_id' => $input['hotel_city_id'],
                'address' => $input['hotel_address']
            ),
            array(
                'name' => array('required','alpha_dash'),
                'city_id' => 'required|numeric',
                'address' => 'required'
            )
        );
        
        if ( $validation->fails() ) {
            
            $response['error'] = true;
            $response['message'] = '';
            
            foreach($validation->messages()->all('<p>:message</p>') as $msg) {
                $response['message'] .= $msg;
            }
            
        } else {
            $data = array('name' => $input['hotel_name'], 'city_id' => $input['hotel_city_id'], 'address' => $input['hotel_address']);
            $ret = Hotel::add($data);
           
            if(!$ret) {
                $response['error'] =  true;
                $response['message'] =  "An error occured while saving. Please try agin.";
            } else {
                $response['error'] =  false;
                $response['message'] =  "Successfully Saved.";
            }
        }
        return Response::json($response);
	}
	
	public function search()
	{
	    $data = array();
	    
	    $cities = City::orderBy('name', 'ASC')->get();
        
        $data['cities'] = array();
        foreach($cities as $city) {
            $data['cities'][$city->id] = $city->name;        
        }
        
        $city_id = Input::get('city_id');
        $data['selected_city_id'] =  $city_id;
        
        $data['result'] = Hotel::search($city_id);
        //dd($data['result']->city->toArray());
	    
        return View::make('/hotel/search', $data);
	}
}
