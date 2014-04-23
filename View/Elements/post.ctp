<?php if ($post): ?>
    <tr>
      <td width="15%">
        <div class="row">
          <div class="col-lg-12">
            <?php echo $this->Html->link($post['User']['username'],
              array('controller'=>'users', 'action'=>'show', $post['User']['id'])); ?>
          </div>
        </div>
      </td>
      <td width="60%">
        <?php echo $post['Thread']['body']; ?>
      </td>
      <td width="25%">
        <div class="row">
          <div class="col-lg-12 pull-right">
            <?php echo $post['Thread']['modified'] ?>
          </div>
        </div>
      </td>
    </tr>
<?php endif; ?>
