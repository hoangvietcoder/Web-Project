<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

define('HOST','sql304.epizy.com');
define('USER','epiz_28661360');
define('PASSWORD','Sd7EojF5BIo');
define('DB','epiz_28661360_ql_ungdung');

// Kết nối database
function OPEN_DB(){
    $conn = new mysqli(HOST,USER,PASSWORD,DB);
    mysqli_query($conn,"SET NAMES 'UTF8'");
    if($conn->connect_error){
        die('Error: '.$conn->connect_error);
    }
    return $conn;
}

// Đăng nhập
function Login($email, $password){
    $query = "SELECT * FROM user WHERE email = ?";
    $conn = OPEN_DB();

    $stm = $conn->prepare($query);
    $stm->bind_param('s', $email);
    
    if(!$stm->execute()){
        return array('code' => 1,'error' => 'Lỗi xử lý vui lòng reset trang');
    }

    $result = $stm->get_result();

    if($result->num_rows == 0){
        return array('code' => 1,'error' => 'Tài khoản này không tồn tại');
    }

    $data = $result->fetch_assoc();
    
    $hashed_pwd = $data['password'];
    if(!password_verify($password, $hashed_pwd)){
        return array('code' => 2,'error' => 'Mật khẩu không chính xác');
    }
    else if($data['activate'] == 0){
        return array('code' => 3,'error' => 'Tài khoản này chưa được kích hoạt\nVui lòng kích hoạt và đăng nhập lại');
    }
    else{
        return array('code' => 0,'error' => '', 'data' => $data);
    }
}

// Lấy thông tin user bằng id
function GetUserProfileById($userId){
    $query = "SELECT * FROM user WHERE id_user = ?";
    $conn = OPEN_DB();

    $stm = $conn->prepare($query);
    $stm->bind_param('s', $userId);

    if(!$stm->execute()){
        return null;
    }

    $result = $stm->get_result();

    if($result->num_rows == 0){
        return null;
    }

    $data = $result->fetch_assoc();

    return $data;
}

// Lấy thông tin user bằng email
function GetUserProfileByEmail($email){
    $query = "SELECT * FROM user WHERE email = ?";
    $conn = OPEN_DB();

    $stm = $conn->prepare($query);
    $stm->bind_param('s', $email);

    if(!$stm->execute()){
        return array('code' => 1, 'message' => 'Lỗi xử lý, vui lòng thử lại sau.');
    }

    $result = $stm->get_result();

    if($result->num_rows == 0){
        return array('code' => 2, 'message' => 'Người dùng không tồn tại.');
    }

    $data = $result->fetch_assoc();

    return array('code' => 0, 'message' => '', 'data' => $data);
}

// Kiểm tra mail đã tồn tại
function IsExistsMail($email){
    $query = "SELECT name FROM user WHERE email = ?";
    $conn = OPEN_DB();

    $stm = $conn->prepare($query);
    $stm->bind_param('s', $email);

    if(!$stm->execute()) {
        die('Error: '.$stm->error);
    }

    $result = $stm->get_result();
    if($result->num_rows > 0){
        return true;
    }
    return false;
}

// Đăng ký tài khoản
function Register($name,$phone,$birthdate,$gender,$email,$password){
    if(IsExistsMail($email)){
        return array('code' => 1,'error' => 'Email này đã tồn tại');
    }

    $hash = password_hash($password, PASSWORD_DEFAULT);
    $rand = random_int(0,10000);
    $token = md5($name.'+'.$rand);
    $zero = 0;
    $role = 'user';
    if($gender == "Nam"){
        $avatar = "resources/images/img_avatar_m.png";
    }
    else{
        $avatar = "resources/images/img_avatar_fm.png";
    }

    $query = "INSERT INTO user(email, password, name, birthdate, phone, gender, avatar, money, role, token) VALUES (?,?,?,?,?,?,?,?,?,?)";

    $conn = OPEN_DB();
    $stm = $conn->prepare($query);
    $stm->bind_param('ssssssssss',$email,$hash,$name,$birthdate,$phone,$gender,$avatar,$zero,$role,$token);
    
    if(!$stm->execute()){
        return array('code' => 2,'error' => 'Không thể thực thi');
    }

    // Gửi mail kích hoạt
    SendActivateRequest($email, $token);

    return array('code' => 0,'message' => 'Đăng ký thành công');
}

