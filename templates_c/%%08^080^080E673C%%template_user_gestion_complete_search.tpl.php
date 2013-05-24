<?php /* Smarty version 2.6.19, created on 2012-09-08 11:12:43
         compiled from template_user_gestion_complete_search.tpl */ ?>
<ul id='accordion_messages'>

	<?php unset($this->_sections['protocol']);
$this->_sections['protocol']['name'] = 'protocol';
$this->_sections['protocol']['loop'] = is_array($_loop=$this->_tpl_vars['protocols']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['protocol']['show'] = true;
$this->_sections['protocol']['max'] = $this->_sections['protocol']['loop'];
$this->_sections['protocol']['step'] = 1;
$this->_sections['protocol']['start'] = $this->_sections['protocol']['step'] > 0 ? 0 : $this->_sections['protocol']['loop']-1;
if ($this->_sections['protocol']['show']) {
    $this->_sections['protocol']['total'] = $this->_sections['protocol']['loop'];
    if ($this->_sections['protocol']['total'] == 0)
        $this->_sections['protocol']['show'] = false;
} else
    $this->_sections['protocol']['total'] = 0;
if ($this->_sections['protocol']['show']):

            for ($this->_sections['protocol']['index'] = $this->_sections['protocol']['start'], $this->_sections['protocol']['iteration'] = 1;
                 $this->_sections['protocol']['iteration'] <= $this->_sections['protocol']['total'];
                 $this->_sections['protocol']['index'] += $this->_sections['protocol']['step'], $this->_sections['protocol']['iteration']++):
$this->_sections['protocol']['rownum'] = $this->_sections['protocol']['iteration'];
$this->_sections['protocol']['index_prev'] = $this->_sections['protocol']['index'] - $this->_sections['protocol']['step'];
$this->_sections['protocol']['index_next'] = $this->_sections['protocol']['index'] + $this->_sections['protocol']['step'];
$this->_sections['protocol']['first']      = ($this->_sections['protocol']['iteration'] == 1);
$this->_sections['protocol']['last']       = ($this->_sections['protocol']['iteration'] == $this->_sections['protocol']['total']);
?>
	
		<?php if ($this->_sections['protocol']['index'] % 2 == 0): ?>
			<li class="bg_a">
		<?php else: ?>
			<li class="bg_b">
		<?php endif; ?>
	
			<table cellpadding='0' cellspacing='0' width='100%'>
			<tr>
			<td class='b' style='width:2%'></td>
			<td class='b' style='width:20%'><?php echo $this->_tpl_vars['protocols'][$this->_sections['protocol']['index']]['patient']; ?>
</td>
			<td class='b' style='width:20%'><?php echo $this->_tpl_vars['protocols'][$this->_sections['protocol']['index']]['user_sender']; ?>
</td>
			<td class='b' style='width:20%'><?php echo $this->_tpl_vars['protocols'][$this->_sections['protocol']['index']]['user_recipient']; ?>
</td>
			<td class='b' style='width:20%'><?php echo $this->_tpl_vars['protocols'][$this->_sections['protocol']['index']]['date']; ?>
</td>
			<td class="tools">
			<a class="tool_html" href='#' title='<?php echo $this->_tpl_vars['export_html']; ?>
' onclick="javascript:exportProtocol(<?php echo $this->_tpl_vars['protocols'][$this->_sections['protocol']['index']]['ID']; ?>
,'html')"/>
			<a class="tool_pdf" href='#' title='<?php echo $this->_tpl_vars['export_pdf']; ?>
' onclick="javascript:exportProtocol(<?php echo $this->_tpl_vars['protocols'][$this->_sections['protocol']['index']]['ID']; ?>
,'pdf')"/>
			<a class="tool_rtf" href='#' title='<?php echo $this->_tpl_vars['export_rtf']; ?>
' onclick="javascript:exportProtocol(<?php echo $this->_tpl_vars['protocols'][$this->_sections['protocol']['index']]['ID']; ?>
,'rtf')"/>
			<a class="tool_xml" href='#' title='<?php echo $this->_tpl_vars['export_xml']; ?>
' onclick="javascript:exportProtocol(<?php echo $this->_tpl_vars['protocols'][$this->_sections['protocol']['index']]['ID']; ?>
,'xml')"/>
			</td>
			</table>
			</li>

	<?php endfor; endif; ?>	
	
	<?php unset($this->_sections['sumehr']);
