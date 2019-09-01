<div  style="color: #3c3a3d">
    <nav class="navbar   navbar-dark nav-bg">
        <div class="container">
            <h1  class="small_title col-12" style="color: #f4f4ef">申訴系統</h1>
        </div>
    </nav>


    <div id="complaint_form" class="container" style="margin-bottom: 68.45px">
        <form action="function/complaint/complaint.php" method="post" enctype="multipart/form-data">
            <div class="form-row mb-3">
                <div class="col-12">
                    <lable for="complaint_title">申訴主旨</lable>
                    <div >
                        <input type="text" class="form-control" id="complaint_title" name="title" placeholder="主旨" required>
                    </div>
                </div>
            </div>

            <div class="form-row mb-3">
                <div class="col-12">
                    <lable for="complaint_target">申訴送達對象</lable>
                    <div >
                       <select class="custom-select custom-select-md" id="complaint_target" name="obj">
                           <option>主管</option>
                           <option>人事</option>
                           <option>會計</option>
                       </select>
                    </div>
                </div>
            </div>

            <div class="form-group mb-3">
                <label for="complaint_content">內文：</label>
                <textarea rows="8" class="form-control" id="complaint_content" name="content" placeholder="" required></textarea>
            </div>
            <div class="form-group text-right">
                <button class="btn btn-lg btn-primary">送出申訴</button>
            </div>
        </form>
    </div>
</div>
