
    <?php
        if (!empty($_POST['iscorrect']))
        {
            include ('inc/dbconnect.php');
			
			
            $moms_year = $_POST['moms_year'];
            $moms_month = $_POST['moms_month'];
            $moms_day = $_POST['moms_day'];
            
            $pregnant_year = $_POST['pregnant_year'];
            $pregnant_month = $_POST['pregnant_month'];
            
            $iscorrect = $_POST['iscorrect'] - 1;
            $age = $_POST['age'];
            
			$timestamp = date("Y-m-d H:i:s");
			
            $result = $_POST['result'];
            
            $ip = $_POST['ip'];
            
            $query = "SELECT MAX(NO) as max_no FROM result";
            
            #echo $query;
            
            $max_no = $mysqli->query($query);
            
            $row = $max_no->fetch_array(MYSQLI_ASSOC);
            
            
            $no = $row['max_no'] + 1;
            
            
            $query = "INSERT INTO result(no, age, moms_year, moms_month, moms_day, pregnant_year, pregnant_month, result, iscorrect, insert_dt, ip)  VALUES($no, $age, $moms_year, $moms_month, $moms_day, $pregnant_year, $pregnant_month, $result, $iscorrect, '$timestamp', '$ip')";
             
            #echo $query;
             
            $mysqli->query($query);
        }
    ?>

    <!-- <button id="btn" >test</button> -->
    
    
    <!-- check page -->
        <div class="form-wrapper" id="check">
            
            <form id="input_form" action="result.php" method="post">
                <fieldset>
                    <legend>Regester</legend>
                    
                    <ol>
                        <li>
                            <label for="year">산모의 생년월일</label>
                            <div class="select-wrap">
                            <select name="moms_islunar">
                                <option selected value="1">양력</option>
                                <option value="2">음력</option>
                            </select></div><div class="select-wrap" id="moms_year">
                            <select name="moms_year" >
                                <option selected value="1987">1987</option>
                            </select></div><div class="select-wrap">
                            <select name="moms_month" id="moms_month">
                                <option selected value="08">8</option>
                            </select></div><div class="select-wrap">
                            <select name="moms_day" id="moms_day">
                                <option selected value="02">2</option>
                            </select></div>
                        </li>
                        <li>
                            <label for="year">임신 시기</label>
                            <div class="select-wrap">
                            <select name="pregnant_islunar">
                                <option selected value="1">양력</option>
                                <option value="2">음력</option>
                            </select></div><div class="select-wrap">
                            <select name="pregnant_year" id="pregnant_year">
                                <option selected value="2014">2014</option>
                            </select></div><div class="select-wrap">
                            <select name="pregnant_month" id="pregnant_month">
                                <option selected value="03">3</option>
                            </select></div><div class="select-wrap">
                            <select name="pregnant_day" id="pregnant_day">
                                <option selected value="14">14</option>
                            </select></div>
                        </li>
                    </ol>
                    
                    
                </fieldset>
            </form>
                <button class="button" id="check_btn">Go</button>
        </div>
        
