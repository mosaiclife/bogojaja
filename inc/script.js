$(document).ready(function() {

    $(window).bind("pageshow", function(event) {
        if (event.originalEvent.persisted) {
            main_fn();
        }
    });

/*
    $.ajax({
        url: 'main.php',
        type: 'POST',
        success: function(result) {
            $("#body-wrapper").append(result);
            main_fn();
        }
    })
*/
    
    main_fn();
    
    class_fn("#nav_index", "current");
    
    
    
    /*
     * Ajax integration function
    */
    
    function go_ajx(page) {
        ajax_fn(page);
        
        $("nav a").removeClass("current");
        
        if (page == "main") {
            class_fn("#nav_index", "current");
        } else if (page == "check" || page == "result") {
            class_fn("#nav_check", "current");
        } else if (page == "faq") {
            class_fn("#nav_faq", "current");
        }
    }
    
    
    
    /*
     * navigation function
    */
    $("#nav_index").click(function() {
        go_ajx("main");
    });
    
    $("#nav_check").click(function() {
        go_ajx("check");
    });
    
    $("#nav_faq").click(function() {
        go_ajx("faq");
    });
    
     $("#header_btn").click(function() {
         go_ajx("main");
    });
    
    
    /*
     * Ajax Function
    */
    function ajax_fn (name) {
        
        $.ajax({
            url: name + '.php',
            type: 'POST',
            data: $("#input_form").serialize(),
            success: function(result) {
            	
                $("#body-wrapper").children().fadeOut(600, function(){
                    $("#body-wrapper").children().remove();
                    $("#body-wrapper").append(result).children().css("display", "none");
                    $("#body-wrapper").children().fadeIn(900);
                    
                    if (name == "main")
                    {
                        main_fn();
                    }
                    else if(name == "check")
                    {
                        check_fn();
                        
                    }
                    else if(name == "result")
                    {
                    	result_fn();
                    }
                    else if(name == "faq") {
                        
                        // faq toggle
                        $(".faq-box").click(function() {
                            $(this).children(".faq-answer").slideToggle();
                        })
                    }
                });
            },
            error: function(error) {
                alert(error);
                alert("error");
            }
        });
    }
    
    
    /*
     * Add Class
    */
    function class_fn (id, name) {
        $(id).addClass(name);
    }
    
    
    /*
     * main.php
    */
    function main_fn () {
        
        $("#main_btn").click(function() {
        
        	go_ajx("check");
        })
    }
    
    
    /*
     * loading.php
    */
    function loading_fn () {
        
        $("#main_btn").click(function() {
            go_ajx("check");
        })
    }
    
    
    /*
     * check.php
    */
    function check_fn () {
        $("#check_btn").click(function() {
            var isEmpty = 0;
            
            $("#input_form").find("select").each(function() {
                $(this).css("border", "1px solid #d9d9d9");
                
                /* Select Box 값 입력 안했을때 깜박이면서 테두리 붉은색으로*/
               if ( this.value == "0" ) {
                    $(this).fadeOut(600, function(){
                        $(this).css("border","solid 3px red");
                    }).fadeIn(900);
                    
                    isEmpty = 1;
               }
            });
            
            // submit 방지
            if (isEmpty == 1) {
                return false;
            }
            
            
            // Loading image
            

			$("#body-wrapper").children().fadeOut(600, function(){
                    
                    $("#body-wrapper").append("<div class='form-wrapper'>");
                    
                    
                    
					$(".form-wrapper").append("<img id='loading1' src='inc/loading1.png' width='280' style='position:absolute;'/>");
                    $(".form-wrapper").append("<img id='loading2' src='inc/loading2.png' width='280' style='position:absolute;'/>");
                    $(".form-wrapper").append("<img id='loading3' src='inc/loading3.png' width='280' style='position:absolute;'/>");
                    $(".form-wrapper").append("<img id='loading4' src='inc/loading4.png' width='280' style='position:absolute;'/>");
                    
                    $("#body-wrapper").append("</div>");
                    
                    
                    $(".form-wrapper #loading1").css("display","none");
                    $(".form-wrapper #loading2").css("display","none");
                    $(".form-wrapper #loading3").css("display","none");
                    $(".form-wrapper #loading4").css("display","none");
                    //setTimeout($("#loading1").css("display","none"), 200);
                    
                    $(".form-wrapper #loading1").show();
                    setTimeout( function(){
                    	$(".form-wrapper #loading1").hide();
                    	$(".form-wrapper #loading2").show();
                    	setTimeout( function(){
                    		$(".form-wrapper #loading1").hide();
                    		setTimeout( function(){
                    			$(".form-wrapper #loading2").hide();
								$(".form-wrapper #loading3").show();
								setTimeout( function(){
	                    			$(".form-wrapper #loading3").hide();
									$(".form-wrapper #loading2").show();
									setTimeout( function(){
		                    			$(".form-wrapper #loading2").hide();
										$(".form-wrapper #loading1").show();
										setTimeout( function(){
			                    			$(".form-wrapper #loading1").hide();
											$(".form-wrapper #loading2").show();
											setTimeout( function(){
				                    			$(".form-wrapper #loading2").hide();
												$(".form-wrapper #loading3").show();
												setTimeout( function(){
													$(".form-wrapper #loading3").hide();
													$(".form-wrapper #loading2").show();
													setTimeout( function(){
						                    			$(".form-wrapper #loading2").hide();
														$(".form-wrapper #loading1").show();
														setTimeout( function(){
							                    			$(".form-wrapper #loading1").hide();
															$(".form-wrapper #loading2").show();
															setTimeout( function(){
								                    			$(".form-wrapper #loading2").hide();
																$(".form-wrapper #loading3").show();
																setTimeout( function(){
									                    			$(".form-wrapper #loading3").hide();
																	$(".form-wrapper #loading4").show();
																}, 150);
															}, 150);
														}, 150);
													}, 150);
					                    		}, 150);
				                    		}, 150);
			                    		}, 150);
		                    		}, 150);
	                    		}, 150);
                    		}, 150);
                    	}, 150);
                    }, 150);
                    
                    
                    
                    setTimeout(function() {go_ajx("result")}, 3200);
            });

            /*

            
			$("#body-wrapper").children().fadeOut(600, function(){
                    
                    $("#body-wrapper").append("<div class='form-wrapper'><img id='loading' src='inc/loading.gif' width='290'/></div>");
                    $("#body-wrapper #loading").fadeIn(900);
                    
                    setTimeout(function() {go_ajx("result")}, 3200);
            });

*/
            
        })
    }
    
    
    /*
     * result.php
    */
    function result_fn () {
        $("#result_btn").click(function() {
        
            go_ajx("check");
            
        })
    }
    
    
    
    // check page Test용
    $("#beta_btn").click(function(){
	    
	    //alert('테스트');
        //$("#moms_year").attr("selected", "selected");
        $("#moms_year option:first").remove();
        $("#moms_month option:first").remove();
        $("#moms_day option:first").remove();
        
        $("#pregnant_year option:first").remove();
        $("#pregnant_month option:first").remove();
        $("#pregnant_day option:first").remove();
    })
    
    
    
    
    /* 뒤로가기 키 막기 */
    $(document).unbind('keydown').bind('keydown', function (event) {
        var doPrevent = false;
        if (event.keyCode === 8) {
            var d = event.srcElement || event.target;
            if ((d.tagName.toUpperCase() === 'INPUT' && (d.type.toUpperCase() === 'TEXT' || d.type.toUpperCase() === 'PASSWORD')) 
                 || d.tagName.toUpperCase() === 'TEXTAREA') {
                doPrevent = d.readOnly || d.disabled;
            }
            else {
                doPrevent = true;
            }
        }

        if (doPrevent) {
            
            event.preventDefault();
        }
    });
    
    
    
});


/*
 * KaKao Talk
*/
function executeKakaoTalk()
{
    /* 
    msg, url, appid, appname은 실제 서비스에서 사용하는 정보로 업데이트되어야 합니다. 
    */
    kakao.link("talk").send({
        msg : "삼신할배의 아들, 딸 점지 사이트!\n당신의 2세를 확인해보세요!\n보고자보자!",
        url : "http://bogojaja.com",
        appid : "bogojaja.com",
        appver : "2.0",
        appname : "보고자자",
        type : "link"
    });

}


/*
 * KaKao Story
*/
function executeKakaoStory()
{
    kakao.link("story").send({
        post : "보고자잣!\n\n\n확인하러 가잣!\n http://bogojaja.com",
        appid : "bogojaja.com",
        appver : "1.0",
        appname : "보고자자",
        urlinfo : JSON.stringify({title:"보고자자", desc:"삼신할배의 아들, 딸 점지사이트!\n보고자보잣", imageurl:["http://bogojaja.com/inc/title.png"], type:"article"})
    });
}