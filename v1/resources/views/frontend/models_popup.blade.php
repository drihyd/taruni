<div class="modal alterations fade in" id="altsEditModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				
				<div class="modal-body">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
					<div class="clearfix">
						<div class="ref-photo">
							<!--<img src="{{ URL::to('assets/img/sleeve-alter.png') }}" alt="Sleeve Alterations" title="Sleeve Alterations">-->
							
						</div>
						<div class="alter-box">
							<h1>
							    
							    
							    <!--<img src="{{ URL::to('assets/img/icn-alteration.png') }}" class="alterations-icn" alt="Alterations" title="Alterations">--> Edit Alterations</h1>
							
							<form id="formalterationdata" action="#" id="alt-edits-form" class="clearfix" accept-charset="utf-8">
							<!-- <input type="hidden" name="g-recaptcha-response"  class="recaptchaResponse"> -->
								<fieldset>
								<legend>Sleeves (in Inches)</legend>
								
								<!--
								<div class="checkbox">
									<label style="font-size: 14px;">
										<input type="checkbox" name="sleeveAttach" id="sleeveAttach"> Attach Sleeves
									</label>
								</div>
								-->
								
								<table class="table alt-table" id="sleeveTable" style="display: table;">
									<tbody><tr>
										<td class="label-td">
											<label for="sleeveLength">1. Sleeve Length</label>
										</td>
										<td>	
											<input type="text"  class="form-control input-sm" name="sleeveLength" id="sleeveLength"  value="standard">
										</td>
										<td class="label-td">
											<label for="sleeveArmhole">2. Armhole</label>
										</td>
										<td>
											<input type="text"  class="form-control input-sm" name="sleeveArmhole" id="sleeveArmhole" value="standard">
										</td>
									</tr>
									<tr>
										<td class="label-td">
											<label for="sleeveCircumference">3. Sleeve Circumference</label>
										</td>
										<td>	
											<input  type="text" class="form-control input-sm" name="sleeveCircumference" id="sleeveCircumference" value="standard">
										</td>
										<td></td>
										<td></td>
									</tr>
								</tbody></table>

																	
								<div id="bodymeasurement">
								<hr style="border-top: 1px solid #d0d0d0;">
								Body Measurements (in Inches)
								<table class="table alt-table" id="otherAltTable">
									<tbody><tr>
										<td class="label-td">
											<label for="chestEdit">1. Chest</label>
										</td>
										<td>	
											<input type="text" class="form-control input-sm" name="chest" id="chestEdit" value="standard">
										</td>
										<td class="label-td">
											<label for="waistEdit" class="waistEditLabel">2. Waist/Blouse Waist</label>
										</td>
										<td>
											<input type="text" class="form-control input-sm" name="waist" id="waistEdit" value="standard">
											
										</td>
									</tr>
									<tr>
										<td class="label-td">
											<label for="hipEdit" class="hipEditLabel">3. Hips/Skirt Waist</label>

										</td>
										<td>
											<input type="text" class="form-control input-sm" name="hip" id="hipEdit" value="standard" >

										</td>
										<td class="label-td">
											<label for="dressLengthEdit" class="dressLengthEditLabel">4. Top/Skirt Length</label>

										</td>
										<td>
											<input  type="text" class="form-control input-sm" name="dressLength" id="dressLengthEdit" value="standard">
											
									</tr>
								</tbody></table>
								</div>
								
								<div class="form-group cta">
									<div id="alts-edit-message"></div>
									<button type="submit" class="btn btn-brand btn-block mt-4" id="btnSubmitAltsEdit">Submit</button>
								</div>
								</fieldset>
								
								<input type="hidden" id="cartItemId" name="cartItemId" value="">
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	
	
	
	
	
	
	
<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="alterSleevesModal" tabindex="-1" role="dialog" aria-labelledby="alterSleevesModalLable" aria-hidden="true">
    
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" >
      <div class="modal-header">
      
      </div>
      <div class="modal-body">
	  
	  



	  
	  
        <div class="row align-items-center">
            <div class="col-sm-4">
                
                    <div class="row align-items-center">
                        
                        
                        <div class="col-sm-8">
                                <img src="{{ URL::to('assets/img/sleeve-alter.png') }}" alt="Sleeve Alterations" title="Sleeve Alterations">
                                
                                 </div>
                            <div class="col-sm-4">
                            <div class="text-center">
                                
                                 
                                  
                                   </div>
                                
                            </div>
                             </div>
                 
                  </div>
               
           
            
            <div class="col-sm-8 pl-sm-0">
			
			
			@if(Auth::Guest())
@else
@php
$sleeve_alternation=DB::table('my_fit_profile')
->where("user_id",Auth::user()->id??0)
->where("type",'sleeve')
->get();
@endphp

