<div class="container row">
		<div class="form-group col-md-4">
			<span class="req">*</span>&nbsp;<label class="col-md-4 control-label">Name</label>
			<input type="text"class="col-sm-8 form-control"id="name"name="name"required/>
		</div>
		<div class="form-group col-md-4">
			<span class="req">*</span>&nbsp;<label class="col-md-4 control-label">Phone</label>
			<input type="text"class="col-sm-8 form-control"id="phone"name="phone"required/>
		</div>
		<div class="form-group col-md-4">
			<span class="req">*</span>&nbsp;<label class="col-md-4 control-label">E_mailAddress</label>
			<input type="text"class="col-sm-8 form-control"id="email"name="email"required/><span class="warn"></span>
		</div>
		</div>
		<div class="container row">
		<div class="form-group col-md-4">
			<span class="req">*</span>&nbsp;<label class="col-md-4 control-label">HomeAddress</label>
			<input type="text"class="col-sm-8 form-control"name="h_address"required/>
		</div>
		<div class="form-group col-md-4">
			<span class="req">*</span>&nbsp;<label class="col-md-4 control-label">KinName</label>
			<input type="text"class="col-sm-8 form-control"id="kin_name"name="kin_name"required/>
		</div>
		<div class="form-group col-md-4">
			<label class="col-md-4 control-label"><span class="req">*</span>NextOfKinPhoneNumber</label>
			<input type="text"class="col-sm-8 form-control"id="kin_no"name="kin_no"required/>
		</div>
		</div>
		<div class="container row">
		<div class="form-group col-md-3">
			<span class="req">*</span>&nbsp;<label class="col-md-4 control-label">Department</label>
			<select class="col-sm-8 form-control"id="dept"name="dept"required>
				<?php
				foreach($departments as $d){
					echo'<option>'.$d.'</option>';
				}
				?>
			</select>
		</div>
		<div class="form-group col-md-3">
			<span class="req">*</span>&nbsp;<label class="col-md-4 control-label">Position</label>
			<select class="col-sm-8 form-control"id="pos"name="pos"required>
				
			</select>
		</div>
		
		<div class="form-group col-md-3">
			<span class="req">*</span>&nbsp;<label class="col-md-4 control-label">DateOfBirth</label>
			<input type="text"class="col-sm-8 form-control"name="dob"required/>
		</div>
		<div class="form-group col-md-3">
			<span class="req">*</span>&nbsp;<label class="col-md-4 control-label">DateOfRecruitment</label>
			<input type="text"class="col-sm-8 form-control"name="dor"required/>
		</div>
		</div>
		<div class="row container">
		<div class="form-group col-md-12">
			<input type="submit"class="btn btn-primary"name="submit"value="Submit"/>
		</div>
		</div>