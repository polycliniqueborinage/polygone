<?php /* Smarty version 2.6.19, created on 2012-10-30 15:07:56
         compiled from template_user_agenda_gestion_agenda_week_days.tpl */ ?>
<?php unset($this->_sections['currentWeekArray']);
$this->_sections['currentWeekArray']['name'] = 'currentWeekArray';
$this->_sections['currentWeekArray']['loop'] = is_array($_loop=$this->_tpl_vars['currentWeekArray']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['currentWeekArray']['show'] = true;
$this->_sections['currentWeekArray']['max'] = $this->_sections['currentWeekArray']['loop'];
$this->_sections['currentWeekArray']['step'] = 1;
$this->_sections['currentWeekArray']['start'] = $this->_sections['currentWeekArray']['step'] > 0 ? 0 : $this->_sections['currentWeekArray']['loop']-1;
if ($this->_sections['currentWeekArray']['show']) {
    $this->_sections['currentWeekArray']['total'] = $this->_sections['currentWeekArray']['loop'];
    if ($this->_sections['currentWeekArray']['total'] == 0)
        $this->_sections['currentWeekArray']['show'] = false;
} else
    $this->_sections['currentWeekArray']['total'] = 0;
if ($this->_sections['currentWeekArray']['show']):

            for ($this->_sections['currentWeekArray']['index'] = $this->_sections['currentWeekArray']['start'], $this->_sections['currentWeekArray']['iteration'] = 1;
                 $this->_sections['currentWeekArray']['iteration'] <= $this->_sections['currentWeekArray']['total'];
                 $this->_sections['currentWeekArray']['index'] += $this->_sections['currentWeekArray']['step'], $this->_sections['currentWeekArray']['iteration']++):
$this->_sections['currentWeekArray']['rownum'] = $this->_sections['currentWeekArray']['iteration'];
$this->_sections['currentWeekArray']['index_prev'] = $this->_sections['currentWeekArray']['index'] - $this->_sections['currentWeekArray']['step'];
$this->_sections['currentWeekArray']['index_next'] = $this->_sections['currentWeekArray']['index'] + $this->_sections['currentWeekArray']['step'];
$this->_sections['currentWeekArray']['first']      = ($this->_sections['currentWeekArray']['iteration'] == 1);
$this->_sections['currentWeekArray']['last']       = ($this->_sections['currentWeekArray']['iteration'] == $this->_sections['currentWeekArray']['total']);
?>

<div class="hour" style="width:<?php echo $this->_tpl_vars['width']; ?>
px;"><a onclick="javascript:changeDay('<?php echo $this->_tpl_vars['currentWeekArray'][$this->_sections['currentWeekArray']['index']]; ?>
','week_day'); return false;" href="./user_agenda.php?action=day"><?php echo $this->_tpl_vars['currentWeekArrayLangFormat'][$this->_sections['currentWeekArray']['index']]; ?>
</a></div>

<?php endfor; endif; ?>