// Gửi mail kích hoạt tài khoản
function SendActivateRequest($email, $token){
    //Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'nguyenhuynhtatdat@gmail.com';          //SMTP username
        $mail->Password   = 'wtxeeooqmqaolfbh';                     //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom('nguyenhuynhtatdat@gmail.com', 'TADA admin');
        $mail->addAddress($email, 'New friend');                    //Add a recipient
        /*
        $mail->addAddress('ellen@example.com');                     //Name is optional
        $mail->addReplyTo('info@example.com', 'Information');
        $mail->addCC('cc@example.com');
        $mail->addBCC('bcc@example.com');
        

        //Attachments
        $mail->addAttachment('/var/tmp/file.tar.gz');               //Add attachments
        $mail->addAttachment('/tmp/image.jpg', 'new.jpg');          //Optional name
        */

        //Content
        $mail->CharSet = "UTF-8";
        $mail->isHTML(true);                                        //Set email format to HTML
        $mail->Subject = 'Xác minh tài khoản của bạn';
        $mail->Body    = 'Bấm <a href="http://istoreshop.rf.gd/activate.php?email='.$email.'&token='.$token.'">vào đây</a> để xác minh tài khoản.';
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        return true;
    } 
    catch (Exception $e) {
        return false;
    }
}

// Kích hoạt tài khoản
function EmailActivate($email, $token){
    $query = 'SELECT id_user FROM user WHERE email = ? AND token = ? AND activate = 0';
    
    $conn = OPEN_DB();
    $stm = $conn->prepare($query);
    $stm->bind_param('ss',$email,$token);

    if(!$stm->execute()){
        return array('code' => 1,'error' => 'Không thể thực thi');
    }

    $result = $stm->get_result();
    
    if($result->num_rows == 0){
        return array('code' => 2,'error' => 'Thông tin tài khoản không xác định');
    }

    $query = "UPDATE user SET activate = 1, token = '' WHERE email = ?";
    $stm = $conn->prepare($query);
    $stm->bind_param('s',$email);

    if(!$stm->execute()){
        return array('code' => 1,'error' => 'Không thể thực thi');
    }

    return array('code' => 0,'error' => '', 'message' => 'kích hoạt tài khỏan thành công');
}

// User cập nhật thông tin
function UpdateProfile($id_user,$name,$birthdate,$phone,$gender){
    $query = "UPDATE user SET name = ?, birthdate = ?, phone = ?, gender = ? WHERE id_user = ?";
    
    $conn = OPEN_DB();
    $stm = $conn->prepare($query);
    $stm->bind_param('sssss',$name,$birthdate,$phone,$gender,$id_user);

    if(!$stm->execute()){
        return array('code' => 1,'error' => 'Lỗi xử lý vui lòng reset trang');
    }

    return array('code' => 0,'error' => '', 'message' => 'Cập nhật thông tin thành công');
}

// Admin cập nhật thông tin 
function AdminUpdateProfile($id_user,$name,$birthdate,$phone,$gender,$role){
    $query = "UPDATE user SET name = ?, birthdate = ?, phone = ?, gender = ?, role = ? WHERE id_user = ?";
    
    $conn = OPEN_DB();
    $stm = $conn->prepare($query);
    $stm->bind_param('ssssss',$name,$birthdate,$phone,$gender,$role,$id_user);

    if(!$stm->execute()){
        return array('code' => 1,'error' => 'Lỗi xử lý vui lòng reset trang');
    }

    return array('code' => 0,'error' => '', 'message' => 'Cập nhật thông tin thành công');
}

