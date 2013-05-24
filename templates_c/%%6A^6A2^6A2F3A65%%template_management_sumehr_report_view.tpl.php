<?php /* Smarty version 2.6.19, created on 2012-10-10 09:51:30
         compiled from template_management_sumehr_report_view.tpl */ ?>
<div class = "protocol">
			
	<div class="block_in_wrapper">
			
		<h3><?php echo $this->_tpl_vars['sumehr_report']['datetime']; ?>

		<?php $_from = $this->_tpl_vars['sumehr_permission']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['permission']):
?>
			<?php echo $this->_tpl_vars['permission']['name']; ?>

		<?php endforeach; endif; unset($_from); ?>
		</h3>
						
		<?php echo $this->_tpl_vars['sumehr_report']['text']; ?>


		<?php $_from = $this->_tpl_vars['sumehr_files']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['file']):
?>
			
				<br/>File: 
				<img alt='' src='./templates/standard/images/butn-<?php echo $this->_tpl_vars['file']['extension']; ?>
-hover.png'/> 
				<a target='_blank' href='management_sumehr.php?action=download_file&key=<?php echo $this->_tpl_vars['file']['key']; ?>
&user_id=<?php echo $this->_tpl_vars['sumehr_report']['user_ID']; ?>
&patient_id=<?php echo $this->_tpl_vars['sumehr_report']['patient_ID']; ?>
'><?php echo $this->_tpl_vars['file']['name']; ?>
 (<?php echo $this->_tpl_vars['file']['size']; ?>
Ko)</a>
				<br/><br/>
	        	
				<?php if ($this->_tpl_vars['file']['numberimage'] > 0): ?>
		        	<a href="management_sumehr.php?action=download_image&key=<?php echo $this->_tpl_vars['file']['key']; ?>
&thumbnail=1&user_id=<?php echo $this->_tpl_vars['sumehr_report']['user_ID']; ?>
&patient_id=<?php echo $this->_tpl_vars['sumehr_report']['patient_ID']; ?>
&iframe=true&width=1000&amp;height=1000&user_id=<?php echo $this->_tpl_vars['sumehr_report']['user_ID']; ?>
&patient_id=<?php echo $this->_tpl_vars['sumehr_report']['patient_ID']; ?>
" class="image_<?php echo $this->_tpl_vars['sumehr_report']['ID']; ?>
" rel="prettyPhoto[iframes]">
		        		<img width="150px" src="management_sumehr.php?action=download_image&key=<?php echo $this->_tpl_vars['file']['key']; ?>
&thumbnail=1&user_id=<?php echo $this->_tpl_vars['sumehr_report']['user_ID']; ?>
&patient_id=<?php echo $this->_tpl_vars['sumehr_report']['patient_ID']; ?>
">
		        	</a>
				<?php endif; ?>
				<?php if ($this->_tpl_vars['file']['numberimage'] > 1): ?>
		        	<a href="management_sumehr.php?action=download_image&key=<?php echo $this->_tpl_vars['file']['key']; ?>
&thumbnail=2&user_id=<?php echo $this->_tpl_vars['sumehr_report']['user_ID']; ?>
&patient_id=<?php echo $this->_tpl_vars['sumehr_report']['patient_ID']; ?>
&iframe=true&width=1000&amp;height=1000&user_id=<?php echo $this->_tpl_vars['sumehr_report']['user_ID']; ?>
&patient_id=<?php echo $this->_tpl_vars['sumehr_report']['patient_ID']; ?>
" class="image_<?php echo $this->_tpl_vars['sumehr_report']['ID']; ?>
" rel="prettyPhoto[iframes]">
		        		<img width="150px" src="management_sumehr.php?action=download_image&key=<?php echo $this->_tpl_vars['file']['key']; ?>
&thumbnail=2&user_id=<?php echo $this->_tpl_vars['sumehr_report']['user_ID']; ?>
&patient_id=<?php echo $this->_tpl_vars['sumehr_report']['patient_ID']; ?>
">
	    	    	</a>
	        	<?php endif; ?>
				<?php if ($this->_tpl_vars['file']['numberimage'] > 2): ?>
		    	<a href="management_sumehr.php?action=download_image&key=<?php echo $this->_tpl_vars['file']['key']; ?>
&thumbnail=3&user_id=<?php echo $this->_tpl_vars['sumehr_report']['user_ID']; ?>
&patient_id=<?php echo $this->_tpl_vars['sumehr_report']['patient_ID']; ?>
&iframe=true&width=1000&amp;height=1000&user_id=<?php echo $this->_tpl_vars['sumehr_report']['user_ID']; ?>
&patient_id=<?php echo $this->_tpl_vars['sumehr_report']['patient_ID']; ?>
" class="image_<?php echo $this->_tpl_vars['sumehr_report']['ID']; ?>
" rel="prettyPhoto[iframes]">
	        		<img width="150px" src="management_sumehr.php?action=download_image&key=<?php echo $this->_tpl_vars['file']['key']; ?>
&thumbnail=3&user_id=<?php echo $this->_tpl_vars['sumehr_report']['user_ID']; ?>
&patient_id=<?php echo $this->_tpl_vars['sumehr_report']['patient_ID']; ?>
">
	        	</a>
	        	<?php endif; ?>
			
		<?php endforeach; endif; unset($_from); ?>
													
		<br/>

		<a href="management_sumehr.php?action=edit&patient_id=<?php echo $this->_tpl_vars['sumehr_report']['patient_ID']; ?>
&user_id=<?php echo $this->_tpl_vars['sumehr_report']['user_ID']; ?>
&report_id=<?php echo $this->_tpl_vars['sumehr_report']['ID']; ?>
" class="butn_link"><span>Edition</span></a>
		
		<a onclick="javascript:deleteConfirmBox(<?php echo $this->_tpl_vars['sumehr_report']['ID']; ?>
)" class="butn_link"><span>Supprimer</span></a>
		
		<br/>
			
	</div> 			
</div>	
	
<div class="clear_both"></div>