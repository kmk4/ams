@extends('layouts.master')

@section('title')
            هيئة الاسعاف المصريه
@endsection
  
@section('selected_menu')
         ادارة القطاعات والتمركزات
@endsection
  

  @section('selected_menu_icon')
   <i class="fa fa-dashboard"  ></i>
  @endsection
  
  
  @section('selected_menu_describtion')

  @endsection
  
  @section('content')
		

		  <!-- Modal content -->
		        <div class="modal fade" id="sector_data" tabindex="-1" role="dialog" aria-labelledby="contactLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="panel-title" id="contactLabel"><span class="glyphicon glyphicon-info-sign"></span> Any questions? Feel free to contact us.</h4>
                    </div>
                    <form action="#" method="post" accept-charset="utf-8" id="frm_add_edit">
                    <div class="modal-body" style="padding: 5px;">
					<input type="hidden" id="frm_method" name="_method" value="PUT">
					
                         {{csrf_field()}}
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                                    <input class="form-control" id="model_display"  type="text"  disabled value="قطاع وسط" />
									
									<input class="form-control" id="frm_model_id" name="model_id"  value ="" type="hidden"  />
									<input class="form-control" id="frm_sector_id" name="sector_id"  value ="" type="hidden"  />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                                    <input class="form-control" id="frm_sector_name" name="name" placeholder="اسم القطاع" type="text" required />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <textarea style="resize:vertical;" class="form-control" placeholder="العنوان .." rows="6" name="address" id="frm_sector_address" ></textarea>
                                </div>
                            </div>
                        </div>  
                        <div class="panel-footer" style="margin-bottom:-14px;">
                            <input type="submit" class="btn btn-success" value="حفظ" />
                                <!--<span class="glyphicon glyphicon-ok"></span>-->
                            <input type="reset" class="btn btn-danger" value="مسح الكل" />
                                <!--<span class="glyphicon glyphicon-remove"></span>-->
                            <button style="float: right;" type="button" class="btn btn-default btn-close" data-dismiss="modal">اغلاق</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		
		    <!--end model code-->






		<div class="alert alert-success">
                    <strong>Well done!</strong> You successfully read this important alert message.
                </div>		

  <div class="container" >
  <div class="row" >
		
		<div class="col-sm-4" >
	
							<div class="panel panel-primary">
								<div class="panel-heading">
									<h3 class="panel-title"><strong>الاقاليم والنماذج</strong></h3>
								</div>
								<div class="panel-body">
												<br>
				<label>
				<select name="region" id="region" onchange='LoadModels()' style="width: 250px">
					<option selected value="0" > اخنر الاقاليم </option>
					@foreach ($Regions as $Region)
					
					 <option   value="{{ $Region->id }}" >{{ $Region->name }}</option>
					@endforeach

					
				</select>
				</label>
		 <strong>الاقاليم</strong>
<br>

 <label>
    <select name="s_model" id="s_model" onchange='LoadSectors()'style="width: 250px">
        <option value="No" selected> اخنر الاقاليم </option>
		

        
    </select>
</label>
 <strong>النماذج</strong>
<br>

<label>
    <select name="s_model" id="sector" onchange='LoadBranches()' style="width: 250px">
        <option value="No" selected> اختر القطاع </option>
		

        
    </select>
	
</label>
<strong>القطاعات</strong>
<br><br>
								</div>
							</div>
		
		</div>

		<div class="col-sm-2">
		</div>
		<div class="col-sm-4" >
	<div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"><strong>القطاعات</strong></h3>
                            </div>
                            <div class="panel-body">
                               اسم القطاع
							   <br>
							   <button type="button" class="btn btn btn-primary"onclick="LoadAddEditSectorForm('edit')"> تعديل بيانات القطاع</button>
							   
							   <button type="button" id="myBtn" class="btn btn btn-success" onclick="LoadAddEditSectorForm('add')"  >اضافة قطاع جديد </button>
                            </div>
                        </div>
	<div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"><strong>الفروع والتمركزات</strong></h3>
                            </div>
                            <div class="panel-body">
                                  <button type="button" class="btn btn btn-success">اضافة فرع/تمركز جديد</button>
                            </div>
                        </div>
											
						
						
