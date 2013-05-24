<?php /* Smarty version 2.6.19, created on 2012-09-08 12:10:12
         compiled from template_management_gestion_complete_search.tpl */ ?>
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
    
            <table cellpadding='0' cellspacing='0' width='100%'>
            <tr>
            <td class='b' style='width:2%'></td>
            <td class="tools" style='width:9%'>
                <a class="tool_del"  href='#' title='<?php echo $this->_tpl_vars['delete_alt']; ?>
' onclick="javascript:openDeletePlanningVersionBox(<?php echo $this->_tpl_vars['plannings'][$this->_sections['planning']['index']]['ID']; ?>
)"/>
            </td>
            <td style='width:69%'><?php echo $this->_tpl_vars['plannings'][$this->_sections['planning']['index']]['name']; ?>
</td>
            <td style='width:20%'><?php echo $this->_tpl_vars['plannings'][$this->_sections['planning']['index']]['time']; ?>
</td>
            </tr>
            </table>
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
	
			<table cellpadding='0' cellspacing='0' width='100%'>
			<tr>
			<td class='b' style='width:2%'></td>
			<td class="tools" style='width:9%'>
				<a class="tool_del" href='#' title='<?php echo $this->_tpl_vars['delete_alt']; ?>
' onclick="javascript:deleteConfirmBox(<?php echo $this->_tpl_vars['ouvriers'][$this->_sections['ouvrier']['index']]['ID']; ?>
)"/>
				<a class="tool_view" href='management_ouvrier.php?action=view&id=<?php echo $this->_tpl_vars['ouvriers'][$this->_sections['ouvrier']['index']]['ID']; ?>
' title='<?php echo $this->_tpl_vars['detail_alt']; ?>
'/>
				<a class="tool_edit" href='management_ouvrier.php?action=edit&id=<?php echo $this->_tpl_vars['ouvriers'][$this->_sections['ouvrier']['index']]['ID']; ?>
' title='<?php echo $this->_tpl_vars['edit_alt']; ?>
'/>
			</td>
			<td style='width:20%'><?php echo $this->_tpl_vars['ouvriers'][$this->_sections['ouvrier']['index']]['ouvrier_nom']; ?>
</td>
			<td style='width:20%'><?php echo $this->_tpl_vars['ouvriers'][$this->_sections['ouvrier']['index']]['ouvrier_prenom']; ?>
</td>
			<td style='width:17%'><?php echo $this->_tpl_vars['ouvriers'][$this->_sections['ouvrier']['index']]['ouvrier_salaire_horaire']; ?>
</td>
			<td style='width:16%'><?php echo $this->_tpl_vars['ouvriers'][$this->_sections['ouvrier']['index']]['ouvrier_bonus_recurrent']; ?>
</td>
			<td style='width:16%'><?php echo $this->_tpl_vars['ouvriers'][$this->_sections['ouvrier']['index']]['ouvrier_cout_recurrent']; ?>
</td>
			
			</table>
			</li>

	<?php endfor; endif; ?>

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
	
			<table cellpadding='0' cellspacing='0' width='100%'>
			<tr>
			<td class='b' style='width:2%'></td>
			<td class="tools" style='width:9%'>
				<a class="tool_del" href='#' title='<?php echo $this->_tpl_vars['delete_alt']; ?>
' onclick="javascript:deleteConfirmBox(<?php echo $this->_tpl_vars['products'][$this->_sections['product']['index']]['ID']; ?>
)"/>
				<a class="tool_view" href='management_product.php?action=view&id=<?php echo $this->_tpl_vars['products'][$this->_sections['product']['index']]['ID']; ?>
' title='<?php echo $this->_tpl_vars['detail_alt']; ?>
'/>
				<a class="tool_edit" href='management_product.php?action=edit&id=<?php echo $this->_tpl_vars['products'][$this->_sections['product']['index']]['ID']; ?>
' title='<?php echo $this->_tpl_vars['edit_alt']; ?>
'/>
			</td>
			<td style='width:17%'><?php echo $this->_tpl_vars['products'][$this->_sections['product']['index']]['name']; ?>
</td>
			<td style='width:16%'><?php echo $this->_tpl_vars['products'][$this->_sections['product']['index']]['unit']; ?>
