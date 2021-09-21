const FULL_URL = "http://localhost/teste/";

$(function(){
    $.ajax({
        type: "GET",
        url: FULL_URL+"dashboard/xhrGetAllPosts",
        dataType: "json",
        success: function(response){
            if(response.okay){
                response.data.forEach(post => {
                    let content="";
                    if(post.this){
                        content+="<div class='row mb-2 border-bottom border-primary'><b class='col-2'>"+post.login +" (you)</b> <div class='col-9'>"+ post.text + "</div>";
                        content+="<a rel='delete' id='"+post.id+"' href='#' class='col-1 btn-sm btn-outline-danger'>Delete</a></div>";
                    }else{
                        content+="<div class='row mb-2 border-bottom border-primary'><div class='col-2'>"+post.login +"</div> <div class='col-9'>"+ post.text+"</div></div>";
                    }
                    $("#postListing").append(content);
                });
            }


            $(document).on("click", "a[rel='delete']", function(){
                let id = $(this).attr("id");
                let element = $(this);
    
                $.ajax({
                    type: "POST",
                    url: FULL_URL+"dashboard/xhrDeletePost",
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
                    let content = "<div class='row mb-2 border-bottom border-primary'><b class='col-2'>"+response.login +" (you)</b> <div class='col-9'>"+ response.text+"</div><a rel='delete' id='"+response.id+"' href='#' class='col-1 btn-sm btn-outline-danger'>Delete</a></div>";
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