
<?php
foreach ($salary_list as $value) {


    ?>
    <div class="modal fade" id="exampleModalCenter<?php echo $value['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalTitle"><?php echo $value['year']."年 ".$value['month']."月";?> 薪資明細</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">本俸</div>
                        <div class="col-6"><?php echo $value['salary'];?></div>
                    </div>

                    <div class="row">
                        <div class="col-6">職務加給</div>
                        <div class="col-6"><?php echo $value['position_add'];?></div>
                    </div>

                    <div class="row">
                        <div class="col-6">專業加給</div>
                        <div class="col-6"><?php echo $value['profession_add'];?></div>
                    </div>

                    <div class="row">
                        <div class="col-6">地域加給</div>
                        <div class="col-6"><?php echo $value['area_add'];?></div>
                    </div>

                    <div class="row">
                        <div class="col-6">其他</div>
                        <div class="col-6"><?php echo $value['other_add'];?></div>
                    </div>

                    <div class="row">
                        <div class="col-6">公保費</div>
                        <div class="col-6 text-danger">-0</div>
                    </div>

                    <div class="row">
                        <div class="col-6">勞保費</div>
                        <div class="col-6 text-danger">-<?php echo $Salary->LI($value['salary']);?></div>
                    </div>

                    <div class="row">
                        <div class="col-6">健保費</div>
                        <div class="col-6 text-danger">-<?php echo $Salary->HI($value['salary']);?></div>
                    </div>

                    <div class="row">
                        <div class="col-6">互助金</div>
                        <div class="col-6 text-danger">-<?php echo $value['mutual_funds'];?></div>
                    </div>


                    <div class="row">
                        <div class="col-6">離職儲金</div>
                        <div class="col-6 text-danger">-<?php echo $value['resignation_reserve'];?></div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-6">應發合計</div>
                        <div class="col-6"><?php echo $Salary->should_sum($value['id']);?></div>
                    </div>

                    <div class="row">
                        <div class="col-6">代扣合計</div>
                        <div class="col-6 text-danger">-<?php echo $Salary->sub_sum($value['id']);?></div>
                    </div>

                    <div class="row">
                        <div class="col-6">獎金</div>
                        <div class="col-6"><?php echo $value['bonus'];?></div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-6">實發金額</div>
                        <div class="col-6"><?php echo $Salary->salary_calcute($value['id']);?></div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a class="btn btn-info" href="salary_detail_staff.php?salary_id=<?php echo $value['id'];?>'">
                        詳細資訊
                    </a>
                </div>

            </div>
        </div>
    </div>

    <?php
}
?>