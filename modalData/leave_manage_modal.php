<!--請假前導頁面-->
<?php
    foreach ($leave_list as $value) {
        if ($value['document'] != "")
            $document = "data/leave_document/" . $value['document'];
        else
            $document = null;

        ?>
        <div class="modal fade" id="leaveFrontDetail_<?php echo $value['id'] ?>" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">詳細資料</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <th scope="row">姓名</th>
                                <td><?php echo $Staff->sid_get_name($_SESSION[md5("id")]); ?></td>
                            </tr>
                            <tr>
                                <th scope="row">類別</th>
                                <td><?php echo $Mission->get_leave_type($value['category']); ?></td>
                            </tr>
                            <tr>
                                <th scope="row">起日</th>
                                <td><?php echo $value['date_start'] ?></td>
                            </tr>
                            <tr>
                                <th scope="row">迄日</th>
                                <td><?php echo $value['date_end'] ?></td>
                            </tr>
                            <tr>
                                <th scope="row">事由</th>
                                <td><?php echo $value['reason'] ?></td>
                            </tr>
                            <tr>
                                <th scope="row">證明文件</th>
                                <td>
                                    <?php
                                        if($document!=null) {
                                        ?>
                                        <a href="<?php echo $document ?>" class="btn btn-secondary" download="<?php echo $value['document']; ?>">下載文件</a>
                                        <?php
                                    }
                                    ?>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
?>

<!-- 出差前導頁面 -->

<div class="modal fade" id="travelFrontDetail" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">詳細資料</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <th scope="row">姓名</th>
                        <td>小熊維尼</td>
                    </tr>
                    <tr>
                        <th scope="row">類別</th>
                        <td>公差</td>
                    </tr>
                    <tr>
                        <th scope="row">起日</th>
                        <td>2019/1/25 9:00</td>
                    </tr>
                    <tr>
                        <th scope="row">迄日</th>
                        <td>2019/1/26 12:00</td>
                    </tr>
                    <tr>
                        <th scope="row">事由</th>
                        <td>要幫公司買蜂蜜 ʕ•͡ᴥ•ʔ</td>
                    </tr>
                    <tr>
                        <th scope="row">證明文件</th>
                        <td >
                            <button type="button" class="btn btn-secondary">下載文件</button>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- 請假 -->
<?php
    foreach ($leave_unchecked_data as $value) {
        ?>
        <div class="modal fade" id="leaveDetail_<?php echo $value['id'];?>" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">詳細資料</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <th scope="row">姓名</th>
                                <td><?php echo $Staff->sid_get_name($value['staff_id']); ?></td>
                            </tr>
                            <tr>
                                <th scope="row">類別</th>
                                <td><?php echo $Mission->get_leave_type($value['category']); ?></td>
                            </tr>
                            <tr>
                                <th scope="row">起日</th>
                                <td><?php echo $value['date_start'];?></td>
                            </tr>
                            <tr>
                                <th scope="row">迄日</th>
                                <td><?php echo $value['date_end'];?></td>
                            </tr>
                            <tr>
                                <th scope="row">事由</th>
                                <td><?php echo $value['reason'];?></td>
                            </tr>
                            <tr>
                                <th scope="row">證明文件</th>
                                <td>
                                    <?php
                                    if($value['document']!=null) {
                                        ?>
                                        <a href="<?php echo $document ?>" class="btn btn-secondary" download="<?php echo $value['document']; ?>">下載文件</a>
                                        <?php
                                    }
                                    ?>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <a  class="btn btn-danger text-white" data-dismiss="modal"
                           onclick="window.location.href='function/mission/verify_leave.php?<?php echo "staff_id=".$value['staff_id']."&leave_id=".$value['id']."&state=3"; ?>'">不予准假
                        </a>
                        <a  class="btn btn-primary text-white" data-dismiss="modal"
                           onclick="window.location.href='function/mission/verify_leave.php?<?php echo "staff_id=".$value['staff_id']."&leave_id=".$value['id']."&state=2"; ?>'">准假</a>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
?>


<!-- 出差 -->

<div class="modal fade" id="travelDetail" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">詳細資料</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <th scope="row">姓名</th>
                        <td>小熊維尼</td>
                    </tr>
                    <tr>
                        <th scope="row">類別</th>
                        <td>公差</td>
                    </tr>
                    <tr>
                        <th scope="row">起日</th>
                        <td>2019/1/25</td>
                    </tr>
                    <tr>
                        <th scope="row">迄日</th>
                        <td>2019/1/26</td>
                    </tr>
                    <tr>
                        <th scope="row">事由</th>
                        <td>要幫公司買蜂蜜 ʕ•͡ᴥ•ʔ</td>
                    </tr>
                    <tr>
                        <th scope="row">證明文件</th>
                        <td >
                            <button type="button" class="btn btn-secondary">下載文件</button>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">不予准假</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">准假</button>
            </div>
        </div>
    </div>
</div>


