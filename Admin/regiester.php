<?php
include('./includes/layout-sidenav-light.php');
?>
<div id="layoutSidenav_content">
    <main>
        <div class="card mb-4">
            <div class="card-header" style="font-size: 30px;">
                <i class="fa-solid fa-map-location-dot"></i>
                Register New User
            </div>
            <div class="card-body" style="align-items: center;">
                <div class="container">
                    <form action="./process/adddataprocess.php" method="POST">
                        <div class="row">
                            <div class="col-25">
                                <label for="fname">Name</label>
                            </div>
                            <input type="text" name="NAME" placeholder="Enter FullName.." required>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="fname">Mobile NO</label>
                            </div>
                            <input type="text" name="MOBILENUMBER" placeholder="Mobile No.." required>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="fname">Set Password</label>
                            </div>
                            <select name="usertype" id="" required>
                                <option value="">Select User Type</option>
                                <option value="A">Admin</option>
                                <option value="U">User</option>
                                <option value="H">Hotel</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="fname">Email</label>
                            </div>
                            <input type="text" name="EMAIL" placeholder="Email.." required>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="fname">Set Password</label>
                            </div>
                            <input type="text" name="PASSWORD1" placeholder="Set Password..">
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="fname">Confirm Password</label>
                            </div>
                            <input type="text" name="PASSWORD2" placeholder="Confirm Password..">
                        </div><br>
                        <div class="row">
                            <input type="submit" value="register" name="adduser">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>
<?php
include('./includes/footer.php');
?>