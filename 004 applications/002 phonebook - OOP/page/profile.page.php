<?php
$users = new User();
$session = new Session();
$lab387 = new Lab387();
$lab387->prepare("user");
$user_data = $users->get_data($session->get("uid"));
if ($user_data[0]['image_id'] !== null) {
    $image_path = $lab387->image("id", $session->get("uid"));
}else{
    $image_path[0]["link"] = "../uploads/images/avatar.png";
}

?>
<div class="container bootstrap snippets bootdeys">
    <div class="row" id="admir">
        <div class="col-xs-12 col-sm-9">
            <form class="form-horizontal">
                <div class="panel panel-default">
                    <div class="panel-body text-center">
                        <img src="<?php echo substr($image_path[0]["link"], 1) ?>" class="img-circle profile-avatar" id="profile-image" alt="User avatar">
                    </div>
                    <label for="img">Select image:</label>
                    <input type="file" id="img" name="img" accept="image/*">
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">User info</h4>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Full name</label>
                            <div class="col-sm-10">
                                <input rows="3" class="form-control edit-profile-fullname" name="fullname" value="<?php echo $user_data[0]['fullname']; ?>"></input>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Location</label>
                            <div class="col-sm-10">
                                <select class="form-control edit-profile-country" name="country">
                                    <option>Select country</option>
                                    <?php
                                    if ($user_data[0]['country'] !== null) {
                                        echo '<option selected="">' . $user_data[0]['country'] . '</option>';
                                    }
                                    ?>
                                    <option>Canada</option>
                                    <option>Denmark</option>
                                    <option>Estonia</option>
                                    <option>France</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">ZIP address</label>
                            <div class="col-sm-10">
                                <input rows="3" name="zip_code" class="form-control edit-profile-zip" value="<?php echo $user_data[0]['zip_code']; ?>"></input>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">City</label>
                            <div class="col-sm-10">
                                <input rows="3" name="city" class="form-control edit-profile-city" value="<?php echo $user_data[0]['city']; ?>"></input>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Address</label>
                            <div class="col-sm-10">
                                <input rows="3" name="address" class="form-control edit-profile-address" value="<?php echo $user_data[0]['address']; ?>"></input>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">Contact info</h4>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Mobile number</label>
                            <div class="col-sm-10">
                                <input type="tel" name="phone_number" class="form-control" value="<?php echo $user_data[0]['phone_number']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">E-mail address</label>
                            <div class="col-sm-10">
                                <input type="email" name="email" class="form-control edit-email" value="<?php echo $user_data[0]['email']; ?>">
                            </div>
                        </div>

                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">Security</h4>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Current password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control edit-profile-current">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">New password</label>
                            <div class="col-sm-10">
                                <input type="password" id="password" class="form-control edit-profile-new">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2">
                                <button type="submit" class="btn btn-primary edit-profile-submit">Submit</button>
                                <button type="reset" class="btn btn-default">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>