</td>
			<td style='width:15%'><?php echo $this->_tpl_vars['products'][$this->_sections['product']['index']]['size']; ?>
</td>
			<td style='width:10%'><?php echo $this->_tpl_vars['products'][$this->_sections['product']['index']]['current_stock']; ?>
</td>
			<td style='width:20%'><?php echo $this->_tpl_vars['products'][$this->_sections['product']['index']]['sail_price_htva']; ?>
</td>
			<td style='width:10%'><?php echo $this->_tpl_vars['products'][$this->_sections['product']['index']]['tva']; ?>
</td>
			<td style='width:20%'><?php echo $this->_tpl_vars['products'][$this->_sections['product']['index']]['sail_price']; ?>
</td>
			</table>
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
		
		<table cellpadding='0' cellspacing='0' width='100%'>
		<tr>
		<td class='b' style='width:2%'></td>
		<td class="tools">
			<a class="tool_del" href='#' title='<?php echo $this->_tpl_vars['delete_alt']; ?>
' onclick="javascript:deleteConfirmBox(<?php echo $this->_tpl_vars['debts'][$this->_sections['debt']['index']]['ID']; ?>
)"/>
			<a class="tool_view" href='management_debt.php?action=view&id=<?php echo $this->_tpl_vars['debts'][$this->_sections['debt']['index']]['ID']; ?>
' title='<?php echo $this->_tpl_vars['detail_alt']; ?>
'/>
			<a class="tool_edit" href='management_debt.php?action=edit&id=<?php echo $this->_tpl_vars['debts'][$this->_sections['debt']['index']]['ID']; ?>
' title='<?php echo $this->_tpl_vars['edit_alt']; ?>
'/>
		</td>
		<td class='b' style='width:17%'><?php echo $this->_tpl_vars['debts'][$this->_sections['debt']['index']]['amount']; ?>
 Euro</td>
		<td class='b' style='width:18%'><?php echo $this->_tpl_vars['debts'][$this->_sections['debt']['index']]['creation_date']; ?>
</td>
		<td class='b' style='width:18%'><?php echo $this->_tpl_vars['debts'][$this->_sections['debt']['index']]['familyname']; ?>
 <?php echo $this->_tpl_vars['debts'][$this->_sections['debt']['index']]['firstname']; ?>
</td>
		<td class='b' style='width:12%'><?php echo $this->_tpl_vars['debts'][$this->_sections['debt']['index']]['workphone']; ?>
</td>
		<td class='b' style='width:12%'><?php echo $this->_tpl_vars['debts'][$this->_sections['debt']['index']]['mobilephone']; ?>
</td>
		<td class='b' style='width:12%'><?php echo $this->_tpl_vars['debts'][$this->_sections['debt']['index']]['privatephone']; ?>
</td>
		</table>
		</li>
	
	<?php endfor; endif; ?>
	
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
	
		<?php if ($this->_sections['users']['index'] % 2 == 0): ?>
			<li class="bg_a">
		<?php else: ?>
			<li class="bg_b">
		<?php endif; ?>
		
		<table cellpadding='0' cellspacing='0' width='100%'>
		<tr>
		<td class='b' style='width:2%'></td>
		<td class="tools">
			<a class="tool_view" href='management_user.php?action=detail&id=<?php echo $this->_tpl_vars['users'][$this->_sections['user']['index']]['ID']; ?>
' title='<?php echo $this->_tpl_vars['detail_alt']; ?>
'/>
			<a class="tool_edit" href='management_user.php?action=edit&id=<?php echo $this->_tpl_vars['users'][$this->_sections['user']['index']]['ID']; ?>
' title='<?php echo $this->_tpl_vars['edit_alt']; ?>
'/>
		</td>
		<td class='b' style='width:29%'><?php echo $this->_tpl_vars['users'][$this->_sections['user']['index']]['name']; ?>
</td>
		<td class='b' style='width:30%'><?php echo $this->_tpl_vars['users'][$this->_sections['user']['index']]['familyname']; ?>
</td>
		<td class='b' style='width:30%'><?php echo $this->_tpl_vars['users'][$this->_sections['user']['index']]['firstname']; ?>
