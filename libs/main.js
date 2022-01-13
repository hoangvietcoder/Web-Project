// Validate
//#region Sign up
$('.signup-form').on('submit',function(){
    var listInput = $('.input-frame .input-box-small');
    var check = true;
    for(var i = 0; i < listInput.length; i++){
        if(validate(listInput[i]) == false){
            validateShow(listInput[i]);
            check = false;
        }
    }
    return check;
});

// Ẩn cảnh báo khi focus vào input
$('.signup-form .input-box-small').each(function(){
    $(this).focus(function(){
        validateHide(this);
    });
});

// Kiểm tra xác nhận mật khẩu đúng
$(document).on('change', '.verified-password',function(){
    if($('#repassword').val().trim() == $('#password').val().trim() && $('#password').val().trim().length > 0){
         $('#repassword').parent().addClass('validate-repassword-correct');
    }
    else {
     $('#repassword').parent().removeClass('validate-repassword-correct');
    }
 });
//#endregion

//#region Login
$('.login-form').on('submit',function(){
    var listInput = $('.input-frame .input-box');
    var check = true;
    for(var i = 0; i < listInput.length; i++){
        if(validate(listInput[i]) == false){
            validateShow(listInput[i]);
            check = false;
        }
    }
    return check;
});

// Ẩn cảnh báo khi focus vào input
$('.login-form .input-box').each(function(){
    $(this).focus(function(){
        validateHide(this);
    });
});
//#endregion

//#region Validate
function validate(inputItem){
    // Kiểm tra Họ tên
    if($(inputItem).attr('name') == 'name'){
        if($(inputItem).val().trim().length == 0 || $(inputItem).val().trim() == null){
            $(inputItem).parent().attr('data-validate','Value required');
            return false;
        }
        if($(inputItem).val().trim().match('(?=.*?[0-9])') != null){
            $(inputItem).parent().attr('data-validate','Invalid name');
            return false;
        }
    }
    // Kiểm tra số điện thoại
    else if($(inputItem).attr('name') == 'phone'){
        if($(inputItem).val().trim().length == 0 || $(inputItem).val().trim() == null){
            $(inputItem).parent().attr('data-validate','Value required');
            return false;
        }
        if($(inputItem).val().trim().match('[A-Za-z]') != null){
            $(inputItem).parent().attr('data-validate','Invalid phone number');
            return false;
        }
    }
    // Kiểm tra Ngày sinh
    else if($(inputItem).attr('name') == 'birthdate'){
        if($(inputItem).val().trim().length <= 0){
            $(inputItem).parent().attr('data-validate','Value required');
            return false;
        }
    }
    // Kiểm tra Email
    else if($(inputItem).attr('name') == 'email'){
        if($(inputItem).val().trim().length <= 0){
            $(inputItem).parent().attr('data-validate','Value required');
            return false;
        }
        if($(inputItem).val().trim().match('^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$') == null){
            $(inputItem).parent().attr('data-validate','Invalid email');
            return false;
        }
    }
    // Kiểm tra password
    else if($(inputItem).attr('name') == 'password'){
        if($(inputItem).hasClass('input-box')){
            if($(inputItem).val().trim().length <= 0){
                $(inputItem).parent().attr('data-validate','Value required');
                return false;
            }
        }
        else{
            if($(inputItem).val().trim().length < 6){
                $(inputItem).parent().attr('data-validate','Password must longer than 6 characters');
                return false;
            }
            if($(inputItem).val().trim().match('(?=.*?[A-Z])') == null){
                $(inputItem).parent().attr('data-validate','Must contain at least an uppercase character');
                return false;
            }
            if($(inputItem).val().trim().match('(?=.*?[a-z])') == null){
                $(inputItem).parent().attr('data-validate','Must contain at least a lowercase character');
                return false;
            }
            if($(inputItem).val().trim().match('(?=.*?[0-9])') == null){
                $(inputItem).parent().attr('data-validate','Must contain at least a numeric');
                return false;
            }
            if($(inputItem).val().trim().match('(?=.*?[#?!@$%^&*-])') == null){
                $(inputItem).parent().attr('data-validate','Must contain at least a special character');
                return false;
            }
        }
    }
    // Kiểm tra nhập lại mật khẩu
    else {
        var password = $("[name='password']").val().trim();
        if($(inputItem).val().trim() != password) {
            $(inputItem).parent().attr('data-validate','Password not correct');
            return false;
        }
    }
}

