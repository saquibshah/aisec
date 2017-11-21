<?php
include dirname(__FILE__) . '/appmanager.php';
if (!AppManager::isLoggedIn()) {
    //header("Location: disparityloginpage.php");
    header("Location: poster_black.php?page=42postcard");
    exit;
}
if (!AppManager::isSolvedQr()) {
    header("Location: qrcodeauth.php");
    exit;
}

AppManager::tryToRegister();
?>
<?php include_once dirname(__FILE__) . '/layouts/header.php'; ?>
<?php include_once dirname(__FILE__) . '/layouts/navigation.php'; ?>
<style>
    input[type=text], input[type=password], textarea {
        background-color: rgba(0, 0, 0, 0.2) !important;
        border: 0 !important;
        border-radius: 4px !important;
        color: white !important;
        -webkit-transition: all 0.1s linear;
        -moz-transition: all 0.1s linear;
        transition: all 0.1s linear;
        margin-bottom: 5px;
    }
</style>
<!-- Start content -->
<div class="col-md-5">
    <div class="new-item">
        <div class="new-header">
            <a href="#">Rio Olympics: Nikki Hamblin and Abbey D'Agostino show world Olympic spirit</a>
        </div>
        <div class="new-content">
            <div class="new-text">
                <a href="#"><img class="new-image" src="assets/img/hacker_1.jpg"/></a>
                <span>(CNN)It could have been a moment of controversy or anger. Instead it turned into a perfect demonstration of one of Olympism's founding principles...</span>
            </div>
        </div>
    </div>
    <div class="new-item">
        <div class="new-header">
            <a href="#">Rio Olympics: Nikki Hamblin and Abbey D'Agostino show world Olympic spirit</a>
        </div>
        <div class="new-content">
            <div class="new-text">
                <a href="#"><img class="new-image" src="assets/img/hacker_2.jpg"/></a>
                <span>(CNN)It could have been a moment of controversy or anger. Instead it turned into a perfect demonstration of one of Olympism's founding principles...</span>
            </div>
        </div>
    </div>
    <div class="new-item">
        <div class="new-header">
            <a href="#">Rio Olympics: Nikki Hamblin and Abbey D'Agostino show world Olympic spirit</a>
        </div>
        <div class="new-content">
            <div class="new-text">
                <img class="new-image" style="width: 300px;	height: 170px;" src="assets/img/hacker_3.jpg"/>
                <span>(CNN)It could have been a moment of controversy or anger. Instead it turned into a perfect demonstration of one of Olympism's founding principles...</span>
            </div>
        </div>
    </div>
    <div class="new-item">
        <div class="new-header">
            <a href="#">Rio Olympics: Nikki Hamblin and Abbey D'Agostino show world Olympic spirit</a>
        </div>
        <div class="new-content">
            <div class="new-text">
                <a href="#"><img class="new-image" src="assets/img/hacker_4.jpg"/></a>
                <span>(CNN)It could have been a moment of controversy or anger. Instead it turned into a perfect demonstration of one of Olympism's founding principles...</span>
            </div>
        </div>
    </div>
    <div class="new-item">
        <div class="new-header">
            <a href="#">Rio Olympics: Nikki Hamblin and Abbey D'Agostino show world Olympic spirit</a>
        </div>
        <div class="new-content">
            <div class="new-text">
                <a href="#"><img class="new-image" src="assets/img/hacker_5.jpg"/></a>
                <span>(CNN)It could have been a moment of controversy or anger. Instead it turned into a perfect demonstration of one of Olympism's founding principles...</span>
            </div>
        </div>
    </div>
    <div class="new-item">
        <div class="new-header">
            <a href="#">Rio Olympics: Nikki Hamblin and Abbey D'Agostino show world Olympic spirit</a>
        </div>
        <div class="new-content">
            <div class="new-text">
                <a href="#"><img class="new-image" src="assets/img/hacker_6.jpg"/></a>
                <span>(CNN)It could have been a moment of controversy or anger. Instead it turned into a perfect demonstration of one of Olympism's founding principles...</span>
            </div>
        </div>
    </div>
    <div class="new-item">
        <div class="new-header">
            <a href="#">Rio Olympics: Nikki Hamblin and Abbey D'Agostino show world Olympic spirit</a>
        </div>
        <div class="new-content">
            <div class="new-text">
                <a href="#"><img class="new-image" src="assets/img/hacker_7.jpg"/></a>
                <span>(CNN)It could have been a moment of controversy or anger. Instead it turned into a perfect demonstration of one of Olympism's founding principles...</span>
            </div>
        </div>
    </div>
