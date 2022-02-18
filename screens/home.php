
<div class="row clearfix">
    <!-- Task Info -->
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
        <div class="card">
            <div class="header">
                <h2>Matching</h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-hover dashboard-task-infos">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>UID</th>
                                <th>Status</th>
                                <th>UID2</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                // output data of each row
                                $id = 0;
                                while($row = mysqli_fetch_assoc($result)) {
                                    if($row['hangcho'] || $row['trangthai']){
                                        $id++;
                                        echo '<tr><td>'.$id.'</td><td>'.$row["ID"].'</td>';
                                        if($row['hangcho'])
                                        {
                                            if($row['gioitinh'] == 1) echo '<td><span class="label bg-blue">Waiting</span></td>';
                                            if($row['gioitinh'] == 2) echo '<td><span class="label bg-pink">Waiting</span></td>';
                                            if($row['gioitinh'] == 0) echo '<td><span class="label bg-black">Waiting</span></td>';
                                        }
                                        if($row['trangthai']) echo '<td><span class="label bg-green">Connected</span></td><td>'.$row["ketnoi"].'</td>';
                                    }
                                    
                                }
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Task Info -->
    <!-- Browser Usage -->
    
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <div class="card">
            <div class="header">
                <h2>Stats</h2>
            </div>
            <div class="body">
                <div id="donut_chart" class="dashboard-donut-chart"></div>
            </div>
        </div>
    </div>
    <!-- #END# Browser Usage -->
</div>