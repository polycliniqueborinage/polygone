<?php /* Smarty version 2.6.19, created on 2012-10-15 13:26:10
         compiled from template_user_agenda_gestion_agenda_event.tpl */ ?>
<?php unset($this->_sections['construct']);
$this->_sections['construct']['name'] = 'construct';
$this->_sections['construct']['loop'] = is_array($_loop=$this->_tpl_vars['construct']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['construct']['show'] = true;
$this->_sections['construct']['max'] = $this->_sections['construct']['loop'];
$this->_sections['construct']['step'] = 1;
$this->_sections['construct']['start'] = $this->_sections['construct']['step'] > 0 ? 0 : $this->_sections['construct']['loop']-1;
if ($this->_sections['construct']['show']) {
    $this->_sections['construct']['total'] = $this->_sections['construct']['loop'];
    if ($this->_sections['construct']['total'] == 0)
        $this->_sections['construct']['show'] = false;
} else
    $this->_sections['construct']['total'] = 0;
if ($this->_sections['construct']['show']):

            for ($this->_sections['construct']['index'] = $this->_sections['construct']['start'], $this->_sections['construct']['iteration'] = 1;
                 $this->_sections['construct']['iteration'] <= $this->_sections['construct']['total'];
                 $this->_sections['construct']['index'] += $this->_sections['construct']['step'], $this->_sections['construct']['iteration']++):
$this->_sections['construct']['rownum'] = $this->_sections['construct']['iteration'];
$this->_sections['construct']['index_prev'] = $this->_sections['construct']['index'] - $this->_sections['construct']['step'];
$this->_sections['construct']['index_next'] = $this->_sections['construct']['index'] + $this->_sections['construct']['step'];
$this->_sections['construct']['first']      = ($this->_sections['construct']['iteration'] == 1);
$this->_sections['construct']['last']       = ($this->_sections['construct']['iteration'] == $this->_sections['construct']['total']);
?>
	<div style="height: <?php echo $this->_tpl_vars['height']; ?>
px;" dayofweek="<?php echo $this->_tpl_vars['dayofweek']; ?>
" day="<?php echo $this->_tpl_vars['currentDate']; ?>
" top="<?php echo $this->_tpl_vars['construct'][$this->_sections['construct']['index']]*2; ?>
" class="selectableitem"></div>
	<div style="height: <?php echo $this->_tpl_vars['height']; ?>
px;" dayofweek="<?php echo $this->_tpl_vars['dayofweek']; ?>
" day="<?php echo $this->_tpl_vars['currentDate']; ?>
" top="<?php echo $this->_tpl_vars['construct'][$this->_sections['construct']['index']]*2+1; ?>
" class="selectableitem zebra"></div>
<?php endfor; endif; ?>