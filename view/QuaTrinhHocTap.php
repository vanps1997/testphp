<?php
include_once("header.php");
include_once("nav.php");
include_once("../model/entity/learninghistory.php");
$rsMockData = LearningHistory::getList("102T1011010");
$rsFromFile = LearningHistory::getListFromFile("101");

?>
<div class="container-fluid">
	<div class="table-responsive">
		<table class="table table-hover table-bordered">
			<div class="btn-add d-flex justify-content-end align-items-center pb-3">
				<button class="btn btn-outline-primary"><i class="fas fa-plus-circle"></i> Thêm</button>
			</div>
			<thead class="thead-dark">
				<tr>
					<th scope="col">STT</th>
					<th scope="col">Từ năm</th>
					<th scope="col">Đến năm</th>
					<th scope="col">Lớp</th>
					<th scope="col">Nơi học</th>
					<th scope="col">Thao tác</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($rsFromFile as $key => $value) {
					$stt = $key + 1;
					echo "<tr>";
					echo "<th scope='row'>$stt</th>";
					echo "<td>$value->yearFrom</td>";
					echo "<td>$value->yearTo</td>";
					echo "<td>$value->schoolName</td>";
					echo "<td>$value->schoolAddress</td>";
					echo "<td class='d-flex'>";
					echo "	<button class='btn btn-outline-success mr-3'><i class='far fa-edit'></i> Sửa</button>";
					echo "	<button class='btn btn-outline-danger'><i class='fas fa-trash-alt'></i> Xóa</button>";
					echo "</td>";
					echo "</tr>";
				}
				?>
			</tbody>
		</table>
	</div>
</div>

<?php
include_once("footer.php"); ?>