</td>
		</table>
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
		
		<table cellpadding='0' cellspacing='0' width='100%'>
		<tr>
		<td class='b' style='width:2%'></td>
		<td class="tools">
			<a class="tool_del" href='#' title='<?php echo $this->_tpl_vars['delete_alt']; ?>
' onclick="javascript:deleteConfirmBox(<?php echo $this->_tpl_vars['addressbooks'][$this->_sections['addressbook']['index']]['ID']; ?>
)"/>
			<a class="tool_view" href='management_addressbook.php?action=view&id=<?php echo $this->_tpl_vars['addressbooks'][$this->_sections['addressbook']['index']]['ID']; ?>
' title='<?php echo $this->_tpl_vars['detail_alt']; ?>
'/>
			<a class="tool_edit" href='management_addressbook.php?action=edit&id=<?php echo $this->_tpl_vars['addressbooks'][$this->_sections['addressbook']['index']]['ID']; ?>
' title='<?php echo $this->_tpl_vars['edit_alt']; ?>
'/>
		</td>
		<td class='b' style='width:7%'><?php echo $this->_tpl_vars['addressbooks'][$this->_sections['addressbook']['index']]['type']; ?>
</td>
		<td class='b' style='width:5%'><?php echo $this->_tpl_vars['addressbooks'][$this->_sections['addressbook']['index']]['ID']; ?>
</td>
		<td class='b' style='width:21%'><?php echo $this->_tpl_vars['addressbooks'][$this->_sections['addressbook']['index']]['company']; ?>
</td>
		<td class='b' style='width:13%'><?php echo $this->_tpl_vars['addressbooks'][$this->_sections['addressbook']['index']]['familyname']; ?>
</td>
		<td class='b' style='width:13%'><?php echo $this->_tpl_vars['addressbooks'][$this->_sections['addressbook']['index']]['firstname']; ?>
</td>
		<td class='b' style='width:10%'><?php echo $this->_tpl_vars['addressbooks'][$this->_sections['addressbook']['index']]['workphone']; ?>
</td>
		<td class='b' style='width:10%'><?php echo $this->_tpl_vars['addressbooks'][$this->_sections['addressbook']['index']]['mobilephone']; ?>
</td>
		<td class='b' style='width:10%'><?php echo $this->_tpl_vars['addressbooks'][$this->_sections['addressbook']['index']]['privatephone']; ?>
</td>
		</table>
		</li>
	
	<?php endfor; endif; ?>

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
			<td class="tools">
				<a class="tool_del" href='#' title='<?php echo $this->_tpl_vars['delete_alt']; ?>
' onclick="javascript:deleteConfirmBox(<?php echo $this->_tpl_vars['protocols'][$this->_sections['protocol']['index']]['ID']; ?>
)"/>
				<a class="tool_view" href='management_protocol.php?action=view&id=<?php echo $this->_tpl_vars['protocols'][$this->_sections['protocol']['index']]['ID']; ?>
' title='<?php echo $this->_tpl_vars['detail_alt']; ?>
'/>
				<a class="tool_edit" href='management_protocol.php?action=edit&id=<?php echo $this->_tpl_vars['protocols'][$this->_sections['protocol']['index']]['ID']; ?>
' title='<?php echo $this->_tpl_vars['edit_alt']; ?>
'/>
			</td>
			<td style='width:20%'><?php echo $this->_tpl_vars['protocols'][$this->_sections['protocol']['index']]['patient']; ?>
</td>
			<td style='width:20%'><?php echo $this->_tpl_vars['protocols'][$this->_sections['protocol']['index']]['user_sender']; ?>
</td>
			<td style='width:20%'><?php echo $this->_tpl_vars['protocols'][$this->_sections['protocol']['index']]['user_recipient']; ?>
</td>
			<td style='width:8%'><?php echo $this->_tpl_vars['protocols'][$this->_sections['protocol']['index']]['date']; ?>
</td>
			<td style='width:10%'>
				<?php echo $this->_tpl_vars['protocols'][$this->_sections['protocol']['index']]['attachment']; ?>

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
				<a class="tool_view" href='management_sumehr.php?action=view&patient_id=<?php echo $this->_tpl_vars['sumehrs'][$this->_sections['sumehr']['index']]['patient_id']; ?>
