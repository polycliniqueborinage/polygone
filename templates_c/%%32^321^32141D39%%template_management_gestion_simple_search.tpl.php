<?php /* Smarty version 2.6.19, created on 2012-09-14 13:07:18
         compiled from template_management_gestion_simple_search.tpl */ ?>
<ul id='accordion_messages'>

	<?php unset($this->_sections['planning']);
$this->_sections['planning']['name'] = 'planning';
$this->_sections['planning']['loop'] = is_array($_loop=$this->_tpl_vars['plannings']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['planning']['show'] = true;
$this->_sections['planning']['max'] = $this->_sections['planning']['loop'];
$this->_sections['planning']['step'] = 1;
$this->_sections['planning']['start'] = $this->_sections['planning']['step'] > 0 ? 0 : $this->_sections['planning']['loop']-1;
if ($this->_sections['planning']['show']) {
    $this->_sections['planning']['total'] = $this->_sections['planning']['loop'];
    if ($this->_sections['planning']['total'] == 0)
        $this->_sections['planning']['show'] = false;
} else
    $this->_sections['planning']['total'] = 0;
if ($this->_sections['planning']['show']):

            for ($this->_sections['planning']['index'] = $this->_sections['planning']['start'], $this->_sections['planning']['iteration'] = 1;
                 $this->_sections['planning']['iteration'] <= $this->_sections['planning']['total'];
                 $this->_sections['planning']['index'] += $this->_sections['planning']['step'], $this->_sections['planning']['iteration']++):
$this->_sections['planning']['rownum'] = $this->_sections['planning']['iteration'];
$this->_sections['planning']['index_prev'] = $this->_sections['planning']['index'] - $this->_sections['planning']['step'];
$this->_sections['planning']['index_next'] = $this->_sections['planning']['index'] + $this->_sections['planning']['step'];
$this->_sections['planning']['first']      = ($this->_sections['planning']['iteration'] == 1);
$this->_sections['planning']['last']       = ($this->_sections['planning']['iteration'] == $this->_sections['planning']['total']);
?>
		<?php if ($this->_sections['planning']['index'] % 2 == 0): ?>
			<li class="bg_a">
		<?php else: ?>
			<li class="bg_b">
		<?php endif; ?>
				<a href="#" onclick="javascript:openLoadBox(<?php echo $this->_tpl_vars['plannings'][$this->_sections['planning']['index']]['ID']; ?>
)" title="<?php echo $this->_tpl_vars['plannings'][$this->_sections['planning']['index']]['name']; ?>
 "><?php echo $this->_tpl_vars['plannings'][$this->_sections['planning']['index']]['name']; ?>
</a>
			</li>
	<?php endfor; endif; ?>


	<?php unset($this->_sections['ouvrier']);