// Kiểm tra trạng thái thẻ cào
function CheckStateTheCao($seri) {
    $query = "SELECT * FROM thecao WHERE seri = ? AND trangthai = 'free'";

    $conn = OPEN_DB();
    $stm = $conn->prepare($query);
    $stm->bind_param('s',$seri);

    if(!$stm->execute()){
        return array('code' => 1, 'value' => 'Lỗi xử lý, vui lòng thử lại sau.');
    }

    $result = $stm->get_result();

    if($result->num_rows == 0){
        return array('code' => 2, 'value' => 'Thẻ đã được sử dụng hoặc không tồn tại.');
    }

    $data = $result->fetch_assoc();

    return array('code' => 0, 'value' => $data['menhgia']);
}

// Đổi trạng thái thẻ sau khi nạp
function ChangeStateTheCao($seri){
    $query = "UPDATE thecao SET trangthai = 'used' WHERE seri = ?";

    $conn = OPEN_DB();
    $stm = $conn->prepare($query);
    $stm->bind_param('s',$seri);

    if(!$stm->execute()){
        return array('code' => 1, 'value' => 'Lỗi xử lý, vui lòng thử lại sau.');
    }

    return array('code' => 0, 'message' => 'Cập nhật thành công.');
}

// Nạp thẻ
function NapThe($email, $seri){
    if(CheckStateTheCao($seri)['code'] != 0){
        return array('code' => 1, 'message' => CheckStateTheCao($seri)['value']);
    }

    $money = CheckStateTheCao($seri)['value'];

    if(GetUserProfileByEmail($email)['code'] != 0){
        return array('code' => 2, 'message' => GetUserProfileByEmail($email)['message']);
    }

    $query = "UPDATE user SET money = money + ? WHERE email = ?";

    $conn = OPEN_DB();
    $stm = $conn->prepare($query);
    $stm->bind_param('ss',$money, $email);

    if(!$stm->execute()){
        return array('code' => 3, 'mesage' => 'Lỗi xử lý, vui lòng thử lại sau');
    }

    ChangeStateTheCao($seri);

    return array('code' => 0, 'message' => 'Nạp thẻ thành công.');
}

// Cập nhật avatar 
function UploadAvatar($id_user, $image){
    $query = "UPDATE user SET avatar = ? WHERE id_user = ?";

    $conn = OPEN_DB();
    $stm = $conn->prepare($query);
    $stm->bind_param('ss',$image, $id_user);

    if(!$stm->execute()){
        return array('code' => 1, 'mesage' => 'Lỗi xử lý, vui lòng thử lại sau.');
    }

    return array('code' => 0, 'message' => 'Cập nhật thành công.');
}

// Đổi mật khẩu
function UpdatePassword($id_user, $password, $npassword){
    $user = GetUserProfileById($id_user);

    if($user == null){
        return array('code' => 3, 'message' => 'Người dùng không tồn tại.');
    }

    $hashed_old = $user['password'];

    if(!password_verify($password, $hashed_old)){
        return array('code' => 1, 'message' => 'Sai mật khẩu, vui lòng nhập lại.');
    }
    $hashed_new = password_hash($npassword, PASSWORD_DEFAULT);
    
    $query = "UPDATE user SET password = ? WHERE id_user = ?";

    $conn = OPEN_DB();
    $stm = $conn->prepare($query);
    $stm->bind_param('ss', $hashed_new, $id_user);

    if(!$stm->execute()){
        return array('code' => 2, 'mesage' => 'Lỗi xử lý, vui lòng thử lại sau.');
    }

    return array('code' => 0, 'message' => 'Cập nhật thành công.');
}

