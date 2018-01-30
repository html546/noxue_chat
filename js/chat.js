$(function(){


    var nickname = "";



    //点击进入聊天室按钮
    $('.start-btn').click(function(){
        console.log(last_id);
        nickname = $('#nick').val();
        //隐藏昵称输入窗口
        $('.nick-input').css('display','none');
        //显示聊天窗口
        $('.chat-box').css('display','block');

    //    进入聊天室后，开始不断从服务端获取消息
    })
        setInterval(getmsg,2000);

//    点击信息发送按钮
    $('.send-btn').click(function(){
        sendmsg($('#msg').val());
        $('#msg').val('');
    })
    //发送信息
    function sendmsg(msg){
        $.ajax({
            url:'msg.php',
            type:'post',
            data:'nickname='+nickname+'&msg='+msg,
            success:function(data){
                if(data.code !=0){
                    alert(data.msg);
                }
            },
            error:function(response){
                alert('服务端出错，请尽快联系管理员，有奖励哦！');
                console.log(response);
            }
        })
        // addmsg(nickname,msg,new Date());
    }
    function addmsg(nickname,msg,time){
        var html = '';
        html+='<div class="msg-box">'
            +'<p class="nickname">'
            +nickname
            +'<span>'
            +time
            +'</span></p>'
            + '<p class="msg">'
            +msg
            +'</p>'
            +'</div>';
        $('.show-box').append(html);
        $('.show-box').scrollTop($('.show-box').scrollTop()+1000);
    }
    function getmsg(){
        $.ajax({
            url:'get-msg.php?id='+last_id,
            type:'get',
            success:function(data){
                // console.log(data);
                for (var i=0;i<data.length;i++){
                    addmsg(data[i].nickname,data[i].msg,data[i].created_at);
                    last_id = data[i].id;
                }
            },
            error:function(response){
                console.log(response);
            }
        })
    }
})