$this->_sections['ouvrier']['name'] = 'ouvrier';
$this->_sections['ouvrier']['loop'] = is_array($_loop=$this->_tpl_vars['ouvriers']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['ouvrier']['show'] = true;
$this->_sections['ouvrier']['max'] = $this->_sections['ouvrier']['loop'];
$this->_sections['ouvrier']['step'] = 1;
$this->_sections['ouvrier']['start'] = $this->_sections['ouvrier']['step'] > 0 ? 0 : $this->_sections['ouvrier']['loop']-1;
if ($this->_sections['ouvrier']['show']) {
    $this->_sections['ouvrier']['total'] = $this->_sections['ouvrier']['loop'];
    if ($this->_sections['ouvrier']['total'] == 0)
        $this->_sections['ouvrier']['show'] = false;
} else
    $this->_sections['ouvrier']['total'] = 0;
if ($this->_sections['ouvrier']['show']):

            for ($this->_sections['ouvrier']['index'] = $this->_sections['ouvrier']['start'], $this->_sections['ouvrier']['iteration'] = 1;
                 $this->_sections['ouvrier']['iteration'] <= $this->_sections['ouvrier']['total'];
                 $this->_sections['ouvrier']['index'] += $this->_sections['ouvrier']['step'], $this->_sections['ouvrier']['iteration']++):
$this->_sections['ouvrier']['rownum'] = $this->_sections['ouvrier']['iteration'];
$this->_sections['ouvrier']['index_prev'] = $this->_sections['ouvrier']['index'] - $this->_sections['ouvrier']['step'];
$this->_sections['ouvrier']['index_next'] = $this->_sections['ouvrier']['index'] + $this->_sections['ouvrier']['step'];
$this->_sections['ouvrier']['first']      = ($this->_sections['ouvrier']['iteration'] == 1);
$this->_sections['ouvrier']['last']       = ($this->_sections['ouvrier']['iteration'] == $this->_sections['ouvrier']['total']);
?>
		<?php if ($this->_sections['ouvrier']['index'] % 2 == 0): ?>
			<li class="bg_a">
		<?php else: ?>
			<li class="bg_b">
		<?php endif; ?>
				<a href="#" onclick="" title="<?php echo $this->_tpl_vars['ouvriers'][$this->_sections['ouvrier']['index']]['nom']; ?>
 "><?php echo $this->_tpl_vars['ouriers'][$this->_sections['ouvrier']['index']]['ouvrier_nom']; ?>
 <?php echo $this->_tpl_vars['ouvriers'][$this->_sections['ouvrier']['index']]['ouvrier_prenom']; ?>
 </a>
			</li>
	<?php endfor; endif; ?>
	<?php if ($this->_tpl_vars['ouvriers'][1] == '' && $this->_tpl_vars['ouvriers'][0] != ''): ?>
    <table>
    	<tr valign="top">
	    	<td><?php echo $this->_tpl_vars['ouvriers'][0]['ouvrier_salaire_horaire']; ?>
</td>
		</tr>
    	<tr valign="top">
	       	<td><?php echo $this->_tpl_vars['ouvriers'][0]['ouvrier_bonus_recurrent']; ?>
</td>
		</tr>
    	<tr valign="top">
	       	<td><?php echo $this->_tpl_vars['ouvriers'][0]['ouvrier_cout_recurrent']; ?>
</td>
		</tr>
    </table>
	<?php endif; ?>
	
	<?php unset($this->_sections['product']);
$this->_sections['product']['name'] = 'product';
$this->_sections['product']['loop'] = is_array($_loop=$this->_tpl_vars['products']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['product']['show'] = true;
$this->_sections['product']['max'] = $this->_sections['product']['loop'];
$this->_sections['product']['step'] = 1;
$this->_sections['product']['start'] = $this->_sections['product']['step'] > 0 ? 0 : $this->_sections['product']['loop']-1;
if ($this->_sections['product']['show']) {
    $this->_sections['product']['total'] = $this->_sections['product']['loop'];
    if ($this->_sections['product']['total'] == 0)
        $this->_sections['product']['show'] = false;
} else
    $this->_sections['product']['total'] = 0;
if ($this->_sections['product']['show']):

            for ($this->_sections['product']['index'] = $this->_sections['product']['start'], $this->_sections['product']['iteration'] = 1;
                 $this->_sections['product']['iteration'] <= $this->_sections['product']['total'];
                 $this->_sections['product']['index'] += $this->_sections['product']['step'], $this->_sections['product']['iteration']++):
$this->_sections['product']['rownum'] = $this->_sections['product']['iteration'];
$this->_sections['product']['index_prev'] = $this->_sections['product']['index'] - $this->_sections['product']['step'];
$this->_sections['product']['index_next'] = $this->_sections['product']['index'] + $this->_sections['product']['step'];
$this->_sections['product']['first']      = ($this->_sections['product']['iteration'] == 1);
$this->_sections['product']['last']       = ($this->_sections['product']['iteration'] == $this->_sections['product']['total']);
?>
		<?php if ($this->_sections['product']['index'] % 2 == 0): ?>
			<li class="bg_a">
		<?php else: ?>
			<li class="bg_b">
		<?php endif; ?>
				<a href="#" onclick="javascript:productAutoComplete(<?php echo $this->_tpl_vars['products'][$this->_sections['product']['index']]['ID']; ?>
)" title=""><?php echo $this->_tpl_vars['products'][$this->_sections['product']['index']]['name']; ?>
</a>
			</li>
	<?php endfor; endif; ?>
	
		
	<?php unset($this->_sections['debt']);
$this->_sections['debt']['name'] = 'debt';
$this->_sections['debt']['loop'] = is_array($_loop=$this->_tpl_vars['debts']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['debt']['show'] = true;
$this->_sections['debt']['max'] = $this->_sections['debt']['loop'];
$this->_sections['debt']['step'] = 1;
$this->_sections['debt']['start'] = $this->_sections['debt']['step'] > 0 ? 0 : $this->_sections['debt']['loop']-1;
if ($this->_sections['debt']['show']) {
    $this->_sections['debt']['total'] = $this->_sections['debt']['loop'];
    if ($this->_sections['debt']['total'] == 0)
        $this->_sections['debt']['show'] = false;
} else
    $this->_sections['debt']['total'] = 0;
if ($this->_sections['debt']['show']):

            for ($this->_sections['debt']['index'] = $this->_sections['debt']['start'], $this->_sections['debt']['iteration'] = 1;
                 $this->_sections['debt']['iteration'] <= $this->_sections['debt']['total'];
                 $this->_sections['debt']['index'] += $this->_sections['debt']['step'], $this->_sections['debt']['iteration']++):
$this->_sections['debt']['rownum'] = $this->_sections['debt']['iteration'];
$this->_sections['debt']['index_prev'] = $this->_sections['debt']['index'] - $this->_sections['debt']['step'];
$this->_sections['debt']['index_next'] = $this->_sections['debt']['index'] + $this->_sections['debt']['step'];
$this->_sections['debt']['first']      = ($this->_sections['debt']['iteration'] == 1);
$this->_sections['debt']['last']       = ($this->_sections['debt']['iteration'] == $this->_sections['debt']['total']);
?>
		<?php if ($this->_sections['debt']['index'] % 2 == 0): ?>
			<li class="bg_a">
		<?php else: ?>
			<li class="bg_b">
		<?php endif; ?>
				<a href="#" onclick="javascript:debtAutoComplete('',<?php echo $this->_tpl_vars['debts'][$this->_sections['debt']['index']]['addressbook_ID']; ?>
)" title="<?php echo $this->_tpl_vars['debts'][$this->_sections['debt']['index']]['creation_date']; ?>
 - <?php echo $this->_tpl_vars['debts'][$this->_sections['debt']['index']]['amount']; ?>
 Euro"><?php echo $this->_tpl_vars['debts'][$this->_sections['debt']['index']]['familyname']; ?>
 <?php echo $this->_tpl_vars['debts'][$this->_sections['debt']['index']]['firstname']; ?>
 (<?php echo $this->_tpl_vars['debts'][$this->_sections['debt']['index']]['amount']; ?>
 Euro)</a>
			</li>
	<?php endfor; endif; ?>

	
	<?php unset($this->_sections['addressbook']);
$this->_sections['addressbook']['name'] = 'addressbook';
$this->_sections['addressbook']['loop'] = is_array($_loop=$this->_tpl_vars['addressbooks']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['addressbook']['show'] = true;
$this->_sections['addressbook']['max'] = $this->_sections['addressbook']['loop'];
$this->_sections['addressbook']['step'] = 1;
$this->_sections['addressbook']['start'] = $this->_sections['addressbook']['step'] > 0 ? 0 : $this->_sections['addressbook']['loop']-1;
if ($this->_sections['addressbook']['show']) {
    $this->_sections['addressbook']['total'] = $this->_sections['addressbook']['loop'];
    if ($this->_sections['addressbook']['total'] == 0)
        $this->_sections['addressbook']['show'] = false;
} else
    $this->_sections['addressbook']['total'] = 0;
if ($this->_sections['addressbook']['show']):

            for ($this->_sections['addressbook']['index'] = $this->_sections['addressbook']['start'], $this->_sections['addressbook']['iteration'] = 1;
                 $this->_sections['addressbook']['iteration'] <= $this->_sections['addressbook']['total'];
                 $this->_sections['addressbook']['index'] += $this->_sections['addressbook']['step'], $this->_sections['addressbook']['iteration']++):
$this->_sections['addressbook']['rownum'] = $this->_sections['addressbook']['iteration'];
$this->_sections['addressbook']['index_prev'] = $this->_sections['addressbook']['index'] - $this->_sections['addressbook']['step'];
$this->_sections['addressbook']['index_next'] = $this->_sections['addressbook']['index'] + $this->_sections['addressbook']['step'];
$this->_sections['addressbook']['first']      = ($this->_sections['addressbook']['iteration'] == 1);
$this->_sections['addressbook']['last']       = ($this->_sections['addressbook']['iteration'] == $this->_sections['addressbook']['total']);
?>
		<?php if ($this->_sections['addressbook']['index'] % 2 == 0): ?>
			<li class="bg_a">
		<?php else: ?>
			<li class="bg_b">
		<?php endif; ?>
				<a href="#" onclick="javascript:userAutoComplete(<?php echo $this->_tpl_vars['addressbooks'][$this->_sections['addressbook']['index']]['ID']; ?>
,'');" title=""><?php echo $this->_tpl_vars['addressbooks'][$this->_sections['addressbook']['index']]['familyname']; ?>
 <?php echo $this->_tpl_vars['addressbooks'][$this->_sections['addressbook']['index']]['firstname']; ?>
</a>
			</li>
	<?php endfor; endif; ?>
	<?php if ($this->_tpl_vars['addressbooks'][1] == '' && $this->_tpl_vars['addressbooks'][0] != ''): ?>
    <table>
    	<tr valign="top">
	    	<td><?php echo $this->_tpl_vars['addressbooks'][0]['address1']; ?>
</td>
		</tr>
    	<tr valign="top">
	       	<td><?php echo $this->_tpl_vars['addressbooks'][0]['zip1']; ?>
 <?php echo $this->_tpl_vars['addressbooks'][0]['city1']; ?>
</td>
		</tr>
    	<tr valign="top">
	       	<td><?php echo $this->_tpl_vars['addressbooks'][0]['speciality']; ?>
</td>
		</tr>
    </table>
	<?php endif; ?>
	
	
											
	<!-- Proprietaire attention use by protocol -->
										
	
	<?php unset($this->_sections['titulaire']);
$this->_sections['titulaire']['name'] = 'titulaire';
$this->_sections['titulaire']['loop'] = is_array($_loop=$this->_tpl_vars['titulaires']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['titulaire']['show'] = true;
$this->_sections['titulaire']['max'] = $this->_sections['titulaire']['loop'];
$this->_sections['titulaire']['step'] = 1;
$this->_sections['titulaire']['start'] = $this->_sections['titulaire']['step'] > 0 ? 0 : $this->_sections['titulaire']['loop']-1;
if ($this->_sections['titulaire']['show']) {
    $this->_sections['titulaire']['total'] = $this->_sections['titulaire']['loop'];
    if ($this->_sections['titulaire']['total'] == 0)
        $this->_sections['titulaire']['show'] = false;
} else
    $this->_sections['titulaire']['total'] = 0;
if ($this->_sections['titulaire']['show']):

            for ($this->_sections['titulaire']['index'] = $this->_sections['titulaire']['start'], $this->_sections['titulaire']['iteration'] = 1;
                 $this->_sections['titulaire']['iteration'] <= $this->_sections['titulaire']['total'];
                 $this->_sections['titulaire']['index'] += $this->_sections['titulaire']['step'], $this->_sections['titulaire']['iteration']++):
$this->_sections['titulaire']['rownum'] = $this->_sections['titulaire']['iteration'];
$this->_sections['titulaire']['index_prev'] = $this->_sections['titulaire']['index'] - $this->_sections['titulaire']['step'];
$this->_sections['titulaire']['index_next'] = $this->_sections['titulaire']['index'] + $this->_sections['titulaire']['step'];
$this->_sections['titulaire']['first']      = ($this->_sections['titulaire']['iteration'] == 1);
$this->_sections['titulaire']['last']       = ($this->_sections['titulaire']['iteration'] == $this->_sections['titulaire']['total']);
?>
		<?php if ($this->_sections['titulaire']['index'] % 2 == 0): ?>
			<li class="bg_a">
		<?php else: ?>
			<li class="bg_b">
		<?php endif; ?>
				<a href="#" onclick="javascript:titulaireAutoComplete('', <?php echo $this->_tpl_vars['titulaires'][$this->_sections['titulaire']['index']]['ID']; ?>
)" title="<?php echo $this->_tpl_vars['titulaires'][$this->_sections['titulaire']['index']]['patient_date_naissance']; ?>
"><?php echo $this->_tpl_vars['titulaires'][$this->_sections['titulaire']['index']]['nom']; ?>
 <?php echo $this->_tpl_vars['titulaires'][$this->_sections['titulaire']['index']]['prenom']; ?>
</a>
			</li>
	<?php endfor; endif; ?>
	<?php if ($this->_tpl_vars['titulaires'][1] == '' && $this->_tpl_vars['titulaires'][0] != ''): ?>
    <table>
    	<tr valign="top">
	    	<td>Date de naissance : <?php echo $this->_tpl_vars['titulaires'][0]['date_naissance']; ?>
</td>
		</tr>
    	<tr valign="top">
	       	<td>Sexe : <?php echo $this->_tpl_vars['titulaires'][0]['sexe']; ?>
</td>
		</tr>
    	<tr valign="top">
	       	<td><?php echo $this->_tpl_vars['titulaires'][0]['rue']; ?>
</td>
		</tr>
    	<tr valign="top">
	       	<td><?php echo $this->_tpl_vars['titulaires'][0]['code_postal']; ?>
 <?php echo $this->_tpl_vars['titulaires'][0]['commune']; ?>
</td>
		</tr>
    </table>
	<?php endif; ?>

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
		<?php if ($this->_sections['patient']['index'] % 2 == 0): ?>
			<li class="bg_a">
		<?php else: ?>
			<li class="bg_b">
		<?php endif; ?>
				<a href="#" onclick="javascript:patientAutoComplete('', <?php echo $this->_tpl_vars['patients'][$this->_sections['patient']['index']]['patient_id']; ?>
)" title="<?php echo $this->_tpl_vars['patients'][$this->_sections['patient']['index']]['patient_date_naissance']; ?>
"><?php echo $this->_tpl_vars['patients'][$this->_sections['patient']['index']]['nom']; ?>
 <?php echo $this->_tpl_vars['patients'][$this->_sections['patient']['index']]['prenom']; ?>
