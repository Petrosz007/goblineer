<?php
include 'includes.php';

if(isset($_GET['items']) && $_GET['items'] != ""){
   $items = explode(",", $_GET['items']);


   foreach($items as $key=>$value){
      $items[$key] = str_replace("i:", "", $value);
   }


}
?>

<?php include "inc/header.inc.php"; ?>

<p>If you wish to save these tables you can do so by bookmarking the page or just saving the link!</p>
<a target="_blank" href="https://www.tradeskillmaster.com/group-maker/create">You can create import strings here.</a>

<form method="GET" action="" class="form">
   <textarea class="form-control" rows="3" name="items" placeholder="Example: i:127834,i:128304,i:3371,i:127835 &#13;&#10;or&#13;&#10;127834,128304,3371,127835"
      ><?php if(isset($_GET['items'])) { echo htmlspecialchars($_GET['items']); } ?></textarea><br>
   <input type="submit" class="btn btn-default" value="Create table">
</form>

<?php
if(isset($items)){
   echo "
      <table class='table table-striped table-hover table-mats align-center'>
         <thead>
            <th class='tg-9nbt'>Item name:</th>
            <th class='tg-9right'>Low buy:</th>
            <th class='tg-9right'>Market Value:</th>
            <th class='tg-9right'>Available:</th>
         </thead>

         <tbody>";
         foreach($items as $i){
            herbRow($i, item($i, $conn), item_q($i, $conn));
         }

   echo"
         </tbody>
      </table>
      ";
}
?>
<?php include "inc/footer.inc.php"; ?>
