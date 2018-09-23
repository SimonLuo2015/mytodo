<?php if($this->session->flashdata('registered')): ?>
    <p class="alert alert-dismissable alert-success"><?php echo $this->session->flashdata('registered'); ?></p>
<?php endif; ?>
<h1>Welcome to myTodo!</h1>
<p>myTodo use a simple and helpful application to help you manage your day to day tasks. You can add as many task lists as you want. myTodo is absolutely free! Have fun.</p> 