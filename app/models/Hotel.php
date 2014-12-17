<?php
class Hotel extends Eloquent{

	protected $table = 'hotel';
	public $timestamps = false;
	
	 public static function add($data) 
	 {
        //To allow mass assignment
        Eloquent::unguard();
        
        $hotel = new Hotel();
        $hotel->fill($data);
        return $hotel->save();
    }
    
    
    public static function search($city_id)
    {
        if($city_id > 0) {
            return Hotel::where('city_id', '=', $city_id)
                ->orderBy('name', 'ASC')
                ->get();
        } else {
            return Hotel::orderBy('name', 'ASC')
                ->get();
        }
        
        if($city_id > 0) {
             return Hotel::where('city_id', $city_id)
                ->join('city', 'city_id', '=', 'city.id')
                ->get();
        } else {
            return Hotel::join('city', 'city_id', '=', 'city.id')
                ->get();
        }
    }
    
    public function city()
    {
        return $this->belongsTo('City');
    }
}