</a>
			</li>
	<?php endfor; endif; ?>
	<?php if ($this->_tpl_vars['patients'][1] == '' && $this->_tpl_vars['patients'][0] != ''): ?>
    <table>
    	<tr valign="top">
	    	<td>Date de naissance : <?php echo $this->_tpl_vars['patients'][0]['date_naissance']; ?>
</td>
		</tr>
    	<tr valign="top">
	       	<td>Sexe : <?php echo $this->_tpl_vars['patients'][0]['sexe']; ?>
</td>
		</tr>
    	<tr valign="top">
	       	<td><?php echo $this->_tpl_vars['patients'][0]['rue']; ?>
</td>
		</tr>
    	<tr valign="top">
	       	<td><?php echo $this->_tpl_vars['patients'][0]['code_postal']; ?>
 <?php echo $this->_tpl_vars['patients'][0]['commune']; ?>
</td>
		</tr>
    </table>
	<?php endif; ?>
	
	<?php unset($this->_sections['proprietaire']);
$this->_sections['proprietaire']['name'] = 'proprietaire';
$this->_sections['proprietaire']['loop'] = is_array($_loop=$this->_tpl_vars['proprietaires']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['proprietaire']['show'] = true;
$this->_sections['proprietaire']['max'] = $this->_sections['proprietaire']['loop'];
$this->_sections['proprietaire']['step'] = 1;
$this->_sections['proprietaire']['start'] = $this->_sections['proprietaire']['step'] > 0 ? 0 : $this->_sections['proprietaire']['loop']-1;
if ($this->_sections['proprietaire']['show']) {
    $this->_sections['proprietaire']['total'] = $this->_sections['proprietaire']['loop'];
    if ($this->_sections['proprietaire']['total'] == 0)
        $this->_sections['proprietaire']['show'] = false;
} else
    $this->_sections['proprietaire']['total'] = 0;
if ($this->_sections['proprietaire']['show']):

            for ($this->_sections['proprietaire']['index'] = $this->_sections['proprietaire']['start'], $this->_sections['proprietaire']['iteration'] = 1;
                 $this->_sections['proprietaire']['iteration'] <= $this->_sections['proprietaire']['total'];
                 $this->_sections['proprietaire']['index'] += $this->_sections['proprietaire']['step'], $this->_sections['proprietaire']['iteration']++):
$this->_sections['proprietaire']['rownum'] = $this->_sections['proprietaire']['iteration'];
$this->_sections['proprietaire']['index_prev'] = $this->_sections['proprietaire']['index'] - $this->_sections['proprietaire']['step'];
$this->_sections['proprietaire']['index_next'] = $this->_sections['proprietaire']['index'] + $this->_sections['proprietaire']['step'];
$this->_sections['proprietaire']['first']      = ($this->_sections['proprietaire']['iteration'] == 1);
$this->_sections['proprietaire']['last']       = ($this->_sections['proprietaire']['iteration'] == $this->_sections['proprietaire']['total']);
?>
		<?php if ($this->_sections['proprietaire']['index'] % 2 == 0): ?>
			<li class="bg_a">
		<?php else: ?>
			<li class="bg_b">
		<?php endif; ?>
				<a href="#" onclick="javascript:debtAutoComplete('', <?php echo $this->_tpl_vars['proprietaires'][$this->_sections['proprietaire']['index']]['patient_id']; ?>
)" title="<?php echo $this->_tpl_vars['proprietaires'][$this->_sections['proprietaire']['index']]['patient_date_naissance']; ?>
"><?php echo $this->_tpl_vars['proprietaires'][$this->_sections['proprietaire']['index']]['nom']; ?>
 <?php echo $this->_tpl_vars['proprietaires'][$this->_sections['proprietaire']['index']]['prenom']; ?>
