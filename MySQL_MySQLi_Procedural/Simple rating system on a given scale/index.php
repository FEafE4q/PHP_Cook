<?php include("config.php"); ?>

<style>
.rating .stars {
  position: relative;
  display: block;
  float: left;
  height: 21px;
  width: 105px;
  background-image: url("stars.png");
  background-position: 0 0;
  background-repeat: repeat-x;
}
.rating .stars .on {
  height: 21px;
  background-image: url("stars.png");
  background-position: 0 -21px;
}
.rating .stars .live {
  position: absolute;
  top: 0;
  left: 0;
  opacity: 0;
}
.rating .stars .live span {
  display: block;
  float: left;
  cursor: pointer;
  width: 21px;
  height: 21px;
  background-image: url("stars.png");
  background-repeat: no-repeat;
  background-position: 0 -21px;
}
.rating .stars .live span:hover ~ span {
  background-position: 0 0px;
}
.rating .stars .live:hover {
  opacity: 1;
}  
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<?php
$result = mysqli_query($con, "SELECT * FROM `ratings`");
    if(mysqli_num_rows($result) > 0){
$row = mysqli_fetch_array($result);
    do{
$nums = array_map('trim', explode(',', $row['rate']));
$count = count($nums) - 1;
    if ($count>=1){
$nums = array_sum($nums)/$count;
$nums1 = ($nums * 100)/5;
$nums = round($nums, 1);
$nums1 = round($nums1, 2);
    }else{
$nums=0;
$nums1=0;
    }
    echo('</br></br>
<div align="left" class="rating">
  Оценок: '.$count.'
  <div class="stars">
    <div class="on" style="width: '.$nums1.'%;"></div>
    <div class="live" id="'.$row[id].'">
      <span data-rate="1"></span>
      <span data-rate="2"></span>
      <span data-rate="3"></span>
      <span data-rate="4"></span>
      <span data-rate="5"></span>
      <div class="view-'.$row[id].'" id="view-rating">'.$nums.' stars | '.$nums1.'%</div>
    </div>
  </div>
</div>
</br>
    ');
    }
    while ($row = mysqli_fetch_array($result));
    }
?>

<div align="left" class="rating">
  <div class="stars">
    <div class="on" style="width: 50%"></div>
    <div class="live" id="3">
      <span data-rate="1"></span>
      <span data-rate="2"></span>
      <span data-rate="3"></span>
      <span data-rate="4"></span>
      <span data-rate="5"></span>
      <div class="view-3" id="view-rating">5 stars | 50%</div>
    </div>
  </div>
</div>
</br></br>
<div align="left" class="rating">
  <div class="stars">
    <div class="on" style="width: 50%"></div>
    <div class="live" id="4">
      <span data-rate="1"></span>
      <span data-rate="2"></span>
      <span data-rate="3"></span>
      <span data-rate="4"></span>
      <span data-rate="5"></span>
      <div class="view-4" id="view-rating">5 stars | 50%</div>
    </div>
  </div>
</div>
</br>

<script>
$(document).ready(function(){
$('.live > span').on('click', function(){
var id = $(this).parent().attr('id');
var rate = $(this).data('rate');
$.ajax({
type: 'POST',
url: 'rate_handler.php',
data: {
rate: rate,
id: id
},
cache: false,
success: function(response) {
response = JSON.parse(response);
$('.view-' + id).text(response);
console.log(rate, id)
}
});
});
});
</script>