</div>
<div class="col-md-5">
    <div class="new-item">
        <div class="new-header">
            <a href="#">Rio Olympics: Nikki Hamblin and Abbey D'Agostino show world Olympic spirit</a>
        </div>
        <div class="new-content">
            <div class="new-text">
                <a href="#"><img class="new-image" src="assets/img/hacker_1.jpg"/></a>
                <span>(CNN)It could have been a moment of controversy or anger. Instead it turned into a perfect demonstration of one of Olympism's founding principles...</span>
            </div>
        </div>
    </div>
    <div class="new-item">
        <div class="new-header">
            <a href="#">Rio Olympics: Nikki Hamblin and Abbey D'Agostino show world Olympic spirit</a>
        </div>
        <div class="new-content">
            <div class="new-text">
                <a href="#"><img class="new-image" src="assets/img/hacker_2.jpg"/></a>
                <span>(CNN)It could have been a moment of controversy or anger. Instead it turned into a perfect demonstration of one of Olympism's founding principles...</span>
            </div>
        </div>
    </div>
    <div class="new-item">
        <div class="new-header">
            <a href="#">Rio Olympics: Nikki Hamblin and Abbey D'Agostino show world Olympic spirit</a>
        </div>
        <div class="new-content">
            <div class="new-text">
                <a href="#"><img class="new-image" src="assets/img/hacker_3.jpg"/></a>
                <span>(CNN)It could have been a moment of controversy or anger. Instead it turned into a perfect demonstration of one of Olympism's founding principles...</span>
            </div>
        </div>
    </div>
    <div class="new-item">
        <div class="new-header">
            <a href="#">Rio Olympics: Nikki Hamblin and Abbey D'Agostino show world Olympic spirit</a>
        </div>
        <div class="new-content">
            <div class="new-text">
                <a href="#"><img class="new-image" src="assets/img/hacker_4.jpg"/></a>
                <span>(CNN)It could have been a moment of controversy or anger. Instead it turned into a perfect demonstration of one of Olympism's founding principles...</span>
            </div>
        </div>
    </div>
    <div class="new-item">
        <div class="new-header">
            <a href="#">Rio Olympics: Nikki Hamblin and Abbey D'Agostino show world Olympic spirit</a>
        </div>
        <div class="new-content">
            <div class="new-text">
                <a href="#"><img class="new-image" src="assets/img/hacker_5.jpg"/></a>
                <span>(CNN)It could have been a moment of controversy or anger. Instead it turned into a perfect demonstration of one of Olympism's founding principles...</span>
            </div>
        </div>
    </div>
    <div class="new-item">
        <div class="new-header">
            <a href="#">Rio Olympics: Nikki Hamblin and Abbey D'Agostino show world Olympic spirit</a>
        </div>
        <div class="new-content">
            <div class="new-text">
                <a href="#"><img class="new-image" src="assets/img/hacker_6.jpg"/></a>
                <span>(CNN)It could have been a moment of controversy or anger. Instead it turned into a perfect demonstration of one of Olympism's founding principles...</span>
            </div>
        </div>
    </div>
    <div class="new-item">
        <div class="new-header">
            <a href="#">Rio Olympics: Nikki Hamblin and Abbey D'Agostino show world Olympic spirit</a>
        </div>
        <div class="new-content">
            <div class="new-text">
                <a href="#"><img class="new-image" src="assets/img/hacker_7.jpg"/></a>
                <span>(CNN)It could have been a moment of controversy or anger. Instead it turned into a perfect demonstration of one of Olympism's founding principles...</span>
            </div>
        </div>
    </div>