// Đăng ký tài khoản developer 
function SignupDeveloper($id_user, $dev_name, $dev_mail, $password, $image1, $image2){
    $user = GetUserProfileById($id_user);
    
    if(!password_verify($password, $user['password'])){
        return array('code' => 1, 'message' => 'Sai mật khẩu vui lòng thử lại sau.');
    }

    if((int)$user['money'] < 500000){
        return array('code' => 2, 'message' => 'Số dư người dùng không đủ để thực hiện đăng ký.');
    }

    $query = "UPDATE user SET money = money - 500000, role = 'developer', dev_email = ?, dev_name = ?, id_card_front = ?, id_card_back = ? WHERE id_user = ?";
    
    $conn = OPEN_DB();
    $stm = $conn->prepare($query);
    $stm->bind_param('sssss', $dev_mail, $dev_name, $image1, $image2, $id_user);

    if(!$stm->execute()){
        return array('code' => 3, 'message' => 'Lỗi xử lý, vui lòng thử lại sau.');
    }

    return array('code' => 0, 'message' => 'Đăng ký thành công.');
}

// Tìm Sản phẩm bằng id danh mục
function GetProductByIdCategory($id_danhmuc){
    $query = "SELECT * FROM product WHERE id_danhmuc = ? AND state = 'publish'";
    
    $conn = OPEN_DB();
    $stm = $conn->prepare($query);
    $stm->bind_param('s', $id_danhmuc);

    if(!$stm->execute()){
        return null;
    }

    $result = $stm->get_result();

    while($row = $result->fetch_assoc()){
        $rows[] = $row;
    }

    // Trả về mảng chứa dữ liệu từng dòng trong csdl
    return $rows;
}

// Tìm sản phẩm mới
function GetNewProductByIdCategory($id_danhmuc){
    $query = "SELECT * FROM product WHERE id_danhmuc = ? ORDER BY ngaydang DESC";
    $conn = OPEN_DB();

    $stm = $conn->prepare($query);
    $stm->bind_param('s', $id_danhmuc);

    if(!$stm->execute()){
        return null;
    }

    $result = $stm->get_result();
    while($row = $result->fetch_assoc()){
        $rows[] = $row;
    }

    // Trả về mảng chứa dữ liệu từng dòng trong csdl
    return $rows;
}

// Tìm sản phẩm phổ biến
function GetPopularProductByIdCategory($id_danhmuc){
    $query = "SELECT * FROM product WHERE id_danhmuc = ? ORDER BY downloads DESC";
    $conn = OPEN_DB();

    $stm = $conn->prepare($query);
    $stm->bind_param('s', $id_danhmuc);

    if(!$stm->execute()){
        return null;
    }

    $result = $stm->get_result();
    while($row = $result->fetch_assoc()){
        $rows[] = $row;
    }

    // Trả về mảng chứa dữ liệu từng dòng trong csdl
    return $rows;
}

// Tìm sản phẩm ngẫu nhiên theo id danh mục
function GetRandomProductByIdCategory($id_danhmuc, $num){
    $query = "SELECT * FROM product WHERE id_danhmuc = ? ORDER BY RAND() LIMIT ?";

    $conn = OPEN_DB();
    $stm = $conn->prepare($query);
    $stm->bind_param('ss', $id_danhmuc, $num);

    if(!$stm->execute()){
        return array('code' => 1, 'message' => 'Lỗi xử lý vui lòng thử lại sau.');
    }

    $result = $stm->get_result();

    if($result->num_rows == 0){
        return array('code' => 2,'error' => 'Không có dữ liệu này.');
    }

    while($row = $result->fetch_assoc()){
        $rows[] = $row;
    }

    // Trả về mảng chứa dữ liệu từng dòng trong csdl
    return $rows;
}

// Tìm tên sản phẩm bằng ID
function GetProductByID($id_product){
    $query = "SELECT * FROM product WHERE id_product = ?";
    $conn = OPEN_DB();

    $stm = $conn->prepare($query);
    $stm->bind_param('s', $id_product);

    if(!$stm->execute()){
        return null;
    }

    $result = $stm->get_result();
    $data = $result->fetch_assoc();

    // Trả về mảng chứa dữ liệu từng dòng trong csdl
    return $data;
}

