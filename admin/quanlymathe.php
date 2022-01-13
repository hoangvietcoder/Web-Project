<?php
require_once('../dbconnection.php');
if(isset($_SESSION['id_user'])){
    $userId = $_SESSION['id_user'];
    $user = GetUserProfileById($userId);
}
$sql = "SELECT * FROM thecao";
$result = mysqli_query(OPEN_DB(), $sql);
?>

<?php
if (isset($_GET["delete_id"])) {
    $id = $_GET['delete_id'];
    $sql = "DELETE FROM thecao WHERE id_thecao = '$id'";
    mysqli_query(OPEN_DB(), $sql);
    echo "<script> window.location='admin.php?select=quanlymathe'; </script>";
}
?>

<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <main>
                <div class="card mb-4">
                    <div class="card-header">
                        Danh sách thẻ nạp
                    </div>
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row" style="clear: both;">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div class="col-sm-12">
                                        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                            <thead>
                                                <tr role="row">
                                                    <th tabindex="0" rowspan="1" colspan="1" style="width: 5%;">STT</th>
                                                    <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">Mệnh giá</th>
                                                    <th tabindex="0" rowspan="1" colspan="1" style="width: 15%;">Mã thẻ nạp</th>
                                                    <th tabindex="0" rowspan="1" colspan="1" style="width: 20%;">Trạng thái</th>
                                                    <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">Tùy chỉnh</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                while ($row = mysqli_fetch_assoc($result)) { ?>
                                                    <tr role="row" class="odd">
                                                        <td><?php echo $i++; ?></td>
                                                        <td><?php echo $row['menhgia']; ?></td>
                                                        <td><?php echo $row['seri']; ?></td>
                                                        <td><?php echo $row['trangthai']; ?></td>
                                                        <td class="project-actions text-center">
                                                            <a class="btn btn-info btn-sm" href="edit_mathe.php?id=<?php echo $row['id_thecao']; ?>" class="edit" title="Edit" data-toggle="tooltip">
                                                                    <i class="fas fa-pencil-alt"></i> 
                                                            </a>
                                                            <a class="btn btn-danger btn-sm" Onclick="return ConfirmDelete();" href="quanlymathe.php?delete_id=<?php echo $row['id_thecao']; ?>" name="delete" type="submit"><i class="fa fa-trash-o" aria-hidden="true">
                                                                    <i class="fas fa-trash"></i> 
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                    <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div class="col-sm-4">
            <main>
                <div class="card mb-4">
                    <div class="card-header">
                        Thêm thẻ nạp
                    </div>
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <form action="add_mathe.php" method="POST">
                        <div class="form-group" style="margin: 15px;">
                            <div class="mb-3 ">
                                <label class="form-label" for="inputZip">Mệnh giá:</label>
                                <select class="form-control" aria-label="Default select example" name="menhgia">
                                    <option value="">--Chọn mệnh giá thẻ nạp</option>
                                    <option value="20000">20.000</option>
                                    <option value="50000">50.000</option>
                                    <option value="100000">100.000</option>
                                    <option value="200000">200.000</option>
                                    <option value="500000">500.000</option>
                                </select>
                            </div>
                            </div>
                            <div class="form-group" style="margin: 15px;">
                                <label for="seri">Mã thẻ nạp:</label>
                                <input type="text" class="form-control" id="seri" name="seri">
                            </div>
                            <div class="form-group" style="margin: 15px;">
                            <div class="mb-3 ">
                                <label class="form-label" for="inputZip">Trạng thái:</label>
                                <select class="form-control" aria-label="Default select example" name="trangthai">
                                    <option value="">--Chọn trạng thái</option>
                                    <option value="free">Chưa sử dụng</option>
                                    <option value="used">Đã sử dụng</option>
                                </select>
                            </div>
                            </div>
                            <button style="margin: 0 0 10px 15px;" name="add" type="submit" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Thêm thẻ nạp</button>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>