$this->_sections['sumehr']['name'] = 'sumehr';
$this->_sections['sumehr']['loop'] = is_array($_loop=$this->_tpl_vars['sumehrs']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['sumehr']['show'] = true;
$this->_sections['sumehr']['max'] = $this->_sections['sumehr']['loop'];
$this->_sections['sumehr']['step'] = 1;
$this->_sections['sumehr']['start'] = $this->_sections['sumehr']['step'] > 0 ? 0 : $this->_sections['sumehr']['loop']-1;
if ($this->_sections['sumehr']['show']) {
    $this->_sections['sumehr']['total'] = $this->_sections['sumehr']['loop'];
    if ($this->_sections['sumehr']['total'] == 0)
        $this->_sections['sumehr']['show'] = false;
} else
    $this->_sections['sumehr']['total'] = 0;
if ($this->_sections['sumehr']['show']):

            for ($this->_sections['sumehr']['index'] = $this->_sections['sumehr']['start'], $this->_sections['sumehr']['iteration'] = 1;
                 $this->_sections['sumehr']['iteration'] <= $this->_sections['sumehr']['total'];
                 $this->_sections['sumehr']['index'] += $this->_sections['sumehr']['step'], $this->_sections['sumehr']['iteration']++):
$this->_sections['sumehr']['rownum'] = $this->_sections['sumehr']['iteration'];
$this->_sections['sumehr']['index_prev'] = $this->_sections['sumehr']['index'] - $this->_sections['sumehr']['step'];
$this->_sections['sumehr']['index_next'] = $this->_sections['sumehr']['index'] + $this->_sections['sumehr']['step'];
$this->_sections['sumehr']['first']      = ($this->_sections['sumehr']['iteration'] == 1);
$this->_sections['sumehr']['last']       = ($this->_sections['sumehr']['iteration'] == $this->_sections['sumehr']['total']);
?>
	
		<?php if ($this->_sections['sumehr']['index'] % 2 == 0): ?>
			<li class="bg_a">
		<?php else: ?>
			<li class="bg_b">
		<?php endif; ?>
	
			<table cellpadding='0' cellspacing='0' width='100%'>
			<tr>
			<td class='b' style='width:2%'></td>
			<td class="tools">
				<a class="tool_view" href='user_sumehr.php?action=view&patient_id=<?php echo $this->_tpl_vars['sumehrs'][$this->_sections['sumehr']['index']]['patient_id']; ?>
' title='<?php echo $this->_tpl_vars['detail_alt']; ?>
'/>
			</td>
			<td class='b' style='width:30%'><?php echo $this->_tpl_vars['sumehrs'][$this->_sections['sumehr']['index']]['patient_familyname']; ?>
</td>
			<td class='b' style='width:30%'><?php echo $this->_tpl_vars['sumehrs'][$this->_sections['sumehr']['index']]['patient_firstname']; ?>
</td>
			<td class='b' style='width:18%'><?php echo $this->_tpl_vars['sumehrs'][$this->_sections['sumehr']['index']]['patient_birthdate']; ?>
</td>
			<td class='b' style='width:15%'><?php echo $this->_tpl_vars['sumehrs'][$this->_sections['sumehr']['index']]['latest_modification_date']; ?>
</td>
			</table>
			</li>

	<?php endfor; endif; ?>
	
	<?php unset($this->_sections['exam']);
$this->_sections['exam']['name'] = 'exam';
$this->_sections['exam']['loop'] = is_array($_loop=$this->_tpl_vars['exams']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['exam']['show'] = true;
$this->_sections['exam']['max'] = $this->_sections['exam']['loop'];
$this->_sections['exam']['step'] = 1;
$this->_sections['exam']['start'] = $this->_sections['exam']['step'] > 0 ? 0 : $this->_sections['exam']['loop']-1;
if ($this->_sections['exam']['show']) {
    $this->_sections['exam']['total'] = $this->_sections['exam']['loop'];
    if ($this->_sections['exam']['total'] == 0)
        $this->_sections['exam']['show'] = false;
} else
    $this->_sections['exam']['total'] = 0;
if ($this->_sections['exam']['show']):

            for ($this->_sections['exam']['index'] = $this->_sections['exam']['start'], $this->_sections['exam']['iteration'] = 1;
                 $this->_sections['exam']['iteration'] <= $this->_sections['exam']['total'];
                 $this->_sections['exam']['index'] += $this->_sections['exam']['step'], $this->_sections['exam']['iteration']++):
$this->_sections['exam']['rownum'] = $this->_sections['exam']['iteration'];
$this->_sections['exam']['index_prev'] = $this->_sections['exam']['index'] - $this->_sections['exam']['step'];
$this->_sections['exam']['index_next'] = $this->_sections['exam']['index'] + $this->_sections['exam']['step'];
$this->_sections['exam']['first']      = ($this->_sections['exam']['iteration'] == 1);
$this->_sections['exam']['last']       = ($this->_sections['exam']['iteration'] == $this->_sections['exam']['total']);
?>
	
		<?php if ($this->_sections['exam']['index'] % 2 == 0): ?>
			<li class="bg_a">
		<?php else: ?>
			<li class="bg_b">
		<?php endif; ?>
	
			<table cellpadding='0' cellspacing='0' width='100%'>
			<tr>
			<td class='b' style='width:2%'></td>
			<td class="tools">
				<a class="tool_view" href='user_sumehr.php?action=view_analyse&patient_id=<?php echo $this->_tpl_vars['exams'][$this->_sections['exam']['index']]['patient_id']; ?>
&examen_id=<?php echo $this->_tpl_vars['exams'][$this->_sections['exam']['index']]['examen_id']; ?>
' title='<?php echo $this->_tpl_vars['detail_alt']; ?>
'/>
			</td>
			<td class='b' style='width:35%'><?php echo $this->_tpl_vars['exams'][$this->_sections['exam']['index']]['patient_prenom']; ?>
 <?php echo $this->_tpl_vars['exams'][$this->_sections['exam']['index']]['patient_nom']; ?>
</td>
			<td class='b' style='width:20%'><?php echo $this->_tpl_vars['exams'][$this->_sections['exam']['index']]['examen_date']; ?>
</td>
			<td class='b' style='width:35%'>Dr <?php echo $this->_tpl_vars['exams'][$this->_sections['exam']['index']]['medecin_prenom']; ?>
 <?php echo $this->_tpl_vars['exams'][$this->_sections['exam']['index']]['medecin_nom']; ?>
</td>
			</table>
			</li>

	<?php endfor; endif; ?>
	
</ul>

	