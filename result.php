
        <div class="form-wrapper">
            
            
            <?php
            	
                if (!empty($_POST['moms_year']))
                {
                    include ('inc/dbconnect.php');
                    
                    $moms_islunar = $_POST['moms_islunar'];
                    
                    
                    if( $moms_islunar == "2" )
                    {
                        include ('inc/sunlunar_data.php');
                        
                        $moms_year = $_POST['moms_year'];
                        $moms_month = $_POST['moms_month'];
                        $moms_day = $_POST['moms_day'];
                        
                        $lunar_date = SolaToLunar($moms_year.$moms_month.$moms_day);

                        # get lunar date
                        $lunar_date = date("Y-m-d", $lunar_date[time]);
                        $lunardate_tripped = explode("-", $lunar_date);
                        
                        $moms_year = $lunardate_tripped[0];
                        $moms_month = $lunardate_tripped[1];
                        $moms_day = $lunardate_tripped[2];
                    }
                    else
                    {
                        $moms_year = $_POST['moms_year'];
                        $moms_month = $_POST['moms_month'];
                        $moms_day = $_POST['moms_day'];
                    }
                    
                    # echo $moms_year.$moms_month.$moms_day;
                    
# 날짜 모를 경우
                    if( $_POST['pregnant_day'] >= 1 && $_POST['pregnant_day'] <= 31)
                        $pregnant_day = $_POST['pregnant_day'];
                    else
                        $pregnant_day = '15';
                    
                    $pregnant_islunar = $_POST['pregnant_islunar'];
                    
                    if( $pregnant_islunar == "2" )
                    {
                        include ('inc/sunlunar_data.php');
                        
                        $pregnant_year = $_POST['pregnant_year'];
                        $pregnant_month = $_POST['pregnant_month'];
                        $pregnant_day = $pregnant_day;
                        
                        $lunar_date = SolaToLunar($pregnant_year.$pregnant_month.$pregnant_day);

                        # get lunar date
                        $lunar_date = date("Y-m-d", $lunar_date[time]);
                        $lunardate_tripped = explode("-", $lunar_date);
                        
                        $pregnant_year = $lunardate_tripped[0];
                        $pregnant_month = $lunardate_tripped[1];
                        $pregnant_day = $lunardate_tripped[2];
                    }
                    else
                    {
                        $pregnant_year = $_POST['pregnant_year'];
                        $pregnant_month = $_POST['pregnant_month'];
                    }
                    
                    
                    # 생년월일
                    $birth_input = strtotime("$moms_year-$moms_month-$moms_day");
                    
                    # 임신 시기
                    $pregnant_input = strtotime("$pregnant_year-$pregnant_month-$pregnant_day");
                    
                    $birth_date = date( 'Ymd', $birth_input );
                    $pregnant_date = date( 'Ymd', $pregnant_input );
                    $age = floor(($pregnant_date - $birth_date) / 10000);
                    
					
                    if ($age >= 19 && $age <= 49)
                    {
                        $query = "SELECT * FROM jina WHERE age = $age and month = $pregnant_month";
                        
                        $result = $mysqli->query($query);
                        
                        $row = $result->fetch_array(MYSQLI_ASSOC);
                        
                        /*
                        if ($row['sex'] == '1')
                            $result_msg = "남자";
                        elseif ($row['sex'] == '2')
                            $result_msg = "여자";
                        */
                        
                        $result_msg = $row['sex'];
                    }
                    else
                    {
                        /*$result_msg = "18~49세까지만 지원";*/
                        $result_msg = 3;
                    }
                }
            ?>
            
            <div id="result-wrap">
                <?php
                    if ( $result_msg == 1 or $result_msg == 2)
                    {
                        if ( $result_msg == 1 )
                            //echo "<p>♂ 남자 ♂</p>";
                            echo "<img src='inc/result_boy.png' />";
                        elseif ( $result_msg == 2 )
                            //echo "<p>♀ 여자 ♀</p>";
                            echo "<img src='inc/result_girl.png' />";
                    }
                    else
                    {
                        if ( $result_msg == 3 )
                            echo "<p>18~49세까지만 지원합니다<br/>~.~</p>";
                    }
                    
                ?>
            </div>
            
            
            <button class="button" id="result_btn">Check Again</button>
            
            
            <div class="kakao_wrap">
            	<ol>
            		<li>
	    		        <div  onclick="javascript:executeKakaoTalk()"> <img class="kakao_img" src="inc/kakaotalk.png"/></div>
            		</li>
            		<li>
						<div  onclick="javascript:executeKakaoStory()"> <img class="kakao_img" src="inc/kakaostory.png"/></div>
            		</li>
            	</ol>
            </div>
        </div>
