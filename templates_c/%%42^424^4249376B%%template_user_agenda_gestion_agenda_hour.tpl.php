<?php /* Smarty version 2.6.19, created on 2012-10-15 13:26:10
         compiled from template_user_agenda_gestion_agenda_hour.tpl */ ?>
<?php unset($this->_sections['agenda']);
$this->_sections['agenda']['name'] = 'agenda';
$this->_sections['agenda']['loop'] = is_array($_loop=$this->_tpl_vars['agendas']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['agenda']['show'] = true;
$this->_sections['agenda']['max'] = $this->_sections['agenda']['loop'];
$this->_sections['agenda']['step'] = 1;
$this->_sections['agenda']['start'] = $this->_sections['agenda']['step'] > 0 ? 0 : $this->_sections['agenda']['loop']-1;
if ($this->_sections['agenda']['show']) {
    $this->_sections['agenda']['total'] = $this->_sections['agenda']['loop'];
    if ($this->_sections['agenda']['total'] == 0)
        $this->_sections['agenda']['show'] = false;
} else
    $this->_sections['agenda']['total'] = 0;
if ($this->_sections['agenda']['show']):

            for ($this->_sections['agenda']['index'] = $this->_sections['agenda']['start'], $this->_sections['agenda']['iteration'] = 1;
                 $this->_sections['agenda']['iteration'] <= $this->_sections['agenda']['total'];
                 $this->_sections['agenda']['index'] += $this->_sections['agenda']['step'], $this->_sections['agenda']['iteration']++):
$this->_sections['agenda']['rownum'] = $this->_sections['agenda']['iteration'];
$this->_sections['agenda']['index_prev'] = $this->_sections['agenda']['index'] - $this->_sections['agenda']['step'];
$this->_sections['agenda']['index_next'] = $this->_sections['agenda']['index'] + $this->_sections['agenda']['step'];
$this->_sections['agenda']['first']      = ($this->_sections['agenda']['iteration'] == 1);
$this->_sections['agenda']['last']       = ($this->_sections['agenda']['iteration'] == $this->_sections['agenda']['total']);
?>

	<div class="rhead" style="height: <?php echo $this->_tpl_vars['agendas'][$this->_sections['agenda']['index']]['height']; ?>
px;background:#<?php echo $this->_tpl_vars['agendas'][$this->_sections['agenda']['index']]['color']; ?>
">
		<div class="rheadtext"><?php echo $this->_tpl_vars['agendas'][$this->_sections['agenda']['index']]['hour']; ?>
</div>
	</div>

<?php endfor; endif; ?>