// Tìm tên sản phẩm bằng id developer
function GetProductByDevId($id_developer){
    $query = "SELECT * FROM product WHERE id_developer = ?";

    $conn = OPEN_DB();
    $stm = $conn->prepare($query);
    $stm->bind_param('s', $id_developer);

    if(!$stm->execute()){
        return array('code' => 1, 'message' => 'Lỗi xử lý vui lòng thử lại sau.', 'data' => false);
    }

    $result = $stm->get_result();

    if($result->num_rows == 0){
        return array('code' => 2, 'message' => 'Không tìm thấy sản phẩm.', 'data' => false);
    }

    while($row = $result->fetch_assoc()){
        $rows[] = $row;
    }

    return array('code' => 0, 'message' => '', 'data' => $rows);
}

// Tìm tất cả danh mục
function GetCategoryAll(){
    $query = "SELECT * FROM danhmuc";
    $conn = OPEN_DB();

    $stm = $conn->prepare($query);

    if(!$stm->execute()){
        return null;
    }

    $result = $stm->get_result();
    while($row = $result->fetch_assoc()){
        $rows[] = $row;
    }

    // Trả về mảng chứa dữ liệu từng dòng trong csdl
    return $rows;
}

// Tìm danh mục bằng ID
function GetCategoryByID($id_danhmuc){
    $query = "SELECT * FROM danhmuc WHERE id_danhmuc = ?";
    $conn = OPEN_DB();

    $stm = $conn->prepare($query);
    $stm->bind_param('s', $id_danhmuc);

    if(!$stm->execute()){
        return null;
    }

    $result = $stm->get_result();
    $data = $result->fetch_assoc();

    // Trả về mảng chứa dữ liệu từng dòng trong csdl
    return $data;
}

// Tìm developer ID
function GetDevByID($id_developer){
    $query = "SELECT * FROM user WHERE id_user = ? AND role = 'developer'  or role = 'admin'";
    
    $conn = OPEN_DB();
    $stm = $conn->prepare($query);
    $stm->bind_param('s', $id_developer);

    if(!$stm->execute()){
        return array('code' => 1, 'message' => 'Thẻ đã được sử dụng hoặc không tồn tại.');
    }

    $result = $stm->get_result();
    
    if($result->num_rows == 0){
        return array('code' => 2, 'message' => 'Lỗi xử lý, vui lòng thử lại sau.');
    }

    $data = $result->fetch_assoc();

    // Trả về một dòng thông tin
    return $data;
}

// Tìm admin bằng ID
function GetAdminByID($id_user){
    $query = "SELECT * FROM user WHERE id_user = ? AND role = 'admin'";
    
    $conn = OPEN_DB();
    $stm = $conn->prepare($query);
    $stm->bind_param('s', $id_user);

    if(!$stm->execute()){
        return array('code' => 1, 'message' => 'Thẻ đã được sử dụng hoặc không tồn tại.');
    }

    $result = $stm->get_result();
    
    if($result->num_rows == 0){
        return array('code' => 2, 'message' => 'Lỗi xử lý, vui lòng thử lại sau.');
    }

    $data = $result->fetch_assoc();

    // Trả về một dòng thông tin
    return $data;
}

// Thông tin tất cả user
function GetUserAll(){
    $query = "SELECT * from user";

    $conn = OPEN_DB();
    $stm = $conn->prepare($query);

    if(!$stm->execute()){
        return array('code' => 1, 'message' => 'Thẻ đã được sử dụng hoặc không tồn tại.');
    }

    $result = $stm->get_result();
    
    if($result->num_rows == 0){
        return array('code' => 2, 'message' => 'Lỗi xử lý, vui lòng thử lại sau.');
    }

    while($row = $result->fetch_assoc()){
        $rows[] = $row;
    }

    // Trả về mảng chứa dữ liệu từng dòng trong csdl
    return $rows;
}

// Tìm user ID
function GetUserByID($id_user){
    $query = "SELECT id_user, email, name, birthdate, phone, gender, role, avatar FROM user WHERE id_user = ?";
    $conn = OPEN_DB();

    $stm = $conn->prepare($query);
    $stm->bind_param('s', $id_user);

    if(!$stm->execute()){
        return array('code' => 1, 'message' => 'Thẻ đã được sử dụng hoặc không tồn tại.');
    }

    $result = $stm->get_result();

    if($result->num_rows == 0){
        return array('code' => 2, 'message' => 'Lỗi xử lý, vui lòng thử lại sau.');
    }

    $data = $result->fetch_assoc();

    // Trả về một dòng thông tin
    return $data;
}