</a>	
			</li>
	<?php endfor; endif; ?>
	<?php if ($this->_tpl_vars['proprietaires'][1] == '' && $this->_tpl_vars['proprietaires'][0] != ''): ?>
    <table>
    	<tr valign="top">
	    	<td>Date de naissance : <?php echo $this->_tpl_vars['proprietaires'][0]['date_naissance']; ?>
</td>
		</tr>
    	<tr valign="top">
	       	<td>Sexe : <?php echo $this->_tpl_vars['proprietaires'][0]['sexe']; ?>
</td>
		</tr>
    	<tr valign="top">
	       	<td><?php echo $this->_tpl_vars['proprietaires'][0]['rue']; ?>
</td>
		</tr>
    	<tr valign="top">
	       	<td><?php echo $this->_tpl_vars['proprietaires'][0]['code_postal']; ?>
 <?php echo $this->_tpl_vars['proprietaires'][0]['commune']; ?>
</td>
		</tr>
    </table>
	<?php endif; ?>	
	
	<?php unset($this->_sections['client']);
$this->_sections['client']['name'] = 'client';
$this->_sections['client']['loop'] = is_array($_loop=$this->_tpl_vars['clients']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['client']['show'] = true;
$this->_sections['client']['max'] = $this->_sections['client']['loop'];
$this->_sections['client']['step'] = 1;
$this->_sections['client']['start'] = $this->_sections['client']['step'] > 0 ? 0 : $this->_sections['client']['loop']-1;
if ($this->_sections['client']['show']) {
    $this->_sections['client']['total'] = $this->_sections['client']['loop'];
    if ($this->_sections['client']['total'] == 0)
        $this->_sections['client']['show'] = false;
} else
    $this->_sections['client']['total'] = 0;
if ($this->_sections['client']['show']):

            for ($this->_sections['client']['index'] = $this->_sections['client']['start'], $this->_sections['client']['iteration'] = 1;
                 $this->_sections['client']['iteration'] <= $this->_sections['client']['total'];
                 $this->_sections['client']['index'] += $this->_sections['client']['step'], $this->_sections['client']['iteration']++):
$this->_sections['client']['rownum'] = $this->_sections['client']['iteration'];
$this->_sections['client']['index_prev'] = $this->_sections['client']['index'] - $this->_sections['client']['step'];
$this->_sections['client']['index_next'] = $this->_sections['client']['index'] + $this->_sections['client']['step'];
$this->_sections['client']['first']      = ($this->_sections['client']['iteration'] == 1);
$this->_sections['client']['last']       = ($this->_sections['client']['iteration'] == $this->_sections['client']['total']);
?>
		<?php if ($this->_sections['client']['index'] % 2 == 0): ?>
			<li class="bg_a">
		<?php else: ?>
			<li class="bg_b">
		<?php endif; ?>
				<a href="#" onclick="javascript:clientAutoComplete(<?php echo $this->_tpl_vars['clients'][$this->_sections['client']['index']]['patient_id']; ?>
,'')" title="<?php echo $this->_tpl_vars['clients'][$this->_sections['client']['index']]['patient_date_naissance']; ?>
"><?php echo $this->_tpl_vars['clients'][$this->_sections['client']['index']]['nom']; ?>
 <?php echo $this->_tpl_vars['clients'][$this->_sections['client']['index']]['prenom']; ?>
