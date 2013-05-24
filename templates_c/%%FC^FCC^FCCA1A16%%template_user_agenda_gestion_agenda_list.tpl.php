<?php /* Smarty version 2.6.19, created on 2012-10-15 13:26:17
         compiled from template_user_agenda_gestion_agenda_list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'template_user_agenda_gestion_agenda_list.tpl', 57, false),)), $this); ?>
<table cellpadding="0" cellspacing="0" border="0">

	<thead>
					
	<tr>
						
	<th class="tools"></th>
	<th><?php echo $this->_tpl_vars['start']; ?>
</th>
	<th><?php echo $this->_tpl_vars['end']; ?>
</th>
	<th><?php echo $this->_tpl_vars['patient']; ?>
</th>
	<th><?php echo $this->_tpl_vars['motif']; ?>
</th>
	<th><?php echo $this->_tpl_vars['location']; ?>
</th>
	<th><?php echo $this->_tpl_vars['comment']; ?>
</th>
												
	</tr>
							
	</thead>

	<tfoot>
	<tr>
	<td colspan="5"></td>
	</tr>
	</tfoot>
												
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


	<?php if ($this->_sections['agenda']['index'] % 2 == 0): ?>
	<tbody class="color-a">
	<?php else: ?>
	<tbody class="color-b">
	<?php endif; ?>
	
	<tr>
	<td class="tools">
		<a class="tool_view" href="#" onclick="javascript:viewConsultation(<?php echo $this->_tpl_vars['agendas'][$this->_sections['agenda']['index']]['ID']; ?>
);" title="<?php echo $this->_config[0]['vars']['dico_management_prevention_detail']; ?>
" ></a>
		<a class="tool_edit" onclick="javascript:editConsultation(<?php echo $this->_tpl_vars['agendas'][$this->_sections['agenda']['index']]['ID']; ?>
);"  title="<?php echo $this->_config[0]['vars']['dico_management_prevention_edit']; ?>
" ></a>
		<a class="tool_del" href="#" onclick="javascript:deleteConsultationBox(<?php echo $this->_tpl_vars['agendas'][$this->_sections['agenda']['index']]['ID']; ?>
);" title="<?php echo $this->_config[0]['vars']['dico_management_prevention_delete']; ?>
" ></a>
	</td>
	<td>
	<?php echo $this->_tpl_vars['agendas'][$this->_sections['agenda']['index']]['start']; ?>

	</td>
	<td>
	<?php echo $this->_tpl_vars['agendas'][$this->_sections['agenda']['index']]['end']; ?>

    </td>
	<td>
	<?php echo $this->_tpl_vars['agendas'][$this->_sections['agenda']['index']]['patient']; ?>

    </td>
	<td>
	<?php echo $this->_tpl_vars['agendas'][$this->_sections['agenda']['index']]['motif']; ?>

    </td>
	<td>
	<?php echo $this->_tpl_vars['agendas'][$this->_sections['agenda']['index']]['location']; ?>

    </td>
	<td>
	<?php echo ((is_array($_tmp=$this->_tpl_vars['agendas'][$this->_sections['agenda']['index']]['comment'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 30, "...", true) : smarty_modifier_truncate($_tmp, 30, "...", true)); ?>

    </td>
    </tr>
	</tbody>
												
													
<?php endfor; endif; ?>

	</table>