@if($sleeve_alternation->count()>0)
@foreach($sleeve_alternation as $key=>$value)
<div>
<form  action="#" id="">
@csrf
<input type="button" data-id="{{$value->sleeve_length}},{{$value->armhole}},{{$value->sleeve_circumference}}" class="btn btn-cta btn-sm autofillsleeve" value="{{Str::ucfirst($value->profile_name)}}">
</form>
<div>
<br>
@endforeach

@endif


@endif	

			
			        
				 
				</div>
               	</div>
               	
               	
               	
               	 <h2><img src="{{ URL::to('assets/img/icn-alteration.png') }}" class="img-fluid"> Attach Sleeves</h2>
               
			<form id="formalterationdata_acart" action="#" id="alt-edits-form" class="clearfix" accept-charset="utf-8">

			   <legend>Sleeves (in Inches)</legend>
                <table class="table alt-table">
					<tbody>
					    <tr>
    						<td>
    							<div class="form-group clearfix">
    								<label for="sleeveLength">1. Sleeve Length</label>
    								<input type="text" class="form-control form-control-sm input-sm" name="sleeveLength1" id="sleeveLength" value="standard">
    							</div>
    						</td>
    						<td>
    							<div class="form-group clearfix">
    								<label for="sleeveLength">2. Armhole</label>
    								<input type="text" class="form-control form-control-sm input-sm" name="sleeveArmhole1" id="sleeveArmhole" value="standard">
    							</div>
    						</td>
    					</tr>
    					<tr>
    						<td>
    							<div class="form-group clearfix">
    								<label for="sleeveCircumference">3. Circumference</label>
    								<input type="text" class="form-control form-control-sm input-sm" name="sleeveCircumference1" id="sleeveCircumference" value="standard">
    							</div>
    						</td>
    					</tr>
					</tbody>
				</table>
				<div class="form-group cta pl-2">
					<div id="sleeve-alt-message"></div>
					<button type="button" class="btn btn-cta btn-submit-alter sleveealtsubmitButton_acart">SUBMIT</button>
				</div>
				
				
				
				
				<input type="hidden" name="cartitemid" id="cartitemid" value= "" />
				
				</form>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="alterDressModal" tabindex="-1" role="dialog" aria-labelledby="alterDressModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" style="height: 650px;margin-left: -10px;">
      <div class="modal-header">
      
      </div>
      <div class="modal-body " style="padding:20px;">
        <div class="row align-items-center">
     
            <div class="col-sm-12 pl-sm-0">
			
			
@if(Auth::Guest())

@else

@php
$body_alternation=DB::table('my_fit_profile')
->where("user_id",Auth::user()->id??0)
->where("type",'body')
->get();
@endphp

@if($body_alternation->count()>0)
@foreach($body_alternation as $key=>$value)
<form  action="#" id="">
@csrf
<input type="button" data-id="{{$value->chest}},{{$value->waist}},{{$value->hips}},{{$value->top_length}}" class="btn btn-brand btn-sm autofillbodymeas" value="{{Str::ucfirst($value->profile_name)}}">
</form>
<br>
@endforeach

@endif

@endif
			
			
                <h2><img src="" class="img-fluid"> Edit Alterations</h2>
				
				<form id="alterationdata_acart" action="#"  class="clearfix" accept-charset="utf-8">
                <legend>Provide <span style="color:red">"Body"</span> Measurements (in Inches)</legend>
                <table class="table alt-table">
					<tbody><tr>
						<td class="label-td">
							<label for="chest">1. Chest (<span>body</span>)</label>
						</td>
						<td>	
							<input type="text" class="form-control form-control-sm input-sm" name="chest1" id="chest" value="standard">
						</td>
						
																	<td class="label-td">
								<label for="waist">2. Waist (<span>body</span>)</label>
							</td>
							<td>
								<input type="text" class="form-control form-control-sm input-sm" name="waist1" id="waist" value="standard">
							</td>
																
						
					</tr>
					<tr>
																	<td class="label-td">
								<label for="hip">3. Hips (<span>body</span>)</label>
							</td>
							<td>
								<input id="hip" type="text" class="form-control form-control-sm input-sm" name="hip1" value="standard">
							</td>
																
																	<td class="label-td">
								<label for="dressLength">4. Dress Length</label>
							</td>
							<td>
								<input type="text" class="form-control form-control-sm input-sm" name="dressLength1" id="dressLength" value="standard">
							</td>
															</tr>
				</tbody>
				</table>
				<div class="form-group cta">
					<div id="dress-alt-message"></div>
					<div style="font-weight: 300; margin-bottom: 12px; color: #58595B; font-size: 14px;"><strong style="color: red;">Note:</strong> Please make sure Chest, Waist and Hip sizes are <strong>"body"</strong> measurements only.</div>
					<button type="submit" class="btn btn-cta btn-submit-alter altsubmitButton_acart">Submit</button>
				</div>
				<input type="hidden" name="alt_cartitemid" id="cartitemid" value= "" />
				</form>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
	
	
  