</div>



<div class="col-sm-2">
		</div>


                    </div>

</div>








<div class="row">
                    <div class="col-lg-12">
                        <h2>قائمة الفروع التابعه للقطاع</h2>
                        <div class="table-responsive">
                            <table class="table table-hover" id="tbl_branches">
                                <thead>
                                    <tr>
                                        
                                        <th>العنوان</th>
                                        <th>فرع له مقر</th>
                                        <th>اسم الفرع/التمركز</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
					
	</div>
	
	
	





<script>

$(document).ready(function() {
    var panels = $('.vote-results');
    var panelsButton = $('.dropdown-results');
    panels.hide();

    //Click dropdown
    panelsButton.click(function() {
        //get data-for attribute
        var dataFor = $(this).attr('data-for');
        var idFor = $(dataFor);

        //current button
        var currentButton = $(this);
        idFor.slideToggle(400, function() {
            //Completed slidetoggle
            if(idFor.is(':visible'))
            {
                currentButton.html('Hide Results');
            }
            else
            {
                currentButton.html('View Results');
            }
        })
    });
});
</script>



<script>

function LoadAddEditSectorForm (action){
	//alert ("here");
	var yyy = document.getElementById("s_model");
	var ttt = document.getElementById("sector");
	
		// After choosing the model prepare for sector add
		if ( yyy[yyy.selectedIndex].value=="No"){
			alert("الرجاء اختيار النموذج/المحافظة");
			
		}else{
			
			
				 //document.getElementById("model_id").value = document.getElementById("s_model").value;
				 document.getElementById("frm_model_id").value = yyy[yyy.selectedIndex].value;
				 document.getElementById("model_display").value = yyy[yyy.selectedIndex].text;
				 // selected sectors
				 var seccho=ttt[ttt.selectedIndex].value
				
				 
					 if (action=="add") {
						 
					  document.getElementById("frm_method").value="Post" ;
					  document.getElementById("frm_sector_name").value="" ;
					  document.getElementById("frm_sector_address").value="" ;
					  document.getElementById("frm_add_edit").action="/branche/ajax_add_sector" ;
					  
					  $('#sector_data').modal();
					 }else{
						 
							if (seccho=="No"){
								alert("الرجاء اختيار القطاع المراد تعديله");
							}else{
								// edit sector_id
										var y = window.location.href + "/" + seccho + "/ajax_load_sectors_by_sector_id/";
										
										var xhttp = new XMLHttpRequest();
										
										xhttp.onreadystatechange = function() {
										if (this.readyState == 4 && this.status == 200) {
											
										var  RespObj = JSON.parse(this.responseText)
										document.getElementById("frm_add_edit").action="/branche/"+seccho+"/ajax_update_sector" ;
										 document.getElementById("frm_method").value="Put" ;
										document.getElementById("frm_sector_id").value=seccho ;
										document.getElementById("frm_sector_name").value=RespObj[0].name ;
										document.getElementById("frm_sector_address").value=RespObj[0].address  ; 	
										$('#sector_data').modal();

												
									  }
									};
										xhttp.open("GET", y, true);
										xhttp.send(); 
							//	$('#sector_data').modal();
								
								
								
								//
								
							}
						
					 
						 
					 }	
				// document.getElementById("model_display").value = yyy[yyy.selectedIndex].value;
				//alert ("here");
				
				
		}
		
	return false;
	
}
function LoadModels() {
	var x = document.getElementById("region").value;
	var y = window.location.href + "/" + x + "/ajax_load_model_by_region_id/";
	
	var xhttp = new XMLHttpRequest();
	
	xhttp.onreadystatechange = function() {
	if (this.readyState == 4 && this.status == 200) {
		
	var  RespObj = JSON.parse(this.responseText)
	
	ClearOption ("s_model");
	addOption ("s_model","No","اختر النموذج",true );
	
	
	for (x in RespObj) {
    
	  addOption ("s_model",RespObj[x].id,RespObj[x].name ,false);
	} 

		
			
  }
};
	ClearOption ("s_model");
	addOption ("s_model",null,"Loading ..",true );
	xhttp.open("GET", y, true);
	xhttp.send(); 
	

	//alert ("loading...");

	
}

