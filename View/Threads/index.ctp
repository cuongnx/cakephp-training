<?php if($threads): ?>
<div class="row" >
<div class="col-sm-8" style="float:none; margin:auto;">
<table class="table table-striped" >
  <tr>
    <th width="75%">Titles</th>
    <th width="25%">Last modified</th>
  </tr>
  <?php foreach ($threads as $thread): ?>
    <tr>
      <td>
        <div class="col-sm-10">
        <div class="row"><h4><?php echo $this->Html->link($thread['Thread']['title'],
          array('controller'=>'threads', 'action'=>'show', $thread['Thread']['id'])) ?></h4></div>
        <div class="row"><?php echo $this->Html->link($thread['User']['username'],
          array('controller'=>'users', 'action'=>'show', $thread['User']['id'])); ?></div>
        </div>
      </td>
      <td><?php echo $thread['Thread']['modified'] ?></td>
    </tr>
  <?php endforeach; ?>
</table>
</div>
</div>
<?php endif; ?>

<br/>
<div class="row">
<div class="col-sm-8" style="float:none; margin:auto;">
<form method="post" action="/threads/create">
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" id="title" name="data[Thread][title]" required placeholder="Title" />
    </div>

    <div class="form-group">
      <label for="body">Message</label>
      <textarea class="form-control" id="body" name="data[Thread][body]" required placeholder="What do u wan2 say?" rows="5" ></textarea>
    </div>

    <div class="form-group">
      <button type="submit" class="btn btn-default">Submit</button>
    </div>

    <input type="text" class="hidden" name="data[User][id]" value="<?php echo $this->Session->read('Auth.User.id'); ?>"/>
</form>
</div>
</div>
