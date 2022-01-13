<?php
require_once('../dbconnection.php');

if(isset($_SESSION['id_user'])){
    $userId = $_SESSION['id_user'];
    $user = GetUserProfileById($userId);
}

$sql = "SELECT * FROM theloai";
$result = mysqli_query(OPEN_DB(), $sql);
?>

<?php
if (isset($_GET["delete_id"])) {
    $id = $_GET['delete_id'];
    $sql = "DELETE FROM theloai WHERE id_theloai = '$id'";
    mysqli_query(OPEN_DB(), $sql);
    echo "<script> window.location='admin.php?select=quanlytheloai'; </script>";
}
?>
<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <main>
                <div class="card mb-4">
                    <div class="card-header">
                        Danh sách thể loại
                    </div>
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row" style="clear: both;">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div class="col-sm-12">
                                        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0" rowspan="1" colspan="1" style="width: 5%;">STT</th>
                                                    <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 15%;">Tên Thể Loại</th>
                                                    <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 10%;">Tùy chỉnh</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                while ($row = mysqli_fetch_assoc($result)) { ?>
                                                    <tr role="row" class="odd">
                                                        <td><?php echo $i++; ?></td>
                                                        <td><?php echo $row['tentheloai']; ?></td>
                                                        <td class="project-actions text-center">
                                                            <a class="btn btn-info btn-sm" href="edit_theloai.php?id=<?php echo $row['id_theloai']; ?>" class="edit" title="Edit" data-toggle="tooltip">
                                                                <i class="fas fa-pencil-alt"></i> Edit
                                                            </a>
                                                            <a class="btn btn-danger btn-sm" Onclick="return ConfirmDelete();" href="quanlytheloai.php?delete_id=<?php echo $row['id_theloai']; ?>" name="delete" type="submit">
                                                                    <i class="fas fa-trash"></i> Delete
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
                        Thêm thể loại
                    </div>
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <form action="add_theloai.php" method="POST">
                            <div class="form-group" style="margin: 15px;">
                                <label for="tentheloai">Thể loại:</label>
                                <input type="text" class="form-control" id="tentheloai" name="tentheloai">
                            </div>
                            <button style="margin: 0 0 10px 15px;" name="add" type="submit" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Thêm thể loại</button>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>