function addOption( Select_ID, item_id, item_name, item_selected) {
    var x = document.getElementById(Select_ID);
    var option = document.createElement("option");
    option.text = item_name;
	option.value = item_id;
	option.selected=item_selected;
	x.appendChild(option);
    
}


function ClearOption (Select_ID){
	var x = document.getElementById(Select_ID);
	while (x.hasChildNodes()) {  
    x.removeChild(x.firstChild);
} 
}






function LoadSectors() {
	var x = document.getElementById("s_model").value;
	
	var y = window.location.href + "/" + x + "/ajax_load_sectors_by_model_id/";
	
	var xhttp = new XMLHttpRequest();
	
	xhttp.onreadystatechange = function() {
	if (this.readyState == 4 && this.status == 200) {
		
	var  RespObj = JSON.parse(this.responseText)
	
	ClearOption ("sector");
	addOption ("sector","No","اختر القطاع",true );
	
	
	for (x in RespObj) {
    
	  addOption ("sector",RespObj[x].id,RespObj[x].name ,false);
	} 

			
  }
};

	ClearOption ("sector");
	addOption ("sector","No","Loading ..",true );
	
	xhttp.open("GET", y, true);
	xhttp.send(); 
	
	
 

}



function LoadBranches() {
	var x = document.getElementById("sector").value;
	//alert (x);
	var y = window.location.href + "/" + x + "/ajax_load_branches_by_sector_id/";
	
	var xhttp = new XMLHttpRequest();
	
	xhttp.onreadystatechange = function() {
	if (this.readyState == 4 && this.status == 200) {
	//alert (	this.responseText);
	var  RespObj = JSON.parse(this.responseText)
	
	//ClearOption ("sector");
	//addOption ("sector",null,"اختر القطاع",true );
		// delete old row 
		var x = document.getElementById("tbl_branches");
		while (x.hasChildNodes()) {  
		x.removeChild(x.firstChild);
		} 
		
		// Find a <table> element with id="tbl_branches":
		var table = document.getElementById("tbl_branches");

		// Create an empty <tr> element and add it to the 1st position of the table:
		var row = table.insertRow();
		
		// Insert new cells (<td> elements) at the 1st and 2nd position of the "new" <tr> element:
		var cell1 = row.insertCell(0);
		var cell2 = row.insertCell(1);
		var cell3 = row.insertCell(2);
		var cell4 = row.insertCell(3);

		// Add some text to the new cells:
		cell1.innerHTML = "العنوان";
		cell2.innerHTML = "فرع له مقر"; 
		cell3.innerHTML = "اسم الفرع / التمركز"; 
		cell4.innerHTML = ""; 
		
		
		// loop and insert table content
	
	for (x in RespObj) {
		
		// Find a <table> element with id="tbl_branches":
		var table = document.getElementById("tbl_branches");

		// Create an empty <tr> element and add it to the 1st position of the table:
		var row = table.insertRow();
		
		// Insert new cells (<td> elements) at the 1st and 2nd position of the "new" <tr> element:
		var cell1 = row.insertCell(0);
		var cell2 = row.insertCell(1);
		var cell3 = row.insertCell(2);
		var cell4 = row.insertCell(3);

		// Add some text to the new cells:
		cell1.innerHTML = RespObj[x].address;
		cell2.innerHTML = RespObj[x].has_building; 
		cell3.innerHTML = RespObj[x].branch_name; 
		cell4.innerHTML = RespObj[x].id; 
		
    
	//  addOption ("sector",RespObj[x].id,RespObj[x].name ,false);
	} 

		
			
  }
};
	xhttp.open("GET", y, true);
	xhttp.send(); 
	
	//ClearOption ("sector");
	//addOption ("sector",0,"Loading ..",true );
	


}





</script>



  @endsection