&user_id=<?php echo $this->_tpl_vars['sumehrs'][$this->_sections['sumehr']['index']]['user_id']; ?>
' title='<?php echo $this->_tpl_vars['detail_alt']; ?>
'/>
				<a class="tool_edit" href='management_sumehr.php?action=edit&patient_id=<?php echo $this->_tpl_vars['sumehrs'][$this->_sections['sumehr']['index']]['patient_id']; ?>
&user_id=<?php echo $this->_tpl_vars['sumehrs'][$this->_sections['sumehr']['index']]['user_id']; ?>
' title='<?php echo $this->_tpl_vars['edit_alt']; ?>
'/>
			</td>
			<td class='b' style='width:15%'><?php echo $this->_tpl_vars['sumehrs'][$this->_sections['sumehr']['index']]['patient_familyname']; ?>
</td>
			<td class='b' style='width:15%'><?php echo $this->_tpl_vars['sumehrs'][$this->_sections['sumehr']['index']]['patient_firstname']; ?>
</td>
			<td class='b' style='width:15%'><?php echo $this->_tpl_vars['sumehrs'][$this->_sections['sumehr']['index']]['patient_birthdate']; ?>
</td>
			<td class='b' style='width:15%'><?php echo $this->_tpl_vars['sumehrs'][$this->_sections['sumehr']['index']]['user']; ?>
</td>
			<td class='b' style='width:15%'><?php echo $this->_tpl_vars['sumehrs'][$this->_sections['sumehr']['index']]['latest_modification_date']; ?>
</td>
			<td class="tools">
				<?php if ($this->_tpl_vars['sumehrs'][$this->_sections['sumehr']['index']]['sumehr_id'] != ''): ?>
					<a class="tool_html" href='#' title='<?php echo $this->_tpl_vars['export_html']; ?>
' onclick="javascript:exportSumehr(<?php echo $this->_tpl_vars['sumehrs'][$this->_sections['sumehr']['index']]['patient_id']; ?>
,'html')"/>
					<a class="tool_pdf" href='#' title='<?php echo $this->_tpl_vars['export_pdf']; ?>
' onclick="javascript:exportSumehr(<?php echo $this->_tpl_vars['sumehrs'][$this->_sections['sumehr']['index']]['patient_id']; ?>
,'pdf')"/>
					<a class="tool_rtf" href='#' title='<?php echo $this->_tpl_vars['export_rtf']; ?>
' onclick="javascript:exportSumehr(<?php echo $this->_tpl_vars['sumehrs'][$this->_sections['sumehr']['index']]['patient_id']; ?>
,'rtf')"/>
					<a class="tool_xml" href='#' title='<?php echo $this->_tpl_vars['export_xml']; ?>
' onclick="javascript:exportSumehr(<?php echo $this->_tpl_vars['sumehrs'][$this->_sections['sumehr']['index']]['patient_id']; ?>
,'xml')"/>
				<?php endif; ?>
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
				<a class="tool_view" href='management_sumehr.php?action=view_analyse&patient_id=<?php echo $this->_tpl_vars['exams'][$this->_sections['exam']['index']]['patient_id']; ?>
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
	
			<table cellpadding='0' cellspacing='0' width='100%'>
			<tr>
			<td class='b' style='width:2%'></td>
			<td class='b' style='width:3%'><a href='#' title='<?php echo $this->_tpl_vars['delete_alt']; ?>
' onclick="javascript:deleteConfirmBox(<?php echo $this->_tpl_vars['patients'][$this->_sections['patient']['index']]['ID']; ?>
)"><img src="./templates/standard/img/16x16/user_delete.png" /></a></td>
			<td class='b' style='width:3%'><a href='management_patient.php?action=view&id=<?php echo $this->_tpl_vars['patients'][$this->_sections['patient']['index']]['ID']; ?>
' title='<?php echo $this->_tpl_vars['detail_alt']; ?>
'><img src="./templates/standard/img/16x16/user_comment.png" /></a></td>
			<td class='b' style='width:3%'><a href='management_patient.php?action=edit&id=<?php echo $this->_tpl_vars['patients'][$this->_sections['patient']['index']]['ID']; ?>
