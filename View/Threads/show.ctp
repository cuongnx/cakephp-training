<?php if($thread): ?>
<div class="row">
<div class="col-lg-8 col-lg-offset-2">
  <table class="table table-bordered">
    <tr>
      <td rowspan="2" width="25%">
        <div class="row">
          <div class="col-lg-12">
            <h4><?php echo $this->Html->link($thread['User']['username'],
              array('controller'=>'users', 'action'=>'show', $thread['User']['id'])); ?></h4>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 pull-right">
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
<div class="col-lg-7 col-lg-offset-3" >
  <table class="table table-bordered table-striped">
    <div id="post-list">
    <tr>
      <td width="15%">
        <div class="row">
          <div class="col-lg-12">
            <?php echo $this->Html->link($thread['User']['username'],
              array('controller'=>'users', 'action'=>'show', $thread['User']['id'])); ?>
          </div>
        </div>
      </td>
      <td width="60%">
        <?php echo $thread['Thread']['body']; ?>
      </td>
      <td width="25%">
        <div class="row">
          <div class="col-lg-12 pull-right">
            <?php echo $thread['Thread']['modified'] ?>
          </div>
        </div>
      </td>
    </tr>
    </div>
  </table>
</div>
</div>

<?php endif; ?>

<br/>
<?php echo $this->Html->script("create_post_ajax"); ?>
<div class="row">
<div class="col-lg-8" style="float:none; margin:auto;">
<form method="post" id="post-message" action="">

  <div class="row">
    <div class="col-lg-3">
      <div class="pull-right">
      <h4><?php echo $this->Html->link($this->Session->read('Auth.User.username'),
        array('controller'=>'users', 'action'=>'show', $this->Session->read('Auth.User.id'))); ?></h4>
      </div>
    </div>

    <div class="col-lg-9">
      <div class="form-group">
        <label for="body">Message</label>
        <textarea class="form-control" id="body" name="data[Post][body]" placeholder="What do u wan2 say?" rows="3" ></textarea>
      </div>

      <div class="form-group">
        <button type="submit" id="submit-post" class="btn btn-default">Submit</button>
        <input type="hidden" id="threadid" name="data[Thread][id]" value="<?php echo $thread['Thread']['id']; ?>" />
      </div>
    </div>

  </div>
</form>
</div>
</div>
