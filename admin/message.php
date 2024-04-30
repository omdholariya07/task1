<?php
if(isset($_SESSION['status']))
{
    ?>
<div class="alert alert-warning alert-dismissible fade show" role="alert">
   <?php echo $_SESSION['status']; ?>
  </button>
</div>
<?php
unset($_SESSION['status']);
}
?>