' title='<?php echo $this->_tpl_vars['edit_alt']; ?>
'><img src="./templates/standard/img/16x16/user_edit.png" /></a></td>
			<td class='b' style='width:17%'><?php echo $this->_tpl_vars['patients'][$this->_sections['patient']['index']]['nom']; ?>
</td>
			<td class='b' style='width:17%'><?php echo $this->_tpl_vars['patients'][$this->_sections['patient']['index']]['prenom']; ?>
</td>
			<td class='b' style='width:10%'><?php echo $this->_tpl_vars['patients'][$this->_sections['patient']['index']]['date_naissance']; ?>
</td>
			<td class='b' style='width:19%'><?php echo $this->_tpl_vars['patients'][$this->_sections['patient']['index']]['titulaire']; ?>
</td>
			<td class='b' style='width:13%'><?php echo $this->_tpl_vars['patients'][$this->_sections['patient']['index']]['telephone']; ?>
</td>
			<td class='b' style='width:13%'><?php echo $this->_tpl_vars['patients'][$this->_sections['patient']['index']]['gsm']; ?>
</td>
			</table>
			</li>

	<?php endfor; endif; ?>
	
	
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
	
			<table cellpadding='0' cellspacing='0' width='100%'>
			<tr>
			<td class='b' style='width:2%'></td>
			<td class='b' style='width:3%'><a href='#' title='<?php echo $this->_tpl_vars['delete_alt']; ?>
' onclick="javascript:deleteConfirmBox(<?php echo $this->_tpl_vars['clients'][$this->_sections['client']['index']]['ID']; ?>
)"><img src="./templates/standard/img/16x16/user_delete.png" /></a></td>
			<td class='b' style='width:3%'><a href='management_client.php?action=view&id=<?php echo $this->_tpl_vars['clients'][$this->_sections['client']['index']]['ID']; ?>
' title='<?php echo $this->_tpl_vars['detail_alt']; ?>
'><img src="./templates/standard/img/16x16/user_comment.png" /></a></td>
			<td class='b' style='width:3%'><a href='management_client.php?action=edit&id=<?php echo $this->_tpl_vars['clients'][$this->_sections['client']['index']]['ID']; ?>
' title='<?php echo $this->_tpl_vars['edit_alt']; ?>
'><img src="./templates/standard/img/16x16/user_edit.png" /></a></td>
			<td class='b' style='width:17%'><?php echo $this->_tpl_vars['clients'][$this->_sections['client']['index']]['nom']; ?>
</td>
			<td class='b' style='width:17%'><?php echo $this->_tpl_vars['clients'][$this->_sections['client']['index']]['prenom']; ?>
</td>
			<td class='b' style='width:10%'><?php echo $this->_tpl_vars['clients'][$this->_sections['client']['index']]['date_naissance']; ?>
</td>
			<td class='b' style='width:13%'><?php echo $this->_tpl_vars['clients'][$this->_sections['client']['index']]['telephone']; ?>
</td>
			<td class='b' style='width:13%'><?php echo $this->_tpl_vars['clients'][$this->_sections['client']['index']]['gsm']; ?>
</td>
			</table>
			</li>

	<?php endfor; endif; ?>
	
	<?php unset($this->_sections['cecodi']);
