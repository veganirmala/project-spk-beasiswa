<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <img src="<?php echo base_url() . 'assets/sbadmin/undiksha.png'; ?>" alt="" class="center-block">
                                    <h1 class="h4 text-gray-900 mb-4"></h1>
                                </div>
                                <?php echo $this->session->flashdata('message'); ?>
                                <form class="user" method="post" action="<?php echo base_url('auth/index'); ?>">
                                    <div class=" form-group">
                                        <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="***@gmail.com" value="<?php echo set_value('email'); ?>">
                                        <?php echo form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                        <?php echo form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                        <br>
                                        <div class="form-group ml-2">
                                            <input type="checkbox" class="form-checkbox" id="form-checkbox" name="form-checkbox" onclick="myFunction()">
                                            <label for="showPass">Show Password</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block text-white">
                                        Login
                                    </button>
                                </form>
                                <hr>
                                <!-- <div class="text-center">
                                    <a class="small" href="<?= base_url('aksesuser'); ?>">Home</a>
                                </div> -->
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('auth/registration'); ?>">Create an Account!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

<script type="text/javascript">
    function myFunction() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>