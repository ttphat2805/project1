        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>ID member</th>
                    <th>content</th>
                    <th>Date</th>
                    <th>Chat với member</th>
                </tr>
            </thead>
            <tbody>
                <?php $count = 1; ?>
                <?php foreach ($data['chat'] as $chat): ?>
                <tr>
                    <td><?=$count++?></td>
                    <td><?=$chat['in_msg_id']?></td>
                    <td><?=$chat['content']?></td>
                    <td><?=$chat['date']?></td>
                    <td>
                        <a class="btn btn-sm btn-info" href="<?php echo BASE_URL ?>/admin/addchat/<?= $chat['in_msg_id'] ?>">Chat</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>