// Hiển thị cảnh báo validate
function validateShow(input){
    var thisAlert=$(input).parent();
    $(thisAlert).addClass('alert-validate');
}

// Ẩn cảnh báo validate
function validateHide(input){
    var thisAlert=$(input).parent();
    $(thisAlert).removeClass('alert-validate');
}
//#endregion

//#region profile page button click
$(window).on('click',function(event){
    console.log(event.target.id);
    // form cập nhật thông tin
    if(event.target.id == 'update-info-btn'){
        $('#update-info-panel').addClass('d-block');
    }
    if(event.target.id == 'update-info-panel' || event.target.id == 'update-info-close'){
        $('#update-info-panel').removeClass('d-block');
    }
    // form nạp thẻ
    if(event.target.id == 'napthe-btn'){
        $('#napthe-panel').addClass('d-block');
    }
    if(event.target.id == 'napthe-panel' || event.target.id == 'nap-close'){
        $('#napthe-panel').removeClass('d-block');
    }
    // form đổi mật khẩu
    if(event.target.id == 'update-password-btn'){
        $('#update-password-panel').addClass('d-block');
    }
    if(event.target.id == 'update-password-panel' || event.target.id == 'update-password-close'){
        $('#update-password-panel').removeClass('d-block');
    }
    // form cập nhật ảnh đại diện
    if(event.target.id == 'add-avatar-btn'){
        $('#add-avatar-panel').addClass('d-block');
    }
    if(event.target.id == 'add-avatar-panel' || event.target.id == 'add-avatar-close'){
        $('#add-avatar-panel').removeClass('d-block');
        $("input[name='avatar']").val('');
        $('#user-avatar').attr('src', 'resources/white-image.png');
    }
    // form đăng ký tài khoản developer
    if(event.target.id == 'signup-developer-btn'){
        $('#signup-developer-panel').addClass('d-block');
    }
    if(event.target.id == 'signup-developer-panel' || event.target.id == 'signup-developer-close'){
        $('#signup-developer-panel').removeClass('d-block');
    }
    // form mua ứng dụng
    if(event.target.id == 'buy-app-btn'){
        $('#buy-app-panel').addClass('dis-block');
    }
    if(event.target.id == 'buy-app-panel' || event.target.id == 'buy-app-close'){
        $('#buy-app-panel').removeClass('dis-block');
    }
    // form xoá ứng dụng
    if(event.target.id == 'product-delete-btn-1' || event.target.id == 'product-delete-btn-2'){
        $('#product-delete-panel').addClass('d-block');
    }
    if(event.target.id == 'product-delete-panel' || event.target.id == 'product-delete-close'){
        $('#product-delete-panel').removeClass('d-block');
    }
    



    if(event.target.id == 'sao-0'){
        $('#star-rate').val(1);
    }
    if(event.target.id == 'sao-1'){
        $('#star-rate').val(2);
    }
    if(event.target.id == 'sao-2'){
        $('#star-rate').val(3);
    }
    if(event.target.id == 'sao-3'){
        $('#star-rate').val(4);
    }
    if(event.target.id == 'sao-4'){
        $('#star-rate').val(5);
    }
});
//#endregion

// Cập nhật ảnh sau khi up lên 
function ReadImageToScreen(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#user-avatar')
                .attr('src', e.target.result)
                .width(300)
                .height(300);
        };

        reader.readAsDataURL(input.files[0]);
    }
}
function ReadImageToScreen(input, id, w, h) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $(id)
                .attr('src', e.target.result)
                .width(w)
                .height(h);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

// Submit đổi mật khẩu
$('#update-password-form').on('submit', function(){
    if($('#npassword').val().trim().length < 6){
        alert('Password must longer than 6 characters');
        return false;
    }
    if($('#npassword').val().trim().match('(?=.*?[A-Z])') == null){
        alert('Must contain at least an uppercase character');
        return false;
    }
    if($('#npassword').val().trim().match('(?=.*?[a-z])') == null){
        alert('Must contain at least a lowercase character');
        return false;
    }
    if($('#npassword').val().trim().match('(?=.*?[0-9])') == null){
        alert('Must contain at least a numeric');
        return false;
    }
    if($('#npassword').val().trim().match('(?=.*?[#?!@$%^&*-])') == null){
        alert('Must contain at least a special character');
        return false;
    }
    if($('#rnpassword').val() != $('#npassword').val()){
        alert('Password not correct');
        return false;
    }
    return true;
});