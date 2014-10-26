
            <div class="container main-container">
                    
                        <form action="" role="form" class="form-horizontal" method="post" enctype="multipart/form-data">
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
                            <div class="row">
                            
                                
                                <label for="from_state">FROM</label>
                                <select name="from_state" class="form-control" required>
                                    <option value="">STATES</option>
                                    <?php foreach($states as $item){ ?>
                                        <option value="<?php echo $item->id; ?>"><?php echo $item->title; ?></option>
                                    <?php } ?>
                                    
                                </select>
                                
                               
                                <input type="text" required name="from_city" class="form-control" placeholder="City">
                                </div>
                                
                          
                            <div class="form-group">
                                
                                <label for="to_state">TO</label>
                                <select name="to_state" class="form-control" required>
                                    <option value="">STATES</option>
                                     <?php foreach($states as $item){ ?>
                                        <option value="<?php echo $item->id; ?>"><?php echo $item->title; ?></option>
                                    <?php } ?>
                                </select>
                                </div>
                                <div class="form-group">
                                <input type="text" name="to_city" class="form-control" required placeholder="City">
                                    </div>
                                
                            <div class="form-group">
                                <input type="file" name="image" class="form-control" placeholder="Upload Image">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-danger">Add Complaint</button>
                            </div>
                        </form>
                    
                </div>
            </div>
          