// Tìm thông tin đánh giá bằng mã sản phẩm
function GetRateByProductId($id_sanpham){
    $query = "SELECT * FROM danhgiasanpham WHERE id_sanpham = ? ORDER BY ngaydanhgia DESC";
    $conn = OPEN_DB();

    $stm = $conn->prepare($query);
    $stm->bind_param('s', $id_sanpham);

    if(!$stm->execute()){
        return array('code' => 1, 'message' => 'Lỗi xử lý, vui lòng thử lại sau.');
    }

    $result = $stm->get_result();

    if($result->num_rows == 0){
        return array('code' => 2, 'message' => 'Sản phẩm này chưa được đánh giá.');
    }

    while($row = $result->fetch_assoc()){
        $rows[] = $row;
    }

    // Trả về mảng chứa dữ liệu từng dòng trong csdl
    return array('code' => 0, 'message' => '', 'data' => $rows);
}

// Kiểm tra người dùng đã mua ứng dụng
function CheckOwnApp($id_user, $id_product){
    $query = 'SELECT * FROM user_ungdung WHERE id_user = ? AND id_product = ?';

    $conn = OPEN_DB();
    $stm = $conn->prepare($query);
    $stm->bind_param('ss', $id_user, $id_product);

    if(!$stm->execute()){
        return array('code' => 1, 'message' => 'Lỗi xử lý vui lòng thử lại sau.', 'data' => false);
    }

    $result = $stm->get_result();

    if($result->num_rows == 0){
        return array('code' => 2, 'message' => 'Người dùng chưa mua ứng dụng này', 'data' => false);
    }

    return array('code' => 0, 'message' => '', 'data' => true);
}

// Tìm thể loại bằng ID sản phẩm
function GetTypeProductById($id_product){
    $query = "SELECT * FROM theloai WHERE id_theloai IN (SELECT id_theloai FROM theloai_sanpham WHERE id_product = ?)";
    
    $conn = OPEN_DB();
    $stm = $conn->prepare($query);
    $stm->bind_param('s', $id_product);

    if(!$stm->execute()){
        return array('code' => 1, 'message' => 'Lỗi xử lý vui lòng thử lại sau.', 'data' => false);
    }

    $result = $stm->get_result();

    if($result->num_rows == 0){
        return array('code' => 2, 'message' => 'Sản phẩm này chưa có thể loại.', 'data' => false);
    }
    
    while($row = $result->fetch_assoc()){
        $rows[] = $row;
    }

    return array('code' => 0, 'message' => '', 'data' => $rows);
}

// Mua sản phẩm
function BuyApp($id_user, $id_product){
    if(GetUserProfileById($id_user)['money'] < GetProductByID($id_product)['price']){
        return array('code' => 1, 'message' => 'Số dư không đủ để thực hiện giao dịch.');
    }

    $query = "INSERT INTO user_ungdung(id_user, id_product) VALUES (?,?)";
    
    $conn = OPEN_DB();
    $stm = $conn->prepare($query);
    $stm->bind_param('ss',$id_user, $id_product);
    
    if(!$stm->execute()){
        return array('code' => 2, 'message' => 'Lỗi xử lý vui lòng thử lại sau.');
    }

    $price = (int)GetProductByID($id_product)['price'];
    $query = "UPDATE user SET money = money - ? WHERE id_user = ?";

    $stm = $conn->prepare($query);
    $stm->bind_param('ss',$price, $id_user);

    if(!$stm->execute()){
        return array('code' => 2, 'message' => 'Lỗi xử lý vui lòng thử lại sau.');
    }

    return array('code' => 0, 'message' => 'Giao dịch thành công.');
}

