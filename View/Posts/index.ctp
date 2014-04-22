<table>
  <?php foreach ($posts as $post): ?>
    <tr>
      <td><?php echo $this->Html->link($post['Post']['created'],
        array('controller'=>'posts', 'action'=>'view', $post['Post']['id'])) ?></td>
      <td><?php echo $post['Post']['body']  ?></td>
    </tr>
  <?php endforeach; ?>
</table>
