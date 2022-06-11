<?php
// Teodora Peric 0283/18 postavljanje pocetnu stranicu salona koji je dizajnirao Pavle Stefanovic 0562/18
?>
  <div class="row divCentar">
            <div class="col-sm-1 " >

            </div>
            <div class="col-sm-10 centar" >
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <?php
    
    for($j=0;$j<10;$j++){ ?>
    <li data-target="#myCarousel" data-slide-to=<?="$j"?>></li>
<?php }?>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="/images/salon1.png" alt="Los Angeles">
    </div>

    <div class="item">
      <img src="/images/salon2.png" alt="Chicago">
    </div>

    <div class="item">
      <img src="/images/salon3.png" alt="New York">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
            <div class="col-sm-1 " >
             
            </div>
         
        </div>

