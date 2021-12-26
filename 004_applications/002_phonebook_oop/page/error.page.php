<div class="phonebook-container">
    <div class="phonebook-content">

<?php

if(isset($_GET['error'])){
    echo "<h1 style='text-align: center;'>" . $_GET['error'] . "</h1>";
}

?>  
    <br><br>
    <a onclick="history.back()"> <?=Language::get("app", "go-back");?> </a>
    </div>
</div>