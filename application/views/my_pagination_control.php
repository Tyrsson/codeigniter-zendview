<?php 
Zend_Debug::dump($this->pageCount);
?>
<?php if ($this->pageCount && $this->pageCount > 1): ?>
    <p class="pagination">
     <!-- Previous page link -->
     <?php 
        if (isset($this->previous)): ?>
         <a href="<?php echo $this->previous; ?>" class="previous"><span>previous</span></a>
<?php endif; ?>
<!-- Numbered page links -->
<?php foreach ($this->pagesInRange as $page): ?>
  <?php if ($page != $this->current): ?>
    <a href="<?php echo  $page; ?>">
        <?php echo $page; ?></a>
  <?php else: ?>
    <strong><?php echo $page; ?></strong>
  <?php endif; ?>
<?php endforeach; ?>
<!-- Next page link -->

<?php if (isset($this->next)): ?>
    <a href="<?php echo $this->next; ?>" class="next"><span>next</span></a>
<?php endif; ?>
</p>
<?php endif; ?>