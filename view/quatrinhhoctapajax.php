<?php
    include_once('header.php');
    include_once('nav.php');
    include_once('../model/entity/learninghistory.php');
    $mockData = LearningHistory::getList("123");
    $dataFromFile = LearningHistory::getListFromFile("101");
    // var_dump($dataFromFile);
?>
<div>
    <?php
    if (isset($_GET['id'])) {
        if (filter_var($_GET['id'],FILTER_VALIDATE_INT,array('min_range' => 0)) && $_GET['id']>0) {
            $id = 0;
            foreach ($dataFromFile as $key => $value) {
                $id++;
                if ($id==$_GET['id']) {
                    ?>
                    <form method="POST" action="../controller/editquatrinhhoctap.php">
                        <div class="form-data">
                            <div class="form-group">
                                <label>Từ năm</label>
                                <input class="form-control" type="number" min="1990" max="<?php  echo date("Y")?>" name="txtTuNam" value="<?php echo $value->yearFrom; ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Đến năm</label>
                                <input class="form-control" type="number" min="1990" max="<?php  echo date("Y") ?>" name="txtDenNam" value="<?php echo $value->yearTo; ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Trường</label>
                                <input class="form-control" type="text" min="1" max="12" name="txtTruong" value="<?php echo $value->schoolName; ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Nơi học</label>
                                <input class="form-control" type="text" name="txtNoiHoc" value="<?php echo $value->schoolAddress; ?>" required>
                            </div>
                            <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
                            <a class="btn btn-secondary" href="quatrinhhoctap.php">Hủy</a>
                            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Cập nhật</button>
                    </form><?php 
                }
            }
            ?>
        
            <?php
        }else { 
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-question-circle"></i>
                <strong>Lỗi :</strong> ID không hợp lệ !~
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>';
            }
    }
        
    ?>
</div>
                <button type="button" class="btn btn-outline-primary btn-right" data-toggle="modal" data-target="#modalAdd"><i class="fas fa-plus-square"></i> Thêm</button>
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Từ năm</th>
                            <th scope="col">Đến năm</th>
                            <th scope="col">Trường</th>
                            <th scope="col">Nơi học</th>
                            <th scope="col">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $stt = 0;
                        foreach($dataFromFile as $key => $value){
                            $stt++;
                            ?>
                            <tr>
                                <th scope="row"><?php echo $stt; ?></th>
                                <td><?php echo $value->yearFrom; ?></td>
                                <td><?php echo $value->yearTo; ?></td>
                                <td><?php echo $value->schoolName; ?></td>
                                <td><?php echo $value->schoolAddress; ?></td>
                                <td>
                                    <a href="quatrinhhoctap.php?id=<?php echo $stt; ?>" class="btn btn-outline-success">
                                        <i class="fas fa-edit"></i> </a>
                                    <button onclick="remove(<?php echo $stt; ?>)" class="btn btn-outline-danger">
                                        <i class="fas fa-trash"></i> Xóa</button>

                                </td>
                        </tr>
                         <?php
                        }?>
                        
                    </tbody>
                </table>
    
<!-- Modal Thêm quá trình học tập-->
<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="hihi" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titleDiaLog">Thêm quá trình học tập</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
            <div class="modal-body">
                <form method="POST" action="../controller/addquatrinhhoctap.php">
                    <div class="form-data">
                        <div class="form-group">
                            <label>Từ năm</label>
                            <input class="form-control" type="number" min="1990" max="<?php  echo date("Y")?>" name="txtTuNam" value="" required>
                        </div>
                        <div class="form-group">
                            <label>Đến năm</label>
                            <input class="form-control" type="number" min="1990" max="<?php  echo date("Y") ?>" name="txtDenNam" value="" required>
                        </div>
                        <div class="form-group">
                            <label>Trường</label>
                            <input class="form-control" type="text" min="1" max="12" name="txtTruong" value="" required>
                        </div>
                        <div class="form-group">
                            <label>Nơi học</label>
                            <input class="form-control" type="text" name="txtNoiHoc" value="" required>
                        </div>
                    </div>                                  
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
            <input type="submit" class="btn btn-success" value="Thêm">
            </form>
        </div>
    </div>
</div>
<!-- Kết thúc Modal Thêm quá trình học tập -->
<script>
    function remove(id){
    var del=confirm("Bạn có thực sự muốn xóa không ?");
    if (del==true){
        window.location.href="../controller/deletequatrinhhoctap.php?id="+id;
    }
}
</script>
                   <?php
                        include_once('footer.php');
                    ?>