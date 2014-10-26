            <div class="bar">
            	<center>ADD COMPLAINT</center>
            </div>

            <div class="container main-container">
                    
                        <form action="" method="post" enctype="multipart/form-data" role="form" class="eagle-complaint-form form-horizontal">
                        	<p>To report a vehicle, fill form below</p>
                            <div class="form-group">
                                <input type="text" name="plate_number" required class="form-control" placeholder="Plate No.">
                            </div>
                            <div class="form-group">
                                <input type="text" id="transport_tags" name="trans_comp" class="form-control" placeholder="Transport Company">
                            </div>
                            <div class="form-group">
                                 <select name="complaint_type_id" class="form-control" required>
                                    <option value="">Choose Complaint Type</option>
                                    <?php foreach($complaint_type as $item){ ?>
                                        <option value="<?php echo $item->id; ?>"><?php echo $item->title; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <textarea name="description" required class="form-control" id="" cols="30" rows="10"></textarea>
                            </div>

                            <div class="form-group">
                            	<label for="from_state"><i class="fa fa-map-marker"></i> From</label>
                                  <select name="from_state" class="form-control" required>
                                    <option value="">Choose State</option>
                                    <?php foreach($states as $item){ ?>
                                        <option value="<?php echo $item->id; ?>"><?php echo $item->title; ?></option>
                                    <?php } ?>
                                    
                                </select>
                            </div>

                            <div class="form-group">
                                <input type="text" required name="from_city" class="form-control" placeholder="City/Bus-Stop">
                            </div>
                                
                          
                            <div class="form-group">
                                <label for="to_state"><i class="fa fa-map-marker"></i> To</label>
                                <select name="to_state" class="form-control" required>
                                    <option value="">Choose State</option>
                                     <?php foreach($states as $item){ ?>
                                        <option value="<?php echo $item->id; ?>"><?php echo $item->title; ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <input type="text" required name="to_city" class="form-control" placeholder="City/Bus-Stop">
                            </div>
                                
                            <div class="form-group">
                                <input type="file" name="image" class="form-control" placeholder="Upload Image">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-black btn-full-width">Add Complaint</button>
                            </div>
                        </form>
                    
                </div>
            </div>
           