</a>	
			</li>
	<?php endfor; endif; ?>
	<?php if ($this->_tpl_vars['clients'][1] == '' && $this->_tpl_vars['clients'][0] != ''): ?>
    <table>
    	<tr valign="top">
	    	<td>Date de naissance : <?php echo $this->_tpl_vars['clients'][0]['date_naissance']; ?>
</td>
		</tr>
    	<tr valign="top">
	       	<td>Sexe : <?php echo $this->_tpl_vars['clients'][0]['sexe']; ?>
</td>
		</tr>
    	<tr valign="top">
	       	<td><?php echo $this->_tpl_vars['clients'][0]['rue']; ?>
</td>
		</tr>
    	<tr valign="top">
	       	<td><?php echo $this->_tpl_vars['clients'][0]['code_postal']; ?>
 <?php echo $this->_tpl_vars['clients'][0]['commune']; ?>
</td>
		</tr>
    </table>
	<?php endif; ?>
	
	

	<?php unset($this->_sections['user']);
$this->_sections['user']['name'] = 'user';
$this->_sections['user']['loop'] = is_array($_loop=$this->_tpl_vars['users']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['user']['show'] = true;
$this->_sections['user']['max'] = $this->_sections['user']['loop'];
$this->_sections['user']['step'] = 1;
$this->_sections['user']['start'] = $this->_sections['user']['step'] > 0 ? 0 : $this->_sections['user']['loop']-1;
if ($this->_sections['user']['show']) {
    $this->_sections['user']['total'] = $this->_sections['user']['loop'];
    if ($this->_sections['user']['total'] == 0)
        $this->_sections['user']['show'] = false;
} else
    $this->_sections['user']['total'] = 0;
if ($this->_sections['user']['show']):

            for ($this->_sections['user']['index'] = $this->_sections['user']['start'], $this->_sections['user']['iteration'] = 1;
                 $this->_sections['user']['iteration'] <= $this->_sections['user']['total'];
                 $this->_sections['user']['index'] += $this->_sections['user']['step'], $this->_sections['user']['iteration']++):
$this->_sections['user']['rownum'] = $this->_sections['user']['iteration'];
$this->_sections['user']['index_prev'] = $this->_sections['user']['index'] - $this->_sections['user']['step'];
$this->_sections['user']['index_next'] = $this->_sections['user']['index'] + $this->_sections['user']['step'];
$this->_sections['user']['first']      = ($this->_sections['user']['iteration'] == 1);
$this->_sections['user']['last']       = ($this->_sections['user']['iteration'] == $this->_sections['user']['total']);
?>
		<?php if ($this->_sections['user']['index'] % 2 == 0): ?>
			<li class="bg_a">
		<?php else: ?>
			<li class="bg_b">
		<?php endif; ?>
				<a href="#" onclick="javascript:userAutoComplete(<?php echo $this->_tpl_vars['users'][$this->_sections['user']['index']]['ID']; ?>
,'')" title="<?php echo $this->_tpl_vars['users'][$this->_sections['user']['index']]['name']; ?>
"><?php echo $this->_tpl_vars['users'][$this->_sections['user']['index']]['familyname']; ?>
 <?php echo $this->_tpl_vars['users'][$this->_sections['user']['index']]['firstname']; ?>
</a>
			</li>
	<?php endfor; endif; ?>
	<?php if ($this->_tpl_vars['users'][1] == '' && $this->_tpl_vars['users'][0] != ''): ?>
    <table>
    	<tr valign="top">
	       	<td><?php echo $this->_tpl_vars['users'][0]['address1']; ?>
</td>
		</tr>
		<tr valign="top">
	       	<td><?php echo $this->_tpl_vars['users'][0]['zip1']; ?>
 <?php echo $this->_tpl_vars['users'][0]['city1']; ?>
</td>
		</tr>
		<tr valign="top">
	       	<td><?php echo $this->_tpl_vars['users'][0]['inami']; ?>
</td>
		</tr>
    	<tr valign="top">
	       	<td><?php echo $this->_tpl_vars['users'][0]['speciality']; ?>
</td>
		</tr>
    </table>
	<?php endif; ?>

            
	
</ul>