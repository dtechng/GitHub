
      <div class="container main-container">

        <?php foreach($search_results as $item){ ?>
        <div class="row search-result">
          <div class="col-xs-3">
            <img src="<?php echo $item->image; ?>" width="136" alt="" class="img-circle">
          </div>
          <div class="col-xs-6">
            <!-- <span><strong><?php echo strtoupper($item->plate_number); ?></strong></span> -->
            <ul>
              <li>From:<?php echo $item->from_city; ?>(<?php echo $item->state_from; ?>)</li>
              <li>To:<?php echo $item->to_city; ?>(<?php echo $item->state_to; ?>)</li>
              <li>Complaint Type:<?php echo $item->comp_type; ?></li>
              <li>Responses <span class="badge"><?php echo $item->response; ?></span></li>
            </ul>
          </div>
          <div class="col-xs-3">
            <a href=""><i class="fa-angle-right"></i></a>
          </div>
        </div>
        <?php } ?>
       <!--  <div class="row search-result">
          <div class="col-xs-3">
            <img src="img/school.png" alt="" class="img-circle">
          </div>
          <div class="col-xs-6">
            <span><strong>AX 777 LX</strong></span>
            <ul>
              <li>From:Ikeja(Lagos)</li>
              <li>To:Ketu(Lagos)</li>
              <li>Complaint Type:One Chance</li>
              <li>Responses <span class="badge">3</span></li>
            </ul>
          </div>
          <div class="col-xs-3">
            <a href=""><i class="fa-angle-right"></i></a>
          </div>
        </div>
        <div class="row search-result">
          <div class="col-xs-3">
            <img src="img/school.png" alt="" class="img-circle">
          </div>
          <div class="col-xs-6">
            <span><strong>AX 777 LX</strong></span>
            <ul>
              <li>From:Ikeja(Lagos)</li>
              <li>To:Ketu(Lagos)</li>
              <li>Complaint Type:One Chance</li>
              <li>Responses <span class="badge">3</span></li>
            </ul>
          </div>
          <div class="col-xs-3">
            <a href=""><i class="fa-angle-right"></i></a>
          </div>
        </div> -->
        <div class="row">
          <a href="" class="col-xs-12 btn btn-primary">view more</a>
        </div>
      </div>
     