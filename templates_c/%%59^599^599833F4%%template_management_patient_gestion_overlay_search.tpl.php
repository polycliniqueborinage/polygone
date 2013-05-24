<?php /* Smarty version 2.6.19, created on 2010-12-17 08:03:49
         compiled from template_management_patient_gestion_overlay_search.tpl */ ?>
<?php unset($this->_sections['patient']);
$this->_sections['patient']['name'] = 'patient';
$this->_sections['patient']['loop'] = is_array($_loop=$this->_tpl_vars['patients']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['patient']['show'] = true;
$this->_sections['patient']['max'] = $this->_sections['patient']['loop'];
$this->_sections['patient']['step'] = 1;
$this->_sections['patient']['start'] = $this->_sections['patient']['step'] > 0 ? 0 : $this->_sections['patient']['loop']-1;
if ($this->_sections['patient']['show']) {
    $this->_sections['patient']['total'] = $this->_sections['patient']['loop'];
    if ($this->_sections['patient']['total'] == 0)
        $this->_sections['patient']['show'] = false;
} else
    $this->_sections['patient']['total'] = 0;
if ($this->_sections['patient']['show']):

            for ($this->_sections['patient']['index'] = $this->_sections['patient']['start'], $this->_sections['patient']['iteration'] = 1;
                 $this->_sections['patient']['iteration'] <= $this->_sections['patient']['total'];
                 $this->_sections['patient']['index'] += $this->_sections['patient']['step'], $this->_sections['patient']['iteration']++):
$this->_sections['patient']['rownum'] = $this->_sections['patient']['iteration'];
$this->_sections['patient']['index_prev'] = $this->_sections['patient']['index'] - $this->_sections['patient']['step'];
$this->_sections['patient']['index_next'] = $this->_sections['patient']['index'] + $this->_sections['patient']['step'];
$this->_sections['patient']['first']      = ($this->_sections['patient']['iteration'] == 1);
$this->_sections['patient']['last']       = ($this->_sections['patient']['iteration'] == $this->_sections['patient']['total']);
?>
	
	<div class="row"><label><a href="#" onclick="javascript:patientAutoComplete('',<?php echo $this->_tpl_vars['patients'][$this->_sections['patient']['index']]['ID']; ?>
)" title=""><b><?php echo $this->_tpl_vars['patients'][$this->_sections['patient']['index']]['nom']; ?>
 <?php echo $this->_tpl_vars['patients'][$this->_sections['patient']['index']]['prenom']; ?>
 </b></a></label><?php echo $this->_config[0]['vars']['dico_user_agenda_addbox_birth_on']; ?>
 <?php echo $this->_tpl_vars['patients'][$this->_sections['patient']['index']]['date_naissance']; ?>
 <?php echo $this->_config[0]['vars']['dico_user_agenda_addbox_living_in']; ?>
 <?php echo $this->_tpl_vars['patients'][$this->_sections['patient']['index']]['rue']; ?>
 <?php echo $this->_tpl_vars['patients'][$this->_sections['patient']['index']]['code_postal']; ?>
 <?php echo $this->_tpl_vars['patients'][$this->_sections['patient']['index']]['commune']; ?>

	
<?php endfor; endif; ?>