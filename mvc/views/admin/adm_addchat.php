    <section class="avenue-messenger">
        <div class="menu">
            <div class="items">
                <span>
                    <a href="#" title="Minimize">&mdash;</a><br>
                    <a href="#" title="End Chat">&#10005;</a>
                </span>
            </div>
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
                <!-- <?php foreach ($data['view'] as $row) : ?>
                        <?php if ($row['in_msg_id'] != 3) : ?>
                                    <div class="admin-text"> 
                                        <p><?= $row['content'] ?></p> 
                                    </div>
                        <?php else : ?>
                                    <div class="member-text"> 
                                        <p><?= $row['content'] ?></p> 
                                    </div>
                        <?php endif; ?>
                    <?php endforeach; ?> -->
            </div>
            <div class="message-box">
                <form action="" method="post">
                    <input type="text" id="content" name="content" autocomplete="off" class="message-input" placeholder="Aaa...">
                    <button type="submit" id="insert_chat" name="send" class="message-submit">Gửi đi</button>
                </form>
            </div>
        </div>
        </div>
    </section>

    <script>
        $(document).ready(function() {
            var id = window.location.href;
            var param = id.split('/');
            param = param[param.length - 1];

            function sendMsg(msg) {
                $.ajax({
                    url: id,
                    type: 'POST',
                    data: {
                        'content': msg,
                        // 'out_id' : id,
                        'send': 'abc'
                    },
                    success: function(data) {
                        selectMsg();
                        $('#content').val('');
                    }
                });
            }

            function selectMsg() {

                $.ajax({
                    url: `<?= BASE_URL ?>/admin/SelectMsg/` + param,
                    type: 'POST',
                    success: function(data) {
                        $('.messages').html(data);
                    }
                })
            }
            $('#insert_chat').click(function(e) {
                e.preventDefault();
                msg = $('#content').val();
                if (msg == "") {
                    alert('Chưa nhập tin nhắn');
                    return;
                } else {
                    sendMsg(msg);
                }
            });

            setInterval(function() {
                selectMsg();
            }, 1000);
        });
    </script>