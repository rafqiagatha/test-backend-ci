<!-- Success Alert -->
<?php if ($this->session->has_userdata('success')) { ?>
<div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        <i class="icon fa fa-check"></i><?php echo $this->session->flashdata('success');?>
</div> 
<?php } ?>
<!-- Update Alert -->
<?php if ($this->session->has_userdata('update')) { ?>
<div class="alert alert-info alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        <i class="icon fa fa-check"></i><?php echo $this->session->flashdata('update');?>
</div> 
<?php } ?>
<!-- Delete Alert -->
<?php if ($this->session->has_userdata('delete')) { ?>
<div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        <i class="icon fa fa-check"></i><?php echo $this->session->flashdata('delete');?>
</div> 
<?php } ?>

