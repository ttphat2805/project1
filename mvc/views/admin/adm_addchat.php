<style>
    div,p{
        color: white;
    }
    .boxchat{
            width: 80%;
            height: 500px;
        }
        .boxchat .header{
            width: 100%;
            height: 50px;
            background-color: #ccc;
        }
        .boxchat .middle{
            width: 100%;
            height: 300px;
            border: 1px solid black;
            overflow: auto;
        }
        .boxchat .middle .member-chat{
            text-align: right;
        }
        .boxchat .footer{
            width: 100%;
            height: 100px;
            background-color: #ccc;
        }
</style>
    <div class="boxchat">
        <div class="header">
            <p></p>
        </div>

        <div class="middle">
            <!-- data -->

        </div>
        <form action="" method="post">
            <div class="footer">
                <input type="text" name="content" id="content">
                <input type="submit" value="Gửi" id="insert_chat" name="send">
            </div>
        </form>
        
    </div>