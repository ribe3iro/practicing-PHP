$(function(){
    $.ajax({
        type: "GET",
        url: "dashboard/xhrGetAllPosts",
        dataType: "json",
        success: function(response){
            if(response.okay){
                response.data.forEach(post => {
                    let content="";
                    if(post.this){
                        content+="<div><b>"+post.login +" (you):</b> "+ post.text;
                        content+="<a class='delete' rel='"+post.id+"' href='#'>(delete)</a></div>";
                    }else{
                        content+="<div><b>"+post.login +":</b> "+ post.text+"</div>";
                    }
                    $("#postListing").append(content);
                });
            }


            $(document).on("click", ".delete", function(){
                let id = $(this).attr("rel");
                let element = $(this);
    
                $.ajax({
                    type: "POST",
                    url: "dashboard/xhrDeletePost",
                    dataType: "json",
                    data: {"id": id},
                    success: function(response){
                        if(response.okay){
                            element.parent().remove();
                        }
                    },
                    error: function(){
                        alert("There was an error deleting the post!")
                    }
                });
    
                return false;
            });

        },
        error: function(){
            alert("There was an error loading the posts!")
        },
    });


    $("#textPost").submit(function(){
        let target = $(this).attr('action');
        let data = $(this).serialize();

        $.ajax({
            type: "POST",
            url: target,
            dataType: "json",
            "data": data,
            success: function(response){
                $("#textInput").val("");
                let msg;
                if(response.okay){
                    msg = "Post made!";
                    let content = "<div><b>"+response.login +" (you):</b> "+ response.text+"<a class='delete' rel='"+response.id+"' href='#'>(delete)</a></div>";
                    $("#postListing").append(content);
                }else{
                    msg = "Error connecting to the database";
                }

                $('#postStatus').text(response.msg);
                setTimeout(()=>{
                    $('#postStatus').text("");
                }, 2000);
            },
            error: function(){
                alert("There was an error posting!")
            }
        });

        return false;
    });
});