$this->_sections['cecodi']['name'] = 'cecodi';
$this->_sections['cecodi']['loop'] = is_array($_loop=$this->_tpl_vars['cecodis']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['cecodi']['show'] = true;
$this->_sections['cecodi']['max'] = $this->_sections['cecodi']['loop'];
$this->_sections['cecodi']['step'] = 1;
$this->_sections['cecodi']['start'] = $this->_sections['cecodi']['step'] > 0 ? 0 : $this->_sections['cecodi']['loop']-1;
if ($this->_sections['cecodi']['show']) {
    $this->_sections['cecodi']['total'] = $this->_sections['cecodi']['loop'];
    if ($this->_sections['cecodi']['total'] == 0)
        $this->_sections['cecodi']['show'] = false;
} else
    $this->_sections['cecodi']['total'] = 0;
if ($this->_sections['cecodi']['show']):

            for ($this->_sections['cecodi']['index'] = $this->_sections['cecodi']['start'], $this->_sections['cecodi']['iteration'] = 1;
                 $this->_sections['cecodi']['iteration'] <= $this->_sections['cecodi']['total'];
                 $this->_sections['cecodi']['index'] += $this->_sections['cecodi']['step'], $this->_sections['cecodi']['iteration']++):
$this->_sections['cecodi']['rownum'] = $this->_sections['cecodi']['iteration'];
$this->_sections['cecodi']['index_prev'] = $this->_sections['cecodi']['index'] - $this->_sections['cecodi']['step'];
$this->_sections['cecodi']['index_next'] = $this->_sections['cecodi']['index'] + $this->_sections['cecodi']['step'];
$this->_sections['cecodi']['first']      = ($this->_sections['cecodi']['iteration'] == 1);
$this->_sections['cecodi']['last']       = ($this->_sections['cecodi']['iteration'] == $this->_sections['cecodi']['total']);
?>
	
		<?php if ($this->_sections['cecodi']['index'] % 2 == 0): ?>
			<li class="bg_a">
		<?php else: ?>
			<li class="bg_b">
		<?php endif; ?>
	
			<table cellpadding='0' cellspacing='0' width='100%'>
			<tr>
			<td class='b' style='width:2%'></td>
			<td class='b' style='width:3%'><a href='#' title='<?php echo $this->_tpl_vars['delete_alt']; ?>
' onclick="javascript:deleteConfirmBox(<?php echo $this->_tpl_vars['products'][$this->_sections['cecodi']['index']]['ID']; ?>
)"><img src="./templates/standard/img/16x16/user_delete.png" /></a></td>
			<td class='b' style='width:3%'><a href='management_cecodi.php?action=view&id=<?php echo $this->_tpl_vars['cecodis'][$this->_sections['cecodi']['index']]['ID']; ?>
' title='<?php echo $this->_tpl_vars['detail_alt']; ?>
'><img src="./templates/standard/img/16x16/user_comment.png" /></a></td>
			<td class='b' style='width:3%'><a href='management_cecodi.php?action=edit&id=<?php echo $this->_tpl_vars['cecodis'][$this->_sections['cecodi']['index']]['ID']; ?>
' title='<?php echo $this->_tpl_vars['edit_alt']; ?>
'><img src="./templates/standard/img/16x16/user_edit.png" /></a></td>
			<td class='b' style='width:6%'><?php echo $this->_tpl_vars['cecodis'][$this->_sections['cecodi']['index']]['cecodi']; ?>
</td>
			<td class='b' style='width:6%'><?php echo $this->_tpl_vars['cecodis'][$this->_sections['cecodi']['index']]['age_short']; ?>
</td>
			<td class='b' style='width:10%'><?php echo $this->_tpl_vars['cecodis'][$this->_sections['cecodi']['index']]['type']; ?>
</td>
			<td class='b' style='width:12%'><?php echo $this->_tpl_vars['cecodis'][$this->_sections['cecodi']['index']]['hono_travailleur']; ?>
</td>
			<td class='b' style='width:8%'><?php echo $this->_tpl_vars['cecodis'][$this->_sections['cecodi']['index']]['a_vipo']; ?>
</td>
			<td class='b' style='width:8%'><?php echo $this->_tpl_vars['cecodis'][$this->_sections['cecodi']['index']]['b_tiers_payant']; ?>
</td>
			<td class='b' style='width:8%'><?php echo $this->_tpl_vars['cecodis'][$this->_sections['cecodi']['index']]['kdb']; ?>
</td>
			<td class='b' style='width:8%'><?php echo $this->_tpl_vars['cecodis'][$this->_sections['cecodi']['index']]['bc']; ?>
</td>
			<td class='b' style='width:8%'><?php echo $this->_tpl_vars['cecodis'][$this->_sections['cecodi']['index']]['amout_tp']; ?>
</td>
			<td class='b' style='width:7%'><?php echo $this->_tpl_vars['cecodis'][$this->_sections['cecodi']['index']]['amout_tr']; ?>
</td>
			<td class='b' style='width:7%'><?php echo $this->_tpl_vars['cecodis'][$this->_sections['cecodi']['index']]['amout_vp']; ?>
</td>
			</table>
			</li>

	<?php endfor; endif; ?>
	
</ul>