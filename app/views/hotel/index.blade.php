@extends('layouts.default')
@section('content')
    <div class="intro-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                        <h1>Hotel System</h1>
                        <hr class="intro-divider">
                        <ul class="list-inline intro-social-buttons">
                            <li>
                                <a href="#" class="btn btn-default btn-lg" id="btn-add-hotel">
                                <i class="fa fa-plus fa-fw"></i> 
                                <span class="btn-action">Add Hotel</span></a>
                            </li>
                            <li>
                                <a href="/search" class="btn btn-default btn-lg">
                                <i class="fa fa-search fa-fw"></i>
                                <span class="btn-action">Search Hotels</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container" id="add-hotel-dialog" style="display:none;">
        <form class="form-horizontal" role="form" id="add_hotel_form" name="add_hotel_form"  data-toggle="validator">
        
            <div class="form-group has-error" id="validation-errors">
                
            </div>
        
            <div class="form-group">
                <label class="control-label col-sm-3" for="hotel_name">Hotel Name</label>
                <div class="col-sm-7">
                    <input type="text" id="hotel_name" name="hotel_name" class="form-control">
                </div>
            </div>
            
            <div class="form-group">
                <label class="control-label col-sm-3" for="hotel_city_id">City</label>
                <div class="col-sm-7">
                    <select id="hotel_city_id" name="hotel_city_id" class="form-control">
                        <option value="">Select</option>
                         @foreach ($cities as $key => $city)
                             <option value="{{{$key}}}">{{{$city}}}</option>
                         @endforeach
                    </select>
                </div>
            </div>
            
            <div class="form-group">
                <label class="control-label col-sm-3" for="hotel_address">Address</label>
                    <div class="col-sm-7">
                    <input class="form-control" type="text" id="hotel_address" name="hotel_address">
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-sm-7 col-sm-offset-3">
                    <div id="messages"></div>
                </div>
            </div>
        </form>
    </div>
    
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            new addHotel(); 
        });
        
        var addHotel = function(){
            
            var obj = this;
            
            this.openPopup = function(){
               $('#add-hotel-dialog').dialog({
                    bgiframe:true,
                    resizable:false,
                    draggable:false,
                    width:600,
                    modal:true,
                    overlay:{
                        backgroundColor:'#000',
                        opacity:0.5
                    },
                    open:function(){
                        $('.form-group').removeClass('has-error');
                        $('#add_hotel_form')[0].reset();
                        $('#validation-errors').html("");
                        $('#validation-errors').removeClass('validation-errors');
                    },
                    buttons:{
                        
                        'Cancel': {
                            text: 'Cancel',
                            'class': 'btn btn-danger',
                            click: function(){
                                $(this).dialog('close');
                            }
                        },
                        
                        'Save': {
                            text: 'Save',
                            'class': 'btn btn-primary',
                            click: function(){
                                obj.saveHotel();
                            }
                        }
                    },
                    title: 'Add New Hotel'
                }); 
            };
            
            this.saveHotel = function() {
                
                if(!obj.validateField()) {
                    $.ajax({
                        url: '/hotel/save',
                        data: $('#add_hotel_form').serialize(),
                        type: 'post',
                        dataType: 'json',
                        success: function(data) {
                            if(data.error == false) {
                                alert(data.message);
                                $('#add-hotel-dialog').dialog('close');
                            } else {
                                $('#validation-errors').addClass('validation-errors');
                                $('#validation-errors').html(data.message);
                            }
                        } 
                    });
                }
            };
            
            this.validateField = function() {
               
                var error = false;
                if($('#hotel_name').val().length <= 0) {
                    $('#hotel_name').parent().parent('.form-group').addClass('has-error');
                    error = true;
                }
                
                if($('#hotel_city_id').val() <= 0) {
                    $('#hotel_city_id').parent().parent('.form-group').addClass('has-error');
                    error = true;
                }

                if($('#hotel_address').val().length <= 0) {
                    $('#hotel_address').parent().parent('.form-group').addClass('has-error');
                    error = true;
                }
                return error;
            };
            
            this.init = function() {
                $('#btn-add-hotel').on('click', function(){
                    obj.openPopup();
                });
            }
            
            obj.init();
        }
    </script>
@stop
