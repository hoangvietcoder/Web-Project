<?php
    require_once('../dbconnection.php');
?>
<main>
    <div class="card mb-4">
        <div class="card-header">
            Danh sách tài khoản
        </div>
        <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
                <div class="card-body">
                    <div class="table-responsive">

                        <div class="col-sm-12">
                            <table class="table table-bordered dataTable w-100" id="dataTable" cellspacing="0" role="grid" aria-describedby="dataTable_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc w-5" tabindex="0" rowspan="1" colspan="1">ID</th>
                                        <th class="sorting w-15" tabindex="0" rowspan="1" colspan="1">Họ tên</th>
                                        <th class="sorting w-5" tabindex="0" rowspan="1" colspan="1">Giới tính</th>
                                        <th class="sorting w-10" tabindex="0" rowspan="1" colspan="1">Ngày sinh</th>
                                        <th class="sorting w-5" tabindex="0" rowspan="1" colspan="1">Tài khoản</th>
                                        <th class="sorting w-10" tabindex="0" rowspan="1" colspan="1">Mật khẩu</th>
                                        <th class="sorting w-5" tabindex="0" rowspan="1" colspan="1">Vai trò</th>
                                        <th class="sorting w-25" tabindex="0" rowspan="1" colspan="1">Tùy chỉnh</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $users = GetUserAll();
                                        foreach($users as $info) { 
                                    ?>
                                    <tr role="row" class="odd">
                                        <td><?php echo $info['id_user']; ?></td>
                                        <td><?php echo $info['name']; ?></td>
                                        <td><?php echo $info['gender']; ?></td>
                                        <td><?php echo $info['birthdate']; ?></td>
                                        <td><?php echo $info['email']; ?></td>
                                        <td><?php echo $info['password']; ?></td>
                                        <td><?php echo $info['role']; ?></td>
                                        <td class="project-actions text-center" project-state>
                                            <a class="btn btn-info btn-sm mr-3" href="edit_account.php?id=<?php echo $info['id_user']; ?>" class="edit" title="Edit" data-toggle="tooltip">
                                                <i class="fas fa-pencil-alt"></i> Edit
                                            </a>
                                            <a class="btn btn-danger btn-sm" href="admin.php?select=quanlytaikhoan&id_delete=<?php echo $info['id_user']; ?>" name="delete">
                                                <i class="fas fa-trash"></i> Delete
                                            </a>
                                        </td>
                                    </tr>
                                    <?php 
                                        } 
                                    ?>
                                </tbody>
                            </table>
                            <!---->
                            <?php
                                if(isset($_GET['id_delete'])){
                                    $delete = GetUserByID($_GET['id_delete']);      
                                    include('delete-user-panel.php');
                                }
                            ?>
                            <!---->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>