<?php
if(isset($_GET['tab']) && $_GET['tab']=='record_target_member' && isset($_GET['staff_id'])) {
    if (isset($_GET['record_date'])) {
        $record_date = $_GET['record_date'];
    } else $record_date = date("Y-m", time());
    $sd = strtotime($record_date);
    $ld = date("Y-m", mktime(0, 0, 0, date("m", $sd) - 1, 1, date("Y", $sd)));
    $nd = date("Y-m", mktime(0, 0, 0, date("m", $sd) + 1, 1, date("Y", $sd)));
    $record_target_data_list = $Mission->get_record_target_by_month($record_date,$Staff->sid_get_username($_GET['staff_id']));

    foreach ($record_target_data_list as $value) {
        if ($value['state'] == 1 || $value['state'] == 2 || $value['state'] == 128) {
            ?>

            <!-- 更多按鈕>>顯示詳細資料 -->
            <div class="modal fade" id="record_target_MoreDetail_<?php echo $value['id']; ?>" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="record_MoreDetail_Title_01">紀錄資料</h5>
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <th scope="row">類別</th>
                                    <td><?php echo $Mission->echo_punchcard_state($value['state']); ?></td>

                                </tr>
                                <tr>
                                    <th scope="row">時間</th>
                                    <td><?php echo $value['time'] ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">GPS紀錄</th>
                                    <td colspan="2"><?php echo $value['latitude'] . "，" . $value['longitude'] ?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
                            <a class="btn btn-danger" href="function/punchcard/punchcard_delete.php?<?php echo $_SERVER['QUERY_STRING'];?>&record_id=<?php echo $value['id']; ?>">刪除紀錄</a>
                            <a class="btn btn-info" href="record_manage_edit_PunchCard.php?<?php echo $_SERVER['QUERY_STRING'];?>&record_id=<?php echo $value['id']; ?>">修改紀錄</a>
                            <!--根據打卡(PunchCard)、請假(Leave)、出差(BusinessTrip)導向到不同頁面-->
                        </div>
                    </div>
                </div>
            </div>
            <?php
        } else {
            $leave_data = $Mission->get_leave_data($value['leave_id'])
            ?>

            <div class="modal fade" id="record_target_MoreDetail_<?php echo $value['id']; ?>" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="record_MoreDetail_Title_03">紀錄資料</h5>
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <th scope="row" width="20%">類別</th>
                                    <td><?php echo $Mission->echo_punchcard_state($value['state']); ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">事由</th>
                                    <td><?php echo $leave_data['reason']; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">開始時間</th>
                                    <td><?php echo $leave_data['date_start']; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">結束時間</th>
                                    <td><?php echo $leave_data['date_end']; ?></td>
                                </tr>
                                <tr>
                                    <th scope="col">地點</th>
                                    <td><?php echo $leave_data['location']; ?></td>
                                </tr>
                                </tbody>
                            </table>

                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <th scope="row">核可狀態</th>
                                    <th scope="col">核可</th>
                                </tr>

                                <tr>
                                    <th scope="row">證明文件</th>
                                    <td>
                                        <button type="button" class="btn btn-secondary">下載文件</button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>


                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
                            <!--<button type="button" class="btn btn-danger" data-dismiss="modal">刪除紀錄</button>-->
                            <!--<a class="btn btn-info" href="record_manage_edit_BusinessTrip.php">修改紀錄</a>-->
                            <!--根據打卡(PunchCard)、請假(Leave)、出差(BusinessTrip)導向到不同頁面-->
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    }
}
?>