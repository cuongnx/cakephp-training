<?php echo $this->Html->script("create_post_ajax"); ?>
<?php echo $this->Html->script("edit_post_ajax"); ?>

<?php if($thread): ?>
<div class="row">
<div class="col-sm-8 col-sm-offset-2">
  <table class="table table-bordered">
    <tr>
      <td rowspan="2" width="25%">
        <div class="row">
          <div class="col-sm-12">
            <h4><?php echo $this->Html->link($thread['User']['username'],
              array('controller'=>'users', 'action'=>'show', $thread['User']['id'])); ?></h4>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12 pull-right">
            <?php echo $thread['Thread']['modified'] ?>
          </div>
        </div>
      </td>
      <td width="75%">
        <b><?php echo $thread['Thread']['title']; ?></b>
      </td>
    </tr>
      <td>
        <h4><?php echo $thread['Thread']['body']; ?></h4>
      </td>
    </tr>
  </table>
</div>
</div>


<div class="row">
<div class="col-sm-7 col-sm-offset-3" >
  <table class="table table-bordered table-striped">
    <tbody id="post-list">
      <?php if ($posts): ?>
        <?php foreach($posts as $post): ?>
          <?php echo $this->element("post", array("post"=>$post)); ?>
        <?php endforeach; ?>
      <?php endif; ?>
    </tbody>
  </table>
</div>
</div>

<?php endif; ?>

<br/>
<div class="row">
<div class="col-sm-8" style="float:none; margin:auto;">
<form method="post" id="post-message" action="">

  <div class="row">
    <div class="col-sm-3">
      <div class="pull-right">
      <h4><?php echo $this->Html->link($this->Session->read('Auth.User.username'),
        array('controller'=>'users', 'action'=>'show', $this->Session->read('Auth.User.id'))); ?></h4>
      </div>
    </div>

    <div class="col-sm-9">
      <div class="form-group">
        <label for="body">Message</label>
        <textarea class="form-control" id="body" name="data[Post][body]" required placeholder="What do u wan2 say?" rows="3" ></textarea>
      </div>

      <div class="form-group">
        <button type="submit" id="submit-post" class="btn btn-default" onclick="return false;" >Submit</button>
        <input type="hidden" id="threadid" name="data[Thread][id]" value="<?php echo $thread['Thread']['id']; ?>" />
      </div>
    </div>

  </div>
</form>
</div>
</div>

<div class="row">
<div id="edit-post-dialog" class="col-sm-6 col-sm-offset-2">
  <form method="post" id="edit-message" action="">
    <div class="col-sm-12">
      <div class="form-group">
        <label for="body"></label>
        <textarea class="form-control" id="edit-body" name="data[Post][body]" required placeholder="What do u wan2 say?" rows="3" ></textarea>
      </div>

      <div class="form-group">
        <button type="submit" id="submit-edit-post" class="btn btn-default" onclick="return false;" >Submit</button>
        <a href="javascript:void(0);" id="delete-post" class="pull-right">Delete post</a>
      </div>
    </div>
  </form>
</div>
</div>
