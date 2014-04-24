<?php if ($post): ?>
    <tr id="post-<?php echo $post['Post']['id']; ?>" >
      <td width="15%">
        <div class="row">
          <div class="col-lg-12">
            <?php echo $this->Html->link($post['User']['username'],
              array('controller'=>'users', 'action'=>'show', $post['User']['id'])); ?>
          </div>
        </div>
      </td>
      <td width="60%">
        <?php if ($post["User"]["id"]==$this->Session->read('Auth.User.id')): ?>
          <div class="col-sm-10" id="post-body-<?php echo $post['Post']['id']; ?>">
            <?php echo $post['Post']['body']; ?>
          </div>
          <div class="col-sm-2">
            <a href="javascript:void(0)" onclick="editPostClick(<?php echo $post['Post']['id'] ?>)" id="edit-post" class="edit-post" >Edit</a>
          </div>
        <?php else: ?>
          <div class="col-sm-12" id="post-body-<?php echo $post['Post']['id']; ?>">
            <?php echo $post['Post']['body']; ?>
          </div>
        <?php endif; ?>
      </td>
      <td width="25%">
        <div class="row">
          <div class="col-lg-12 pull-right" id="post-modified-<?php echo $post['Post']['id']; ?>" >
            <?php echo $post['Post']['modified'] ?>
          </div>
        </div>
      </td>
    </tr>
<?php endif; ?>

