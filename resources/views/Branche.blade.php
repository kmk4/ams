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
  <div class="container" >
  <div class="row" >
		
		<div class="col-sm-4">
		</div>

		<div class="col-sm-2">
		</div>
		<div class="col-sm-4" style="background-color: #b9bef7">
		<br>
				<label>
				<select name="region" id="region" onchange='LoadModels()' style="width: 250px">
					<option selected> اخنر الاقاليم </option>
					@foreach ($Regions as $Region)
					
					 <option   value="{{ $Region->id }}" >{{ $Region->name }}</option>
					@endforeach

					
				</select>
				</label>
		 <strong>الاقاليم</strong>
<br>

 <label>
    <select name="s_model" id="s_model" onchange='LoadSectors()'style="width: 250px">
        <option selected> اخنر الاقاليم </option>
		

        
    </select>
</label>
 <strong>النماذج</strong>
<br>

<label>
    <select name="s_model" id="sector" onchange='LoadBranches()' style="width: 250px">
        <option selected> اختر القطاع </option>
		

        
    </select>
	
</label>
<strong>القطاعات</strong>
<br><br>
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
function LoadModels() {
	var x = document.getElementById("region").value;
	var y = window.location.href + "/" + x + "/ajax_load_model_by_region_id/";
	
	var xhttp = new XMLHttpRequest();
	
	xhttp.onreadystatechange = function() {
	if (this.readyState == 4 && this.status == 200) {
		
	var  RespObj = JSON.parse(this.responseText)
	
	ClearOption ("s_model");
	addOption ("s_model",null,"اختر النموذج",true );
	
	
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
	addOption ("sector",null,"اختر القطاع",true );
	
	
	for (x in RespObj) {
    
	  addOption ("sector",RespObj[x].id,RespObj[x].name ,false);
	} 

		
			
  }
};

	ClearOption ("sector");
	addOption ("sector",0,"Loading ..",true );
	
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