// Cập nhật lượt tải cho sản phẩm
function UpdateDownloadCount($id_product){
    $query ="UPDATE product SET downloads = downloads + 1 WHERE id_product = ?";

    $conn = OPEN_DB();
    $stm = $conn->prepare($query);
    $stm->bind_param('s', $id_product);

    if(!$stm->execute()){
        return array('code' => 1, 'message' => 'Lỗi xử lý vui lòng thử lại sau.');
    }

    return array('code' => 0, 'message' => 'Cập nhật thành công thành công.');
}

// Tìm ứng dụng của developer 
/// state = 'draft' -> bản nháp
/// state = 'wait' -> chờ duyệt
/// state = 'checked' -> đã duyệt nhưng chưa được phát hành
/// state = 'stop' -> ngừng phát hành
/// state = 'publish' -> đang phát hành
/// state = 'reject' -> đã bị từ chối
function GetDevAppByState($id_developer, $state){
    $query = "SELECT * FROM product WHERE id_developer = ? AND state = ?";

    $conn = OPEN_DB();
    $stm = $conn->prepare($query);
    $stm->bind_param('ss', $id_developer, $state);

    if(!$stm->execute()){
        return array('code' => 1, 'message' => 'Lỗi xử lý vui lòng thử lại sau.', 'data' => false);
    }

    $result = $stm->get_result();

    if($result->num_rows == 0){
        return array('code' => 2, 'message' => 'Không tìm thấy sản phẩm.', 'data' => false);
    }

    while($row = $result->fetch_assoc()){
        $rows[] = $row;
    }

    return array('code' => 0, 'message' => '', 'data' => $rows);
}

// Tìm ứng dụng theo trạng thái
function GetProductByState($state){
    $query = "SELECT * FROM product WHERE  state = ?";

    $conn = OPEN_DB();
    $stm = $conn->prepare($query);
    $stm->bind_param('s', $state);

    if(!$stm->execute()){
        return array('code' => 1, 'message' => 'Lỗi xử lý vui lòng thử lại sau.', 'data' => false);
    }

    $result = $stm->get_result();

    if($result->num_rows == 0){
        return array('code' => 2, 'message' => 'Không tìm thấy sản phẩm.', 'data' => false);
    }

    while($row = $result->fetch_assoc()){
        $rows[] = $row;
    }

    return array('code' => 0, 'message' => '', 'data' => $rows);
}

// Thêm sản phẩm
function InsertProduct($name, $file, $id_developer, $id_danhmuc, $price, $shortinfo, $detail, $image_logo, $ngaydang){
    if(strlen($name) == 0){
        return array('code' => 1, 'message' => 'Thông tin không hợp lệ, vui lòng thử lại sau.', 'data' => false);
    }
    $query = "INSERT INTO product(name, file, id_developer, id_danhmuc, price, shortinfo, detail, image_logo, ngaydang, state) VALUES (?,?,?,?,?,?,?,?,?,?)";
    $state = 'draft';

    $conn = OPEN_DB();
    $stm = $conn->prepare($query);
    $stm->bind_param('ssssssssss', $name, $file, $id_developer, $id_danhmuc, $price, $shortinfo, $detail, $image_logo, $ngaydang, $state);

    if(!$stm->execute()){
        return array('code' => 2, 'message' => 'Lỗi xử lý vui lòng thử lại sau.', 'data' => false);
    }

    return array('code' => 0, 'message' => 'Thêm sản phẩm thành công.', 'data' => true);
}

// Chỉnh sửa sản phẩm
function UpdateProduct($id_product, $name, $file, $id_danhmuc, $price, $shortinfo, $detail, $image_logo){
    $old_product = GetProductByID($id_product);
    
    if($name == ""){ $name = $old_product['name']; }
    if($id_danhmuc == ""){ $id_danhmuc = $old_product['id_danhmuc']; }
    if($price == ""){ $price = $old_product['price']; }

    $query = "UPDATE product SET name = ?, file = ?, id_danhmuc = ?, price = ?, shortinfo = ?, detail = ?, image_logo = ? WHERE id_product = ?";

    $conn = OPEN_DB();
    $stm = $conn->prepare($query);
    $stm->bind_param('ssssssss', $name, $file, $id_danhmuc, $price, $shortinfo, $detail, $image_logo, $id_product);

    if(!$stm->execute()){
        return array('code' => 1, 'message' => 'Lỗi xử lý vui lòng thử lại sau.');
    }

    return array('code' => 0, 'message' => 'Cập nhật thành công');
}

