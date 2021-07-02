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
                                        <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Enter Email..." value="<?php echo set_value('email'); ?>">
                                        <?php echo form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Enter Password...">
                                        <?php echo form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                        <!-- <br>
                                        <div class="form-group ml-2">
                                            <input type="checkbox" class="form-checkbox" id="form-checkbox" name="form-checkbox"> Show Password
                                        </div> -->
                                    </div>
                                    <!-- <div class="form-group rounded">
                                        <div class="input-group rounded">
                                            <input type="password" class="form-control form-control-user" id="pass_log_id" name="password" placeholder="Enter Password...">
                                            <div class="input-group-append" style="border-radius: 0px 0px 60px 60px; ">
                                                <span class="input-group-text bg-light border-muted bi bi-eye-slash-fill field_icon toggle-password" style="border-radius: 0px 60px 60px 0px; cursor:pointer; color: #9370DB; font-size:24px" toggle="#password-field"></span>
                                            </div><br>
                                        </div>
                                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div> -->
                                    <button type="submit" class="btn btn-primary btn-user btn-block text-white">
                                        Login
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small text-secondary" href="<?= base_url('user/user_tambah'); ?>">Create an Account!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
<!-- <script>
    $("body").on('click', '.toggle-password', function() {
        $(this).toggleClass("bi bi-eye-slash-fill bi-eye-fill");
        var input = $("#pass_log_id");
        if (input.attr("type") === "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }

    });
</script> -->

<script type="text/javascript">
    $(document).ready(function() {
        $('.form-checkbox').click(function() {
            if ($(this).is(':checked')) {
                $('.password').attr('type', 'text');
            } else {
                $('.password').attr('type', 'password');
            }
        });
    });
</script>