</div>
<?php if (AppManager::isShowRegisterForm()) { ?>
    <div class="col-md-10 col-md-offset-2">
        <div id="insert_form" class="insert_form" style="position: relative;">
            <div id="loading" style="display: none; position: absolute;left: 0px;top: 0px;width: 100%;height: 100%;padding-top: 40px;z-index: 10;background: rgba(0,0,0,0.5);">
                <div class="sk-circle">
                    <div class="sk-circle1 sk-child"></div>
                    <div class="sk-circle2 sk-child"></div>
                    <div class="sk-circle3 sk-child"></div>
                    <div class="sk-circle4 sk-child"></div>
                    <div class="sk-circle5 sk-child"></div>
                    <div class="sk-circle6 sk-child"></div>
                    <div class="sk-circle7 sk-child"></div>
                    <div class="sk-circle8 sk-child"></div>
                    <div class="sk-circle9 sk-child"></div>
                    <div class="sk-circle10 sk-child"></div>
                    <div class="sk-circle11 sk-child"></div>
                    <div class="sk-circle12 sk-child"></div>
                </div>
            </div>
            <form class="form-horizontal">
                <h2>Registration information</h2>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="first_name" class="col-sm-4 control-label">First name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First name" onkeyup="changeValidateDecoration()">
                            <div class="error-message">First name is not valid</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="last_name" class="col-sm-4 control-label">Last name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last name" onkeyup="changeValidateDecoration()">
                            <div class="error-message">Last name is not valid</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="last_name" class="col-sm-4 control-label">Age</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="age" name="age" placeholder="Age" onkeyup="changeValidateDecoration()">
                            <div class="error-message">Age must be greater than 18</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="sex" class="col-sm-4 control-label">Sex</label>
                        <div class="col-sm-8">
                            <select id="sex" class="form-control" onchange="changeValidateDecoration()">
                                <option value="">Sex</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                            <div class="error-message">Please select sex</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="city" class="col-sm-4 control-label">City</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="city" name="city" placeholder="City" onkeyup="changeValidateDecoration()">
                            <div class="error-message">City is not valid</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-4 control-label">Email</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email" onkeyup="changeValidateDecoration()">
                            <div class="error-message">Email is not valid</div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-8" style="text-align: center;">
                        <button type="button" class="btn bttn-default" style="display: inline-block;" onclick="submitRegistration()">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php } ?>
<script>
    var hasChecked = false;
    function validateEmail(email) {
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }
    function changeValidateDecoration() {
        if (!hasChecked)
            return;
        var objPost = {};
        objPost.first_name = $.trim($('#first_name').val());
        objPost.last_name = $.trim($('#last_name').val());
        objPost.age = parseInt($.trim($('#age').val()));
        objPost.sex = $.trim($('#sex').val());
        objPost.city = $.trim($('#city').val());
        objPost.email = $.trim($('#email').val());
        if (objPost.first_name == "") {
            $('#first_name').next().show();
        } else {
            $('#first_name').next().hide();
        }
        if (objPost.last_name == "") {
            $('#last_name').next().show();
        } else {
            $('#last_name').next().hide();
        }
        if (isNaN(objPost.age) || objPost.age < 18) {
            $('#age').next().show();
        } else {
            $('#age').next().hide();
        }
        if (objPost.sex == "") {
            $('#sex').next().show();
        } else {
            $('#sex').next().hide();
        }
        if (objPost.city == "") {
            $('#city').next().show();
        } else {
            $('#city').next().hide();
        }
        if (!validateEmail(objPost.email)) {
            $('#email').next().show();
        } else {
            $('#email').next().hide();
        }
    }
    function submitRegistration() {
        hasChecked = true;
        var objPost = {};
        objPost.first_name = $.trim($('#first_name').val());
        objPost.last_name = $.trim($('#last_name').val());
        objPost.age = parseInt($.trim($('#age').val()));
        objPost.sex = $.trim($('#sex').val());
        objPost.city = $.trim($('#city').val());
        objPost.email = $.trim($('#email').val());

        var hasError = false;
        if (objPost.first_name == "") {
            $('#first_name').next().show();
            hasError = true;
        } else {
            $('#first_name').next().hide();
        }
        if (objPost.last_name == "") {
            $('#last_name').next().show();
            hasError = true;
        } else {
            $('#last_name').next().hide();
        }
        if (isNaN(objPost.age) || objPost.age < 18) {
            $('#age').next().show();
            hasError = true;
        } else {
            $('#age').next().hide();
        }
        if (objPost.sex == "") {
            $('#sex').next().show();
            hasError = true;
        } else {
            $('#sex').next().hide();
        }
        if (objPost.city == "") {
            $('#city').next().show();
            hasError = true;
        } else {
            $('#city').next().hide();
        }
        if (!validateEmail(objPost.email)) {
            $('#email').next().show();
            hasError = true;
        } else {
            $('#email').next().hide();
        }
        if (hasError == true) {
            return;
        }
        objPost.save_data = 'yes';
        document.getElementById('loading').style.display = 'block';
        $.ajax({url: 'home.php', type: 'POST', dataType: 'json', data: objPost}).done(function (data) {
            if (data == true) {
                $('#insert_form').parent().remove();
                alert('Saved successfully!');
            } else {
                alert('Errors!');
            }
            document.getElementById('loading').style.display = 'none';
        }).fail(function () {
            alert('Errors!');
            document.getElementById('loading').style.display = 'none';
        });
    }
</script>
<!-- End content -->

<?php include_once dirname(__FILE__) . '/layouts/footer.php'; ?>