// Cập nhật trạng thái ứng dụng
function UpdateProductState($id_product, $state){
    $query = "UPDATE product SET state = ? WHERE id_product = ?";

    $conn = OPEN_DB();
    $stm = $conn->prepare($query);
    $stm->bind_param('ss', $state, $id_product);

    if(!$stm->execute()){
        return array('code' => 1, 'message' => 'Lỗi xử lý vui lòng thử lại sau.');
    }

    return array('code' => 0, 'message' => 'Cập nhật thành công.');
}

// Xóa sản phẩm
function DeleteProductById($id_product){
    $query = "DELETE FROM product WHERE id_product = ?";

    $conn = OPEN_DB();
    $stm = $conn->prepare($query);
    $stm->bind_param('s', $id_product);

    if(!$stm->execute()){
        return array('code' => 1, 'message' => 'Lỗi xử lý vui lòng thử lại sau.');
    }

    return array('code' => 0, 'message' => 'Sản phẩm đã được xóa.');
}

// Tìm sản phẩm cuối cùng
function GetLastProduct(){
    $query = "SELECT * FROM product ORDER BY id_product DESC LIMIT 1";

    $conn = OPEN_DB();
    $stm = $conn->prepare($query);

    if(!$stm->execute()){
        return array('code' => 1, 'message' => 'Lỗi xử lý vui lòng thử lại sau.', 'data' => false);
    }

    $result = $stm->get_result();

    if($result->num_rows == 0){
        return array('code' => 2, 'message' => 'Không tìm thấy sản phẩm.', 'data' => false);
    }
    
    $data = $result->fetch_assoc();

    return array('code' => 0, 'message' => '', 'data' => $data);
}

// Xử lý tìm kiếm
function GetSearchResult($keyword){
    $keyword = "%".$keyword."%";
    $query = "SELECT * FROM product WHERE name LIKE ?";

    $conn = OPEN_DB();
    $stm = $conn->prepare($query);
    $stm->bind_param('s', $keyword);

    if(!$stm->execute()){
        return array('code' => 1, 'message' => 'Lỗi xử lý vui lòng thử lại sau.', 'data' => false);
    }

    $result = $stm->get_result();

    if($result->num_rows == 0){
        return array('code' => 2, 'message' => 'Không tìm thấy sản phẩm.', 'data' => false);
    }

    while($row = $result->fetch_assoc()){
        $rows[] = $row;
    }

    return array('code' => 0, 'message' => '', 'data' => $rows);
}

// Thêm bình luận
function ProductRating($comment, $star, $ngaydang, $id_product, $id_user){
    $query = "INSERT INTO danhgiasanpham(id_sanpham, id_user, sosao, noidung, ngaydanhgia) VALUES (?,?,?,?,?)";
    
    $conn = OPEN_DB();
    $stm = $conn->prepare($query);
    $stm->bind_param('sssss', $id_product, $id_user, $star, $comment, $ngaydang);

    if(!$stm->execute()){
        return array('code' => 1, 'message' => 'Lỗi xử lý vui lòng thử lại sau.');
    }

    return array('code' => 0, 'message' => 'Cập nhật thành công');
}

// Xóa người dùng
function DeleteUserById($id_user){
    $query = "DELETE FROM user WHERE id_user = ?";

    $conn = OPEN_DB();
    $stm = $conn->prepare($query);
    $stm->bind_param('s', $id_user);

    if(!$stm->execute()){
        return array('code' => 1, 'message' => 'Lỗi xử lý vui lòng thử lại sau.');
    }

    return array('code' => 0, 'message' => 'Sản phẩm đã được xóa.');
}
?>