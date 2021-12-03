<style>
    div,
    p {
        color: white;
    }

    .boxchat {
        width: 80%;
        height: 500px;
    }

    .boxchat .header {
        width: 100%;
        height: 50px;
        background-color: #ccc;
    }

    .boxchat .middle {
        width: 100%;
        height: 300px;
        border: 1px solid black;
        overflow: auto;
    }

    .boxchat .middle .member-chat {
        text-align: right;
    }

    .boxchat .footer {
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
        <?php foreach ($data['view'] as $row) : ?>
            <?php if ($row['in_msg_id'] == 3) : ?>
                <div class="admin-text">
                    <p><?= $row['content'] ?></p>
                </div>
            <?php else : ?>
                <div class="admin-text">
                    <p><?= $row['content'] ?></p>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
    <form action="" method="post">
        <div class="footer">
            <input type="text" name="content" id="content">
            <input type="submit" value="Gửi" id="insert_chat" name="send">
        </div>
    </form>
</div>



<section class="avenue-messenger">
    <div class="menu">
        <div class="items">
            <span>
                <a href="#" title="Minimize">&mdash;</a><br>
                <a href="#" title="End Chat">&#10005;</a>
            </span>
        </div>
        <div class="button button-close-chat"> <i class="fal fa-times"></i> </div>
    </div>
    <div class="agent-face">
        <div class="half">
            <img class="agent circle" src="<?= BASE_URL ?>/public/assets/images/logo/logo.png" alt="Jesse Tino">
        </div>
    </div>
    <div class="chat">
        <div class="chat-title">
            <b>
                <h1>Admin</h1>
            </b>
            <b>
                <h2>G6'Food</h2>
            </b>
        </div>
        <div class="messages">
            <!-- data here -->
        </div>
        <div class="message-box">
            <textarea type="text" id="content" class="message-input" placeholder="Type message..."></textarea>
            <button type="submit" id="insert_chat" class="message-submit">Gửi</button>
        </div>
    </div>
    </div>
</section>