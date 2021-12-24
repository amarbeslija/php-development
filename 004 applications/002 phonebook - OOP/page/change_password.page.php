<div class="container">
    <div class="row">
        <p class="d-none" id="uid"><?php echo $_GET['id'];?></p>
        <p class="d-none" id="token"><?php echo $_GET['token'];?></p>
        <input type="text" id="password" class="new_password" placeholder="New Password">
        <input type="text" id="password_confirm" class="repeat_new_password" placeholder="Repeat new password">
        <button type="submit" id="change_password" >Confirm</button>
    </div>
</div>